<?php

namespace App\Http\Middleware;

use App;
use Closure;

class LanguageGetMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'ru', 'uk'])) {
            App::setLocale($locale);
        } else if (in_array($request->cookie('language'), ['en', 'ru', 'uk'])) {
            App::setLocale($request->cookie('language'));
        }

        $response = $next($request);
        $response->headers->setCookie(cookie('language', App::getLocale(), 86400));

        return $response;
    }
}