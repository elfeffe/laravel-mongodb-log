<?php

namespace Amirhb\LaravelMongodbLog;

use Carbon\Carbon;
use Monolog\Handler\AbstractProcessingHandler;
use Auth;

class EloquentHandler extends AbstractProcessingHandler {

    protected function write(array $record) {
        $request = request();

        $extra['server'] = $request->server('SERVER_ADDR');
        $extra['host'] = $request->getHost();
        $extra['uri'] = $request->getPathInfo();
        $extra['request'] = $request->all();

        $data = [
            'env'     => $record['channel'],
            'message' => $record['message'],
            'level'   => $record['level_name'],
            'context' => $record['context'],
            'extra'   => $extra,
            'time'   => Carbon::now()
        ];

        \App\Log::create($data);
    }
}