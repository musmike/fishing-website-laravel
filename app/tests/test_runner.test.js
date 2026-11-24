import { describe, it } from 'node:test';
import assert from 'node:assert';
import fs from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

describe('Laravel Project Architecture & Spec Validation Tests', () => {
  const appRoot = path.join(__dirname, '..');
  const repoRoot = fs.existsSync(path.join(__dirname, '../../docs/swagger.json'))
    ? path.join(__dirname, '../..')
    : appRoot;

  const getSwaggerPath = () => {
    return fs.existsSync(path.join(repoRoot, 'docs/swagger.json'))
      ? path.join(repoRoot, 'docs/swagger.json')
      : path.join(appRoot, 'docs/swagger.json');
  };

  const getEnvExamplePath = () => {
    return fs.existsSync(path.join(repoRoot, '.env.example'))
      ? path.join(repoRoot, '.env.example')
      : path.join(appRoot, '.env.example');
  };

  it('should have a valid OpenAPI 3.0 specification file in docs/', () => {
    const swaggerPath = getSwaggerPath();
    assert.ok(fs.existsSync(swaggerPath), 'docs/swagger.json must exist');
    const spec = JSON.parse(fs.readFileSync(swaggerPath, 'utf8'));
    assert.match(spec.openapi, /^3\.0\./, 'Must be OpenAPI 3.0.x');
    assert.ok(spec.info.title.includes('Fishing Website'), 'Title must be accurate');
  });

  it('should define all core REST API endpoints in swagger.json', () => {
    const swaggerPath = getSwaggerPath();
    const spec = JSON.parse(fs.readFileSync(swaggerPath, 'utf8'));
    const paths = Object.keys(spec.paths);

    assert.ok(paths.includes('/api/register'), 'Must define /api/register');
    assert.ok(paths.includes('/api/login'), 'Must define /api/login');
    assert.ok(paths.includes('/api/user'), 'Must define /api/user');
    assert.ok(paths.includes('/api/posts'), 'Must define /api/posts');
    assert.ok(paths.includes('/api/fishes'), 'Must define /api/fishes');
    assert.ok(paths.includes('/api/comments'), 'Must define /api/comments');
    assert.ok(paths.includes('/api/orders'), 'Must define /api/orders');
  });

  it('should configure Sanctum Bearer authorization in OpenAPI spec', () => {
    const swaggerPath = getSwaggerPath();
    const spec = JSON.parse(fs.readFileSync(swaggerPath, 'utf8'));
    assert.ok(spec.components.securitySchemes.sanctumAuth, 'Must define sanctumAuth');
    assert.strictEqual(spec.components.securitySchemes.sanctumAuth.scheme, 'bearer');
  });

  it('should have all API controllers implemented', () => {
    const controllers = [
      'Api/AuthController.php',
      'Api/PostApiController.php',
      'Api/FishApiController.php',
      'Api/CommentApiController.php',
      'Api/OrderApiController.php',
      'SwaggerController.php'
    ];
    for (const ctrl of controllers) {
      const p = path.join(appRoot, 'app/Http/Controllers', ctrl);
      assert.ok(fs.existsSync(p), `Controller ${ctrl} must exist`);
    }
  });

  it('should have seeder with users, posts, comments, fishes, and orders', () => {
    const seederPath = path.join(appRoot, 'database/seeders/DatabaseSeeder.php');
    assert.ok(fs.existsSync(seederPath), 'DatabaseSeeder.php must exist');
    const content = fs.readFileSync(seederPath, 'utf8');

    assert.ok(content.includes('admin@fishing.pl'), 'Seeder must include demo admin');
    assert.ok(content.includes('user@fishing.pl'), 'Seeder must include demo user');
    assert.ok(content.includes("'fishes'"), 'Seeder must populate fishes table');
    assert.ok(content.includes("'comments'"), 'Seeder must populate comments table');
    assert.ok(content.includes("'orders'"), 'Seeder must populate orders table');
    assert.ok(content.includes("'posts'"), 'Seeder must populate posts table');
  });

  it('should have .env and .env.example with matching database configuration', () => {
    const envExamplePath = getEnvExamplePath();
    assert.ok(fs.existsSync(envExamplePath), '.env.example must exist');
    const content = fs.readFileSync(envExamplePath, 'utf8');
    assert.ok(content.includes('DB_CONNECTION=mysql'), 'Must configure mysql connection');
    assert.ok(content.includes('DB_DATABASE=fishingshop'), 'Must configure fishingshop database');
  });
});
