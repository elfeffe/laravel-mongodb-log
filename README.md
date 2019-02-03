# laravel-mongodb-log
Mongodb Logging-Channel For Laravel Framework

This package is developed as a mongodb logging-channel for Laravel 5.6 and above.

### Installation

You could use Composer to install the package and all needed dependencies.

```
composer require amirhb/laravel-mongodb-log
```

### Configuration
Updating Database Configuration file

You should update your config/database.php file to add a mongodb connection.

```
'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('MONGODB_HOST', 'localhost'),
            'port'     => env('MONGODB_PORT', 27017),
            'database' => env('MONGODB_DATABASE', 'logs'),
            ],
``` 

And also update your config/logging.php to add your custom log-channel.

```
'channels' => [
    'custom' => [
        'driver' => 'custom',
        'via' => Amirhb\LaravelMongodbLog\LogHandler::class,
    ],
],
```

There is a config file to publish which you can use to set database connection and a collection name for your mongodb logs.
First publish the config file:

```
php artisan vendor:publish --provider="Amirhb\CAReflector\ServiceProvider" --tag="config"
```

Then updating the config file with your desired settings:

```

<?php
return [
    'connection' => env('MONGODB_CONNECTION' ,'mongodb'),
    'collection' => env('MONGODB_LOG_COLLECTION' ,'logs'),
];
```

### Usage
As mentioned above, the package is a logging channel so you can do logging as before like in the [Laravel documentation](https://laravel.com/docs/logging) described.

Logs are saved as ```Jenssegers\Mongodb\Eloquent\Model``` instances. You can query them easily. For more information check the [Laravel MongoDB Documentation](https://github.com/jenssegers/laravel-mongodb).

### Unit Testing
to be added ...
 
