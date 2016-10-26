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
        <h1 class="welcome-text text-center">Профиль Z -образный</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Гнутые и каркасные профили все шире используются в рамках нынешнего строительства, и Z-образный профиль не является исключением. Изготавливаются такие металлоизделия в результате интенсивного деформирования стальных листов на профилепрокатном станке. В процессе постоянно соблюдаются все требования регламента, гарантирующие неизменное качество.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Сигма профиль как элемент современной металлоиндустрии</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Название изогнутого профиля происходит из символа буквы, которую он образует. Зетовый или сигма профиль соответствует ГОСТУ 13229-78. Может быть как неравнополочный, так и равный с шириной выступов до 110 мм. Высота профиля варьируется в диапазоне 40-340 мм, толщина до 6 мм.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Производство Z-образного профиля не регламентируется строго производственными условиями, поэтому процесс заготовки происходит согласно нормированным ТУ и рекомендациям заказчика. Изготовление изогнутых профилей происходит из таких исходных марок стальных листов:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">обыкновенного или высокого качества;</span></li>
                    <li><span class="text-gray-16">конструкционно качественные;</span></li>
                    <li><span class="text-gray-16">повышенной прочности.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">С целью увеличения периода службы сигма профиля используются оцинкованные листы металлопроката, которые надежно защищают конструкцию и наделяют ее коррозионной устойчивостью. Высокой защитой считается покрытие не тоньше слоя 275 г/кв.м.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Использование Z-образного профиля имеет свои преимущества:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">неограниченная сфера применения;</span></li>
                    <li><span class="text-gray-16">нет привязанности к атмосферным воздействиям;</span></li>
                    <li><span class="text-gray-16">скорость возведения разных конструкций;</span></li>
                    <li><span class="text-gray-16">ускорение процесса дает экономический эффект;</span></li>
                    <li><span class="text-gray-16">не подвергается воздействию грибков или насекомых;</span></li>
                    <li><span class="text-gray-16">транспортные расходы минимизированы за счет компактности изделий;</span></li>
                    <li><span class="text-gray-16">рабочие операции можно проводить всесезонно.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">С помощью этого профиля можно значительно увеличить степень прочности конструкции при ее относительно небольшом весе. Его применение актуально в создании помещений ангарного типа, а также в промышленных и жилых объектах. В сравнении с обычным металлом, Z-образный профиль снижает нагрузку на периметр фундамента, экономит разные затраты и увеличивает скорость возведения и сам процесс монтажа упрощается.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Общая цена зетового профиля привязана к толщине и размерам используемого металла, и к его заложенным характеристикам. За основу для производства взята технология холодного проката, позволяющая использовать Z-образный профиль даже в несущих перекрытиях скатной крыши.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection