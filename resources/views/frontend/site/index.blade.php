@extends('layouts.site')

@section('title')
    {{ trans('index.menu.home') }}
@endsection

@section('css')

    <style type="text/css" media="screen">

    </style>

@endsection

@section('content')

<section class="slider section-padding">

    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
            <li class="" data-slide-to="1" data-target="#carousel-example-generic"></li>
            <li class="" data-slide-to="2" data-target="#carousel-example-generic"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img alt="First slide" src="/images/slide/slide-01.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>We are the best in the fields of Import and Export</span>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="/images/slide/slide-02.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Different wholesale products available at discount prices</span>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="/images/slide/slide-03.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Quality is our primary concern for your satisfaction</span>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="welcome">
    <div class="container">

        <div class="padding-top"></div>
        <div class="wow slideInRight">
            <h1 class="welcome-text text-center">WELCOME!</h1>
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
                        <a class="text-black-h3" href="#" title="">OUR SALES VOLUMES</a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">All business lines improved their sales volumes year on year. Thanks to this growth in sales volumes and successful price increases in major markets, revenue improved moderately to €13,547 million (previous year: 12,128) despite substantial negative exchange rate effects of €417 million.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="#" class="text-orange-20">
                            <span class="font-up">READ MORE</span>
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
                        <a class="text-black-h3" href="#" title="">SUSTAINABLE DEVELOPMENT</a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">We’ve realised how sustainable development is important to us. Since the advent of the product we use natural resources. We understand that natural resources are exhaustive and should be used sparingly. Therefore, we have defined sustainable development as a strategic goal.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="#" class="text-orange-20">
                            <span class="font-up">READ MORE</span>
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
                        <a class="text-black-h3" href="#" title="">WE STRIVE FOR OUR CUSTOMERS</a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">We work to build long-term and reliable cooperation with our customers, providing them with high-quality products and services. The satisfaction of our customers - that is the main task and mission of the company and in particular of the sales department.</p>
                </div>
                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="#" class="text-orange-20">
                            <span class="font-up">READ MORE</span>
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
                            <img class="green-img" src="/images/green-section/icon-1.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <span class="green-section-title">Контроль качества</span>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">(Our qualified specialists, who help us to create status of a group leader, provide us a full range of testing the quality.)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-2.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <span class="green-section-title">Доставка</span>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">(We deliver products, ordered by you, anywhere in the world. And we'll advise you on the exploitation.)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-3.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a class="green-section-title" href="{{ route('metall-iz-evropy', request()->query()) }}" title="{{ trans('index.menu.information.metall-iz-evropy') }}">
                                {{ trans('index.menu.information.metall-iz-evropy') }}
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Ассортимент продукции «ЮТМК Киев» включает и поставки металлопроката из Европы.</p>
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
                            <img class="green-img" src="/images/green-section/icon-4.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <span class="green-section-title">Ваши заказы</span>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">(Manufacture steel pipe of on order (seamless, welded, profile, stainless, boiler) as soon as possible.)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-5.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <span class="green-section-title">Порезка</span>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">(The cutting is carried out by guillotine on sheet with thickness up to 16 mm, cutting profiled by press-scissors.)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-6.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <span class="green-section-title">(Структуры)</span>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">(Steel structures of platforms, ramps and bridges, span slabs, crossbars and support units,  lighting masts and towers.)</p>
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
                            <img class="green-img" src="/images/green-section/icon-7.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a class="green-section-title" href="{{ route('metallokonstruktsii', request()->query()) }}" title="{{ trans('index.menu.information.metallokonstruktsii') }}">
                                {{ trans('index.menu.information.metallokonstruktsii') }}
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Сегодня такие конструкции можно встретить в сфере создания каркасных домов, гаражей, ангаров, торговых киосков, бытовок, модульных строений.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-8.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a class="green-section-title" href="{{ route('modulnye-soorujeniya', request()->query()) }}" title="{{ trans('index.menu.information.modulnye-soorujeniya') }}">
                                {{ trans('index.menu.information.modulnye-soorujeniya') }}
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Для временного пользования и проживания подходят модульные сооружения, представляющие собой полный комплект из окон, дверей и современных материалов.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-9.png" alt="" title="" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a class="green-section-title" href="{{ route('otsinkovannye-rulony', request()->query()) }}" title="{{ trans('index.menu.information.otsinkovannye-rulony') }}">
                                {{ trans('index.menu.information.otsinkovannye-rulony') }}
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Цинковый слой обеспечивает не только электрохимическую, но и защиту физического типа за счет того, что обладает неизменной адгезией.</p>
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
                            <p class="text-black-h3">We live in a rapidly changing world, and we witness profound changes in society, consciousness, foundations, business.</p>

                            <div class="padding-block-1-2">
                                <span class="text-gray-16">But invariable were and still are the basic principles on which the activity of the company has been built - honesty in relations with customers and partners, an extensive range of products, consistently high quality of our cement, accessible prices, social responsibility, the desire for stability.</span>
                            </div>

                            <a href="#" class="text-orange-20">
                                <span class="font-up">READ MORE</span>
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
            <span class="parallax-text">Well established resources in many countries</span>
        </div>
    </div>
