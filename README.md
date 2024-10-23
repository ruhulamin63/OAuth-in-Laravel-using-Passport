# OAuth-in-Laravel-using-Passport
To implement OAuth in Laravel, we'll use the Laravel Passport package, which provides a full OAuth2 server implementation for Laravel applications.

I have used  "php": "^8.2", and "laravel/framework": "^11.9".

## For Laravel 11, the minimum PHP version required is PHP 8.2.

```bash
git clone https://github.com/ruhulamin63/OAuth-in-Laravel-using-Passport.git
```

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=root
DB_PASSWORD=
```

```bash
composer update
```

## laravel/passport Installation
```bash
composer require laravel/passport
php artisan passport:install
```

```bash
php artisan migrate
```

### Public Access Route
```bash
http://127.0.0.1:8000
```

### Step 1: Generating private and public keys
Generate the key using OpenSSL:

The first command will generate a 4096-bit private key named oauth-private.key.
The second command will generate the public key (oauth-public.key) from that private key.
Save key files correctly:

Save these key files as storage/oauth-private.key and storage/oauth-public.key in the root directory of your project.
```bash
openssl genrsa -out oauth-private.key 4096
openssl rsa -in oauth-private.key -pubout -out oauth-public.key
```

```bash
PASSPORT_PRIVATE_KEY="PRIVATE KEY"
PASSPORT_PUBLIC_KEY="PUBLIC KEY"

or

PASSPORT_PRIVATE_KEY_PATH=/full/path/to/storage/oauth-private.key
PASSPORT_PUBLIC_KEY_PATH=/full/path/to/storage/oauth-public.key
```
### Step 2: Register api/register
```bash
curl -X POST "http://localhost:8000/api/register" \
    -H "Content-Type: application/json" \
    -d '{"name": "name", "email": "user@example.com", "password": "password"}'
```

### Step 3: login api/login
```bash
curl -X POST "http://localhost:8000/api/login" \
    -H "Content-Type: application/json" \
    -d '{"email": "user@example.com", "password": "password"}'
```

### Step 4: Get User Details api/user
```bash
curl -H "Authorization: Bearer {access_token}" \
     "http://localhost:8000/api/user"
```

#### ======== Enjoy coding ============
