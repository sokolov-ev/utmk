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
                    <span>Ми кращі в області імпорту та експорту</span>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="/images/slide/slide-02.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Різні оптові продукти, доступні за зниженими цінами</span>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="/images/slide/slide-03.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <span>Якість є нашою головною турботою для вашого задоволення</span>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="welcome">
    <div class="container">

        <div class="padding-top"></div>
        <div class="wow slideInRight">
            <h1 class="welcome-text text-center font-up">Ласкаво просимо!</h1>
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
                        <a href="{{ route('nashi-obemy-prodazh') }}" class="text-black-h3" title="Наші обсяги продажів">
                            Наші обсяги продажів
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">Сортамент металу ЮТМК складається з широкого ряду виробів, які вигострюються в заводських умовах строго по ГОСТу. Усі металовироби класифікуються за видами, профілями, марками, розмірами. Сортамент компанії металопрокату постійно поповнюється, тому обсяги продажів збільшуються і незмінно користуються попитом.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('nashi-obemy-prodazh') }}" class="text-orange-20">
                            <span class="font-up">Читати далі</span>
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
                        <a href="{{ route('ustojchivoe-razvitie') }}" class="text-black-h3" title="Сталий розвиток">
                            Сталий розвиток
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">З огляду на, що метал важливий для людини не тільки як матеріал, але і як предмет отримання прибутку, то постійно відкриваються нові шляхи його обробки і застосування. Для нашої компанії сталий розвиток - це основна мета, за якою стоїть ще кілька завдань, таких як поповнення асортименту, доступні ціни та незмінні критерії якості.</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('ustojchivoe-razvitie') }}" class="text-orange-20">
                            <span class="font-up">Читати далі</span>
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
                        <a href="{{ route('stremimsya-dlya-klientov') }}" class="text-black-h3" title="Ми прагнемо для наших клієнтів">
                            Ми прагнемо для наших клієнтів
                        </a>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <p class="text-gray-16">Незалежно від того, яке місце наша компанія займає на світовій або вітчизняної арені, фахівці постійно демонструють лідерство. Постійно дотримуються високі стандарти роботи, удосконалюються знання і проявляється відповідальність за кожне прийняте рішення.</p>
                </div>
                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <a href="{{ route('stremimsya-dlya-klientov') }}" class="text-orange-20">
                            <span class="font-up">Читати далі</span>
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
                            <img class="green-img" src="/images/green-section/icon-1.png" alt="Контроль якості" title="Контроль якості" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('kontrol-kachestva') }}" class="green-section-title" title="Контроль якості">
                                Контроль якості
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Висока конкуренція змусила нашу компанію шукати нові шляхи до успіху, для чого була розроблена своя система якості продукції.</p>
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
                            <p class="green-section-body">Хочете купити метал в Україні? Ви робите правильний вибір як з боку цінового фактору, так і з боку широкого вибору.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-3.png" alt="Європейська сталь" title="Європейська сталь" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/metall-iz-evropy') }}" class="green-section-title" title="Європейська сталь">
                                Європейська сталь
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Асортимент продукції «ЮТМК» включає і поставки металопрокату з Європи.</p>
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
                            <img class="green-img" src="/images/green-section/icon-4.png" alt="Ваші замовлення" title="Ваші замовлення" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('vashi-zakazy-kak-mozhno-skoree') }}" class="green-section-title" title="Ваші замовлення">
                                Ваші замовлення
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Характеристики вихідних матеріалів відіграють велике значення, тому багато замовників вдаються до індивідуальних замовлень.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-5.png" alt="Порізка" title="Порізка" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('porezka') }}" class="green-section-title" title="Порізка">
                                Порізка
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Порізку замовленого металопрокату проводять по зазначеним розмірам. Здійснюється вона попередньо перед остаточним формуванням замовлення.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-6.png" alt="Структури" title="Структури" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ route('struktury-pod-klyuch') }}" class="green-section-title" title="Структури">
                                Структури
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Структури представляють собою вільні за формою виготовлення металоконструкції, які можна купувати на замовлення або вибирати з стандартного ряду.</p>
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
                            <img class="green-img" src="/images/green-section/icon-7.png" alt="Металоконструкції" title="Металоконструкції" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/metallokonstruktsii') }}" class="green-section-title" title="Металоконструкції">
                                Металоконструкції
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Сьогодні такі конструкції можна зустріти в сфері створення каркасних будинків, гаражів, ангарів, торговельних кіосків, побутівок, модульних будівель.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-8.png" alt="Модульні споруди" title="Модульні споруди" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/modulnye-soorujeniya') }}" class="green-section-title" title="Модульні споруди">
                                Модульні споруди
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Для тимчасового користування та проживання підходять модульні споруди, що представляють собою повний комплект з вікон, дверей і сучасних матеріалів.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-9.png" alt="Оцинковані рулони" title="Оцинковані рулони" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/otsinkovannye-rulony') }}" class="green-section-title" title="Оцинковані рулони">
                                Оцинковані рулони
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Цинковий шар забезпечує не тільки електрохімічний, а й захист фізичного типу за рахунок того, що володіє незмінною адгезію.</p>
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
                            <a href="{{ route('stremitelno-menyayushhemsya-mire') }}" title="В стрімко мінливому світі" class="text-black-h3">
                                Ми живемо в стрімко мінливому світі, і ми є свідками глибоких змін у суспільстві, свідомості, фондах, бізнесі.
                            </a>

                            <div class="padding-block-1-2">
                                <span class="text-gray-16">Такі характеристики, як надійність, незмінна висока якість, довговічність, доступні ціни в сучасному світі відіграють головну роль. Продукцію з металу можна виробляти на обладнанні з професійними функціями, тому виготовлення виробів будь-якої складності можливо в рамках різних обсягів.</span>
                            </div>

                            <a href="{{ route('stremitelno-menyayushhemsya-mire') }}" class="text-orange-20">
                                <span class="font-up">Читати далі</span>
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
            <span class="parallax-text">Добре встановлені ресурси в багатьох країнах світу</span>
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
                    <h3 class="title-orange">Що нового?</h3>
                </div>

                <div class="wow fadeInRight">
                    <div class="padding-block-2-2">
                        <span class="text-gray-16">Зміною асортименту продукції нікого не здивуєш, а ось високе відношення до клієнта може надати не кожна компанія. Високий рівень задоволеності клієнтів говорить про те, що продукт цього бренду вартий уваги. Для клієнтів важливо не тільки якість продукту, але і якість обслуговування - це своєрідна аксіома.</span>
                    </div>
                </div>

                <div class="wow fadeInRight">
                    <a href="{{ route('chto-novogo') }}" class="btn btn-warning send-button font-up">
                        НАТИСИIТЬ ТУТ <span> >> </span>
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
                                <span class="title-orange">Кращі продавці</span>
                            </div>

                            <div class="wow fadeInLeft">
                                <div class="padding-block-2-2">
                                    <span class="text-gray-16">Тільки час здатний в загальній масі виділити лідерів, які постійно працюють злагоджено і не відходять від загальних принципів. У кожному конкретному випадку використовується свій рецепт залучення продаж і це - незмінно висока якість, висока орієнтація на клієнта, гідне обслуговування.
                                    </span>
                                </div>
                            </div>

                            <div class="wow fadeInLeft">
                                <a href="{{ route('luchshie-prodavcy') }}" class="btn btn-warning send-button font-up">
                                    НАТИСИIТЬ ТУТ <span> >> </span>
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
            <span class="parallax-text">Внутрішні стандарти контролю у виробничому процесі</span>
        </div>
    </div>
