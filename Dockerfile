FROM php:8.3-apache

# Install dependencies, PHP extensions, and Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable mod_rewrite and set the Apache document root to /public
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Download Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Mark the project directory as safe for Git inside the container
RUN git config --global --add safe.directory /var/www/html

# Create an automatic startup script
RUN cat <<'EOF' > /usr/local/bin/start-container.sh
#!/bin/bash
set -e

echo "=== Initializing Laravel application ==="

if [ ! -f .env ]; then
    echo "Creating .env from .env.example..."
    cp .env.example .env
fi

rm -f bootstrap/cache/*.php

if [ ! -f vendor/autoload.php ]; then
    echo "Installing Composer dependencies..."
    composer install --no-interaction --optimize-autoloader
fi

if grep -q "^APP_KEY=$" .env; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

if [ ! -f public/build/manifest.json ]; then
    echo "Building frontend assets (Vite + Tailwind)..."
    npm install
    npm run build
fi

php artisan optimize:clear
rm -rf public/storage
php artisan storage:link
chmod -R 777 storage bootstrap/cache public

echo "Running database migrations and seeders..."
php artisan migrate --seed --force

echo "=== Application is ready at http://localhost:8000 ==="
exec apache2-foreground
EOF

RUN sed -i 's/\r$//' /usr/local/bin/start-container.sh && chmod +x /usr/local/bin/start-container.sh

CMD ["/usr/local/bin/start-container.sh"]