# Use an official PHP image with necessary extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer manually
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application files
COPY . .

# Install PHP dependencies with Composer
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-scripts --no-progress

# Set permissions for Laravel storage and cache folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose the port for Laravel to serve the application
EXPOSE 8000

# Run the Laravel application
CMD ["php-fpm"]
