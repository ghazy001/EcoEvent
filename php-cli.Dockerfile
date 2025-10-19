# --- Base Image ---
FROM php:8.3-fpm-alpine

# Install dependencies
RUN apk add --no-cache bash git unzip libzip-dev oniguruma-dev icu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring zip intl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Laravel code
COPY docker .

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Cache Laravel config/routes/views for faster boot
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache || true

EXPOSE 9000
CMD ["php-fpm", "-F"]
