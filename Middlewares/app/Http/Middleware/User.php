<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Log;

class User
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

        if ($request->session()->exists('login')) {
            return $next($request);
        } else {
            return redirect('/');
        }

    }
}