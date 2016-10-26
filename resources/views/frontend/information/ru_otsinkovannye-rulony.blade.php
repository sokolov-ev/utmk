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
        <h1 class="welcome-text text-center">Оцинкованная сталь в рулонах</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="wow slideInLeft">
                <span class="text-gray-16 text-justify">В направлении промпроизводства стали весьма популярными оцинкованные рулоны – они в отличие от обычных стальных листов имеют особое защитное покрытие от коррозионного воздействия. Цинковый слой обеспечивает не только электрохимическую, но и защиту физического типа за счет того, что обладает неизменной адгезией.</span>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-2-2">
                    <span class="text-gray-16 text-justify">Чтобы не допускать физический контакт с окружающей средой создается защитный барьер, который даже в точках нарушения покрытия (царапины, деформации) действует на продления срока эксплуатации. Солевые компоненты цинка защищают всю поверхность, начиная от краев листа и заканчивая внутренней стороной. Не трудно понять, что чем толще будет слой цинка, тем и дольше способен прослужить материал.</span>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="wow fadeInRight">
                <div class="padding-block-0-2">
                    <img class="green-img center-block" src="/images/information/metallokonstrukcii-012.jpg" alt="" title="" style="max-width: 500px;" />
                </div>
            </div>
        </div>
    </div>

    <div class="wow slideInUp">
        <span class="text-gray-16 text-justify">К электрохимической защите прибегают, если оцинкованные листы планируют использовать во влажном окружении. Разрушение во времени после такой обработки происходит с существенным замедлением, учитывая, что цинк активное соединение, нежели чем стальная основа.</span>
    </div>

    <div class="padding-top"></div>
</section>

<section style="background-color: #eeeeee;">
    <div class="container">

        <div class="padding-top"></div>
        <div class="wow fadeInRight">
            <div class="padding-block-0-2">
                <h2 class="welcome-text text-center">Оцинковка в рулонах – удобно и недорого</h2>
            </div>
        </div>
        <div class="padding-top"></div>

            <div class="wow slideInLeft">
                <span class="text-gray-16">В зависимости от реализованной партии листы оцинкованной стали можно разделить на группы по назначению:</span>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-1-2">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">I (холодная штамповка);</span></li>
                            <li><span class="text-gray-16">II (изделия для окраски);</span></li>
                            <li><span class="text-gray-16">III (профилирование холодного типа);</span></li>
                            <li><span class="text-gray-16">IV (назначение общего характера).</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wow slideInLeft">
                <span class="text-gray-16">Покрытие может быть одностороннее или двух- с толщиной 0,5-1,2 мм, а шириной не более 1250 мм. Обработанная оцинковка выдерживает вальцовку, гибкие воздействия, штамповку, вытягивание и другие нагрузки. Неизменные технические параметры позволяют использовать оцинкованные рулоны не в одной сфере:</span>
            </div>

            <div class="wow slideInLeft">
                <div class="padding-block-1-2">
                    <div class="metall-list orange-list">
                        <ul class="list-unstyled">
                            <li><span class="text-gray-16">строение вагонной промышленности;</span></li>
                            <li><span class="text-gray-16">направление бытовой техники;</span></li>
                            <li><span class="text-gray-16">автомобилестроение;</span></li>
                            <li><span class="text-gray-16">приборостроение;</span></li>
                            <li><span class="text-gray-16">промышленное или жилстроительство;</span></li>
                            <li><span class="text-gray-16">как сырье для облицовочной или другой поверхности.</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wow fadeInLeft">
                <span class="text-gray-16 text-justify">Использовать строго понятие оцинковка или оцинкованные рулоны нет смысла, так как за этим материалом закрепились еще такие названия, как оцинкованная сталь в бухтах, сталь рулон оцинкованный и прочие. Широкое применение обуславливается прочностью, легкостью, стойкостью к коррозии и другим физическим воздействиям. Предлагаются в продаже не только чистые оцинкованные листы, а и с новым полимерным покрытием, которое дает более широкие возможности в применении за счет расширенного срока службы, стабильных свойств и эстетического вида. Изготовление листов происходит по ГОСТу от начальной и до конечной стадии.</span>
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