</section>

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInLeft">
        <h2 class="welcome-text text-center">СТАТТІ</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row articles-block">
        <div class="col-md-6 col-sm-6">
            <div class="wow fadeInUp">
                <p class="text-black-h2 font-up">Розвиток</p>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('razvitie') }}" class="text-green-20 font-up" title="Наша політика">
                    Наша політика - це глибокі зміни в суспільстві, бізнесі, фондах
                </a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">Сталий розвиток - це те, до чого варто прагнути всім сучасним компаніям. Цей фактор говорить не тільки про високий соціальний рівень, а й про наявність позитивних змін.</span>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('razvitie') }}" class="btn btn-success send-button font-up">
                    Читати далі <span> >> </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="wow fadeInUp">
                <p class="text-black-h2 font-up">Наша політика</p>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('nasha-politika') }}" class="text-green-20 font-up" title="Надійний партнер у сфері металу">
                    Надійний партнер у сфері металу
                </a>
            </div>

            <div class="wow fadeInUp">
                <span class="text-gray-16">Наша компанія займається виготовленням металоконструкцій не один рік, відкриваючи широкі можливості доставки, порізки, транспортування. Вигідно купити метал з доставкою по Україні можна на офіційному сайті, витративши при цьому мінімум часу.</span>
            </div>

            <div class="wow fadeInUp">
                <a href="{{ route('nasha-politika') }}" class="btn btn-success send-button font-up">
                    Читати далі <span> >> </span>
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