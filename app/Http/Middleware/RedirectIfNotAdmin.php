<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Admin;

class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/administration/login');
        }

        if (Auth::guard($guard)->user()->status != Admin::STATUS_ACTIVE) {
            Auth::guard('admin')->logout();
            return redirect('/administration/login');
        }

        date_default_timezone_set("Europe/Kiev");
        Admin::where('id', Auth::guard($guard)->user()->id)->update(['activity' => time()]);

        return $next($request);
    }
}