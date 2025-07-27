FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip curl git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Untuk menyalin entrypoint
COPY docker/php/entrypoint.sh /entrypoint.sh

# Permission eksekusi ke entrypoint
RUN chmod +x /entrypoint.sh

# Entrypoint custom
ENTRYPOINT ["/entrypoint.sh"]

WORKDIR /var/www
CMD ["php-fpm"]
