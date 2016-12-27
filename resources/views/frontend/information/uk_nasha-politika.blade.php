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
        <h1 class="welcome-text text-center">Наша політика</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Наша компанія займається виготовленням металоконструкцій не один рік, відкриваючи широкі можливості доставки, порізки, транспортування. Вигідно купити металу з доставкою можна на офіційному сайті, витративши при цьому мінімум часу.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Надійний партнер у сфері металу</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Наша компанія пропонує метал в різних фізичних формах з незмінним спектром технічних характеристик. Робота заснована на таких важливих складових:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">термінове і якісне виконання кожного замовлення;</span></li>
                    <li><span class="text-gray-16">високий контроль якості;</span></li>
                    <li><span class="text-gray-16">гнучка доставка;</span></li>
                    <li><span class="text-gray-16">виготовлення продукції з євросталі;</span></li>
                    <li><span class="text-gray-16">металоструктури в широкому асортименті;</span></li>
                    <li><span class="text-gray-16">оцинковані рулони, модульні споруди, металоконструкції за доступними цінами в каталозі.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Стабільна робота здійснюється не тільки завдяки якісному обладнанню, а й за рахунок допомоги професійної команди. Сировина для виробництва вибирається ретельно, а готова продукція користується попитом не тільки на нашому ринку, а й в Європі, де вартість вище на кілька порядків. Істотне цінове навантаження на зарубіжному ринку викликала попит на українську продукцію - ціна металу зробила вітчизняну металопродукцію набагато конкурентно спроможними.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">З огляду на те, що металоконструкції відносяться до одних з найважливіших елементів будівництва, то використовуються вони для об'єктів різного призначення. Вироби можуть виконувати конструктивну або несучу функцію, в залежності від чого і розробляються не в одному типовому розмірі та формі. Якість нашого металопродукту перевірено часом, тому вибір можна здійснювати без сумнівів.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">ЮТМК на відміну від інших ринкових партнерів відрізняється такими перевагами:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Оперативність.</span></li>
                    <li><span class="text-gray-16">Енергозбереження.</span></li>
                    <li><span class="text-gray-16">Доступний продукт.</span></li>
                    <li><span class="text-gray-16">Надійність.</span></li>
                    <li><span class="text-gray-16">Легкість.</span></li>
                    <li><span class="text-gray-16">Мобільність.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Споруди, виготовлені з металу, який ви придбали у нас, відрізняються привабливістю і комфортністю, прекрасно поєднуються з новими оздоблювальними матеріалами.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Якщо потрібна порізка металу приватним особам або будівельним фірмам, то наша компанія готова запропонувати вигідні послуги в цьому напрямку. Для вирішення цих завдань використовуються спеціальні верстати порізки металу, які допомагають якомога швидше виготовити необхідну виріб. В ході виготовлення використовуються європейські стандарти сталі, що дозволяють створювати вироби під ключ з оптимальним поєднанням ціни і якості.</span>
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