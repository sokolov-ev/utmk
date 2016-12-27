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

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h1 class="welcome-text text-center">Коротко про нас</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="wow fadeInLeft">
                <span class="text-gray-16 text-justify">Для широкого застосування пропонуються різні види металопрокату, до якості якого висувають високі вимоги. Поставки продукції вищої якості готова запропонувати компанія «ЮТМК» - за свій час роботи вона зарекомендувала себе як надійний партнер, з яким можна укладати довгострокове співробітництво. Строгий підхід дозволяє в стислі терміни виготовляти високоякісну метало сировину без ігнорування трьох ключових моментів: час, ціна, якість.</span>
            </div>
            <div class="wow fadeInLeft">
                <div class="padding-block-2-2">
                    <span class="text-gray-16 text-justify">З огляду того, що металопродукція тісно пов'язана з життям сучасної людини, то її повсюдне використання не є дивним. Асортимент умовно розділяється на застосування за категоріями, за складністю виготовлення і в залежності від ступеня точності. Не тільки форма має важливе значення, але і внутрішній склад виробів - в ході виробництва використовуються різні види металу, які за характеристиками поділяють на звичайний або особливий прокат (нержавіючий, оцинкований).</span>
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
        <h1 class="welcome-text text-center">Що ми пропонуємо</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="row">
                <div class="col-sm-4 col-xs-12 text-center">
                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <img class="green-img" src="/images/template/profile-img-001.png" alt="контроль якості нашої продукції" title="контроль якості нашої продукції" style="max-width: 99px;" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="wow fadeInUp">
                        <a href="{{ route('kontrol-kachestva') }}" class="text-green-20 font-up" title="контроль якості нашої продукції">
                            КОНТРОЛЬ ЯКОСТІ НАШОЇ ПРОДУКЦІЇ
                        </a>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-2-2">
                            <span class="text-gray-16">Висока конкуренція змусила нашу компанію шукати нові шляхи до успіху, для чого була розроблена своя система якості продукції. Відповідно до потреб споживачів виробляється строгий контроль якості, який не тільки підвищує виживання в рамках важкої конкуренції, але і поліпшує успіх підприємства.</span>
                        </div>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <a href="{{ route('kontrol-kachestva') }}" class="btn btn-success send-button font-up">
                                ЧИТАТИ ДАЛІ <span> >> </span>
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
                            <img class="green-img" src="/images/template/profile-img-002.png" alt="експорт та імпорт металевих виробів" title="експорт та імпорт металевих виробів" style="max-width: 99px;" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="wow fadeInUp">
                        <a href="{{ route('eksport-import') }}" class="text-green-20 font-up" title="експорт та імпорт металевих виробів">
                            ЕКСПОРТ ТА ІМПОРТ МЕТАЛЕВИХ ВИРОБІВ
                        </a>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-2-2">
                            <span class="text-gray-16">Вітається ліцензія на експорт металу у надійних партнерів, які не обмежуються продажем своєї продукції і в рамках вітчизняного ринку. До експорту та імпорту металевих виробів пред'являють суворі вимоги, встановлені з метою контролю якості.</span>
                        </div>
                    </div>

                    <div class="wow fadeInUp">
                        <div class="padding-block-0-2">
                            <a href="{{ route('eksport-import') }}" class="btn btn-success send-button font-up">
                                ЧИТАТИ ДАЛІ <span> >> </span>
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
            <span class="parallax-text">Найкраща якість продукції та уважне обслуговування</span>
        </div>
    </div>
</section>

