# --- Base Image ---
FROM php:8.3-fpm-alpine

# Install system deps and PHP extensions
RUN apk add --no-cache \
      bash git unzip icu-dev oniguruma-dev libzip-dev \
 && docker-php-ext-install \
      pdo pdo_mysql mbstring zip intl

# Install Composer (from official image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy app files
COPY . .

# Install PHP deps (optimize for prod images)
RUN composer install --no-interaction --prefer-dist --no-dev --optimize-autoloader

# Cache Laravel config/routes/views (don't fail the build if .env isn't ready)
RUN php artisan config:cache || true \
 && php artisan route:cache || true \
 && php artisan view:cache  || true

EXPOSE 9000
CMD ["php-fpm", "-F"]
