<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        if (in_array($request->lang, ['en', 'ru', 'uk'])) {
            App::setLocale($request->lang);
        } else {
            App::setLocale('ru');
        }

        return $next($request);
    }
}