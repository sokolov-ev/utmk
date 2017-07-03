@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')
    @include('partial.metatags')
@endsection

@section('css')

@endsection

@section('content')

<?php
    //Да! это костыли! привет СЕО
    if (in_array(App::getLocale(), ['en', 'uk'])) {
        $locale = '/'.App::getLocale();
    } else {
        $locale = '';
    }
?>

<section class="slider section-padding">

    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
            <li class="" data-slide-to="1" data-target="#carousel-example-generic"></li>
            <li class="" data-slide-to="2" data-target="#carousel-example-generic"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($slides as $key => $slide)
                <div class="item {{ (0 == $key) ? 'active' : '' }}">
                    @if ($slide->link)
                        <a href="{{ $slide->link }}">
                            <img alt="{{ $slide->text }}" src="{{ url('/images/' . $slide->type . '/' . $slide->name) }}" data-holder-rendered="true">
                        </a>
                    @else
                        <img alt="{{ $slide->text }}" src="{{ url('/images/' . $slide->type . '/' . $slide->name) }}" data-holder-rendered="true">
                    @endif

                    <div class="carousel-caption ci_caption">
                        {!! $slide->text !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>

<section class="welcome">
    <div class="container">

        <div class="padding-top"></div>
        <div class="wow slideInRight">
            <p class="welcome-text text-center font-up">WELCOME!</p>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 welcome-card">
                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <img class="green-img center-block" src="/images/template/index-img-001.jpg" alt="" title="" style="max-width: 370px;" />
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('nashi-obemy-prodazh') }}" class="text-black-h3" title="Our turnover">
                            Our turnover
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">The steel dimension of UTMK Ukraine LLC Company consists of a wide range of products, which are honed according to the factory GOST conditions. All steel products are classified regarding types, profiles, steel grades, and sizes. The steel rolling assortment of the company is constantly replenished, so the turnover is increased and is invariably in demand.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('nashi-obemy-prodazh') }}" class="text-orange-20">
                            <span class="font-up">Read more</span>
                            <span class="fa span-arrow"> >> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 welcome-card">
                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <img class="green-img center-block" src="/images/template/index-img-002.jpg" alt="" title="" style="max-width: 370px;" />
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('ustojchivoe-razvitie') }}" class="text-black-h3" title="Sustainable development">
                            Sustainable development
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">Considering that steel is important for the human not only as a material, but also as a profit, so new ways of its processing and application are constantly being opened. For our company the main goal is sustainable development, after which there are several more tasks, such as replenishment of the assortment, reasonable prices and constant quality criteria.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('ustojchivoe-razvitie') }}" class="text-orange-20">
                            <span class="font-up">Read more</span>
                            <span class="fa span-arrow"> >> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 welcome-card">
                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <img class="green-img center-block" src="/images/template/index-img-003.jpg" alt="" title="" style="max-width: 370px;" />
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('stremimsya-dlya-klientov') }}" class="text-black-h3" title="We aspire for our customers">
                            We aspire for our customers
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">No matter which place our company occupies at the world or domestic arena, our specialists constantly demonstrate leadership skills. High standards of work are constantly observed, knowledge is improved and responsibility for every decision is manifested taken.</p>
                </div>
                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('stremimsya-dlya-klientov') }}" class="text-orange-20">
                            <span class="font-up">Read more</span>
                            <span class="fa span-arrow"> >> </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="padding-top"></div>
    </div>
</section>

