<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Log;

class User3
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $name)
    {
        Log::debug('Passing through User3 Middleware - ' . $name);
        return $next($request);
    }
}