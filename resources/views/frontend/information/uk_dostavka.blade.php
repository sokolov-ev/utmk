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
        <h1 class="welcome-text text-center">Доставка</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Хочете придбати метал в інтернеті? Ви робите правильний вибір як з боку цінового фактору, так і з боку широкого вибору. ЮТМК пропонує вигідну доставку металопродукції по всій території України. Компанія співпрацює з кращими перевізниками, тому може запропонувати оптимальний варіант навантаження з урахуванням потреб клієнта і з мінімальними витратами грошових коштів.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <div class="wow fadeInUp">
                <span class="text-black-h3 center-block">Доставка в будь-який куточок країни</span>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Широкий асортимент пропонованих виробів з металу може зацікавити як приватних осіб, так і окремі компанії - для всіх ЮТМК організовує зручну доставку. З огляду на, що продаж здійснюється безпосередньо від виробника, то якість контролюється на кожному рівні, починаючи від етапу виготовлення і закінчуючи етапом упаковки. Доставка також супроводжується на компетентному рівні, тому придбати продукцію можна в необхідній кількості.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Тривала співпраця ЮТМК з компаніями-перевізниками дає можливість гарантувати кожному клієнту безпечне перевезення за прийнятною ціною. Спочатку вартість металопрокату може розраховуватися разом з доставкою, так як не всі мають можливість самовивозу. Сплачена продукція зазвичай відправляється в наступний день по загальновідомою схемою.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Доставка металопрокату входить в спектр таких послуг, які не так строго регламентуються ГОСТом - вся відповідальність покладається на плечі компанії-виробника. ЮТМК за час свого існування не підвела жодного клієнта - це є найкращим доказом злагодженої і продуманої роботи. Нам довіряють доставку металевої продукції як великі компанії, так і постійні клієнти, з якими встановлено взаємовигідний зв'язок.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Доставка проводиться автотранспортом з закритими / відкритими майданчиками. На окремі види металопродукції можуть бути встановлені додаткові вимоги з метою збереження якості на вищому рівні. Перед завантаженням товар повинен бути складений відповідно до ГОСТ 26653.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Металопрокат ЮТМК поставляється безпосередньо зі складу в місто, який клієнт вказав при замовленні продукції. Доставка проходить організовано для невеликих замовлень, для роздрібних і оптових клієнтів. Незалежно від обсягів замовленої партії терміни дотримуються в порядку черговості оплати і замовлення. Металопрокат може бути доставлений безпосередньо на будмайданчик. Транспортні послуги доступні в будні дні і проводяться після оформлення договору.</span>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".services").addClass('active');
    </script>
@endsection