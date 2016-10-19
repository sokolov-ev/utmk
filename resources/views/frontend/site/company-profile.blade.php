@extends('layouts.site')

@section('title')
    {{ trans('index.menu.company_profile') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h1 class="welcome-text text-center">Что мы предлагаем</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-sm-4 col-xs-12 text-center">
                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <img class="green-img" src="/images/template/profile-img-001.png" alt="Контроль качества нашей продукции" title="Контроль качества нашей продукции" style="max-width: 99px;" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="wow fadeInUp">
                        <a href="{{ route('kontrol-kachestva') }}" class="text-green-20 font-up" title="Контроль качества нашей продукции">
                            Контроль качества нашей продукции
                        </a>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-2-2">
                            <span class="text-gray-16">Высокая конкуренция заставила нашу компанию искать новые пути к успеху, для чего была разработана своя система качества продукции. В соответствии с потребностями потребителей вырабатывается и строгий контроль качества, который не только повышает выживаемость в рамках тяжелой конкуренции, но и залаживает успех предприятия.</span>
                        </div>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <a href="{{ route('kontrol-kachestva') }}" class="btn btn-success send-button font-up">
                                Читать далее <span> >> </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-sm-4 col-xs-12 text-center">
                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <img class="green-img" src="/images/template/profile-img-002.png" alt="Экспорт и импорт металлических изделий" title="Экспорт и импорт металлических изделий" style="max-width: 99px;" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="wow fadeInUp">
                        <a href="{{ route('eksport-import') }}" class="text-green-20 font-up" title="Экспорт и импорт металлических изделий">
                            Экспорт и импорт металлических изделий
                        </a>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-2-2">
                            <span class="text-gray-16">Приветствуется лицензия на экспорт металла у надежных партнеров, которые не ограничиваются продажей своей продукции и в рамках отечественного рынка. К экспорту и импорту металлических изделий предъявляют строгие требования, установленные с целью контроля качества.</span>
                        </div>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <a href="{{ route('eksport-import') }}" class="btn btn-success send-button font-up">
                                Читать далее <span> >> </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-04.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Best quality products and considerate service</span>
        </div>
    </div>
</section>

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h2 class="welcome-text text-center">Основная информация</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 text-center">
            <div class="wow fadeInLeft">
                <div class="padding-block-0-2">
                    <img class="green-img" src="/images/template/profile-img-004.jpg" alt="Основная информация" title="Основная информация" style="max-width: 570px;" />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <a href="{{ route('nasha-politika') }}" class="text-black-h3 font-up" title="Надежный партнер в сфере металла">
                        Надежный партнер в сфере металла
                    </a>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <span class="text-gray-16">Стабильная работа осуществляется не только благодаря качественному оборудованию, но и за счет помощи профессиональной команды. Сырье для производства выбирается тщательно, а готовая продукция пользуется спросом не только на нашем рынке, а и в Европе, где стоимость выше на несколько порядков. Существенная ценовая нагрузка на зарубежном рынке вызвала спрос на украинскую продукцию – цена металла сделала отечественную металлопродукцию намного конкурентноспособнее.</span>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="padding-block-2-2">
                    <a href="{{ route('nasha-politika') }}" class="btn btn-warning send-button font-up">
                        Читать далее <span> >> </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Широкий экспорт/импорт мира</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="padding-block-2-2">
                    <p class="text-gray-16">Улучшением продукции ЮТМК постоянно занимается путем расширением возможностей импорта/экспорта. Сбыт металла осуществляется по всему миру и охватывает ЕС, Грузию, Белорусь, Турцию – в общем более 100 стран и регионов. Актуальные деловые отношения обеспечивают отдачу для клиентов разной бюджетной категории.</p>

                    <p class="text-gray-16">На мировой арене продукты ЮТМК выбирают за счет умеренной цены и совершенного обслуживания. Компания стремится к решению общей задачи качества и обслуживания. Покупка и продажа металлопроката осуществляется в рамках новых экономических условий как на физических, так и на онлайн площадках. Конечные расценки на продукцию состоят из стабильных показателей, таких как неизменное качество и регулярность поставок.</p>
                </div>

                <div class="padding-block-0-2">
                    <a href="{{ route('shirokij-eksport-import') }}" class="btn btn-warning send-button font-up">
                        Читать далее <span> >> </span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="padding-top"></div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-05.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Pragmatic approach to our customers</span>
        </div>
    </div>
</section>

<section class="container">

        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Собственность и капитал</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-005.jpg" alt="Надежный партнер для вашего бизнеса" title="Надежный партнер для вашего бизнеса" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('nadezhnyj-partner') }}" class="text-green-20" title="Надежный партнер для вашего бизнеса">
                        Надежный партнер для вашего бизнеса
                    </a>
                </div>

                <span class="text-gray-16">В отличие от железобетонного сырья, кирпича, газоблоков металл считается экономически выгодным, так как сокращает сроки строительства и снижает эксплуатационные затраты.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('nadezhnyj-partner') }}" class="text-green-20">
                        <span class="font-up">Читать далее</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-006.jpg" alt="Наши объемы продаж" title="Наши объемы продаж" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('nashi-obemy-prodazh') }}" class="text-green-20" title="Наши объемы продаж">Наши объемы продаж</a>
                </div>

                <span class="text-gray-16">Сортамент металла ЮТМК состоит из обширного ряда изделий, которые оттачиваются в заводских условиях строго по ГОСТу. Все металлоизделия классифицируются по видам, профилям, маркам, размерам.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('nashi-obemy-prodazh') }}" class="text-green-20">
                        <span class="font-up">Читать далее</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-007.jpg" alt="Устойчивое развитие как цель" title="Устойчивое развитие как цель" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('ustojchivoe-razvitie') }}" class="text-green-20" title="Устойчивое развитие как цель">
                        Устойчивое развитие как цель
                    </a>
                </div>

                <span class="text-gray-16">Устойчивое развитие способно полностью удовлетворить потребности потенциальных клиентов и настоящего времени, не ставя под угрозу свои собственные принципы.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('ustojchivoe-razvitie') }}" class="text-green-20">
                        <span class="font-up">Читать далее</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-008.jpg" alt="Карьерные возможности" title="Карьерные возможности" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('karernye-vozmozhnosti') }}" class="text-green-20" title="Карьерные возможности">Карьерные возможности</a>
                </div>

                <span class="text-gray-16">Металлопродукция ЮТМК соответствует международным стандартам, поэтому для покупателей предлагает богатый ассортимент и качество, а для сотрудников карьерные возможности.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('karernye-vozmozhnosti') }}" class="text-green-20">
                        <span class="font-up">Читать далее</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
        </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".company-profile").addClass('active');

        $('.parallax-window').parallax();
    </script>
@endsection

