<?php
/**
 * Created by PhpStorm.
 * User: babaeian
 * Date: 3/4/17
 * Time: 10:24 AM
 */

namespace App\MongodbLog;

class RequestProcessor
{
    public function __invoke(array $record) {
        $request = request();

        $record['extra']['serve'] = $request->server('SERVER_ADDR');
        $record['extra']['host'] = $request->getHost();
        $record['extra']['uri'] = $request->getPathInfo();
        $record['extra']['request'] = $request->all();

        return $record;
    }
}