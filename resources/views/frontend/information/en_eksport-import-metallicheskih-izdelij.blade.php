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
        <h1 class="welcome-text text-center">Export and import of metal products</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">A license to export metal from trusted partners is encouraged, which are not limited to selling their products and within the domestic market. Export and import of metal products are subject to stringent requirements established for the purpose of quality control.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Foreign trade balance</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Successful ratio of imports and exports directly affects the volume of products of our enterprise. A stable position on the metal goods market makes it possible to form a favorable picture. Export of metal products of our company increases gradually, considering that the import was established several years ago. Metal rolling is divided into groups, each of which falls under a certain category and standards.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Export volumes are improving - the quality of products is evaluated not only by domestic consumers, but also imported. The countries of Europe do not surprise with a wide assortment and good quality, but it is not always possible to find an acceptable price. Purchasing metal products in our company can be possible usingthe standard catalog or order required products according to your purposes.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Finished metal products on the market are chosen in different volumes, considering that the price is acceptable for the domestic market and for foreign buyers. Use high-quality metal products for all purposes, without worrying about its technical characteristics. Our clients can buy environmentally friendly raw materials, which are made from pure metal base, to withstand even non-standard operating conditions.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The sale of metal products abroad is a new direction in which the company is trying to keep to the best of its capabilities. Foreign trade projects consist of large and small shipments organized by common forces. Legal sale of ferrous metals is constantly maintained and steadily paves its way thanks to constant quality, good production volumes and a justified pricing policy.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Metal exports are delighted by the dynamics of consumption growth in different regions: somewhere there is a dependency to erect enclosing structures, some places require support materials, and somewhere the steel roof/floor desk usage is a priority. Rolled metal goods are distributed in all local markets, and in the arena of world exports, interested in certain types of goods due to the low price rates. All these features have a significant impact on long-term cooperation with important sales markets.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection