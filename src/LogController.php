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

    public function filter(Request $request)
    {
        $response = [];
        $logs = DB::connection('mongodb')->collection('logs');

        $parameters = $request->all();

        foreach ($parameters as $parameter => $input) {
            if (empty($input)) {
                continue;
            }

            if ($parameter === 'date' || $parameter === 'timezone') {
                $logs = $logs->where( 'time.' . $parameter, 'like', $input);
            } else {
                $logs = $logs->where( $parameter, 'like', $input);
            }
        }

        $logs = $logs->get();

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