<section class="green-section">
    <div class="container">
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-1.png" alt="Rolled section" title="Rolled section" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Rolled section</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/armatura') }}" class="green-section-link-seo" title="Rebar">
                                Rebar
                            </a><br/>
                            <a href="{{ url($locale.'/balka-dvutavr') }}" class="green-section-link-seo" title="I-beam">
                                I-beam
                            </a><br/>
                            <a href="{{ url($locale.'/kvadrat') }}" class="green-section-link-seo" title="Square">
                                Square
                            </a><br/>
                            <a href="{{ url($locale.'/ugolok') }}" class="green-section-link-seo" title="Angle">
                                Angle
                            </a><br/>
                            <a href="{{ url($locale.'/shveller') }}" class="green-section-link-seo" title="Channel">
                                Channel
                            </a><br/>
                            <a href="{{ url($locale.'/shestigrannik') }}" class="green-section-link-seo" title="Hexagon">
                                Hexagon
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img"
                                 src="/images/green-section/icon-2.png"
                                 alt="Rolled tubular products"
                                 title="Rolled tubular products"
                                 style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Rolled tubular products</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/truba-besshovnaya') }}" class="green-section-link-seo" title="Seamless tubes">
                                Seamless tubes
                            </a><br/>
                            <a href="{{ url($locale.'/staltrub') }}" class="green-section-link-seo" title="Welded tubes">
                                Welded tubes
                            </a><br/>
                            <a href="{{ url($locale.'/truby_kotelnye') }}" class="green-section-link-seo" title="Boiler tubes">
                                Boiler tubes
                            </a><br/>
                            <a href="{{ url($locale.'/truba-bu') }}" class="green-section-link-seo" title="Used tubes">
                                Used tubes
                            </a><br/>
                            <a href="{{ url($locale.'/profilnue-trubu') }}" class="green-section-link-seo" title="Shaped tube">
                                Shaped tube
                            </a><br/>
                            <a href="{{ url($locale.'/truba-otsinkovannaya') }}" class="green-section-link-seo" title="Galvanized tube">
                                Galvanized tube
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-3.png" alt="European Steel" title="European Steel" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">European Steel</div>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">The assortment of products includes rolled steel delivery from Europe:
                                <a href="{{ url($locale.'/list-hardox') }}" class="green-section-link-seo" title="Hardox">
                                    Hardox
                                </a>,
                                <a href="{{ url($locale.'/swebor') }}" class="green-section-link-seo" title="Swebor">
                                    Swebor
                                </a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-4.png" alt="Modular structures" title="Modular structures" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/modulnye-soorujeniya') }}" class="green-section-title" title="Modular structures">
                                Modular structures
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">It is acceptable modular facilities for temporary using and living, which include complete set of windows, doors and modern materials.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-5.png" alt="Flat products" title="Flat products" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/list_stalnoy') }}" class="green-section-title" title="Flat products">
                                Flat products
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Steel sheet obtains many industries, which is in demand in the automotive industry, in building and construction and other areas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-6.png" alt="Metallic structures" title="Metallic structures" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/metallokonstruktsii') }}" class="green-section-title" title="Metallic structures">
                                Metallic structures
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Today, such structures can be founded in the frame houses building field, garages, hangars, trade kiosks, corrugated steel cabins, and modular buildings.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-7.png" alt="Rolled steel" title="Rolled steel" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Rolled steel</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/katanka') }}" class="green-section-link-seo" title="Rolled wire">
                                Rolled wire
                            </a><br/>
                            <a href="{{ url($locale.'/krug') }}" class="green-section-link-seo" title="Round">
                                Round
                            </a><br/>
                            <a href="{{ url($locale.'/polosa') }}" class="green-section-link-seo" title="Strip">
                                Strip
                            </a><br/>
                            <a href="{{ url($locale.'/rels') }}" class="green-section-link-seo" title="Rail">
                                Rail
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-8.png" alt="Roll-formed shape" title="Roll-formed shape" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Roll-formed shape</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/shveller-gnutyj') }}" class="green-section-link-seo" title="U-channel">
                                U-channel
                            </a><br/>
                            <a href="{{ url($locale.'/ugolok-gnutyj') }}" class="green-section-link-seo" title="L-shaped member">
                                L-shaped member
                            </a><br/>
                            <a href="{{ url($locale.'/z-obraznyj-profil') }}" class="green-section-link-seo" title="Z-section">
                                Z-section
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-9.png" alt="Galvanized coils" title="Galvanized coils" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/otsinkovannye-rulony') }}" class="green-section-title" title="Galvanized coils">
                                Galvanized coils
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">The zinc coating provides not only electrochemical protection but also physical features due to the fact that there is permanent adhesion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-8 col-sm-8" style="margin-bottom: 33px;">
                <div class="gray-section">
                    <div class="padding-block-1-2"></div>
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <div class="gray-img-align">
                                <img class="green-img" src="/images/template/index-img-004.jpg" alt="" title="">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <a href="{{ route('stremitelno-menyayushchemsya-mire') }}" title="We live in a rapidly changing environment" class="text-black-h3">
                                We live in a rapidly changing environment and we are bystanders of the profound changes in society, consciousness, funds and business.
                            </a>

                            <div class="padding-block-1-2">
                                <span class="text-gray-16">Such characteristics as reliability, consistently high qualities, durability, affordable prices at the present-day world are signified a major role. Steel products can be produced on the equipment with professional functions, therefore products manufacturing of any complexity is possible within the limits of different volumes.</span>
                            </div>

                            <a href="{{ route('stremitelno-menyayushchemsya-mire') }}" class="text-orange-20">
                                <span class="font-up">Read more</span>
                                <span class="fa span-arrow"> >> </span>
                            </a>
                        </div>
                    </div>
                    <div class="padding-block-1-2"></div>
                    <div class="padding-block-2-2"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="ornge-section-revers">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <p>
                                Quality
                                <br>
                                Test
                            </p>
                        </div>
                    </div>
                </div>

                <div class="ornge-section">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <i class="fa fa-flag" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <p>
                                Hot
                                <br>
                                Offers
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <div class="padding-top"></div>
</section>


<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-01.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Firmly established resources in many countries of the world</span>
        </div>
    </div>
</section>


<section class="container">
    <div class="padding-top"></div>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 text-center show-left">
                <div class="wow fadeInLeft">
                    <img class="green-img" src="/images/template/index-img-005.jpg" alt="What's new?" title="What's new?" style="max-width: 493px;" />
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="wow fadeInRight">
                    <p class="title-orange">What's new?</p>
                </div>

                <div class="wow fadeInRight">
                    <div class="padding-block-2-2">
                        <span class="text-gray-16">As for product range so it will not be a surprise to anyone, but regarding the good customer service, so it may not be provided by all companies. A high level of customer satisfaction indicates the product of this brand is worthy of attention. For customers is important not only quality, but also quality of service. This is a kind of theorem.</span>
                    </div>
                </div>

                <div class="wow fadeInRight">
                    <a href="{{ route('chto-novogo') }}" class="btn btn-warning send-button font-up">
                        CLICK HERE <span> >> </span>
                    </a>
                </div>
            </div>
        </div>
    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="padding-top"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12" style="margin-bottom: 33px;">
                    <div class="row">
                        <div class="col-md-11 show-left">
                            <div class="wow fadeInLeft">
                                <span class="title-orange">The best sellers</span>
                            </div>

                            <div class="wow fadeInLeft">
                                <div class="padding-block-2-2">
                                    <span class="text-gray-16">Only time is able to mark leaders in the crowd who constantly work together and do not depart from general principles. In every particularly case it is meant to be used its own sales formula like constantly high quality, high customer-centered orientation, decent service.</span>
                                </div>
                            </div>

                            <div class="wow fadeInLeft">
                                <a href="{{ route('luchshie-prodavcy') }}" class="btn btn-warning send-button font-up">
                                    CLICK HERE <span> >> </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-1"> </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                    <div class="wow fadeInRight">
                        <img class="green-img" src="/images/template/index-img-006.jpg" alt="" title="" style="border-radius: 50%; max-width: 340px;">
                    </div>
                </div>
            </div>
        </div>
    <div class="padding-top"></div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-02.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Internal control standards in the production process</span>
        </div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16">UTMK is an industrial enterprise with its own production and comprehensive range. UTMK is engaged the manufacture and sale of rolled metal products in retail and wholesale from 2013. There is demonstrated a various rolled metal among the range of the company:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-2-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Bar sections- channels, I-beams, angles, rebars, round bars, strips, wire rod and others;</span></li>
                    <li><span class="text-gray-16">Metal rolled tubes - seamless, boiler, welded, different kinds and purposes of the profile pipe;</span></li>
                    <li><span class="text-gray-16">Steel sheets- hot-rolled and cold-rolled steel sheets;</span></li>
                    <li><span class="text-gray-16">European steel production - Sweden wear-resistant steel delivery (Hardox, Swebor);</span></li>
                    <li><span class="text-gray-16">Bent profile - channels, angles, Z-shaped profile.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16">The company's rolled metal catalog includes profile metal as well. UTMK has metal stock in Poltava, Dnepr and Kiev. The company sells roll black products in Ukraine and abroad (Moldova, Kazakhstan, Belarus, Poland, Turkey). In order to find out the metal goods prices, it is necessary to download the price-list or by opening the "Price" tab on our website. Regarding to the roll black metal cost so we provide discounts to regular customers and for the bulk orders our company carries out an individual approach for each consumer. At UMTK Company you can not only buy metal in Kiev, but also get modular structures for temporary residence and steelworks for the frame construction manufacturing. Our metal warehouses in Dnepr, Poltava and Kiev carry out cutting and delivering of metal in all over the whole country. In order you need to purchase metal rolled goods in Kiev and throughout Ukraine, call on the noted phone number, and the company's specialists will provide you all the necessary assistance. UMTK follow sits own reputation and makes an efforts to develop long-term relationships.</span>
    </div>

    <div class="padding-top"></div>
