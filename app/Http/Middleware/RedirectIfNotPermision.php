<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotPermision
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $array = array_slice(func_get_args(), 2);

        if (in_array(Auth::guard('admin')->user()->role, $array)) {
            return $next($request);
        } else {
            return response(view('errors.403'), 403);
        }
    }
}