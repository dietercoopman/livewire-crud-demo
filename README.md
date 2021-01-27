# livewire-crud-demo
A demo crud application 
=======
The easiest way to run this code is to install Docker desktop.

Inside the folder you've checked out you run these commands

````shell
composer install
cp .env.example .env
php artisan key:generate
./vendor/bin/sail up
php artisan migrate
php artisan db:seed
````
