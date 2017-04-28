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
        <h1 class="welcome-text text-center">Delivery</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Have you decided to purchase the metal goods via online-store? You make the right choice as from the price factor, as from the wide selection.  UTMK offers advantageous delivery of metal products throughout Ukraine. The company cooperates with the best shipping companies; therefore they can offer the best way for loading, considering the needs of the customer and with minimum expenses of money resources.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <div class="wow fadeInUp">
                <span class="text-black-h3 center-block">Delivery to any part of the country</span>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">A wide range of metal products may interest both private individuals and individual companies - for all customers UMTK will organize convenient way of delivery. Considering the sale is made directly from the manufacturer, the quality is monitored at every level, from the manufacturing phase to the packaging stage. Delivery is about to be made on appropriate level, so you can purchase the products in the required quantity. </span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Long-term cooperation of UTMK with the shipping companies makes it possible to guarantee a safe transportation at an affordable price. Initial cost of metal sheets can be calculated together including delivery, if the self-export isn`t possible to made. Paid products are usually sent on the next day according to a well-known scheme.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Delivery of rolled metal is included in the range of such services, which are not so strictly regulated by technical standards maintained by the Euro-Asian Council for Standardization - all responsibility is to be taken by the manufacturer during its existence, UTMK has not let any customers down – it is the greatest evidence of well-coordinated and thoughtful work. We are entrusted with the delivery of metal products by both large companies and regular customers with whom we have established a mutually beneficial relationship.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Delivery is held by road with closed /open areas. For certain types of metal goods, additional requirements can be established to maintain quality at the highest level. Before the direct loading of the goods all is checked by government standard number 26653.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">UTMK metal goods are delivering directly from the warehouse to the city, specified by the client when ordering the products. Delivery is organized for small orders, for retail and wholesale customers. Regardless of the volume of the ordered lot, the terms are observed in the order of the order of payment and number. Metal goods can be delivered directly to the construction site. Transport services are available on weekdays and are held right after the contract is signed.</span>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".services").addClass('active');
    </script>
@endsection