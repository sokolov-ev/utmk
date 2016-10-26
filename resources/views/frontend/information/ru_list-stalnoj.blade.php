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
        <h1 class="welcome-text text-center">Лист стальной</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Многие отрасли применения охватывает лист стальной, который востребован и в автомобильной промышленности, и в строительстве, и в других направлениях. В зависимости от типа проката он делится на горяче- и холоднокатаный. Более целесообразным является способ холодного проката – он уменьшает потери на 10-20 %. Использовать этот лист можно в качестве заготовок или как самостоятельный продукт.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Листовой прокат из стали</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Для конкретной области применения ключевое значение имеет марка применяемой стали и уровень точности, который разделяется на В (нормальная) и А (повышенная). Лист стальной может иметь обрезную или необрезную кромку, а также разделяется по толщине:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">тонколистовой (не больше 4 мм);</span></li>
                    <li><span class="text-gray-16">толстолистовой (4-160 мм).</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В продаже предлагаются металлоизделия с разным уровнем плоскости:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">ПУ – улучшенные;</span></li>
                    <li><span class="text-gray-16">ПО – с высокой плоскостью;</span></li>
                    <li><span class="text-gray-16">ПВ – умеренной плоскости;</span></li>
                    <li><span class="text-gray-16">ПН – нормальной плоскости.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Весь сортамент листов соответствует ГОСТу 19903-74. Причем, листовой прокат предлагается не только в стандартной упаковке, а и в рулонах для разной толщины. Маркировка стальных листов позволяет покупателю ориентироваться в характеристиках и размерах изделия, подбирая подходящие и по качеству, и по ценовому уровню. Листовой металлопрокат все больше набирает распространения, а если же нет подходящего изделия в стандартных комплектациях, то без затруднений можно заказать индивидуальные размеры в требуемом количестве листов.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Холодно- или горячекатанный способ производства отличается своими характеристиками и показателями на физико-химическом уровне. Холодная прокатка имеет некие ограничения по толщине, что отсутствует в горячем производстве. Более эластичные стальные листы можно получить путем холодной прокатки, но горячий прокат также имеет свою востребованность.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Изготавливается стальной лист в мерной длине с остатком до 10 % от всей партии, тоже касается и кратной, и немерной длины. Типичные размеры листов подходят для разных целей и создания распространенных конструкций, например, для стендов или для изготовления разных металлоизделий. В зависимости от точности прокатки устанавливается цена, на которую влияет и размер изделия, его толщина, тип взятой за основу стали. Если поверхность дополнительно покрывается слоем цинка или нержавеющим слоем, то стоимость может быть выше. Качественно изготовленный стальной лист имеет хороший эстетичный вид, прочный и не имеет никаких дефектов.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection