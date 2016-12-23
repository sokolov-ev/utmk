@extends('layouts.site')

@section('title')
    {{-- {{ trans('index.menu.about_us') }} --}}
    {{ $metatags['title'] }}
@endsection

@section('meta')

    @include('partial.metatags')

@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h1 class="welcome-text text-center">Коротко о нас</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="wow fadeInLeft">
                <span class="text-gray-16 text-justify">Для широкого применения предлагаются различные виды металлопроката, к качеству которого предъявляют высокие требования. Поставки продукции высшего качества готова предложить компания «ЮТМК Киев» - за свое время работы она зарекомендовала себя как надежный партнер, с которым можно заключать долгосрочное сотрудничество. Строгий подход позволяет в сжатые сроки изготавливать высококачественное металлосырье без игнорирования трех ключевых моментов: время, цена, качество.</span>
            </div>
            <div class="wow fadeInLeft">
                <div class="padding-block-2-2">
                    <span class="text-gray-16 text-justify">Учитывая, что металлопродукция тесно связана с жизнью современного человека, то ее повсеместное использование не является удивительным. Ассортимент условно разделяется на применение по категориям, по сложности изготовления и в зависимости от степени точности. Не только форма имеет важное значение, но и внутренний состав изделий – в ходе производства используются различные виды металла, которые по характеристикам разделяют на обычный или особый прокат (нержавеющий, оцинкованный).</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="wow fadeInRight">
                <img class="green-img" src="/images/template/about-us-img-001.jpg" alt="" title="" style="max-width: 570px;">
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

<section class="container">

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

<section style="background-color: #eeeeee;">
    <div class="container">
        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Наши услуги</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">Порезка</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">Резку заказанного металлопроката проводят по указанным размерам. Осуществляется порезка предварительно перед окончательным формированием заказа. Эту услугу выбирают как обычные покупатели, так и бизнесмены.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('porezka') }}" title="Порезка">
                            Читать далее <span> >> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">Упаковка</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">Качественная транспортировка металлопродукции невозможна без упаковки, которая проводится на ЮТМК для всех видов сортового проката. В ходе выполнения работ по упаковке соблюдаются правила, которые установлены стандартами для всех компаний по выпуску металлов.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('upakovka') }}" title="Упаковка">
                            Читать далее <span> >> </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">Доставка</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">Хотите приобрести металл в интернете? Вы делаете правильный выбор как со стороны ценового фактора, так и со стороны широкого выбора. ЮТМК предлагает выгодную доставку металлопродукции по всей территории Украины. Компания сотрудничает с лучшими перевозчиками, поэтому может предложить оптимальный вариант погрузки с учетом потребностей клиента и с минимальными затратами денежных средств.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('dostavka') }}" title="Доставка">
                            Читать далее <span> >> </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

