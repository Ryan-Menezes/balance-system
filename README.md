# Balance System
A simple balance manager
## Settings
Have [Composer](https://getcomposer.org/) installed on your machine and through your terminal enter the project directory and run the command "composer update":
```sh
cd "project directory"
composer update
```
After this initial configuration, go to the root of the project and look for the file ".env.example" and rename it to ".env", in the same file change the system constants according to your needs.
<br><br>
Finally access the root directory of the project through your terminal and run the command "php artisan migrate --seed":
```sh
cd "project directory"
php artisan migrate --seed
```
## This project was developed with the help of an online course
Course link: https://academy.especializati.com.br/curso/laravel-55-gratuito
