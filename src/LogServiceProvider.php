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
        $this->loadRoutesFrom( __DIR__ . '/routes.php');

        $this->publishes([
            __DIR__ . '/config.php' => config_path('mongodb-log.php'),
        ]);

        $this->publishes([
            __DIR__.'/views/js/jsgrid' => public_path('amirhb/js/jsgrid'),
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

        $this->app['router']->aliasMiddleware('log-user', 'Amirhb\LaravelMongodbLog\LogMiddleware');

        $this->loadViewsFrom( __DIR__ . '/views', 'LaravelMongodbLog');
    }
}