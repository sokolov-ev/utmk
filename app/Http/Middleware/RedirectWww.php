<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectWww
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
        if (strpos($request->getHttpHost(), 'www.') === 0) {
            return redirect(rtrim(env('APP_URL'), '/ ') . $request->getRequestUri(), 301);
        }

        return $next($request);
    }
}