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
        <h1 class="welcome-text text-center">Our product quality control</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">High competition forced our company to look for new ways to success, though the individual quality of the products system has been developed.  Including each needs of consumers, strict quality control has been developed, which not only improves solid position on market but also establishes the success of the whole enterprise.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Quality management of metal products is in full control of specialists</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">All products undergo strict quality control, which is installed in accordance with legal standards. The key to success was expanded trade, which is not limited to our country. The status of the leader is also formed at the work of specialists - they monitor the rapid development and change in the market situation and control the quality to the maximum.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Quality control of finished products made of metal allows our company to occupy a worthy place in the economic sector of the country and on the world stage as well. In accordance with its purpose, metal products are capable to cope completely. Specifications and technical documentation in the quality assessment ranked first, while for ordinary consumers the presence of a particular group of properties and functional significance is equal to the specified essential characteristics. Mass production of products is ensured without disrupting the process ability, and the rational distribution of material costs allows you to keep the price indicator at an affordable level.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">As a result, the technological control of product quality positively affects performance, price, and assortment. The catalogs of the company offer not only standard, but also unified parts that represent a pure product. The required level of quality is the cost / performance ratio. The stages of quality control of products pass within the established limits and are periodically subject to a flexible change.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The life cycle of our metal products is developed in accordance with the objectives of product quality control. Influence is exercised during development, transportation, storage and consumption. As a result, the products are usable for subsequent repairs, reliable and in-demand.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The essence of product quality control penetrates into each stage, providing a useful effect not only in normative documentation, but also in practice. Formation of new requirements is smooth in accordance with technical progress.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection