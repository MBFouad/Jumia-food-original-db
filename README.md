# ![Laravel App](logo.png)

### Example Laravel codebase containing import csv file and API.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker).

### Docker

To install with [Docker](https://www.docker.com), run following commands:

```
git clone git@github.com:MBFouad/task-ACID.git
cd tas-ACID
cp .env.example .env
docker-compose up -d
docker-compose exec main php artisan key:generate
docker-compose exec main php artisan migrate
docker-compose exec main php artisan db:seed
open browser and type http://localhost:8888
``` 

### manual install
Clone the repository

    git clone git@github.com:MBFouad/task-ACID.git

Switch to the repo folder

    cd task-ACID

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file(such as database configuration)

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run unit test

    php artisan test

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://127.0.0.1:8000

**TL;DR command list**

    git clone git@github.com:MBFouad/task-ACID.git
    cd tas-ACID
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan test
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

    


# Code overview

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/Api` - Contains all the api controllers
- `app/Http/Middleware` - Contains the JWT auth middleware
- `app/Http/Requests/Api` - Contains all the api form requests
- `app/RealWorld/Favorite` - Contains the files implementing the favorite feature
- `app/RealWorld/Filters` - Contains the query filters used for filtering api requests
- `app/RealWorld/Follow` - Contains the files implementing the follow feature
- `app/RealWorld/Paginate` - Contains the pagination class used to paginate the result
- `app/RealWorld/Slug` - Contains the files implementing slugs to articles
- `app/RealWorld/Transformers` - Contains all the data transformers
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `tests` - Contains all the application tests
- `tests/Feature/Api` - Contains all the api tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------
# APP URLS

Run the laravel development server

    php artisan serve

The api can now be accessed at

   - http://localhost:8000 - import and list products 
   - http://localhost:8000/cache - cache product (cache resets after create new product)
   
# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

   - http://localhost:8000/api/products/import - import csv 
   - http://localhost:8000/api/products/show/Hydra - get one by name contain
   - http://localhost:8000/api/products/show/3 - get one by id 
   - http://localhost:8000/api/products/all - get all
