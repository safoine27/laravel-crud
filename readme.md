# Drivers test app

## Installation


Clone the repository

    git clone git@gitlab.com:safoine27/laravel-crud.git

Switch to the repo folder

    cd laravel-crud

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

Access the server at http://127.0.0.1:8000

## Routes

**The admin dashboard is secured with a basic http authentification**
    
    Username: admin / Password: admin

* /register/{en/ar} (registration form) 
* /admin/driver/ (List of registered drivers) 
* /admin/driver/{id} (Driver info page) 
* /admin/driver/{id} (Driver edit page) 

