# Installation Guide

This guide helps you get the project running in minutes.

---

## Requirements

- PHP 8.5+
- Composer
- Node.js 24+
- SQLite or MySQL

---

## Local Installation (Recommended)

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan wayfinder:generate --with-form
npm install
npm run dev
(php artisan serve)
```
Visit: http://localhost:8000

---

## Using SQLite (Default)
No configuration required.
The database file will be created automatically.

---

## Using MySQL (Optional)
Update your .env:

```bash
DB_CONNECTION=mysql
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

Then run:

```bash
php artisan migrate
```

---

## Using Sail (Optional)

```bash
composer install
cp .env.example .env
./vendor/bin/sail up -d
```

### ⚠️ Important – First Sail install
If you change MySQL credentials in .env, you must destroy Sail volumes:
```bash
./vendor/bin/sail down -v
```

And continue with the following commands:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail npm install
./vendor/bin/sail artisan wayfinder:generate --with-form
./vendor/bin/sail npm run dev
```

---

## First Steps

1. Register a new account 
2. Create your first Office 
3. Invite users via the Office settings 
4. Manage your Office settings

---

## Troubleshooting

- Clear cache: ```php artisan optimize:clear``` 
- Permissions issues: check storage/ permissions

## Common issues

### MySQL access denied (1045) (With Sail)
Run:

```bash
./vendor/bin/sail down -v
./vendor/bin/sail up -d
```
