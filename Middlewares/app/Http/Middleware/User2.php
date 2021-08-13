<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Log;

class User2
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug('Passing through User2 Middleware');
        return $next($request);
    }
}