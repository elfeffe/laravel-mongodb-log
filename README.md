# laravel-mongodb-log
Mongodb-log package to repalce native file-based laravel logging system.

This package is developed to replace native laravel file-based logging system to use mongodb.
Installation
Composer

You could use Composer to install the package and all needed dependencies.

{
  "require": {
    "amirhb/laravel-mongodb-log": "0.0.1-alpha"
  },
...

Configuration
Updating Database Configuration file

You can edit config/database.php file to set your mongodb connection.

'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => env('MONGODB_HOST', 'localhost'),
            'port'     => env('MONGODB_PORT', 27017),
            'database' => env('MONGODB_DATABASE', 'logs'),
        ]

Creating The Log Model

You should create a model to save logs.

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Log saves logs using mongdodb
 * @package App
 */
class Log extends Model {
    use SoftDeletes;

    /**
     * mongodb connection that Log uses.
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * collection name Log uses.
     *
     * @var string
     */
    protected $collection = 'logs';

    /**
     * Prevents saving typical eloquent timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user',
        'env',
        'message',
        'level',
        'context',
        'extra',
        'time'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'context' => 'array',
        'extra'   => 'array'
    ];
}

Updating Project Bootsrapping

You should edit bootstrap/app.php to push new Handler and Processor to replace native logging system with mongodb logging.

...
$app->configureMonologUsing(function ($monolog) {
    $monolog->pushHandler(new Amirhb\LaravelMongodbLog\EloquentHandler());
    $monolog->pushProcessor(new Amirhb\LaravelMongodbLog\RequestProcessor());
});

return $app;

