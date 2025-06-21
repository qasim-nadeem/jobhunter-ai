# Dockerfile

FROM php:8.2-fpm

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# 2. Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Set working directory
WORKDIR /var/www

# 5. Copy existing application code
COPY . /var/www

# 6. Install app dependencies
RUN composer install --optimize-autoloader --no-dev

# 7. Generate optimized files (optional)
RUN php artisan key:generate \
 && php artisan config:cache \
 && php artisan route:cache

# 8. Ensure storage & cache directories are writable
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 9. Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
