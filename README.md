# Lite Notes

Notes management app using Laravel

## Main Features

-   Breeze for authentication
-   Resource controller form CRUD operations
-   Soft deleting models
-   Blade components and directives
-   Route model binding
-   Eloquent relationships
-   Naming conventions and best practices

## Installation

-   Run `composer install`
-   Run `cp .env.example .env`
-   In MySQL create a table named as `DB_DATABASE` variable in .env file
-   Run `php artisan migrate`
-   Then Run `npm install && npm run dev`, and in another terminal run `php artisan serve`
-   Go to link localhost:8000

##### Future ideas

-   Using Gates and Policies
-   Search feature
-   Option to make a note public
-   Notebooks to organize notes
