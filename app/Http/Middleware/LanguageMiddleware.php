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
            if (in_array($request->cookie('language'), ['en', 'ru', 'uk'])) {
                App::setLocale($request->cookie('language'));
            } else {
                App::setLocale('ru');
            }
        }

        $response = $next($request);
        $response->headers->setCookie(cookie('language', App::getLocale(), 86400));

        return $response;
    }
}