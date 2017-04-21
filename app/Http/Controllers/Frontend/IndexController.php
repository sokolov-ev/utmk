<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use Validator;
use JsValidator;

use TurboSms;
use App\Sendsms;

use App\Office;
use App\Metatags;

class IndexController extends Controller
{
    public function porezka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'porezka']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_porezka', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_porezka', ['metatags' => $metatags]);
        }
    }

    public function upakovka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'upakovka']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_upakovka', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_upakovka', ['metatags' => $metatags]);
        }
    }

    public function dostavka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'dostavka']])->first();
        $metatags = Metatags::getViewData($metatags);
        
        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_dostavka', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_dostavka', ['metatags' => $metatags]);
        }
    }

    public function kontrolKachestva()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'kontrol-kachestva-produkcii']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_kontrol-kachestva-produkcii', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_kontrol-kachestva-produkcii', ['metatags' => $metatags]);
        }
    }
    public function eksportImport()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'eksport-import-metallicheskih-izdelij']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_eksport-import-metallicheskih-izdelij', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_eksport-import-metallicheskih-izdelij', ['metatags' => $metatags]);
        }
    }
    public function shirokijEksportImport()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'shirokij-eksport-import-mira']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_shirokij-eksport-import', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_shirokij-eksport-import', ['metatags' => $metatags]);
        }
    }
//*
    public function nadezhnyjPartner()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nadezhnyj-partner-dlya-vashego-biznesa']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_nadezhnyj-partner-dlya-vashego-biznesa', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_nadezhnyj-partner-dlya-vashego-biznesa', ['metatags' => $metatags]);
        }
    }
    public function nashiProdazh()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nashi-obemy-prodazh']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_nashi-obemy-prodazh', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_nashi-obemy-prodazh', ['metatags' => $metatags]);
        }
    }
    public function ustojchivoeRazvitie()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'ustojchivoe-razvitie-kak-cel']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_ustojchivoe-razvitie-kak-cel', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_ustojchivoe-razvitie-kak-cel', ['metatags' => $metatags]);
        }
    }
//*
    public function karernyeVozmozhnosti()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'karernye-vozmozhnosti']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_karernye-vozmozhnosti', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_karernye-vozmozhnosti', ['metatags' => $metatags]);
        }
    }
    public function stremimsyaDlyaKlientov()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'my-stremimsya-dlya-nashix-klientov']])->first();
        $metatags = Metatags::getViewData($metatags);
        
        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_my-stremimsya-dlya-nashix-klientov', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_my-stremimsya-dlya-nashix-klientov', ['metatags' => $metatags]);
        }
    }
    public function vashiZakazy()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'vashi-zakazy-kak-mozhno-skoree']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_vashi-zakazy-kak-mozhno-skoree', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_vashi-zakazy-kak-mozhno-skoree', ['metatags' => $metatags]);
        }
    }
//*
    public function strukturyPodKlyuch()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'struktury-vozmozhen-zakaz-pod-klyuch']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_struktury-vozmozhen-zakaz-pod-klyuch', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_struktury-vozmozhen-zakaz-pod-klyuch', ['metatags' => $metatags]);
        }
    }
    public function stremitelnoMenyayushhemsyaMire()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'stremitelno-menyayushhemsya-mire']])->first();
        $metatags = Metatags::getViewData($metatags);
        
        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_stremitelno-menyayushhemsya-mire', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_stremitelno-menyayushhemsya-mire', ['metatags' => $metatags]);
        }
    }
    public function chtoNovogo()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'chto-novogo']])->first();
        $metatags = Metatags::getViewData($metatags);
        
        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_chto-novogo', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_chto-novogo', ['metatags' => $metatags]);
        }
    }
//*
    public function luchshieProdavcy()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'luchshie-prodavcy']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_luchshie-prodavcy', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_luchshie-prodavcy', ['metatags' => $metatags]);
        }
    }
    public function razvitie()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'razvitie']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_razvitie', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_razvitie', ['metatags' => $metatags]);
        }
    }
    public function nashaPolitika()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nasha-politika']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.information.ru_nasha-politika', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.information.uk_nasha-politika', ['metatags' => $metatags]);
        }
    }

//---------------------------------------------------------------------

    public function index()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'home']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.site.ru_index', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.site.uk_index', ['metatags' => $metatags]);
        }
    }

    public function aboutUs()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'yutmk-energy']])->first();
        $metatags = Metatags::getViewData($metatags);

        if (App::getLocale() == "ru") {
            return view('frontend.site.ru_about-us', ['metatags' => $metatags]);
        } elseif (App::getLocale() == "uk") {
            return view('frontend.site.uk_about-us', ['metatags' => $metatags]);
        }
    }

    public function officeView($city, $id)
    {
        $office = Office::findOrFail($id);
        $office = Office::viewData($office->id);
        $metatags = Metatags::where([['type', 'office'], ['slug', $office['id']]])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.office', [
            'office' => $office,
            'metatags' => $metatags,
        ]);
    }

    public function salesNetwork()
    {
        $offices = Office::getOfficesContacts();
        $metatags = Metatags::where([['type', 'article'], ['slug', 'network-of-offices']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.sales-network', [
            'offices' => $offices,
            'metatags' => $metatags,
        ]);
    }
}