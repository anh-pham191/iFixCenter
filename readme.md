## About iFixCenter

iFixCenter is a simple e-commerce websites with severals use cases for admin as well as user to interact with the categories, products and feedbacks. This project is compiled using Laravel 4.

## Installation Guide

Download the project.

Locate the config/database.php file and edit the database connection accordingly to your local environment.

Run the 2 command composer install and composer update to update the required packages.

Use command php artisan migrate to migrate table to the database,

Locate the UserSeederTable.php then use command php artisan db:seed to get the admin account.

Start up the wamp / lamp server, cd the terminal to the project and run php artisan serve.

The website should now be accessible within http://localhost

## Laravel PHP Framework

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
