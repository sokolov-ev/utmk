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
        <h1 class="welcome-text text-center">Our policy</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Our company is involved in the steelwork manufacturing more than one year, opening wide opportunities for delivery, cutting, and transportation. It is profitable business to buy steel goods with delivery on the official website, while spending a minimum of time.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">A reliable partner in the field of steel industry</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Our company offers a wide form range of the steel according to the technical characteristics variety. The work is based on such important components:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Urgent and high-quality execution of each order;</span></li>
                    <li><span class="text-gray-16">High quality control;</span></li>
                    <li><span class="text-gray-16">Flexible delivery conditions;</span></li>
                    <li><span class="text-gray-16">Manufacturing euro steel products;</span></li>
                    <li><span class="text-gray-16">Metal structures in a wide range;</span></li>
                    <li><span class="text-gray-16">Galvanized coils, modular structures, steelwork with affordable prices in the catalog.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Sustainable work is carried out not only due to high-quality equipment, but also regarding to the professional team service. Raw materials for production are selected carefully, and finished products are in demand not only at our market, but in Europe, where the cost is higher by several times.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Substantial price pressure on the foreign market triggered demand for Ukrainian products. The steel price made domestic metal products much more competitive. Considering steel constructions are one of the most important elements of building, they are used for the objects of different purposes. Products can have a structural or bearing capacity, depending on their size and shape. The quality of our steel products is checked by time, so the choice can be made with no doubt.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Compare to other marketing partners, UTMK Ukraine LLC has such advantages:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Efficiency</span></li>
                    <li><span class="text-gray-16">Energy conservation</span></li>
                    <li><span class="text-gray-16">Availability of goods</span></li>
                    <li><span class="text-gray-16">Reliability</span></li>
                    <li><span class="text-gray-16">Flexibility</span></li>
                    <li><span class="text-gray-16">Mobility.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The steel constructions which you are purchased from us are attractive and convenient and perfectly combined with new finishing materials.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">If it is necessary to cut metal for private individuals or construction companies, our company is ready to offer profitable services according to this direction. To solve these problems, special metal cutting machines are used, which help to produce the required product as soon as possible. In the course of manufacturing the European steel standards are used which allowed to create turnkey products with an optimal combination of prices and quality.</span>
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