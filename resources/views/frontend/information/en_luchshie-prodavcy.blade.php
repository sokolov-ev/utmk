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
        <h1 class="welcome-text text-center">The best sellers</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Only time is able to single out leaders who work in unison and do not extend away from principles among the crowd. In every particular case it uses the own recipe to attract the sales, and this is permanent good quality, client-oriented approach, decent service.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Our sales are customer-focused.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Reasonable sales plans are based on the cycle time of the product, which is delivered in the different volumes. Each item from the catalog has the same quality, but as for demand so it is different. This is a natural process according to which you must know how to manage it. Our company manufactures products in the percentage regarding request on the market (at the same time the domestic and foreign markets have the different needs). Our work would not show results without constant calculations, statistics, and customer references and even helps the criticism of competitors in this case.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">We apply deep knowledge in our business and reward not only employees, but also regular customers. UTMK offered buyers no-cost consultation and qualified help in the right product searching. What about high quality, operation safety and certified products so those indicators do not change for years. If we face with the problems, then we overcome them by combined efforts (the current crisis situation on the market is an example).</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">In the sales result increasing it is important not only the quality of the product, but also by the quality of service that we try to provide to both like major partners and private customers. Every opinion is turned out so important for our company, so there are no distinctions and prepossession. In the same way that the company takes care of its employees, it also cares about customers. High sales are the real reward for us, as well as many positive reviews. Of course it is possible to achieve just by joint efforts.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Looking at the annual calculation the production lines increased sales volumes. This fact indicates a successful growth in all major markets. The index equaled 13, 547 million this year, and in the previous year it was 12, 128 million taking into account that detrimental effect of 417 million exchange rates. Our staff is a team of successful professionals who do not go out of business by fabricated problems and reports, because just intensive work always provides results but not the bureaucracy.</span>
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