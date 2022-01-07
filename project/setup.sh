cp .env.base .env
composer install
npm ci
npm run prod
php artisan key:generate
php artisan migrate:refresh --seed
chmod -R 777 storage
chmod -R 777 bootstrap/cache
php artisan storage:link
wget https://github.com/homing-job/laravel-spa/files/6542800/seeder_images.zip
unzip seeder_images.zip -d storage/app/public/images
rm -f seeder_images.zip