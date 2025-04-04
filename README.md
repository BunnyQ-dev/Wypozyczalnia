## Rentify
Wypożyczalnia sprzętu budowlanego

## Install Dependencies

composer install

## Create .env file

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

## Generate Application Key

php artisan key:generate

## Run Database Migrations

php artisan migrate


## Run the Local Development Server

php artisan serve

