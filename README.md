# Spatie Permission

This Project is create for test Spatie laravel-permission package

--- laravel8

## Login Datails

email: nikunchoudhury@gmail.com

password: 123456

## Used Commands

> Create New laravel Project

    laravel new spatie-permission

> Install laravel inbuild Package breeze

    composer require laravel/breeze
        php artisan breeze:install
        npm install
        npm run dev

> Install spatie/laravel-permission package

     composer require spatie/laravel-permission

- add the service provider in your config/app.php file:

'providers' => [

    Spatie\Permission\PermissionServiceProvider::class,

];

> publish the migration and the config/permission.php config file with:

    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

> Run the migrations

    php artisan migrate --seed
