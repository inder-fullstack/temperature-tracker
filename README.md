##### Environment #### 
PHP Version >= 8.0

MySQL

Composer >= 2.3


#### Setup Steps ####
Git pull

Go to temperature-tracker directory

Run command: composer install

Run command for make .env file: cp .env.example .env

Run command: php artisan key:generate

Make sure .env file have API_BASE_PATH key with url "https://api.open-meteo.com/v1/forecast"

Run migration with command: php artisan migrate

Run command: php artisan config:cache

Run serve on local: php artisan serve

Run scheduler for testing on local: php artisan temperature:fetch


Setup corn job with follwoing code

* * * * * cd /path/to/your/project && php artisan schedule:run >> /dev/null 2>&1


###### #### #### ####  #### #####
#          THANKS               #
###### ##### #### #### ##### ####
