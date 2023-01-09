# Eloquent Traceable

Store traceable log items in your local database using Eloquent.

## Install

First install the latest version of our package.
```bash
composer require tingo-gmbh/eloquent-traceable
```

Next we publish the migration and config files.
```bash
php artisan vendor:publish --provider="Tingo\Traceable\TraceableServiceProvider" --tag="migrations"
```