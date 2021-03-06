<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'ru', 'uk'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('ru');
        }

        $response = $next($request);
        $response->headers->setCookie(cookie('language', App::getLocale(), 86400));

        return $response;
    }
}