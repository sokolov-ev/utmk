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
        <h1 class="welcome-text text-center">Кар'єрні можливості</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Металопродукція ЮТМК відповідає міжнародним стандартам, тому для покупців пропонує багатий асортимент і якість, а для співробітників кар'єрні можливості. У команді професіоналів працюють освічені люди, які підвищують свою кваліфікацію відповідно до змін в промисловості.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Рушійні сили металургії</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Сучасне виробництво металу не може розвиватися без відповідних фахівців, тому й кар'єрні можливості в даному напрямку відіграють роль. Наша компанія пропонує різні перспективи в розвитку, з огляду на те, що галузевий прогноз металургії має позитивне майбутнє. Економіка працює на основі діючих механізмів, які взаємодіють з ринком металу.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Випуск готового прокату по масштабах постійно збільшується, а стабільність - це гарна якість, яка впливає і на розвиток компанії в цілому, і на розвиток фахівців. Потрібно вміти функціонувати і взаємодіяти не тільки в рамках внутрішнього ринку, а й в рамках зовнішнього. Типовий видобуток сировини супроводжується з деякими принциповими змінами, які прив'язані до нових продуктів і технологій.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Світовий ринок не зупиняється на виробництві нового обладнання, яке ефективно зарекомендувало себе в системі обороту металу. Але без фахівців будь-які потужності не зможуть працювати так, як потрібно. Кар'єрні можливості в металургійній промисловості з'являються постійно, так як необхідно безперервно вирішувати загальносистемні проблеми. Успішність ЮТМК багато в чому залежить від спільної роботи кожного професіонала, тому підбір фахівців проходить ретельно, а підготовка постійно вдосконалюється.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-0">
            <span class="text-gray-16 text-justify">З приростом обсягів продажу і виходом на світовий ринок компанія поставила первинне завдання - контролювати рівень фахівців і розширювати кар'єрні можливості. Динамічні зміни, які характеризують сучасні тенденції металургії, позитивно відбиваються на цій картині. Виявляти перспективний розвиток фахівці можуть не тільки в напрямку розробки та отримання сировини, а й в напрямку проектування. Принципово нові досягнення від фахівців компанії підтримують збалансовану політику експорту / імпорту. Кар'єрні можливості ЮТМК відповідають вимогам і не блокуються станом економіки.</span>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection