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
        <h1 class="welcome-text text-center">Швеллер гнутый</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Из стальных листов в широком разнообразии изготавливают разные профили, среди которых отдельное место занимает гнутый швеллер. Его назначение – воспринимать существенные нагрузки, которые равномерно распределяются удачно подобранной П-образной форме.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Швеллер гнутый: важные характеристики</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В зависимости от метода изготовления выделяют разные виды гнутого профиля:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">общего и специального назначения;</span></li>
                    <li><span class="text-gray-16">катаные под низкими температурами;</span></li>
                    <li><span class="text-gray-16">катаные под высокими температурами;</span></li>
                    <li><span class="text-gray-16">равнополочные гнутые;</span></li>
                    <li><span class="text-gray-16">неравнополочные гнутые.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Каждый вид гнутого швеллера производится на специальных станках, которые точно отсекают изделие по размерам. Точность гнутого профиля разделяется на обычную и высокую с соответственной маркировкой: В и А.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">В качестве основных показателей можно выделить:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">полку и ее значение ширины;</span></li>
                    <li><span class="text-gray-16">значение полной высоты швеллера;</span></li>
                    <li><span class="text-gray-16">значение радиуса закругления;</span></li>
                    <li><span class="text-gray-16">глубину стенки.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Использование гнутого швеллера не идет на спад за счет того, что можно снизить общую массу конструкции – это в результате даст экономию порядка 30-ти процентов всего используемого металла. У каждого изделия есть свои характеристики высоты, ширины, толщины – они устанавливаются по стандарту. Если требуется заказать нестандартный швеллер, то вопрос решается в индивидуальном порядке.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">Отдельно можно отметить сильные стороны швеллера гнутого:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">возможность совместимости с другими металлоизделиями;</span></li>
                    <li><span class="text-gray-16">малый вес;</span></li>
                    <li><span class="text-gray-16">выдерживает давление на изгиб;</span></li>
                    <li><span class="text-gray-16">большое осевое давление воспринимается легко;</span></li>
                    <li><span class="text-gray-16">высокая точность;</span></li>
                    <li><span class="text-gray-16">отсутствие сварки;</span></li>
                    <li><span class="text-gray-16">гладкий металл.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Процесс производства швеллера не содержит сложных манипуляций: плоский лист помещается на профилегибочный станок и преображается в гнутое изделие необходимой формы. Способ удобен тем, что можно брать для изготовления разные виды металла, в частности, сталь конструкционного, низколегированного или углеродистого образца.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Швеллер гнутый идеально сочетается в себе два основных показателя: простую установку и прочность. Существующие нормы 8278-83 и 8281-80 выставляются для равнополых и неравнополых изделий. В строительной сфере швеллер «гнутик» может быть основой для кровли, каркаса, перегородок, а также играет свою роль и в реконструкциях сооружений, в монтаже коммуникаций и прочем. Даже в домашнем хозяйстве гнутый профиль может пригодиться, например, для сборки каркаса теплиц.</span>
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