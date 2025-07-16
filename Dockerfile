# Use the official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache

# Expose port 8080 and start Laravel's built-in server
EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080 