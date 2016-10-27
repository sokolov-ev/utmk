<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use Mail;
use Validator;
use JsValidator;

use TurboSms;

use App\Office;
use App\Metatags;

class IndexController extends Controller
{
    public function porezka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'porezka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_porezka', [
            'metatags' => $metatags,
        ]);
    }

    public function upakovka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'upakovka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_upakovka', [
            'metatags' => $metatags,
        ]);
    }

    public function dostavka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'dostavka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_dostavka', [
            'metatags' => $metatags,
        ]);
    }

//---------------------------------------------------------------------

    public function metallokonstruktsii()
    {
        // if (App::getLocale() == "en") {
        //     return view('frontend.information.metallokonstruktsii_en');
        // } elseif (App::getLocale() == "ru") {
        //     return view('frontend.information.metallokonstruktsii_ru');
        // } elseif (App::getLocale() == "uk") {
        //     return view('frontend.information.metallokonstruktsii_uk');
        // }
        $metatags = Metatags::where([['type', 'article'], ['slug', 'metallokonstruktsii']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_metallokonstruktsii', [
            'metatags' => $metatags,
        ]);
    }

    public function modulnyeSoorujeniya()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'modulnye-soorujeniya']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_modulnye-soorujeniya', [
            'metatags' => $metatags,
        ]);
    }

    public function otsinkovannyeRulony()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'otsinkovannye-rulony']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_otsinkovannye-rulony', [
            'metatags' => $metatags,
        ]);
    }

    public function metallIzEvropy()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'metall-iz-evropy']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_metall-iz-evropy', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function armatura()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'armatura']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_armatura', [
            'metatags' => $metatags,
        ]);
    }

    public function balkaDvutavr()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'balka-dvutavr']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_balka-dvutavr', [
            'metatags' => $metatags,
        ]);
    }

    public function katanka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'katanka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_katanka', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function kvadrat()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'kvadrat']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_kvadrat', [
            'metatags' => $metatags,
        ]);
    }

    public function krug()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'krug']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_krug', [
            'metatags' => $metatags,
        ]);
    }

    public function polosa()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'polosa']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_polosa', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function rels()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'rels']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_rels', [
            'metatags' => $metatags,
        ]);
    }

    public function ugolok()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'ugolok']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_ugolok', [
            'metatags' => $metatags,
        ]);
    }

    public function shveller()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'shveller']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_shveller', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function shestigrannik()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'shestigrannik']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_shestigrannik', [
            'metatags' => $metatags,
        ]);
    }

    public function staltrub()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'staltrub']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_staltrub', [
            'metatags' => $metatags,
        ]);
    }

    public function trubyKotelnye()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'truby-kotelnye']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_truby-kotelnye', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function pokovka()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'pokovka']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_pokovka', [
            'metatags' => $metatags,
        ]);
    }

    public function listHardox()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'list-hardox']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_list-hardox', [
            'metatags' => $metatags,
        ]);
    }

    public function listStalnoj()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'list-stalnoj']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_list-stalnoj', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function shvellerGnutyj()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'shveller-gnutyj']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_shveller-gnutyj', [
            'metatags' => $metatags,
        ]);
    }

    public function ugolokGnutyj()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'ugolok-gnutyj']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_ugolok-gnutyj', [
            'metatags' => $metatags,
        ]);
    }

    public function obraznyjProfil()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'z-obraznyj-profil']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_z-obraznyj-profil', [
            'metatags' => $metatags,
        ]);
    }

//*
    public function kontrolKachestva()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'kontrol-kachestva-produkcii']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_kontrol-kachestva-produkcii', [
            'metatags' => $metatags,
        ]);
    }
    public function eksportImport()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'eksport-import-metallicheskih-izdelij']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_eksport-import-metallicheskih-izdelij', [
            'metatags' => $metatags,
        ]);
    }
    public function shirokijEksportImport()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'shirokij-eksport-import-mira']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_shirokij-eksport-import', [
            'metatags' => $metatags,
        ]);
    }
//*
    public function nadezhnyjPartner()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nadezhnyj-partner-dlya-vashego-biznesa']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_nadezhnyj-partner-dlya-vashego-biznesa', [
            'metatags' => $metatags,
        ]);
    }
    public function nashiProdazh()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nashi-obemy-prodazh']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_nashi-obemy-prodazh', [
            'metatags' => $metatags,
        ]);
    }
    public function ustojchivoeRazvitie()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'ustojchivoe-razvitie-kak-cel']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_ustojchivoe-razvitie-kak-cel', [
            'metatags' => $metatags,
        ]);
    }
//*
    public function karernyeVozmozhnosti()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'karernye-vozmozhnosti']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_karernye-vozmozhnosti', [
            'metatags' => $metatags,
        ]);
    }
    public function stremimsyaDlyaKlientov()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'my-stremimsya-dlya-nashix-klientov']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_my-stremimsya-dlya-nashix-klientov', [
            'metatags' => $metatags,
        ]);
    }
    public function vashiZakazy()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'vashi-zakazy-kak-mozhno-skoree']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_vashi-zakazy-kak-mozhno-skoree', [
            'metatags' => $metatags,
        ]);
    }
//*
    public function strukturyPodKlyuch()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'struktury-vozmozhen-zakaz-pod-klyuch']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_struktury-vozmozhen-zakaz-pod-klyuch', [
            'metatags' => $metatags,
        ]);
    }
    public function stremitelnoMenyayushhemsyaMire()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'stremitelno-menyayushhemsya-mire']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_stremitelno-menyayushhemsya-mire', [
            'metatags' => $metatags,
        ]);
    }
    public function chtoNovogo()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'chto-novogo']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_chto-novogo', [
            'metatags' => $metatags,
        ]);
    }
//*
    public function luchshieProdavcy()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'luchshie-prodavcy']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_luchshie-prodavcy', [
            'metatags' => $metatags,
        ]);
    }
    public function razvitie()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'razvitie']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_razvitie', [
            'metatags' => $metatags,
        ]);
    }
    public function nashaPolitika()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'nasha-politika']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.information.ru_nasha-politika', [
            'metatags' => $metatags,
        ]);
    }

//---------------------------------------------------------------------

    public function index()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'home']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.index', [
            'metatags' => $metatags,
        ]);
    }

    public function aboutUs()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'yutmk-energy']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.ru_about-us', [
            'metatags' => $metatags,
        ]);
    }

    public function companyProfile()
    {
        $metatags = Metatags::where([['type', 'article'], ['slug', 'company-profile']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.company-profile', [
            'metatags' => $metatags,
        ]);
    }

    public function officeView($city, $id)
    {
        $office = Office::findOrFail($id);
        $office = Office::viewData($office->id);

        return view('frontend.site.office', [
            'office' => $office,
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

    public function contacts()
    {
        $addValidator = JsValidator::make([
                'mail_username' => 'string|min:3',
                'mail_company'  => 'required|string|min:3',
                'mail_email'    => 'required|email',
                'mail_phone'    => 'required|string',
                'mail_message'  => 'string',
            ],
            [],
            [],
            "#contacts-form"
        );
        $metatags = Metatags::where([['type', 'article'], ['slug', 'contacts']])->first();
        $metatags = Metatags::getViewData($metatags);

        return view('frontend.site.contacts', [
            'validator' => $addValidator,
            'metatags' => $metatags,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'mail_username' => 'string|min:3',
            'mail_company'  => 'required|string|min:3',
            'mail_email'    => 'required|email',
            'mail_phone'    => 'required|string',
            'mail_message'  => 'string',
        ]);

        if ($validator->fails()) {
            session()->flash('error', trans('index.contacts.error-send'));

            return redirect(url()->previous())->withErrors($validator)->withInput();
        }

        $data['msg'] = $data['message'];

        // $sent = Mail::send('emails.contacts', $data, function($message) use ($data)
        // {
        //     $message->to('metallvsem@ukr.net')->subject('Связатся с нами - '.$data['company']);
        // });

        if (false) {
            session()->flash('info', trans('index.contacts.success-send'));
        } else {
            session()->flash('error', trans('index.contacts.error-send'));
        }

        return redirect(url()->previous());
    }
}