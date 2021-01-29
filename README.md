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

Git clone the project 

````shell
git clone https://github.com/dietercoopman/livewire-crud-demo.git
````

Inside the folder you've checked out you run these commands

````shell
composer install
cp .env.example .env
./vendor/bin/sail up
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
````