<section class="parallax-window" data-parallax="scroll" data-image-src="/images/template/index-parallax-03.jpg">
    <div class="container" style="position: relative;">
        <div class="parallax-text-wrap">
            <span class="parallax-text">Лучшая металлопродукция с гибкой системой оплаты</span>
        </div>
    </div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">


        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Основные направления работы компании</h2>
        </div>
        <div class="padding-top"></div>

    {{--     <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                <div class="padding-block-2-2">
                    <img class="green-img" src="/images/template/about-us-img-002.jpg" alt="" title="" style="max-width: 270px;">
                </div>

                <p class="text-black-h3">TOM JAMES</p>
                <p class="text-gray-16">Founder & President</p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                <div class="padding-block-2-2">
                    <img class="green-img" src="/images/template/about-us-img-003.jpg" alt="" title="" style="max-width: 270px;">
                </div>

                <p class="text-black-h3">HELEN TOMPSON</p>
                <p class="text-gray-16">Director, Programs</p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                <div class="padding-block-2-2">
                    <img class="green-img" src="/images/template/about-us-img-004.jpg" alt="" title="" style="max-width: 270px;">
                </div>

                <p class="text-black-h3">PATRICK POOL</p>
                <p class="text-gray-16">Director, Finance & Administration</p>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                <div class="padding-block-2-2">
                    <img class="green-img" src="/images/template/about-us-img-005.jpg" alt="" title="" style="max-width: 270px;">
                </div>

                <p class="text-black-h3">ALICE PUSE</p>
                <p class="text-gray-16">Special Assistant to the President</p>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-6">
                <div class="wow fadeInLeft">
                    <span class="text-gray-16 text-justify">Все изготовляемые изделия имеют высокий предел прочности, устойчивы к воздействиям со стороны, способны выдерживать различный уровень нагрузок и радовать долгим периодом эксплуатации. Качество постоянно контролируется сертификатами и профессиональным взглядом – это продвигает «ЮТМК Киев» в первые ряды не на словах, а на деле.</span>
                </div>
            </div>
            <div class="col-md-6">
    {{--             <div class="wow slideInRight">
                    <span class="text-gray-16 text-justify">Работает компания с расширением пяти основных направлений:</span>
                </div> --}}

                <div class="wow slideInRight">
                    {{-- <div class="padding-block-1-2"> --}}
                        <div class="metall-list orange-list">
                            <ul class="list-unstyled">
                                <li><span class="text-gray-16">сортовой прокат (швеллер, шестигранник, квадрат, катанка, балка, уголок);</span></li>
                                <li><span class="text-gray-16">трубный прокат (стальные и котельные трубы);</span></li>
                                <li><span class="text-gray-16">листовой прокат;</span></li>
                                <li><span class="text-gray-16">поковки;</span></li>
                                <li><span class="text-gray-16">гнутый профиль (швеллера и углы гнутые).</span></li>
                            </ul>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

{{-- <section class="green-section">
    <div class="container">

        <div class="padding-top"></div>
        <h2 class="welcome-text text-center" style="color: #fff;">Core values</h2>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-01.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">WE STRIVE FOR OUR CUSTOMERS</p>

                        <p class="green-section-body">We work to build long-term and reliable cooperation with our customers, providing them with high-quality products and services. The satisfaction of our customers - that is the main task.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-02.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">INTEGER RUTRUM ANTE EU LACUS</p>

                        <p class="green-section-body">Our products are considered to be one of the best in the world and is used during the construction of most of the strategic industrial, infrastructural and residential projects.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-03.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">RESPECTFUL ATTITUDE TO EACH CUSTOMER</p>

                        <p class="green-section-body">Respect goes beyond treating people politely. It means we value other people's experience, opinions and act by listening first. We may not always agree, but we will always be respectful.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row green-section-block">
                    <div class="col-sm-3 col-xs-3 text-center">
                        <img class="green-img" src="/images/template/about-us-numbers-04.svg" alt="" title="" style="max-width: 120px; border-radius: 50%;">
                    </div>
                    <div class="col-xs-9">
                        <p class="green-section-title">WE REALLY LOVE WHAT WE DO</p>

                        <p class="green-section-body">Everyone who comes in contact with us should leave with something, whether an employee, a peer, a customer - or just a a stranger in need.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section> --}}

<section class="container">
    <div class="padding-top"></div>
    <h2 class="welcome-text text-center">Почему выбирают «ЮТМК Киев»?</h2>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-5 text-center">
            <div class="wow fadeInLeft">
                <img class="green-img" src="/images/template/about-us-img-007.jpg" alt="" title="" style="max-width: 256px;" >
            </div>
        </div>
        <div class="col-md-7">
            <div class="wow fadeInRight">
                <div class="padding-block-2-2">
                    <span class="text-gray-16">В основе работы компании лежит главная неизменная цель – ставка на развитие долгосрочных и успешных отношений на условиях взаимной выгоды. Популярность «ЮТМК Киев» постепенно расширяется по всей стране, так как металлопродукция должного качества не остается без внимания. Аудитория потребителей металла постоянно растет, в соответствии с этим фактором возрастает и спрос на качество, которое нашей компанией предоставляется на все виды продукции. Помимо соблюдения основных требований, второстепенные вопросы о приемке, хранении, упаковке, транспортировке также не остаются в стороне.</span>
                </div>
            </div>

{{--             <div class="wow fadeInRight">
                <div class="orange-list">
                    <ul class="list-unstyled">
                        <li> <a class="orange-list-a" href="#" title="">Respect goes beyond treating people politely</a> </li>
                        <li> <a class="orange-list-a" href="#" title="">We really love what we do</a> </li>
                        <li> <a class="orange-list-a" href="#" title="">We strive for our customers</a> </li>
                        <li> <a class="orange-list-a" href="#" title="">We deliver anywhere in the world</a> </li>
                        <li> <a class="orange-list-a" href="#" title="">We value other people's experience</a> </li>
                    </ul>
                </div>
            </div> --}}

            <div class="wow slideInRight">
                <span class="text-gray-16 text-justify">Наши преимущества:</span>
            </div>

            <div class="wow slideInRight">
                <div class="padding-block-1-2">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">быстрая и дешевая доставка товара;</span></li>
                            <li><span class="text-gray-16">поставка металлоизделий в широком сортаменте;</span></li>
                            <li><span class="text-gray-16">грамотные консультации и подбор металлопроката с индивидуальным подходом.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".about-us").addClass('active');

        $('.parallax-window').parallax();
    </script>
@endsection

