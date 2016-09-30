<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\User;

class RedirectIfNotAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/');
        }

        date_default_timezone_set("Europe/Kiev");
        User::where('id', Auth::guard($guard)->user()->id)->update(['activity' => time()]);

        return $next($request);
    }
}