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
        <h1 class="welcome-text text-center">Sustainable Development as a Goal</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-gray-16 text-justify">Sustainable development is able to meet the demand of customers at present time, without challenge for their own principles.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">It is based on two main ideas:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Customer needs are the point of the first-order decision;</span></li>
                    <li><span class="text-gray-16">Environment limited impact but the same time in accordance with present and future human requirements.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-0-2">
            <span class="text-black-h3 center-block">Satisfying needs at the steel market</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Considering metal is important for Society not only as a material, but also as a profit, so new ways of processing and application are always being opened. For our company sustainable development is the main goal, which includes several more tasks, such as assortment replenishment, reasonable prices and constant quality criteria.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The metal consumption level annually varies and it is certainly satisfied. Cooperation with our company provides quality and sustainability guarantees. The orders are executed constantly regardless of the circumstances. Many companies and private customers have accepted UTMK as a reliable partner and they have not done their shopping in other places.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The metal market is not only quantity but also consumers are attracted by stable prices, and the best metal products, and the constant differential and quality raw materials base. UTMK Company can offer all of these items. We rationally use natural resources, getting a green-labeled product. Result-oriented planning, sustainable development and support of partners in the domestic and foreign markets lead to the production of quality steel goods.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">We possess the best equipment and tools which don’t consist any ecological conflicts, and with their help you can maintain a real price, changing it depends on the budget level. Finished metal products are aimed at the improving consumers’ life, preserving the biological situation, and reducing the amount of waste.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Sustainable development is a complex goal and it is supported by various factors: social, economic, informational, and international. All existing contradictions which arise on the way of the rolled metal production and at all levels of technological processing are duly smoothed out and do not affect the development and output of products.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection