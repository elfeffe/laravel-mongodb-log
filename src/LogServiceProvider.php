<?php

namespace Amirhb\LaravelMongodbLog;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            __DIR__ . '/config.php' ,'mongodb-log.php'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('mongodb-log.php'),
        ]);
    }
}