</section>

<section class="gray-section">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <p class="welcome-text text-center">GALLERY</p>
        </div>
        <div class="padding-top"></div>

        <div class="gallery-container">
            <div class="row gallery-row">
                <div class="col-md-4 gallery-item-box">
                    <a href="/images/template/index-gallery-01-large.jpg">
                        <img class="green-img" src="/images/template/index-gallery-01.jpg" alt="" style="max-width: 370px;">
                    </a>
                </div>
                <div class="col-md-4 gallery-item-box">
                    <a href="/images/template/index-gallery-02-large.jpg">
                        <img class="green-img" src="/images/template/index-gallery-02.jpg" alt="" style="max-width: 370px;">
                    </a>
                </div>
                <div class="col-md-4 gallery-item-box">
                    <a href="/images/template/index-gallery-03-large.jpg">
                        <img class="green-img" src="/images/template/index-gallery-03.jpg" alt="" style="max-width: 370px;">
                    </a>
                </div>
                <div class="col-md-4 gallery-item-box">
                    <a href="/images/template/index-gallery-04-large.jpg">
                        <img class="green-img" src="/images/template/index-gallery-04.jpg" alt="" style="max-width: 370px;">
                    </a>
                </div>
                <div class="col-md-4 gallery-item-box">
                    <a href="/images/template/index-gallery-05-large.jpg">
                        <img class="green-img" src="/images/template/index-gallery-05.jpg" alt="" style="max-width: 370px;">
                    </a>
                </div>
                <div class="col-md-4 gallery-item-box">
                    <a href="/images/template/index-gallery-06-large.jpg">
                        <img class="green-img" src="/images/template/index-gallery-06.jpg" alt="" style="max-width: 370px;">
                    </a>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>


@endsection

@section('scripts')

    <script src="{{ elixir('js/magnific.min.js') }}"></script>

    <script type="text/javascript">
        $(".home").addClass('active');

        $('.parallax-window').parallax();

        $('.gallery-container').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: true,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function(element) {
                    return element.find('img');
                }
            }

        });
    </script>
@endsection

