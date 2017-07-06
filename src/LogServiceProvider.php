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
        include __DIR__ . '/routes.php';

        $this->publishers([
            __DIR__ . '/config.php' => config_path('mongodb-log.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Amirhb\LaravelMongodbLog\LogController');

        $this->loadViewsFrom(__DIR__.'/views');
    }
}