<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (in_array($request->locale, ['en', 'ru', 'uk'])) {
            App::setLocale($request->locale);
        } else {
            App::setLocale('ru');
        }

        return $next($request);
    }
}