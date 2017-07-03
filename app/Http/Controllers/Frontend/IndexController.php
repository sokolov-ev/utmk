<?php

namespace App\Http\Controllers\Frontend;

use App;
use TurboSms;
use Validator;
use JsValidator;
use App\Images;
use App\Office;
use App\Sendsms;
use App\Metatags;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $slides = Images::where('type', 'slider-index')->orderBy('weight', 'ASC')->get();
        $slides = Images::viewDataArray($slides);

        $metatags = Metatags::where([['type', 'article'], ['slug', 'home']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.'.App::getLocale().'_index', [
            'slides'   => $slides,
            'metatags' => $metatags,
        ]);
    }

    public function nashaPolitika()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nasha-politika']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_nasha-politika', ['metatags' => $metatags]);
    }

    public function razvitie()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'razvitie']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_razvitie', ['metatags' => $metatags]);
    }

    public function luchshieProdavcy()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'luchshie-prodavcy']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_luchshie-prodavcy', ['metatags' => $metatags]);
    }

    public function chtoNovogo()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'chto-novogo']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_chto-novogo', ['metatags' => $metatags]);
    }

    public function stremitelnoMenyayushchemsyaMire()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'stremitelno-menyayushchemsya-mire']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_stremitelno-menyayushchemsya-mire', ['metatags' => $metatags]);
    }

    public function nashiProdazh()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nashi-obemy-prodazh']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_nashi-obemy-prodazh', ['metatags' => $metatags]);
    }

    public function ustojchivoeRazvitie()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'ustojchivoe-razvitie-kak-cel']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_ustojchivoe-razvitie-kak-cel', ['metatags' => $metatags]);
    }

    public function stremimsyaDlyaKlientov()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'my-stremimsya-dlya-nashix-klientov']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_my-stremimsya-dlya-nashix-klientov', ['metatags' => $metatags]);
    }

    public function porezka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'porezka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_porezka', ['metatags' => $metatags]);
    }

    public function upakovka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'upakovka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_upakovka', ['metatags' => $metatags]);
    }

    public function dostavka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'dostavka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_dostavka', ['metatags' => $metatags]);
    }

    public function aboutUs()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'yutmk-energy']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.'.App::getLocale().'_about-us', ['metatags' => $metatags]);
    }

    public function karernyeVozmozhnosti()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'karernye-vozmozhnosti']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_karernye-vozmozhnosti', ['metatags' => $metatags]);
    }

    public function nadezhnyjPartner()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nadezhnyj-partner-dlya-vashego-biznesa']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_nadezhnyj-partner-dlya-vashego-biznesa', ['metatags' => $metatags]);
    }

    public function shirokijEksportImport()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'shirokij-eksport-import-mira']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_shirokij-eksport-import', ['metatags' => $metatags]);
    }

    public function kontrolKachestva()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'kontrol-kachestva-produkcii']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_kontrol-kachestva-produkcii', ['metatags' => $metatags]);
    }

    public function eksportImport()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'eksport-import-metallicheskih-izdelij']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.'.App::getLocale().'_eksport-import-metallicheskih-izdelij', ['metatags' => $metatags]);
    }


    public function salesNetwork()
    {
        $offices  = Office::getOfficesContacts();
        $metatags = Metatags::where([['type', 'article'], ['slug', 'network-of-offices']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.sales-network', [
            'offices' => $offices,
            'metatags' => $metatags,
        ]);
    }

    public function officeView($slug)
    {
        $office   = Office::viewData($slug);
        $metatags = Metatags::where([['type', 'office'], ['slug', $office['slug']]])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.office', [
            'office'   => $office,
            'metatags' => $metatags,
        ]);
    }
}