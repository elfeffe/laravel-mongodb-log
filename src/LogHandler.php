<?php

namespace Amirhb\LaravelMongodbLog;

use Monolog\Logger;

class LogHandler
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('mongodb');
        $logger->pushHandler(new EloquentHandler());
        // $logger->pushProcessor(new RequestProcessor());

        return $logger;
    }
}
