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

# Check PHP and Composer versions
RUN php -v
RUN composer --version

# Set working directory
WORKDIR /var/www/html

# Copy existing application files
COPY . .

# Clear Composer cache and install PHP dependencies
RUN composer clear-cache
RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-scripts --no-progress

# Set permissions for Laravel storage and cache folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy the entrypoint script
COPY ./docker-entrypoint.sh /usr/local/bin/

# Make the entrypoint script executable
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose the port for Laravel to serve the application
EXPOSE 8000

# Run the Laravel migration and serve the application
CMD ["docker-entrypoint.sh"]
