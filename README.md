# livewire-crud-demo
A demo crud application 
=======
The easiest way to run this code is to install Docker desktop.

if you don't have docker desktop you can install it via homebrew

````shell
brew cask install docker
````

or download it via 

https://www.docker.com/products/docker-desktop

Inside the folder you've checked out you run these commands

````shell
composer install
cp .env.example .env
./vendor/bin/sail up
sail artisan key:generate
sail artisan migrate
sail artisan db:seed
````
