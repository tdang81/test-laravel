#short instruction

##init project
docker-compose up
mv .env.example .env
composer update

##rebuild docker images
docker-compose build

##init php classes and db structure
php artisan make:auth

php artisan make:model Crud
php artisan make:controller CrudsController

docker-compose exec app php artisan migrate

##build frontend ressources
npm i
npm run dev

##call vue app in browser
localhost:8080/crud
