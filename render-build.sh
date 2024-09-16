#!/usr/bin/env bash

# Install PHP and other necessary dependencies
apt-get update && apt-get install -y \
php-cli \
php-mbstring \
php-xml \
php-curl \
php-pgsql \
curl \
unzip \
git

# Install Composer globally
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
composer install --no-dev --optimize-autoloader

# Generate the application key if not set
if [ -z "$APP_KEY" ]; then
  php artisan key:generate
fi
