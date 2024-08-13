#!/bin/bash
set -e

# Ensure storage and bootstrap/cache directories have the correct permissions
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

cd /var/www

# Install dependencies
composer install

# Copy environment file
if [ ! -f .env ]
then

    cp .docker/.env.docker .env
    php artisan key:generate --ansi

fi

# Execute the migrations
php artisan migrate
php artisan db:seed

# Execute the main process
exec "$@"
