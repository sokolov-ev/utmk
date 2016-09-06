<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;
use App\Office;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('office_contacts', Office::getContactsData());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
