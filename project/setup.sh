cp .env.base .env
composer install
npm ci
npm run prod
php artisan key:generate
php artisan migrate:refresh --seed
chmod -R 777 storage
chmod -R 777 bootstrap/cache
php artisan storage:link