<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        if (in_array($request->language, ['en', 'ru', 'uk'])) {
            App::setLocale($request->language);
        } else {
            App::setLocale('ru');
        }

        return $next($request);
    }
}