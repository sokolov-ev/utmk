<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App\Office;

class OfficesComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('mainOffice', Office::getMainContacts());
        $view->with('allOffices', Office::getOfficesContacts(false));
    }
}