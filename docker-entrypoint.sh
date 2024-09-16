#!/bin/bash

# Run Laravel migrations
php artisan migrate --force

# Serve the application
php artisan serve --host=0.0.0.0 --port=8000