<section class="container">

    <div class="padding-top"></div>
    <div class="wow fadeInRight">
        <h2 class="welcome-text text-center">Основна інформація</h2>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 text-center">
            <div class="wow fadeInLeft">
                <div class="padding-block-0-2">
                    <img class="green-img" src="/images/template/profile-img-004.jpg" alt="Основна інформація" title="Основна інформація" style="max-width: 570px;" />
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <a href="{{ route('nasha-politika') }}" class="text-black-h3 font-up" title="Надійний партнер в сфері металу">
                        НАДІЙНИЙ ПАРТНЕР В СФЕРІ МЕТАЛУ
                    </a>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <span class="text-gray-16">Стабільна робота здійснюється не тільки завдяки якісному обладнанню, а й за рахунок допомоги професійної команди. Сировина для виробництва вибирається ретельно, а готова продукція користується попитом не тільки на нашому ринку, а й в Європі, де вартість вища на кілька порядків. Істотне цінове навантаження на зарубіжному ринку викликала попит на українську продукцію - ціна металу зробила вітчизняну металопродукцію набагато конкурентно-спроможною.</span>
                </div>
            </div>

            <div class="wow fadeInRight">
                <div class="padding-block-2-2">
                    <a href="{{ route('nasha-politika') }}" class="btn btn-warning send-button font-up">
                        ЧИТАТИ ДАЛІ <span> >> </span>
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
            <h2 class="welcome-text text-center">Широкий експорт/імпорт світу</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="padding-block-2-2">
                    <p class="text-gray-16">Поліпшенням продукції ЮТМК постійно займається шляхом розширення можливостей імпорту / експорту. Збут металу здійснюється по всьому світу і охоплює ЄС, Грузію, Білорусь, Туреччину - в загальному понад 100 країн і регіонів. Актуальні ділові відносини забезпечують віддачу для клієнтів різної бюджетної категорії.</p>

                    <p class="text-gray-16">На світовій арені продукти ЮТМК вибирають за рахунок помірної ціни і досконалого обслуговування. Компанія прагне до вирішення загального завдання якості і обслуговування. Купівля та продаж металопрокату здійснюється в рамках нових економічних умов як на фізичних, так і на онлайн майданчиках. Кінцеві розцінки на продукцію складаються зі стабільних показників, таких як незмінна якість і регулярність поставок.</p>
                </div>

                <div class="padding-block-0-2">
                    <a href="{{ route('shirokij-eksport-import') }}" class="btn btn-warning send-button font-up">
                        ЧИТАТИ ДАЛІ <span> >> </span>
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
            <span class="parallax-text">Прагматичний підхід до наших клієнтів</span>
        </div>
    </div>
</section>

