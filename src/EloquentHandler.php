<?php

namespace App\MongodbLog;

use Carbon\Carbon;
use Monolog\Handler\AbstractProcessingHandler;
use Auth;

class EloquentHandler extends AbstractProcessingHandler {

    protected function write(array $record) {
        $data = [
            'env'     => $record['channel'],
            'message' => $record['message'],
            'level'   => $record['level_name'],
            'context' => $record['context'],
            'extra'   => $record['extra'],
            'time'   => Carbon::now()
        ];

        \App\Log::create($data);
    }
}