</section>


<section class="container">
    <div class="padding-top"></div>
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12 text-center show-left">
                <div class="wow fadeInLeft">
                    <img class="green-img" src="/images/template/index-img-005.jpg" alt="" title="" style="max-width: 493px;" />
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="wow fadeInRight">
                    <h3 class="title-orange">What's new?</h3>
                </div>

                <div class="wow fadeInRight">
                    <div class="padding-block-2-2">
                        <span class="text-gray-16">The satisfaction of our customers - that is the main task and mission of the company and in particular of the sales department. In order to stay close to the customer constantly, to be aware of his needs, the company has established a dealer network, represented in almost all corners of the world. Our company is a competent and reliable partner. All our customers can always be sure in our assistance, support and obtain advice from our side.</span>
                    </div>
                </div>

                <div class="wow fadeInRight">
                    <button type="button" class="btn btn-warning send-button font-up">
                        CLICK HERE <span> >> </span>
                    </button>
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
                                <span class="title-orange">Best sellers</span>
                            </div>

                            <div class="wow fadeInLeft">
                                <div class="padding-block-2-2">
                                    <span class="text-gray-16">All business lines clearly improved their sales volumes year on year. Thanks to this growth in sales volumes and successful price increases in major markets, revenue improved moderately to €13,547 million (previous year: 12,128) despite substantial negative exchange rate effects of €417 million.</span>
                                </div>
                            </div>

                            <div class="wow fadeInLeft">
                                <button type="button" class="btn btn-warning send-button font-up">
                                    CLICK HERE <span> >> </span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-1"> </div> {{-- ДА! это не ошибка, это часть верстки... --}}
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
            <span class="parallax-text">Inner control standards in the production process</span>
        </div>
    </div>
</section>

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInLeft">
        <h2 class="welcome-text text-center">ARTICLES</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row articles-block">
        <div class="col-md-4">
            <div class="wow fadeInUp">
                <p class="text-black-h2">DEVELOPMENT</p>
            </div>

            <div class="wow fadeInUp">
                <a title="" href="#" class="text-green-20">WE’VE REALISED HOW SUSTAINABLE DEVELOPMENT IS IMPORTANT TO US.</a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">Since the advent of the product we use natural resources. We understand that natural resources are exhaustive and should be used sparingly. We have defined development as a strategic goal.</span>
            </div>

            <div class="wow fadeInUp">
                <button type="button" class="btn btn-success send-button font-up">
                    READ MORE <span> >> </span>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="wow fadeInUp">
                <p class="text-black-h2">OUR POLICY</p>
            </div>

            <div class="wow fadeInUp">
                <a title="" href="#" class="text-green-20">WE WITNESS PROFOUND CHANGES IN SOCIETY, FOUNDATIONS, BUSINESS.</a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">But invariable were and still are the basic principles on which the activity of the company has been built - honesty in relations with customers and partners, an extensive range of products.</span>
            </div>

            <div class="wow fadeInUp">
                <button type="button" class="btn btn-success send-button font-up">
                    READ MORE <span> >> </span>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="wow fadeInUp">
                <p class="text-black-h2">LINE STOPPING</p>
            </div>

            <div class="wow fadeInUp">
                <a title="" href="#" class="text-green-20">OUR PROFESSIONAL LINE STOPPING TECHNIQUES BYPASS SECTIONS.</a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">The stopping of the flow can be accomplished in minutes, without main shutdowns or interruption of service. This can be used in many different industries</span>
            </div>

            <div class="wow fadeInUp">
                <button type="button" class="btn btn-success send-button font-up">
                    READ MORE <span> >> </span>
                </button>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>


<section class="gray-section">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">GALLERY</h2>
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

    <script src="{{ elixir('js/magnific.js') }}"></script>

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

