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
            <h1 class="welcome-text text-center font-up">Добро пожаловать!</h1>
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
                        <a href="{{ route('nashi-obemy-prodazh') }}" class="text-black-h3" title="Наши объемы продаж">
                            Наши объемы продаж
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">Сортамент металла ЮТМК состоит из обширного ряда изделий, которые оттачиваются в заводских условиях строго по ГОСТу. Все металлоизделия классифицируются по видам, профилям, маркам, размерам. Сортамент компании металлопроката постоянно пополняется, поэтому объемы продаж увеличиваются и неизменно пользуются спросом.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('nashi-obemy-prodazh') }}" class="text-orange-20">
                            <span class="font-up">Читать далее</span>
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
                        <a href="{{ route('ustojchivoe-razvitie') }}" class="text-black-h3" title="Устойчивое развитие как цель">
                            Устойчивое развитие
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">Учитывая, что металл важен для человека не только как материал, но и как предмет получения прибыли, то постоянно открываются новые пути его обработки и применения. Для нашей компании устойчивое развитие – это основная цель, за которой стоит еще несколько задач, таких как пополнение ассортимента, доступные цены и неизменные критерии качества.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('ustojchivoe-razvitie') }}" class="text-orange-20">
                            <span class="font-up">Читать далее</span>
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
                        <a href="{{ route('stremimsya-dlya-klientov') }}" class="text-black-h3" title="Мы стремимся для наших клиентов">
                            Мы стремимся для наших клиентов
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">Вне зависимости от того, какое место наша компания занимает на мировой или отечественной арене, специалисты постоянно демонстрируют лидерство. Постоянно соблюдаются высокие стандарты работы, совершенствуются знания и проявляется ответственность за каждое принятое решение. </p>
                </div>
                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('stremimsya-dlya-klientov') }}" class="text-orange-20">
                            <span class="font-up">Читать далее</span>
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
                            <img class="green-img" src="/images/green-section/icon-1.png" alt="Контроль качества" title="Контроль качества" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('kontrol-kachestva') }}" class="green-section-title" title="Контроль качества">
                                Контроль качества
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Высокая конкуренция заставила нашу компанию искать новые пути к успеху, для чего была разработана своя система качества продукции.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-2.png" alt="Доставка" title="Доставка" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('dostavka') }}" class="green-section-title" title="Доставка">
                                Доставка
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Хотите приобрести металл в интернете? Вы делаете правильный выбор как со стороны ценового фактора, так и со стороны широкого выбора.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-3.png" alt="Европейская сталь" title="Европейская сталь" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('metall-iz-evropy') }}" class="green-section-title" title="Европейская сталь">
                                Европейская сталь
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
                            <img class="green-img" src="/images/green-section/icon-4.png" alt="Ваши заказы" title="Ваши заказы" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('vashi-zakazy-kak-mozhno-skoree') }}" class="green-section-title" title="Ваши заказы">
                                Ваши заказы
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Характеристики исходных материалов играют большое значение, поэтому многие заказчики прибегают к персональному заказу.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-5.png" alt="Порезка" title="Порезка" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('porezka') }}" class="green-section-title" title="Порезка">
                                Порезка
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Резку заказанного металлопроката проводят по указанным размерам. Осуществляется порезка предварительно перед окончательным формированием заказа.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-6.png" alt="Структуры" title="Структуры" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('struktury-pod-klyuch') }}" class="green-section-title" title="Структуры">
                                Структуры
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Свободные по форме изготовления металлоконструкции представляют собой структуры, которые можно покупать под заказ или выбирать из стандартного ряда.</p>
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
                            <img class="green-img" src="/images/green-section/icon-7.png" alt="Металлоконструкции" title="Металлоконструкции" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('metallokonstruktsii') }}" class="green-section-title" title="Металлоконструкции">
                                Металлоконструкции
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
                            <img class="green-img" src="/images/green-section/icon-8.png" alt="Модульные сооружения" title="Модульные сооружения" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('modulnye-soorujeniya') }}" class="green-section-title" title="Модульные сооружения">
                                Модульные сооружения
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
                            <img class="green-img" src="/images/green-section/icon-9.png" alt="Оцинкованные рулоны" title="Оцинкованные рулоны" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('otsinkovannye-rulony') }}" class="green-section-title" title="Оцинкованные рулоны">
                                Оцинкованные рулоны
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
                            <a href="{{ route('stremitelno-menyayushhemsya-mire') }}" title="В стремительно меняющемся мире" class="text-black-h3">
                                Мы живем в стремительно меняющемся мире, и мы являемся свидетелями глубоких изменений в обществе, сознание, фондов, бизнеса.
                            </a>

                            <div class="padding-block-1-2">
                                <span class="text-gray-16">Такие характеристики, как надежность, неизменно высокое качество, долговечность, доступные цены в современном мире играют главную роль. Продукцию из металла можно производить на оборудовании с профессиональными функциями, поэтому изготовление изделий любой сложности возможно в рамках разных объемов.</span>
                            </div>

                            <a href="{{ route('stremitelno-menyayushhemsya-mire') }}" class="text-orange-20">
                                <span class="font-up">Читать далее</span>
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
                    <h3 class="title-orange">Что нового?</h3>
                </div>

                <div class="wow fadeInRight">
                    <div class="padding-block-2-2">
                        <span class="text-gray-16">Изменением ассортимента продукции никого не удивишь, а вот высокое отношение к клиенту может предоставить не каждая компания. Высокий уровень удовлетворенности клиентов говорит о том, что продукт этого бренда достоин внимания. Для клиентов важно не только качество продукта, но и качество обслуживания – это своеобразная теорема.</span>
                    </div>
                </div>

                <div class="wow fadeInRight">
                    <a href="{{ route('chto-novogo') }}" class="btn btn-warning send-button font-up">
                        КЛИКНИТЕ СЮДА <span> >> </span>
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
                                <span class="title-orange">Лучшие продавцы</span>
                            </div>

                            <div class="wow fadeInLeft">
                                <div class="padding-block-2-2">
                                    <span class="text-gray-16">Только время способно в общей массе выделить лидеров, которые постоянно работают слаженно и не отходят от общих принципов. В каждом конкретном случае используется свой рецепт привлечения продаж и это – неизменно высокое качество, высокая ориентация на клиента, достойное обслуживание.</span>
                                </div>
                            </div>

                            <div class="wow fadeInLeft">
                                <a href="{{ route('luchshie-prodavcy') }}" class="btn btn-warning send-button font-up">
                                    КЛИКНИТЕ СЮДА <span> >> </span>
                                </a>
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
        <h2 class="welcome-text text-center">СТАТЬИ</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row articles-block">
        <div class="col-md-6 col-sm-6">
            <div class="wow fadeInUp">
                <p class="text-black-h2 font-up">Развитие</p>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('razvitie') }}" class="text-green-20 font-up" title="Наша политика">
                    Наша политика – это глубокие изменения в обществе, бизнесе, фондах
                </a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">Устойчивое развитие – это то, к чему стоит стремиться всем современным компаниям. Этот фактор говорит не только о высоком социальном уровне, а и о наличие положительных изменений.</span>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('razvitie') }}" class="btn btn-success send-button font-up">
                    Читать далее <span> >> </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="wow fadeInUp">
                <p class="text-black-h2 font-up">Наша политика</p>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('nasha-politika') }}" class="text-green-20 font-up" title="Надежный партнер в сфере металла">
                    Надежный партнер в сфере металла.
                </a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">Наша компания занимается изготовлением металлоконструкций не один год, открывая широкие возможности доставки, порезки, транспортировки. Выгодно купить металла с доставкой можно на официальном сайте, затратив при этом минимум времени.</span>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('nasha-politika') }}" class="btn btn-success send-button font-up">
                    Читать далее <span> >> </span>
                </a>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>


<section class="gray-section">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">ГАЛЕРЕЯ</h2>
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

