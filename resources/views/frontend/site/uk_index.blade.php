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
                    <span>Ми кращі в області імпорту та експорту металу</span>
                </div>
            </div>
            <div class="item">
                <img alt="Second slide" src="/images/slide/slide-02.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <h1>Широкий вибір металопрокату по низькій ціні у Львові та Україні</h1>
                </div>
            </div>
            <div class="item">
                <img alt="Third slide" src="/images/slide/slide-03.jpg" data-holder-rendered="true">
                <div class="carousel-caption ci_caption">
                    <h2>Якість продукції - головна причина, чому варто купити метал саме в нас</h2>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="welcome">
    <div class="container">

        <div class="padding-top"></div>
        <div class="wow slideInRight">
            <p class="welcome-text text-center font-up">Ласкаво просимо!</p>
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
                            <img class="green-img" src="/images/green-section/icon-1.png" alt="Сортовий прокат" title="Сортовий прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Сортовий прокат</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/armatura') }}" class="green-section-link-seo" title="Арматура">
                                Арматура
                            </a><br/>
                            <a href="{{ url($locale.'/balka-dvutavr') }}" class="green-section-link-seo" title="Двотаврова балка">
                                Двотаврова балка
                            </a><br/>
                            <a href="{{ url($locale.'/kvadrat') }}" class="green-section-link-seo" title="Квадрат">
                                Квадрат
                            </a><br/>
                            <a href="{{ url($locale.'/ugolok') }}" class="green-section-link-seo" title="Кутник">
                                Кутник
                            </a><br/>
                            <a href="{{ url($locale.'/shveller') }}" class="green-section-link-seo" title="Швелер">
                                Швелер
                            </a><br/>
                            <a href="{{ url($locale.'/shestigrannik') }}" class="green-section-link-seo" title="Шестикутник">
                                Шестикутник
                            </a><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-2.png" alt="Трубний прокат" title="Трубний прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Трубний прокат</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/truba-besshovnaya') }}" class="green-section-link-seo" title="Безшовні труби">
                                Безшовні труби
                            </a><br/>
                            <a href="{{ url($locale.'/staltrub') }}" class="green-section-link-seo" title="Зварні труби">
                                Зварні труби
                            </a><br/>
                            <a href="{{ url($locale.'/truby_kotelnye') }}" class="green-section-link-seo" title="Котельні труби">
                                Котельні труби
                            </a><br/>
                            <a href="{{ url($locale.'/truba-bu') }}" class="green-section-link-seo" title="БУ труби">
                                БУ труби
                            </a><br/>
                            <a href="{{ url($locale.'/profilnue-trubu') }}" class="green-section-link-seo" title="Профільні труби">
                                Профільні труби
                            </a><br/>
                            <a href="{{ url($locale.'/truba-otsinkovannaya') }}" class="green-section-link-seo" title="Оцинковані труби">
                                Оцинковані труби
                            </a><br/>
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
                            <div class="green-section-title">Європейська сталь</div>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Асортимент продукції включає поставки металопрокату з Європи: 
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
                            <img class="green-img" src="/images/green-section/icon-4.png" alt="Модульні споруди" title="Модульні споруди" style="max-width: 119px;" />
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
                            <img class="green-img" src="/images/green-section/icon-5.png" alt="Листовий прокат" title="Листовий прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/list_stalnoy') }}" class="green-section-title" title="Листовий прокат">
                                Листовий прокат
                            </a>
                        </div>
                        <div class="wow slideInRight">
                            <p class="green-section-body">Багато галузей застосування охоплює лист сталевий, який користується попитом і в автомобільній промисловості, і в будівництві, і в інших напрямках.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-6.png" alt="Металоконструкції" title="Металоконструкції" style="max-width: 119px;" />
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
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="row green-section-block">
                    <div class="col-sm-5 col-xs-5">
                        <div class="wow slideInRight">
                            <img class="green-img" src="/images/green-section/icon-7.png" alt="Сортовий прокат" title="Сортовий прокат" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Сортовий прокат</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/katanka') }}" class="green-section-link-seo" title="Катанка">
                                Катанка
                            </a><br/>
                            <a href="{{ url($locale.'/krug') }}" class="green-section-link-seo" title="Круг">
                                Круг
                            </a><br/>
                            <a href="{{ url($locale.'/polosa') }}" class="green-section-link-seo" title="Штаба">
                                Штаба
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
                            <img class="green-img" src="/images/green-section/icon-8.png" alt="Гнутий профіль" title="Гнутий профіль" style="max-width: 119px;" />
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-7">
                        <div class="wow slideInRight">
                            <div class="green-section-title">Гнутий профіль</div>
                        </div>
                        <div class="wow slideInRight">
                            <a href="{{ url($locale.'/shveller-gnutyj') }}" class="green-section-link-seo" title="Швелер гнутий">
                                Швелер гнутий
                            </a><br/>
                            <a href="{{ url($locale.'/ugolok-gnutyj') }}" class="green-section-link-seo" title="Кутник гнутий">
                                Кутник гнутий
                            </a><br/>
                            <a href="{{ url($locale.'/z-obraznyj-profil') }}" class="green-section-link-seo" title="Z -подібний профіль">
                                Z -подібний профіль
                            </a><br/>
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
                    <p class="title-orange">Що нового?</p>
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

    <div class="wow fadeInUp">
        <span class="text-gray-16">ЮТМК - підприємство промислового типу з власним виробництвом і великим асортиментом. Південна трубна металургійна компанія (ЮТМК) виготовляє і продає металопрокат в роздріб і оптом з 2013 року. В асортименті компанії представлений різний прокат металу:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-2-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">сортовий металопрокат - швелери, двотаври, кутники, арматура, круги, штаби, катанки та інше;</span></li>
                    <li><span class="text-gray-16">трубний металопрокат – безшовні, електрозварні, профільні труби різного виду і призначення;</span></li>
                    <li><span class="text-gray-16">листовий металопрокат - сталеві листи гарячекатаного і холоднокатаного типу;</span></li>
                    <li><span class="text-gray-16">європейська сталь - здійснюється продаж металу зі Швеції (сталь Hardox, Swebor);</span></li>
                    <li><span class="text-gray-16">гнутий профіль - швелери, куточки, Z-подібний профіль.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16">Каталог металопрокату компанії також містить гнутий профільний металопрокат. ЮТМК має бази металопрокату в Полтаві, Дніпропетровську та Києві. Компанія реалізує чорний металопрокат в Україні та за кордоном (Молдавія, Казахстан, Білорусія, Польща, Туреччина і т.д.). Для того щоб довідатися про ціни на метал, необхідно завантажити прайс-лист на металопрокат, відкривши вкладку «Прайс» на сайті. На вартість чорного металу діють знижки постійним клієнтам і при великих замовленнях, здійснюється індивідуальний підхід до кожного клієнта. В ЮМТК можна не тільки купити метал в Києві, а й придбати модульні споруди для тимчасового проживання та металоконструкції для виготовлення каркасних будинків. Металобази в Дніпропетровську, Полтаві та Києві здійснюють порізку та доставку металу у Львів, Тернопіль, Івано-Франківськ, Луцьк, Рівне, Хмельницький та інші куточки країни. Для того щоб придбати металопрокат в Києві і по всій Україні, телефонуйте за вказаними номерами, і наші менеджери нададуть всю необхідну допомогу. ЮМТК протягом тривалого часу стежить за репутацією і робить все, щоб розвивати довгострокові відносини.</span>
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