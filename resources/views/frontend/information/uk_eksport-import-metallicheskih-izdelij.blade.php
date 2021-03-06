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
        <h1 class="welcome-text text-center">Експорт та імпорт металевих виробів</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Вітається ліцензія на експорт металу у надійних партнерів, які не обмежують продаж своєї продукції і в рамках вітчизняного ринку. До експорту та імпорту металевих виробів пред'являють суворі вимоги, встановлені з метою контролю якості.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Зовнішньо-торговельний баланс</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Вдале співвідношення імпорту та експорту безпосередньо впливає на обсяг продукції нашого підприємства. Стабільність на ринку металу дозволяє формувати сприятливу картину. Експорт виробів металів нашої компанії збільшується поступово, враховуючи, що імпорт був налагоджений кілька років тому. Металопрокат розподіляється на групи, кожна з яких підпадає під певну категорію і стандарти.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Експортні обсяги налагоджуються - якість продукції оцінюють не тільки вітчизняні споживачі, а й імпортні. Країни Європи не здивувати широким асортиментом і гарною якістю, але знайти прийнятну ціну можна не завжди. Купити металеві вироби в нашій компанії можна за стандартним каталогом або замовити вироби під свої вимоги.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Готові металеві вироби на ринку вибирають в різних обсягах, враховуючи, що ціна є прийнятною і для вітчизняного ринку, і для закордонних покупців. Використовувати якісну металопродукцію можна для будь-яких цілей, не турбуючись про її технічні характеристики. У нас клієнти можуть придбати екологічно безпечну сировину, яке виготовляється з чистої металобази, тому витримує навіть нестандартні умови експлуатації.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Продаж металевих виробів за кордон - це новий напрямок, яке компанія намагається утримувати в міру своїх можливостей. Зовнішньоторговельні проекти складаються з великих і дрібних поставок, організованих спільними силами. Легальний продаж чорних металів постійно підтримується і стабільно прокладає свій шлях завдяки незмінній якості, хорошим виробничим обсягами і виправданою ціновій політиці.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Експорт металу задовольняється динамікою зростання споживання в різних регіонах: десь виникає необхідність звести огороджувальні конструкції, десь потрібні опори, десь широко використовується профнастил. Металопрокат поширений на всіх місцевих ринках, а на арені світового експорту цікавляться окремими видами товарів за рахунок низьких цінових ставок. Все це істотно відбивається на довготривалу співпрацю з важливими ринками збуту.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection