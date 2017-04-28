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
        <h1 class="welcome-text text-center">What's new?</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">As for product range so it will not be a surprise to anyone, but regarding the good customer service, so it may not be provided by all companies. A high level of customer satisfaction indicates the product of this brand is worthy of attention. For customers is important not only quality, but also quality of service. This is a kind of theorem.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Our main goal is to satisfy all customer needs</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Throughout all stages of cooperation we provide customer satisfaction in a range of important indicators, since this indicator assesses the quality of products objectively and service of the company. From the placing order and till purchasing, the buyers have fully carried out all the fixed actions, including consultation, recommendations and delivery assistance. Not every customer knows exactly what he wants to buy and he needs the expert assistance.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Throughout all stages of cooperation we provide customer satisfaction in a range of important indicators, since this indicator assesses the quality of products objectively and service of the company. From the placing order and till purchasing, the buyers have fully carried out all the fixed actions, including consultation, recommendations and delivery assistance. Not every customer knows exactly what he wants to buy and he needs the expert assistance. This approach is inspired buyers to place the orders again and again. </span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">When the product range is updated the consumers do not always notice these changes. Our company is ready to interest customers by attractive price and offer the quality of products that are rarely found on the domestic market. Valuable proposals complement the high importance of each. After using our online store and cooperation with sales professionals the customers say with a smile: "I am pleased with shopping and service", "I will be happy to contact again", "The purchase was exceeded my expectations." All these words are confirmed by years of practice and renewal of service. The client's satisfaction is positive emotional state in common, where we are going to obtain. A wide range of options is another important indicator that we use in our practice. It means the company performs various approaches of management to achieve a balance between the desired purchase and the real one.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Time has proved that our company is a competent and reliable partner who assists each customer with advice and support. Customer satisfaction is a main goal for the whole company and definitely for the sales department. A dealer network was created to achieve high result not only for the local market. The image of the company transforms from year to year for customers, but the parameters of customer satisfaction remain pleased.</span>
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