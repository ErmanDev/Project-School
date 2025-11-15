#!/bin/bash

# Check if .env exists, if not create from example
if [ ! -f .env ]; then
    echo "Warning: .env file not found. Make sure environment variables are set in Railway."
fi

# Clear any cached config first (in case of previous failed deployments)
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Cache configuration (only if env vars are set)
php artisan config:cache || echo "Warning: config:cache failed - check environment variables"
php artisan route:cache || echo "Warning: route:cache failed"
php artisan view:cache || echo "Warning: view:cache failed"

# Run migrations (skip if database not configured)
php artisan migrate --force || echo "Warning: migrations failed - check database configuration"

# Start the server
echo "Starting Laravel server on port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

