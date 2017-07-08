<?php
/**
 * Created by PhpStorm.
 * User: babaeian
 * Date: 7/8/17
 * Time: 11:28 AM
 */
namespace Amirhb\LaravelMongodbLog;

use Closure;
use Auth;

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
        if (!Auth::user()->hasRole('test')) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}