<section class="container">

        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Власність і капітал</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-005.jpg" alt="Надійний партнер для вашого бізнесу" title="Надійний партнер для вашого бізнесу" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('nadezhnyj-partner') }}" class="text-green-20" title="Надійний партнер для вашого бізнесу">
                        Надійний партнер для вашого бізнесу
                    </a>
                </div>

                <span class="text-gray-16">На відміну від залізобетонної сировини, цегли, газоблоків метал вважається економічно вигідним, тому що скорочує терміни будівництва і знижує експлуатаційні витрати.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('nadezhnyj-partner') }}" class="text-green-20">
                        <span class="font-up">ЧИТАТИ ДАЛІ</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-006.jpg" alt="Наші обсяги продажів" title="Наші обсяги продажів" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('nashi-obemy-prodazh') }}" class="text-green-20" title="Наші обсяги продажів">
                        Наші обсяги продажів
                    </a>
                </div>

                <span class="text-gray-16">Сортамент металу ЮТМК складається з широкого ряду виробів, які вигострюються в заводських умовах строго по ГОСТу. Усі металовироби класифікуються за видами, профілями, марками, розмірами.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('nashi-obemy-prodazh') }}" class="text-green-20">
                        <span class="font-up">ЧИТАТИ ДАЛІ</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-007.jpg" alt="Сталий розвиток як мета" title="Сталий розвиток як мета" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('ustojchivoe-razvitie') }}" class="text-green-20" title="Сталий розвиток як мета">
                        Сталий розвиток як мета
                    </a>
                </div>

                <span class="text-gray-16">Сталий розвиток здатний повністю задовольнити потреби потенційних клієнтів і теперішнього часу, не ставлячи під загрозу свої власні принципи.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('ustojchivoe-razvitie') }}" class="text-green-20">
                        <span class="font-up">ЧИТАТИ ДАЛІ</span>
                        <span class="fa span-arrow"> >> </span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img class="green-img" src="/images/template/profile-img-008.jpg" alt="Кар'єрні можливості" title="Кар'єрні можливості" style="max-width: 270px;" />

                <div class="padding-block-2-2">
                    <a href="{{ route('karernye-vozmozhnosti') }}" class="text-green-20" title="Кар'єрні можливості">Кар'єрні можливості</a>
                </div>

                <span class="text-gray-16">Металопродукція ЮТМК відповідає міжнародним стандартам, тому для покупців пропонує багатий асортимент і якість, а для співробітників кар'єрні можливості.</span>

                <div class="padding-block-2-2">
                    <a href="{{ route('karernye-vozmozhnosti') }}" class="text-green-20">
                        <span class="font-up">ЧИТАТИ ДАЛІ</span>
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
            <h2 class="welcome-text text-center">Наші послуги</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-4">
                <div class="wow fadeInUp">
                    <p class="text-orange font-up">Порізка</p>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <span class="text-gray-16">Порізка замовленого металопрокату проводять по зазначених розмірах. Здійснюється вона попередньо перед остаточним формуванням замовлення. Цю послугу вибирають як звичайні покупці, так і бізнесмени.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('porezka') }}" title="Порізка">
                            ЧИТАТИ ДАЛІ <span> >> </span>
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
                        <span class="text-gray-16">Якісне транспортування металопродукції неможливе без упаковки, яка проводиться на ЮТМК для всіх видів сортового прокату. В ході виконання робіт по упаковці дотримуються правил, які встановлені стандартами для всіх компаній з випуску металів.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('upakovka') }}" title="Упаковка">
                            ЧИТАТИ ДАЛІ <span> >> </span>
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
                        <span class="text-gray-16">Хочете придбати метал в інтернеті? Ви робите правильний вибір як з боку цінового фактору, так і з боку широкого вибору. ЮТМК пропонує вигідну доставку металопродукції по території всієї України. Компанія співпрацює з кращими перевізниками, тому може запропонувати оптимальний варіант навантаження з урахуванням потреб клієнта і з мінімальними витратами грошових коштів.</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-1-2">
                        <a class="btn btn-warning send-button font-up" href="{{ route('dostavka') }}" title="Доставка">
                            ЧИТАТИ ДАЛІ <span> >> </span>
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
            <span class="parallax-text">Краща металопродукція з гнучкою системою оплати</span>
        </div>
    </div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">


        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <h2 class="welcome-text text-center">Основні напрямки роботи компанії</h2>
        </div>
        <div class="padding-top"></div>

        <div class="row">
            <div class="col-md-6">
                <div class="wow fadeInLeft">
                    <span class="text-gray-16 text-justify">Всі виготовлені вироби мають високу межу міцності, стійкі до впливів з боку, здатні витримувати різний рівень навантажень і радувати довгим періодом експлуатації. Якість постійно контролюється сертифікатами і професійним поглядом - це просуває «ЮТМК» в перші ряди не на словах, а на ділі.</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="wow slideInRight">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">сортовий прокат (швелер, шестигранник, квадрат, катанка, балка, кутник);</span></li>
                            <li><span class="text-gray-16">трубний прокат (сталеві і котельні труби);</span></li>
                            <li><span class="text-gray-16">листовий прокат;</span></li>
                            <li><span class="text-gray-16">поковки;</span></li>
                            <li><span class="text-gray-16">гнутий профіль (швелера і кути гнуті).</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="padding-top"></div>
    </div>
</section>

<section class="container">
    <div class="padding-top"></div>
    <h2 class="welcome-text text-center">Чому обирають «ЮТМК»?</h2>
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
                    <span class="text-gray-16">В основі роботи компанії лежить головна незмінна мета - ставка на розвиток довгострокових і успішних відносин на умовах взаємної вигоди. Популярність «ЮТМК» поступово розширюється по всій країні, так як металопродукція належної якості не залишається без уваги. Аудиторія споживачів металу постійно зростає, відповідно до цього фактору зростає і попит на якість, яка нашою компанією надається на всі види продукції. Окрім дотримання основних вимог, другорядні питання про приймання, зберігання, упакування, транспортування також не залишаються осторонь.</span>
                </div>
            </div>

            <div class="wow slideInRight">
                <span class="text-gray-16 text-justify">Наші переваги:</span>
            </div>

            <div class="wow slideInRight">
                <div class="padding-block-1-2">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">швидка і дешева доставка товару;</span></li>
                            <li><span class="text-gray-16">поставка металовиробів в широкому сортаменті;</span></li>
                            <li><span class="text-gray-16">грамотні консультації та підбір металопрокату з індивідуальним підходом.</span></li>
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