<?php
/**
 * Created by PhpStorm.
 * User: Amir Hossein Babaeian
 * Date: 7/8/17
 * Time: 11:28 AM
 */
namespace Amirhb\LaravelMongodbLog;

use Closure;
use Auth;
use App\Log;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $loggerId = 'email';

        if (!empty(Log::getLoggerIdAttribute())) {
            $loggerId = Log::getLoggerIdAttribute();
        }

        if ( empty(Auth::user()) || Auth::user()->$loggerId !== config('mongodb-log.loggerId')) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}