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
        <h1 class="welcome-text text-center">Cutting</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The cutting of the ordered rolled metal is carried out according to the indicated dimensions. Cutting is carried out before the final formation of the order. This service is chosen both by ordinary buyers and by businessmen.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The cutting of metal allows you to create work pieces with the exact setting of the shape and length. The process is carried out in various ways, which are chosen depending on the benefits of the proposed service. Under the processing can get as large sheets, and oversized metal products.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The need to use metal products of different sizes has expanded the range of cutting services with the possibility of creating the necessary forms. Each order is executed precisely with minimal time losses without the formation of scale, acute section and other defects; these results can be achieved by using the correct selection of tools and the appropriate method.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">All modern cutting methods allow economical cutting of metal without the need for further processing. The service can be ordered both for mass use and for cutting metal in small quantities.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-black-h3 center-block">All kinds of modern cutting</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Considering that UTMK has a high-quality rolled metal product in large quantities, the cutting all consumers are interested in it. The size is selected in multiples to a precision measurement - 8 m, 10 m, and 12 m and so on.</span>
        </div>
    </div>

    <div class="wow slideInRight">
        <span class="text-gray-16 text-justify">At the metal base, cutting is offered in several forms:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Band saw - It is placed in the front rows due to high precision and cutting speed due to the use of band saw machines;</span></li>
                    <li><span class="text-gray-16">Press-scissors cutting - It’s chosen in case metal raw part of the precision size (this method saves time, money and material);</span></li>
                    <li><span class="text-gray-16">Volcanic cutting - It reduces the consumption of metal and enables easy and affordable cutting.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The cutting of metal sheet is carried out according to an individual order of the customer with a minimum amount of waste. The orders are accepted for cutting own metal goods or products of other manufacturers. The cost is calculated in the certain circumstances. To additional metal processing services are included bending and rolling, which are also offered at UTMK Company; for the purpose of improving the appearance without changing the quality of the metal profile. Short terms of manufacturing + high speed of work + low cost - all this aspects the customer receives due to the reference to our company.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".services").addClass('active');
    </script>
@endsection