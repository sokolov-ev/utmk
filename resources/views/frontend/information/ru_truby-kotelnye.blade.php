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
        <h1 class="welcome-text text-center">Трубы котельные</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Высокими эксплуатационными качествами обладают трубы котельные – они весьма широко используются в категории промышленного назначения и в сфере коммунальных сооружений. Для изготовления этих труб применяется специальная сталь, способная выдерживать высокое внутреннее давление и температуры. Отличаются трубы котельные профилем пустого сечения, а их заготовки изготавливаются из стальных листов легированного типа. Заготовки могут быть кованными или катаными, сверленными или не сверленными.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Трубы котельные: суть их выбора</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">В основе производства лежит процесс использования холоднопрессованной трубной заготовки (в редких случаях используется горячая перепрессовка). Тех. характеристики, которыми должна обладать трубная заготовка котельная, прописаны в ТУ и ГОСТ. Особую роль в этом случае играют температурные показатели и допустимое давление.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Сортамент этих труб определяется по толщине стенки и внешнему диаметру. С разницей в 2 м встречается длина мерная или немерная. Допускается изготовление труб длиной до 24 м. Комбинирование показателей диаметра стенок, толщины позволяет определить фактическую точность.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В зависимости от реальных условий эксплуатации можно встретить разный выбор марок стали:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">12ХМФ (жаропрочная стальная основа низколегированного типа);</span></li>
                    <li><span class="text-gray-16">20-ПВ (качественная сталь углеродистой разновидности, которая выплавляется в электропечи);</span></li>
                    <li><span class="text-gray-16">15Х5М (мартенситный вид стали с низколегированной разновидностью, трудносвариваемая);</span></li>
                    <li><span class="text-gray-16">15Х1М1Ф (ее рабочая граница – 585 градусов).</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В качестве основной характеристики можно считать диаметр, который тесно связан с типом труб котельных:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">горячепрессованные – толщина: 4-30 мм, 42-245 мм – диаметр;</span></li>
                    <li><span class="text-gray-16">горячекатаные – толщина: 2,5-80 мм (28-65 мм для отдельных марок), а диаметр: 32-465 мм;</span></li>
                    <li><span class="text-gray-16">тепло- и холоднодеформированные – толщина: 2-13 мм, а диаметр: 10-108 мм в пределе длины до 9 м или 12 м.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Все стальные трубы способны эксплуатироваться в режиме зашкаливающих температур и чрезмерного давления, а дымовые котельные трубы содержат в себе еще и антикоррозийные элементы. Промышленное использование этих труб постоянно расширяется – чему не стоит удивляться, так как сортамент металлоизделий совершенствуется и дает возможность применять их в разных неблагоприятных условиях. Причем, совершенствуют не только эксплуатационные параметры, но и эстетический вид.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection