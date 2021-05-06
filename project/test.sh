php artisan migrate:refresh --env=testing
php artisan config:clear
php artisan test --env=testing
php artisan dusk --env=testing
./vendor/bin/phpstan analyse
