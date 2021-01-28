# livewire-crud-demo
A demo crud application 
=======
The easiest way to run this code is to install Docker desktop.

if you don't have docker desktop you can install it via homebrew

````shell
brew cask install docker
````

Inside the folder you've checked out you run these commands

````shell
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
./vendor/bin/sail up
````
