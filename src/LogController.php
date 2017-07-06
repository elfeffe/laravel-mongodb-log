<?php

namespace Amirhb\LaravelMongodbLog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
