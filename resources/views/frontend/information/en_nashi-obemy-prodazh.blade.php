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
        <h1 class="welcome-text text-center">Our sales volume</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The UTMK metal range consists of wide kinds of products, which are honed in the factory conditions strictly according to a GOST. All metal products are classified by types, profiles, brands, sizes. The assortment of the rolled steel is replenished, so the sales volume is in demand and increase all the time.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Metal sales in any quantity</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The company's integrated catalog contains all the products that are offered for sale. The metal is delivered in any quantity according to any address with a preliminary calculation of all transportation costs. The delivery volumes affects on the geometric parameters, like length, width and height per one time we can carry a different quantity of metal due to this characteristic.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Вес одного сортового изделия умножается на партию и таким образом определяется общая масса заказанной партии, что влияет на транспортные расходы. Габариты любого металлопроката определяются не трудно, так как для этих целей не нужно использовать сложные формулы и совершать много подсчетов. Фактический вес указан в каталоге и он отличается от теоретического, который регламентируется стандартом. Погонный метр арматуры отличается от погонного веса прямоугольного профиля или швеллера – это зависит от того, из каких марок стали изготавливается изделие.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The weight of a sorted item is multiplied by the lot and thus the total weight of the ordered lot is determined, which affects on transportation costs. The dimensions of any rolled metal products are so easy to identify. As for these purposes you do not need to use complex formulas and perform many calculations. Actual weight is specified in the catalog and it differs from the theoretical part, which is regulated by the standard. The long meter of debars differs from the weight per unit length by the rectangular-section or U-channel. It depends on steel grades which the product is made of.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The metal product weight is affected by the production method, so the same dimensions can differ in weight from other companies. You can order metal in any volume, relying on your own needs. What about the base? So you should take into account mass per meter length. It is not a good idea to calculate the mass according to the manual, since many factors affect on the deviations from the theoretical indices. UTMK refers to one of the conscientious rolled metal product manufacturers and provide wholesale and retail sales. On-line consultants will calculate not only the cost of products, but also the price of delivery. Any customer can calculate the metal batch costs using known data. Delivery is carried out on convenient terms with a full range of services (packaging, temporary storage, gentle care transportation). The ordered goods in any quantities will be delivered to the final destination without any additional expenses. During placing an order, only real weight is taken into account, so the customer does not pay extra money.</span>
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