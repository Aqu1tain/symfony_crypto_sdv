# Symfony Crypto SDV

This project is a Symfony 7 application for experimenting with basic cryptocurrency exchanges.  It ships with Doctrine ORM and a PostgreSQL service via Docker Compose.

## Requirements

- PHP >= 8.2
- [Composer](https://getcomposer.org/)
- [Docker](https://www.docker.com/) and Docker Compose
- [Symfony CLI](https://symfony.com/download) (optional but recommended)

## Installation

1. **Install PHP dependencies**

   ```bash
   composer install
   ```

2. **Configure environment**

   Copy `.env` to `.env.local` and adjust values as needed.  Ensure `DATABASE_URL` matches the database you plan to run.  The provided `docker compose` file starts a PostgreSQL instance, so you may want to use a URL similar to:

   ```env
   DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
   ```

## Running the project

1. **Start services**

   ```bash
   docker compose up -d
   ```

2. **Apply database migrations**

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

3. **(Optional) Load sample data**

   ```bash
   php bin/console doctrine:fixtures:load
   ```

4. **Start the development server**

   ```bash
   symfony server:start
   ```

   The application will be available at http://localhost:8000.

5. **Stopping services**

   ```bash
   docker compose down
   ```

## Running checks

Run Composer's validator to ensure the configuration file is valid:

```bash
composer validate
```

