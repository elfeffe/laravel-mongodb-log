<?php
/**
 * Created by PhpStorm.
 * User: Amir Hossein Babaeian
 * Date: 3/4/17
 * Time: 10:24 AM
 */

namespace Amirhb\LaravelMongodbLog;

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