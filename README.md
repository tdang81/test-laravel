#short instruction
docker-compose up
mv .env.example .env
composer update

php artisan make:auth
docker-compose exec app php artisan migrate

