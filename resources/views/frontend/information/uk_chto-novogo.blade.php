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
        <h1 class="welcome-text text-center">Що нового?</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Зміною асортименту продукції нікого не здивуєш, а ось високе відношення до клієнта може надати не кожна компанія. Високий рівень задоволеності клієнтів говорить про те, що продукт цього бренду вартий уваги. Для клієнтів важливо не тільки якість продукту, але і якість обслуговування - це своєрідна аксіома.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Наша головна мета - задоволеність клієнта</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">На всіх етапах співпраці з нашою компанією ми ставимо задоволеність клієнта в ряд важливих показників, так як цей показник оцінює об'єктивно якість продукції та сервіс компанії. З початку замовлення і до завершення покупки фахівці повністю виконують всі призначені дії, включаючи консультацію, рекомендації та допомогу в покупці. Далеко не кожен клієнт точно знає, що він хоче купити і потребує допомоги фахівців - такий підхід стимулює повторні покупки.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Коли лінійка продуктів оновлюється споживачі не завжди помічають ці зміни і готові відкрито контактувати з продавцем. Наша компанія не тільки готова зацікавити клієнтів лояльною ціною, але і запропонувати ту якість продуктів, яка рідко зустрічається на вітчизняному ринку. Цінні пропозиції доповнюються високою значимістю кожного продукту.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Після відвідин нашого інтернет магазину і співпраці з фахівцями з продажу клієнти з посмішкою говорять: «Я задоволений покупкою і обслуговуванням», «Буду радий звернутися знову», «Покупка перевершила мої очікування». Всі ці слова підтверджуються роками практик, оновленням сервісу та послуг. Емоційно позитивний стан - це і є задоволеність клієнта, до якої ми прагнемо постійно. Широкі можливості вибору - це ще один важливий показник, який ми використовуємо на своїй практиці. Тобто, компанія здійснює різні управлінські зусилля, щоб досягти рівноваги між бажаною покупкою і реальною.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Час показав, що наша компанія - компетентний і надійний партнер, який надає допомогу кожному клієнту разом з консультацією і підтримкою. Задоволеність клієнта вважаємо головною метою як для всієї компанії, так і для відділу продажів зокрема. Для досягнення високого результату була створена дилерська мережа, щоб залишатися з клієнтом не тільки в рамках вітчизняного ринку. Імідж компанії рік від року змінюється в очах клієнтів, але параметри задоволеності клієнтів залишаються незмінними.</span>
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