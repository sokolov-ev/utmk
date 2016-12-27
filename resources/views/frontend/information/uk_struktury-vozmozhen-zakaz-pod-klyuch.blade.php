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
        <h1 class="welcome-text text-center">Структури на замовлення під ключ</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-black-h3 center-block">Металоконструкції, платформи, пандуси і мости, прогонові плити, ригелі і опорні блоки, освітлення щогл і веж.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Вільні за формою виготовлення металоконструкції є структури, які можна купувати на замовлення або вибирати зі стандартного ряду. Рівень розвитку цих структур визначається потребами і можливостями технічної бази. Ефективність їх застосування збільшується за рахунок легкості, широких можливостей, прогресивних форм і розмірів.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Економні металеві конструкції</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">До переваг структур можна віднести:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">скорочені витрати на транспорт;</span></li>
                    <li><span class="text-gray-16">можна створювати перекриття без великих прольотів;</span></li>
                    <li><span class="text-gray-16">висока уніфікація вузлів;</span></li>
                    <li><span class="text-gray-16">висока надійність від руйнувань;</span></li>
                    <li><span class="text-gray-16">архітектурна виразність;</span></li>
                    <li><span class="text-gray-16">збірно-розбірність;</span></li>
                    <li><span class="text-gray-16">універсальність застосування.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Особлива геометрична будова - це головна особливість металевих структур, яка створена на природі цього матеріалу, адже кристалічні решітки металу в просторовій системі викликають необхідну реакцію. Будь-яку структурну систему можна побудувати взявши за основу певну геометричну конструкцію. Кожен наступний вузол тісно пов'язаний з основою, а пересічні елементи забезпечують жорсткість. Металеві структури дозволяють скорочувати експлуатаційні витрати і обсяги будуємої конструкції. На місці будівництва поставляються структури у вигляді окремих елементів, які збираються в блок поелементно - це знижує трудомісткість складання і монтажу.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">За допомогою структур можна створювати різні за складністю інженерні конструкції з привабливим зовнішнім виглядом. Їх раціональне використання дає можливості комбінувати з балками, рамами і іншими перехресно-стрижневі елементами. Всі металеві структури проходять три етапи монтажу: транспортування, підготовчі роботи і складання. Від їх правильного проведення залежить якість експлуатації.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">ЮТМК має добре відпрацьовану технологію, яка дозволяє створювати різні структури: пандуси і мости, металоконструкції у вигляді платформ, прогонові плити, опорні блоки і ригелі, освітлення веж і щогл. Виробляються вироби з якісного чорного металу і сталі, в якості з’єднань використовуються болтові або зварні способи. Структури, які випускаються нашими фахівцями, відрізняються швидкістю монтажу, високою несучою здатністю, непроникністю, індустріальні. За вимогами пожежної безпеки така металопродукція володіє певним обмеженням.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection