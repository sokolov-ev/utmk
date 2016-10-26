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
        <h1 class="welcome-text text-center">Швеллер</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Среди многих несущих элементов отдельное место занимает швеллер, напоминающий в разрезе букву П. Используется этот элемент из металла в строительстве каркасов, перегородок и других конструкций, построенных по стержневой схеме.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Небольшой, но такой необходимый элемент</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Швеллер получается в результате плавления черных металлов или стали легированного типа. Его длина по стандарту находится в рамках 2-12 м, но по спецзаказу можно изготавливать и более длиные швеллера. Преимуществом изделия является его жесткость и устойчивость, обеспечивающие безопасную эксплуатацию и укрепление конструкций. Подходящие геометрические особенности позволяют использовать швеллер для разного назначения.</span>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Кроме основных видов (жгутные, горячекатанные, низколегированные), разделяется швеллер и на другие серии:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">экономичные (Э);</span></li>
                    <li><span class="text-gray-16">с уклоном граней внутри (У);</span></li>
                    <li><span class="text-gray-16">легкие (Л);</span></li>
                    <li><span class="text-gray-16">специальные (С);</span></li>
                    <li><span class="text-gray-16">параллельные (П);</span></li>
                    <li><span class="text-gray-16">для вагоностроения (В);</span></li>
                    <li><span class="text-gray-16">тракторные (Т).</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Производство каждого вида швеллеров строго налажено за счет того, что полностью отвечает требованиям ГОСТа. Формовка изделий происходит либо способом прокатки, либо формовкой изгибов. Разделить назначение швеллера можно исходя из взятого материала для основы, будь то конструкционная, низколегированная, углеродистая сталь. В зависимости от направления пологов различают неравнополые и равнополые, а также гнутые и горячекатанные. По показателю длины швеллера классифицируют отдельно: кратные, мерные и немерные.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В общей маркировке встречаются следующие обозначения:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">У (с наклоненными гранями);</span></li>
                    <li><span class="text-gray-16">П (равнополые);</span></li>
                    <li><span class="text-gray-16">С (выполненные по спецзаказу);</span></li>
                    <li><span class="text-gray-16">Л (легкие, предназначенные для меньших нагрузок).</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Качество швеллера напрямую связано с его стоимостью, которая захватывает и другие количественные факторы (размер, номер серии, расположение полок). Самыми популярными видами считается швеллер номер 10, 14, 20.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Швеллер 10 часто встречается в строительной сфере, а также в отдельных направлениях промышленности, в станкостроении. Благодаря своим высоким механическим свойствам, может использоваться в качестве несущей опоры. Для жесткого армирования стен профессионалы рекомендуют остановить выбор на швеллере номер 14 – он может придать дополнительную жесткость и требуемую прочность всей конструкции. А швеллер 20 не будет лишним во всевозможным видах перекрытий, а также для усиления опор, несущих элементов.</span>
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