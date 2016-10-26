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
        <h1 class="welcome-text text-center">Рельсы железнодорожные</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Металлические балки, обладающие особой формой, представляют собой рельсы – с их помощью можно связывать пути для перемещения ЖД транспорта. Учитывая, что металлоизделие будет подвергаться постоянным нагрузкам, то его прочность в целом должна быть на соответственном уровне. В качестве металлической заготовки используется прочная сталь, которая одновременно отличается высоким содержанием углерода. Их крепление осуществляется при помощи шпал, а стоимость зависит от степени нагрузки и размера, от прочности и общего веса.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Производство рельсов</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Учитывая, что рельс является важной составляющей конструкции, то сила давления должна передаваться упруго. Изготавливается продукция не только по общепринятым внутренним стандартам, а и по соблюдению DIN, ISCR, BS11. В металлургической промышленности рельс металлический является самым распространенным изделием. Выполняет рельс как основную (образование путей на железной дороге), так и второстепенную роль (для прокладки подкрановых путей), в зависимости от которой и разделяется на виды:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">узкоколейный – укладываются в местах с ограниченной рабочей зоной;</span></li>
                    <li><span class="text-gray-16">железнодорожный – самый популярный вид, применяемый для изготовления стрелочных разветвлений, стандартных ЖД путей;</span></li>
                    <li><span class="text-gray-16">крановый – массивные рельсы, который могут укладываться в несколько рядов;</span></li>
                    <li><span class="text-gray-16">рудничный – используется в промышленных целях;</span></li>
                    <li><span class="text-gray-16">трамвайный.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Внешне металлоизделие напоминает металлическую балку со специальным сечением, которое позволяет распределять вес от подвижного состава. Производственные требования позволяют изготавливать рельсы для бесстыковых путей и для ширококолейных звеньев. Категории качества позволяют разделить продукт на несколько групп:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">термоупрочненные (Т1, Т2);</span></li>
                    <li><span class="text-gray-16">нетермоупрочненные (Н);</span></li>
                    <li><span class="text-gray-16">термоупрочненные высшего качества (В).</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Способ выплавки дает возможность изготавливать рельсы из электростали, а также из стали конвертерного или мартеновского типа. Отдельно оговаривается вопрос о наличие болтовых соединений на концах рельсы – они могут быть или нет. Основные факторы, на которые стоит обращать внимание: толщина шейки, высота рельса и шейки, ширина головки и подошвы. В выпуске встречаются рельсы мерной длины (12,5-20 м) или немерной (6-25 м).</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">В зависимости от нагружености железнодорожной магистрали могут выбираться рельсы из разного типа стали, который определяется по типу маркировки. На ценообразование влияет выбранная марка стали, а также основные параметры продукции (длина, масса и тип комплектации).</span>
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