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
            <div class="item active">
                <img alt="First slide" src="/images/slide/slide-01.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Мы лучшие в области импорта и экспорта металла</span>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="/images/slide/slide-02.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <h1>Широкий выбор металлопроката по низкой цене в Украине</h1>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="/images/slide/slide-03.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <h2>Качество продукции – причина, по которой стоит купить металл именно у нас</h2>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="welcome">
    <div class="container">

        <div class="padding-top"></div>
        <div class="wow slideInRight">
            <p class="welcome-text text-center font-up">Добро пожаловать!</p>
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
                            <img class="green-img" src="/images/green-section/icon-1.png" alt="Сортовой прокат" title="Сортовой прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Сортовой прокат</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/armatura') }}" class="green-section-link-seo" title="Арматура">
                                Арматура
                            </a><br/>
                            <a href="{{ url($locale.'/balka-dvutavr') }}" class="green-section-link-seo" title="Двутавровая балка">
                                Двутавровая балка
                            </a><br/>
                            <a href="{{ url($locale.'/kvadrat') }}" class="green-section-link-seo" title="Квадрат">
                                Квадрат
                            </a><br/>
                            <a href="{{ url($locale.'/ugolok') }}" class="green-section-link-seo" title="Уголок">
                                Уголок
                            </a><br/>
                            <a href="{{ url($locale.'/shveller') }}" class="green-section-link-seo" title="Швеллер">
                                Швеллер
                            </a><br/>
                            <a href="{{ url($locale.'/shestigrannik') }}" class="green-section-link-seo" title="Шестигранник">
                                Шестигранник
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-2.png" alt="Трубный прокат" title="Трубный прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Трубный прокат</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/truba-besshovnaya') }}" class="green-section-link-seo" title="Бесшовные трубы">
                                Бесшовные трубы
                            </a><br/>
                            <a href="{{ url($locale.'/staltrub') }}" class="green-section-link-seo" title="Сварные трубы">
                                Сварные трубы
                            </a><br/>
                            <a href="{{ url($locale.'/truby_kotelnye') }}" class="green-section-link-seo" title="Котельные трубы">
                                Котельные трубы
                            </a><br/>
                            <a href="{{ url($locale.'/truba-bu') }}" class="green-section-link-seo" title="БУ трубы">
                                БУ трубы
                            </a><br/>
                            <a href="{{ url($locale.'/profilnue-trubu') }}" class="green-section-link-seo" title="Профильные трубы">
                                Профильные трубы
                            </a><br/>
                            <a href="{{ url($locale.'/truba-otsinkovannaya') }}" class="green-section-link-seo" title="Оцинкованные трубы">
                                Оцинкованные трубы
                            </a><br/>
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
                            <div class="green-section-title">Европейская сталь</div>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Ассортимент продукции включает поставки металлопроката из Европы: 
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
                            <img class="green-img" src="/images/green-section/icon-4.png" alt="Модульные сооружения" title="Модульные сооружения" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/modulnye-soorujeniya') }}" class="green-section-title" title="Модульные сооружения">
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
                            <img class="green-img" src="/images/green-section/icon-5.png" alt="Листовой прокат" title="Листовой прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/list_stalnoy') }}" class="green-section-title" title="Листовой прокат">
                                Листовой прокат
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Многие отрасли применения охватывает лист стальной, который востребован и в автомобильной промышленности, и в строительстве, и в других направлениях.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-6.png" alt="Металлоконструкции" title="Металлоконструкции" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/metallokonstruktsii') }}" class="green-section-title" title="Металлоконструкции">
                                Металлоконструкции
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Сегодня такие конструкции можно встретить в сфере создания каркасных домов, гаражей, ангаров, торговых киосков, бытовок, модульных строений.</p>
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
                            <img class="green-img" src="/images/green-section/icon-7.png" alt="Сортовой прокат" title="Сортовой прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Сортовой прокат</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/katanka') }}" class="green-section-link-seo" title="Катанка">
                                Катанка
                            </a><br/>
                            <a href="{{ url($locale.'/krug') }}" class="green-section-link-seo" title="Круг">
                                Круг
                            </a><br/>
                            <a href="{{ url($locale.'/polosa') }}" class="green-section-link-seo" title="Полоса">
                                Полоса
                            </a><br/>
                            <a href="{{ url($locale.'/rels') }}" class="green-section-link-seo" title="Рельс">
                                Рельс
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-8.png" alt="Гнутый профиль" title="Гнутый профиль" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Гнутый профиль</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/shveller-gnutyj') }}" class="green-section-link-seo" title="Швеллер гнутый">
                                Швеллер гнутый
                            </a><br/>
                            <a href="{{ url($locale.'/ugolok-gnutyj') }}" class="green-section-link-seo" title="Уголок гнутый">
                                Уголок гнутый
                            </a><br/>
                            <a href="{{ url($locale.'/z-obraznyj-profil') }}" class="green-section-link-seo" title="Z -образный профиль">
                                Z -образный профиль
                            </a><br/>
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
                            <a href="{{ url($locale.'/otsinkovannye-rulony') }}" class="green-section-title" title="Оцинкованные рулоны">
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
            <span class="parallax-text">Прочно утвердившиеся ресурсы во многих странах</span>
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
                    <p class="title-orange">Что нового?</p>
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
            <span class="parallax-text">Внутренние стандарты контроля в производственном процессе</span>
        </div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16">ЮТМК – предприятие промышленного типа с собственным производством и обширным ассортиментом. Южная трубная металлургическая компания (ЮТМК) занимается изготовлением и продажей металлопроката в розницу и оптом с 2013 года. В ассортименте компании представлен различный прокат металла:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-2-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">сортовой металлопрокат – швеллеры, двутавры, уголки, арматура, круги, полосы, катанки и другое;</span></li>
                    <li><span class="text-gray-16">трубный металлопрокат – бесшовные, котельные, электросварные, профильные трубы различного вида и назначения;</span></li>
                    <li><span class="text-gray-16">листовой металлопрокат – стальные листы горячекатаного и холоднокатаного типа;</span></li>
                    <li><span class="text-gray-16">европейская сталь – осуществляются поставки износостойкой стали из Швеции (сталь Hardox, Swebor);</span></li>
                    <li><span class="text-gray-16">гнутый профиль – швеллеры, уголки, Z-образный профиль.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16">Каталог металлопроката компании также содержит профильный металлопрокат. ЮТМК имеет базы металлопроката в Полтаве, Днепропетровске и Киеве. Компания реализует черный металлопрокат в Украине и за рубежом (Молдавия, Казахстан, Белоруссия, Польша, Турция). Для того чтобы узнать цены на металл, необходимо скачать прайс-лист на металлопрокат, открыв вкладку «Прайс» на сайте. На стоимость черного металла действуют скидки постоянным клиентам и при больших заказах, осуществляется индивидуальный подход к каждому клиенту. В ЮМТК можно не только купить металл в Киеве, но и приобрести модульные сооружения для временного проживания и металлоконструкции для изготовления каркасных зданий. Металлобазы в Днепропетровске, Полтаве и Киеве осуществляют порезку и доставку металла по всем регионам страны. Для того чтобы приобрести металлопрокат в Киеве и по всей Украине, звоните по указанному номеру, и менеджеры компании предоставят всю необходимую помощь. ЮМТК в течение длительного времени следит за репутацией и делает все, чтобы развивать долгосрочные отношения.</span>
    </div>

    <div class="padding-top"></div>
</section>

<section class="gray-section">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <p class="welcome-text text-center">ГАЛЕРЕЯ</p>
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

