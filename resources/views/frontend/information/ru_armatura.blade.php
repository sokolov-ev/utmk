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
        <h1 class="welcome-text text-center">Арматура для фундамента</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Свою роль в современной индустрии играет арматура для железобетонных конструкций, которая может быть неотъемлемой частью стальных элементов. В зависимости от нагрузок и воздействий рассчитывается необходимое количество арматуры. Ее элементы разделяются на гибкие и жесткие, которые используются в зависимости от особенностей применения.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Арматура как разновидность металлопроката</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Как цельные каркасы, так и стальные элементы представляют собой в совокупности арматуру, которая позволяет усилить конструкцию, увеличить ее прочность и снизить вес. Спектр ее применения не идет на спад за счет того, что не теряют актуальности такие преимущества, как прочность, надежность, гибкость, устойчивость.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Классификацию изделий проводят в зависимости от профиля, способа производства и направления применения. Наиболее часто встречается разделение на проволочную, холоднокатаную, стержневую. С целью максимально эффективного использования подвергают изделия термической обработке или другим подходящим способам усовершенствования. Некоторые методы позволяют изменять структуру металла, другие же, наоборот, укрепляют действующие свойства, продлевая срок эксплуатации. Благодаря постоянному совершенствованию можно достигнуть существенной экономии и повысить эффективность использования конструкций, состоящих из арматуры.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Высокое качество арматуры оптимально сочетается с отличной ценой, а широкий сортамент позволяет решать разные вопросы с использованием данного вида металлопроката. Для изготовления того или иного вида арматуры берется за основу специальная сталь, которая обладает достаточными прочностными и пластическими качествами. Профиль арматуры может быть гладким или рефленным (имеет хорошее сцепление с бетоном).</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">В зависимости от назначения встречается распределительная, рабочая и монтажная арматура. Первый вид предназначен равномерно распределять усилия и препятствовать смещению во время бетонирования. Второй вид выдерживает разные усилия и упрощает совместную работу с другими конструкциями. Последний вид арматуры служит напрямую для сборки каркаса, но может играть роль и распределительных элементов. А в продаже встречаются разные виды изделий: сетки, каркасы, арматурные стержни – к использованию тех или иных прибегают исходя из объемов работ.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection