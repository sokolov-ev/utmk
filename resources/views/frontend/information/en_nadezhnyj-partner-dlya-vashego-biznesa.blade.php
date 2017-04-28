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
        <h1 class="welcome-text text-center">Reliable partner for your business</h1>
    </div>
    <div class="padding-top"></div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Unlike reinforced concrete raw materials, bricks, gas blocks, metal is considered economically advantageous, as it shortens construction time and reduces operating costs. If the product is designed in accordance with building codes and with a focus on safety and reliability, the requirements of each project will be met to the maximum.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-black-h3 center-block">Quality and inexpensive metal is what you choose</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">The active work in the development of steel structures is carried out by specialists of UTMK Company. A multi-grade metal is produced using equipment and 100% quality raw materials. If it`s necessary, non-standard products can be ordered by selecting a suitable length or width. Now you can make sure that the metal structures fully meet your requirements and government standards. Special coatings are used to protect the environment; soon extensive range allows you to make purchases for your budget.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">Metal is quickly mounted material (advantageous for modern construction), it has a light weight (often used for frame structures, partitions) and corresponds to Snip, as well as fire safety restrictions. At any stage of construction or in the industrial sphere, products from high-quality metal are used.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">Metal products are tested and are able to with stand the loads that are imposed on them. The choice can be made quickly; as the products are delineated by category. The current prices will be prompted by specialists, as soon as the customer will make the choice. Various opportunities for a profitable acquisition are supplemented by acceptable characteristics, given that different manufacturing methods are used.</span>
    </div>

    <div class="wow fadeInUp">
        <div class="padding-block-2-2">
            <span class="text-gray-16 text-justify">The market welcomes the new refill and competitive price - that's why UTMK isn`t on the last row. Quality is dictated by the generally accepted rules, so that metal can introduce both simple and complex in design.</span>
        </div>
    </div>

    <div class="wow fadeInUp">
        <span class="text-gray-16 text-justify">UTMK is a reliable partner for your business, as you can see for yourself. Metal products are manufactured taking into account the fact that they will be used in various business areas. An additional advantage to all is transparent prices, real terms and providing the customer with a personal consultant.</span>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".home").addClass('active');
    </script>
@endsection