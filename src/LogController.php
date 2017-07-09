<?php

namespace Amirhb\LaravelMongodbLog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LogController extends Controller
{
    public function index()
    {
        return view('LaravelMongodbLog::index');
    }

    public function filter()
    {
        $response = [];
        $logs = DB::connection('mongodb')->collection('logs')->get();

        foreach ($logs as $log) {
            $result = [];

            $result['env'] = $log['env'];
            $result['message'] = substr($log['message'], 0, 5);
            $result['level'] = $log['level'];
            $result['context'] = $log['context'];
            $result['extra'] = $log['extra'];
            $result['date'] = $log['time']['date'];
            $result['timezone'] = $log['time']['timezone'];

            $response[] = $result;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}