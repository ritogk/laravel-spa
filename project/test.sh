php artisan migrate:refresh --seed --env=testing
php artisan config:clear
php vendor/bin/phpstan analyse app --memory-limit=1G
php artisan test --env=testing
php artisan dusk --env=testing
