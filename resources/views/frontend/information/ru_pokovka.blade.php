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
        <h1 class="welcome-text text-center">Поковки</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">В свободной форме изготовляются поковки металлические, будь то кольцо, прямоугольная заготовка, круг и другие ковки металла. Производство осуществляется посредством горячей ковки или штамповки – этот процесс позволяет создавать нужную форму. Выбирается стальная основа в качестве главного исходного компонента, она может быть разной, на что влияет тип применения изделия.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Поковки, изготовляемые по ГОСТу</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Несмотря на то, что поковки могут иметь разную форму и массу, они в обязательном порядке изготавливаются по стандарту, который учитывает уровень прочности и надежности. В таких сферах, как автомобильная и металлургическая промышленность, поковки из стали являются довольно востребованными. Их механические свойства полностью противостоят ударной нагрузке и возможному напряжению.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Встречаются такие поковки:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">прессовые (изготавливаются штамповкой);</span></li>
                    <li><span class="text-gray-16">особой прочности;</span></li>
                    <li><span class="text-gray-16">углеродистые;</span></li>
                    <li><span class="text-gray-16">инструментальные;</span></li>
                    <li><span class="text-gray-16">молотовые (создаются кузнечно-прессовым способом);</span></li>
                    <li><span class="text-gray-16">нержавеющие;</span></li>
                    <li><span class="text-gray-16">легированные.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Поковки представляют собой черновую деталь или промежуточную заготовку, которая максимально приближена к форме конечного изделия. Отличается этот вид металлопроката тем, что имеет малые припуски на обработку, а создаются изделия ковкой или же кузнечно-штамповым способом. С помощью поковок можно сократить время на черновую обработку и сэкономить таким путем время, энергию и основной ресурс (материал).</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Для создания поковок используется специальный метод, позволяющий обрабатывать изделия под давлением и высоких градусах – такие условия позволяют придавать металлопродукту разные формы и влиять на другие параметры. Поковки создаются разных конфигураций, а применять их можно не только в производстве различных заготовок, а и в приборостроении, в машиностроении. Форма поковок начинается от круглых и заканчивается квадратными и прямоугольными сечениями (последние самые распространенные).</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Налаженная отливка поковок позволяет удалять пустоты и неровности, варьируя свободным положением металла. Большей точностью обладает штампованная ковка, а кованный способ выбирается, если требуется сделать ставку на прочности и пластичности. Изготовление на заказ поковок позволяет создавать заготовки различные по размерам и маркам стали, делая изделия максимально построенными под персональные требования.</span>
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