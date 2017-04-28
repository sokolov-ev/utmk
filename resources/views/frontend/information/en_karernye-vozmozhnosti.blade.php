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
        <h1 class="welcome-text text-center">Career opportunities</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Metal products of UTMK meet international standards, therefore offers a wide range and quality for buyers and career opportunities for employees. The team of professionals employs educated people who improve their skills in accordance with changes in industry.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Driving forces of metallurgy</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Modern metal production can`t be made without relevant specialists, therefore, career opportunities in this direction plays a great role. Our company offers different perspectives in development, considering that the industry forecast of metallurgy has a positive future. The economy operates on the basis of existing mechanisms that are about to interact with the metal market.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The output of finished rolled products is constantly increasing in scale, and stability is a good quality, which affects the development of the company as a whole, and the development of specialists. It is necessary to be able to function and interact not only within the internal market, but also within the framework of the external market. The typical extraction of raw materials is accompanied with some fundamental changes that are tied to new products and technologies.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The world market won`t stop at the production of new equipment, which has effectively proved itself in the metal turnover system. But without proper specialists, any capacity will not be able to work as it should. Career opportunities in the metallurgical industry appear constantly, as it is necessary to continuously solve system-wide problems. The success of UTMK largely depends on the overall work of each professional, though the selection of specialists is thorough, and the training is constantly being improved.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-0">
            <span class="text-gray-16 text-justify">With the increase in sales volumes and access to the world market, the company set an initial task - to monitor the level of specialists and expand career opportunities. Dynamic changes that characterize modern trends in metallurgy, positively affect this picture. Experts can develop long-term development not only in the direction of developing and receiving raw materials, but also in the direction of design.</span>
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