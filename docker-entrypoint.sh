#!/bin/bash

# Wait for the database to be available
echo "Waiting for the database..."
until php artisan migrate:status; do
  >&2 echo "Database is not available yet. Waiting..."
  sleep 5
done

# Run Laravel migrations and seed the database
php artisan migrate --force --seed

# Start PHP-FPM
php-fpm
