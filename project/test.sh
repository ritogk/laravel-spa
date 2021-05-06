php artisan migrate:refresh --env=testing
php artisan config:clear
php vendor/bin/phpstan analyse app --memory-limit=1G
