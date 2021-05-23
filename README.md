## About Project

This Project is a simple and basic user management using laravel

## Packages Used

-   laravel/ui

## Tech/framework used

<b>Built with</b>

-   [Laravel](https://laravel.com)

## Features

-   Has 3 types of users [Admin - Agent - Cashier]
-   each type has some of access rights

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x/installation#installation)

Clone the repository

```
git clone https://github.com/NourhanAymanElstohy/simple-user-manage.git
```

Switch to the repo folder

```
cd simple-user-manage
```

Install all the dependencies using composer

```
composer install
npm install
```

Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env
```

Generate a new application key

```
php artisan key:generate
```

Run the database migrations and seed (**Set the database credentials in .env before migrating**)

```
php artisan migrate:fresh --seed
```

Start the local development server

```
php artisan serve
```

You can now access the server at http://localhost:8000

**Command List**

```
git clone https://github.com/NourhanAymanElstohy/simple-user-manage.git
cd simple-user-manage
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```
