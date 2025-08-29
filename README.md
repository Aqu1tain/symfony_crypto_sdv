# Symfony Crypto SDV

This project is a Symfony 7 application for experimenting with basic cryptocurrency exchanges.  It ships with Doctrine ORM and a PostgreSQL service via Docker Compose.

## Requirements

- PHP >= 8.2
- [Composer](https://getcomposer.org/)
- [Symfony CLI](https://symfony.com/download) (optional but recommended)

## Installation

1. **Install PHP dependencies**

   ```bash
   composer install
   ```

2. **Configure environment**
    
    Adjust values of `.env` as needed.  Ensure `DATABASE_URL` matches the database you plan to run.  The provided `docker compose` file starts a PostgreSQL instance, so you may want to use a URL similar to:

   ```env
   DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
   ```

    But feel free to use any SQL database you want.

## Running the project


1. **Apply database migrations**

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

2. **(Optional) Load sample data**

   ```bash
   php bin/console doctrine:fixtures:load
   ```

3. **Start the development server**

   ```bash
   symfony server:start
   ```

   The application will be available at http://localhost:8000 by default.


## Running checks

Run Composer's validator to ensure the configuration file is valid:

```bash
composer validate
```
