#!/bin/bash

# Set permission (optional)
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Jalankan storage:link jika belum ada
if [ ! -L "public/storage" ]; then
    php artisan storage:link
fi

# Jalankan Laravel queue, scheduler, dll kalau mau (opsional)

# Jalankan php-fpm (default)
exec php-fpm
