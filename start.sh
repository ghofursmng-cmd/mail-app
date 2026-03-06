#!/bin/bash

# Ensure database directory exists
mkdir -p database

# Create empty sqlite database if it doesn't exist
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    echo "Database file created."
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force || echo "Migration failed, but proceeding to start server..."

# Clear and cache config for performance and to ensure env vars are picked up
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Start the Laravel application
echo "Starting Laravel on port $PORT..."
php artisan serve --host=0.0.0.0 --port=$PORT
