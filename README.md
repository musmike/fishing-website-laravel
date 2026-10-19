# 🎣 Fishing Website (`fishing-website-laravel`)

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=flat&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-06B6D4?style=flat&logo=tailwindcss&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)
![MariaDB](https://img.shields.io/badge/MariaDB-10.6-003545?style=flat&logo=mariadb&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Ready-2496ED?style=flat&logo=docker&logoColor=white)

A full-stack web application created for a fishing equipment store and angling community (*"Wędkarstwo naszą pasją"*). Designed for both beginner and experienced anglers, the platform combines an informational blog, a store showcase, custom equipment ordering, customer reviews, and a community gallery of fish catches.

---

## ✨ Features

### 👤 Guest Users (Unauthenticated)
* **Home & Blog Posts:** Browse fishing articles in reverse chronological order with an animated header slideshow and asynchronous **"Load More"** pagination (fetches 4 older posts per request via jQuery AJAX without reloading the page).
* **Our Shop (`Nasz sklep`):** Read about the store and browse an interactive interior photo gallery powered by Lightbox2.
* **Your Catches (`Wasze połowy`):** View photos and details of fish caught by community members (species, location, weight, date, and author).
* **Reviews (`Opinie`):** Read customer reviews and feedback about the shop.
* **Contact (`Kontakt`):** Access the store's address, contact details, and opening hours.

### 🔐 Registered Users (`user` status)
* **Authentication & Profile Management:** Full registration, login, password update, and account deletion flow powered by Laravel Breeze.
* **Fish Catch Management:** Upload, edit, and delete personal fish catches (with photo upload, species, catch location, weight, and date).
* **Custom Orders (`Zamówienie`):** Place orders for fishing gear with server-side validation (product selection, payment method, age, and shipping address).
* **Shop Reviews:** Post, edit, and delete personal store reviews.

### 🛡️ Administrators (`admin` status)
* **Content Moderation:** Full control to edit or delete any user's fish catch entry or shop review across the platform.

---

## 🛠️ Tech Stack

* **Backend:** PHP 8.3, Laravel 13, Eloquent ORM, Laravel Breeze
* **Frontend:** Blade Templates, Bootstrap 5, Tailwind CSS 4, Alpine.js, jQuery (AJAX & Lightbox2), Vite 6
* **Database:** MariaDB 10.6
* **DevOps:** Docker & Docker Compose (automated zero-touch entrypoint setup + phpMyAdmin)

---

## 🚀 Getting Started (Docker)

The project is fully containerized. You do **not** need PHP, Composer, Node.js, or MySQL installed on your local machine.

### Prerequisites
* [Docker](https://www.docker.com/) & Docker Compose installed.

### Installation & Startup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/musmike/fishing-website-laravel.git
   cd fishing-website-laravel
   ```

2. **Start the containers:**
   ```bash
   docker compose up -d
   ```

3. **Wait for automatic initialization (first run only):**
   On the very first startup, the `app` container automatically creates the `.env` file, installs Composer and NPM packages, builds Vite assets, links storage, runs database migrations, and seeds initial data (15 blog posts, sample users, and reviews).
   
   You can follow the initialization progress live with:
   ```bash
   docker compose logs -f app
   ```
   Once you see `=== Application is ready at http://localhost:8000 ===`, the application is ready!

---

## 🌐 Services & Ports

| Service | URL | Credentials / Notes |
| :--- | :--- | :--- |
| **Web Application** | [http://localhost:8000](http://localhost:8000) | Main Laravel application |
| **phpMyAdmin** | [http://localhost:8080](http://localhost:8080) | User: `root` / Password: `root` |
| **MariaDB Database** | `localhost:3306` | Database: `fishingshop` (`root` / `root`) |

### Granting Admin Privileges
By default, newly registered users receive the `user` status. To test administrator moderation features:
1. Register a new account at `http://localhost:8000/register`.
2. Open **phpMyAdmin** at [http://localhost:8080](http://localhost:8080).
3. Navigate to `fishingshop` -> `users` table and change your user's `status` column from `user` to `admin`.

---

## 🗄️ Database Schema

The application uses Laravel migrations to manage the following core tables:
* `users` – User accounts and role status (`user` / `admin`)
* `posts` – Homepage blog articles with external image links
* `fishes` – User-submitted fish catches with local storage image paths
* `comments` – Customer shop reviews linked to users
* `orders` – Equipment orders placed by authenticated users