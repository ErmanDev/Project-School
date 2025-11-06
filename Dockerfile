FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev \
    && php artisan config:cache \
    && php artisan route:cache

# Set permissions
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data /var/www

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000