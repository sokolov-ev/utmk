<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;

class LanguageComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $view->with('office_contacts', Office::getContactsData());

        // $response = new Response($view);
        // return $response->withCookie('language', App::getLocale(), 60);

        // $cookieJar = new CookieJar();
        // $cookieJar->queue(cookie('user_id', 874397, 60));
    }
}