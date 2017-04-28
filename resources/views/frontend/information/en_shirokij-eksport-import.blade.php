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
        <h1 class="welcome-text text-center">Wide export / import in the world</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">UTMK improving products is constantly engaged by expanding the possibilities of import / export. The sale of metal is carried out all over the world and covers the EU, Georgia, Belarus, Turkey, more than 100 countries and regions in sum. </span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Actual business relationships provide returns for customers of different budget categories. The company strives to solve the common task of quality and service. The purchase and sale of rolled metal is carried out within the new economic conditions, both on physical and on-line sites. The final quotations for the products consist of stable indicators, such as unchanged quality and regularity of supply.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The increased pace of construction positively affects the demand of metal, in particular, in large cities. There is activity both in industry and in machine building. There are separate categories in the metal industry, which are in great demand in a different percentage. Stable investment and consistency in procurement sales structure are the most important, that`s the secret ofthe first position in the market.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Company profile</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The UTMK Company stably holds on several directions:</span>
    </div>

    <div class="wow slideInRight">
        <div class="padding-block-1-2">
            <div class="metall-list orange-list">
                <ul class="list-unstyled">
                    <li><span class="text-gray-16">Our volumes. From the point of view of annual turnover, all production lines confidently increased sales volumes with a loyal price limit.</span></li>
                    <li><span class="text-gray-16">Reliable cooperation. As for private entrepreneurs, as well as individual companies in the metallurgical industry open up favorable conditions for cooperation - the desire to be the absolute leader does not take away.</span></li>
                    <li><span class="text-gray-16">Sustainable development. We are not going to retreat from the planned distance, as we understand how important it is to supply a quality product to the market and not disappoint partners.</span></li>
                    <li><span class="text-gray-16">Career opportunities. The company takes over the experience of other countries, improving its professional skills.</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Unlike other industries, the metallurgical industry is relatively well developed on the domestic market - its products have good potential. Despite the fact that prices stabilize abroad, Ukrainian products are in demand and do not lose junctions with their import partners. This positive circumstance for our company allows us to maintain the volume of purchases, the prospective price, without destroying the established system.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection