<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use Mail;
use Validator;
use JsValidator;

use App\Office;

class IndexController extends Controller
{
    public function porezka()
    {
        return view('frontend.information.ru_porezka');
    }

    public function upakovka()
    {
        return view('frontend.information.ru_upakovka');
    }

    public function dostavka()
    {
        return view('frontend.information.ru_dostavka');
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
        return view('frontend.information.ru_metallokonstruktsii');
    }

    public function modulnyeSoorujeniya()
    {
        return view('frontend.information.ru_modulnye-soorujeniya');
    }

    public function otsinkovannyeRulony()
    {
        return view('frontend.information.ru_otsinkovannye-rulony');
    }

    public function metallIzEvropy()
    {
        return view('frontend.information.ru_metall-iz-evropy');
    }

//*
    public function armatura()
    {
        return view('frontend.information.ru_armatura');
    }

    public function balkaDvutavr()
    {
        return view('frontend.information.ru_balka-dvutavr');
    }

    public function katanka()
    {
        return view('frontend.information.ru_katanka');
    }

//*
    public function kvadrat()
    {
        return view('frontend.information.ru_kvadrat');
    }

    public function krug()
    {
        return view('frontend.information.ru_krug');
    }

    public function polosa()
    {
        return view('frontend.information.ru_polosa');
    }

//*
    public function rels()
    {
        return view('frontend.information.ru_rels');
    }

    public function ugolok()
    {
        return view('frontend.information.ru_ugolok');
    }

    public function shveller()
    {
        return view('frontend.information.ru_shveller');
    }

//*
    public function shestigrannik()
    {
        return view('frontend.information.ru_shestigrannik');
    }

    public function staltrub()
    {
        return view('frontend.information.ru_staltrub');
    }

    public function trubyKotelnye()
    {
        return view('frontend.information.ru_truby-kotelnye');
    }

//*
    public function pokovka()
    {
        return view('frontend.information.ru_pokovka');
    }

    public function listHardox()
    {
        return view('frontend.information.ru_list-hardox');
    }

    public function listStalnoj()
    {
        return view('frontend.information.ru_list-stalnoj');
    }

//*
    public function shvellerGnutyj()
    {
        return view('frontend.information.ru_shveller-gnutyj');
    }

    public function ugolokGnutyj()
    {
        return view('frontend.information.ru_ugolok-gnutyj');
    }

    public function obraznyjProfil()
    {
        return view('frontend.information.ru_z-obraznyj-profil');
    }

//*
    public function kontrolKachestva()
    {
        return view('frontend.information.ru_kontrol-kachestva-produkcii');
    }
    public function eksportImport()
    {
        return view('frontend.information.ru_eksport-import-metallicheskih-izdelij');
    }
    public function shirokijEksportImport()
    {
        return view('frontend.information.ru_shirokij-eksport-import');
    }
//*
    public function nadezhnyjPartner()
    {
        return view('frontend.information.ru_nadezhnyj-partner-dlya-vashego-biznesa');
    }
    public function nashiProdazh()
    {
        return view('frontend.information.ru_nashi-obemy-prodazh');
    }
    public function ustojchivoeRazvitie()
    {
        return view('frontend.information.ru_ustojchivoe-razvitie-kak-cel');
    }
//*
    public function karernyeVozmozhnosti()
    {
        return view('frontend.information.ru_karernye-vozmozhnosti');
    }
    public function stremimsyaDlyaKlientov()
    {
        return view('frontend.information.ru_my-stremimsya-dlya-nashix-klientov');
    }
    public function vashiZakazy()
    {
        return view('frontend.information.ru_vashi-zakazy-kak-mozhno-skoree');
    }
//*
    public function strukturyPodKlyuch()
    {
        return view('frontend.information.ru_struktury-vozmozhen-zakaz-pod-klyuch');
    }
    public function stremitelnoMenyayushhemsyaMire()
    {
        return view('frontend.information.ru_stremitelno-menyayushhemsya-mire');
    }
    public function chtoNovogo()
    {
        return view('frontend.information.ru_chto-novogo');
    }
//*
    public function luchshieProdavcy()
    {
        return view('frontend.information.ru_luchshie-prodavcy');
    }
    public function razvitie()
    {
        return view('frontend.information.ru_razvitie');
    }

//---------------------------------------------------------------------

    public function index()
    {
        return view('frontend.site.index');
    }

    public function aboutUs()
    {
        return view('frontend.site.ru_about-us');
    }

    public function companyProfile()
    {
        return view('frontend.site.company-profile');
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

        return view('frontend.site.sales-network', [
            'offices' => $offices,
        ]);
    }

    public function contacts()
    {
        $addValidator = JsValidator::make([
                'username' => 'string|min:3',
                'company'  => 'required|string|min:3',
                'email'    => 'required|email',
                'phone'    => 'required|string',
                'message'  => 'string',
            ],
            [],
            [],
            "#contacts-form"
        );

        return view('frontend.site.contacts', [
            'validator' => $addValidator,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'username' => 'string|min:3',
            'company'  => 'required|string|min:3',
            'email'    => 'required|email',
            'phone'    => 'required|string',
            'message'  => 'string',
        ]);

        if ($validator->fails()) {
            session()->flash('error', trans('index.contacts.error-send'));

            $this->throwValidationException(
                $request, $validator
            );
        }

        $data['msg'] = $data['message'];

        $sent = Mail::send('emails.contacts', $data, function($message) use ($data)
        {
            $message->to('metallvsem@ukr.net')->subject('Связатся с нами - '.$data['company']);
        });

        if ($sent) {
            session()->flash('info', trans('index.contacts.success-send'));
        } else {
            session()->flash('error', trans('index.contacts.error-send'));
        }

        return redirect(url()->previous());
    }

    public function test(Request $request)
    {

    }
}