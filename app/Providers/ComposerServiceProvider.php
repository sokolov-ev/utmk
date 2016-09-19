<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("layouts.site", "App\Http\Composers\OfficesComposer");
        View::composer("layouts.site", "App\Http\Composers\UserCartComposer");

        View::composer("layouts.admin", "App\Http\Composers\OrdersComposer");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}