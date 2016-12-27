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
        <h1 class="welcome-text text-center">Порізка</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Порізку замовленого металопрокату проводять за зазначеними розмірами. Здійснюється вона попередньо перед остаточним формуванням замовлення. Цю послугу вибирають як звичайні покупці, так і бізнесмени.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Порізка металу дозволяє створювати заготовки з точною установкою форми і довжини. Здійснюється процес різними способами, які вибираються в залежності від вигоди пропонованої послуги. Під обробку можуть потрапити як великі листи, так і негабаритні металеві вироби.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Потреба у використанні металлозаготовок різних розмірів розширила спектр послуг з порізки з можливістю створення необхідних форм. Кожне замовлення виконується точно з мінімальними втратами часу без виникнення окалин, гострих зрізів та інших дефектів - цих результатів можна досягти за допомогою відповідного підбору інструментів і відповідного методу.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Всі сучасні способи порізки дозволяють економно проводити розкрій сортового металу без необхідності подальшої обробки. Послугу можна замовити як для масового користування, так і для порізки металу в малих кількостях.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-black-h3 center-block">Всі види сучасної порізки</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">З огляду того, що на заводі ЮТМК сортовий металопрокат випускається у великій кількості, то порізка цікава всім споживачам. Розмір вибирається кратно певним розмірам - 8 м, 10 м, 12 м і так далі.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">На металлобазі порізка пропонується в декількох видах:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">стрічкопильна - поставлена ​​в перші ряди через високої точності і швидкості різання за рахунок застосування стрічкопильних верстатів;</span></li>
                    <li><span class="text-gray-16">порізка прес-ножицями - вибирають, якщо потрібно заготовка металу певних розмірів (метод економить час, кошти і матеріал);</span></li>
                    <li><span class="text-gray-16">порізка вулканіту - скорочує витрату металу і дає можливість простій і доступній порізці.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Розкрій листового металу здійснюється за індивідуальним замовленням клієнта з мінімальною кількістю відходів. Замовлення приймаються на порізку власного металу або продукції інших виробників. Вартість розраховується в кожному конкретному випадку. У додаткові послуги по обробці металу входить згинання й вальцювання, які на ЮТМК пропонуються також з метою поліпшення зовнішнього вигляду і без змін якості металевого профілю. Короткі терміни виготовлення + висока швидкість роботи + низька вартість - все це клієнт отримує при зверненні в нашу компанію.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".services").addClass('active');
    </script>
@endsection