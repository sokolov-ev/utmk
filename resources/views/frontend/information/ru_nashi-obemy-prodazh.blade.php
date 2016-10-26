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
        <h1 class="welcome-text text-center">Наши объемы продаж</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Сортамент металла ЮТМК состоит из обширного ряда изделий, которые оттачиваются в заводских условиях строго по ГОСТу. Все металлоизделия классифицируются по видам, профилям, маркам, размерам. Сортамент компании металлопроката постоянно пополняется, поэтому объемы продаж увеличиваются и неизменно пользуются спросом.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Продажа металла в любых объемах</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">В едином каталоге компании собраны все изделия, которые предлагаются к продаже. В любом количестве металл поставляется по адресу с предварительным расчетом всех транспортных расходов. На объемы поставок влияют геометрические показатели, то есть, длина, ширина и высота – за один рейс можно провести разное количество металла из-за привязанности к этим характеристикам.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Вес одного сортового изделия умножается на партию и таким образом определяется общая масса заказанной партии, что влияет на транспортные расходы. Габариты любого металлопроката определяются не трудно, так как для этих целей не нужно использовать сложные формулы и совершать много подсчетов. Фактический вес указан в каталоге и он отличается от теоретического, который регламентируется стандартом. Погонный метр арматуры отличается от погонного веса прямоугольного профиля или швеллера – это зависит от того, из каких марок стали изготавливается изделие.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">На вес металлического изделия влияет и метод, который применялся для его изготовления, поэтому одинаковый сортамент разных компаний может отличаться по весу. В любых объемах можно заказывать металл, опираясь на свои потребности, а за основу стоит брать массу одного погонного метра. По справочникам массу рассчитывать не полностью правильно, так как многие факторы влияют на отклонения от теоретических показателей.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">ЮТМК относится к добросовестному производителю металлопроката и предлагает продажу оптом и в розницу. В режиме онлайн консультанты просчитают не только стоимость изделий, но и цену доставки. Любой клиент может и самостоятельно просчитать, во сколько ему обойдется партия металла, используя известные данные. Доставка предлагается на удобных условиях с полным спектром сопровождаемых услуг (упаковка, временное хранение, бережная транспортировка). Товар, заказанный в любых объемах, будет в целостности доставлен в пункт назначения без сторонних затрат. При оформлении заказа в расчеты берется только реальный вес, поэтому клиент не платит лишних денег.</span>
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