# laravel-mongodb-log
Mongodb Log-Channel For Laravel Framework

This package is developed as a mongodb log-channel for Laravel 5.6 and above.

###Installation

You could use Composer to install the package and all needed dependencies.

```
composer require amirhb/laravel-mongodb-log
```

###Configuration
Updating Database Configuration file

You should update your config/database.php file to add a mongodb connection.

```
'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('MONGODB_HOST', 'localhost'),
            'port'     => env('MONGODB_PORT', 27017),
            'database' => env('MONGODB_DATABASE', 'db_name'),
            ]
``` 


 
