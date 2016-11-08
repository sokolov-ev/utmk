@extends('layouts.site')

@section('title')
    {{ $product['title'] }}
@endsection

@section('meta')

    <meta name="keywords" content="{{ $metatags['keywords'] }}" />
    <meta name="title" content="{{ $metatags['title'] }}" />
    <meta name="description" content="{{ $metatags['description'] }}" />

    <!-- Schema.org markup (Google) -->
    <meta itemprop="name" content="{{ $metatags['title'] }}">
    <meta itemprop="description" content="{{ $metatags['description'] }}">
    <meta itemprop="image" content="{{ url('/') }}/images/products/{{ $product['images'][0]['name'] }}">

    <!-- Twitter Card markup-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $metatags['title'] }}">
    <meta name="twitter:description" content="{{ $metatags['description'] }}">
    <meta name="twitter:creator" content="">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image" content="{{ url('/') }}/images/products/{{ $product['images'][0]['name'] }}">
    <meta name="twitter:image:alt" content="">

    <!-- Open Graph markup (Facebook, Pinterest) -->
    <meta property="og:title" content="{{ $metatags['title'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ url('/') }}/images/products/{{ $product['images'][0]['name'] }}" />
    <meta property="og:description" content="{{ $metatags['description'] }}" />
    <meta property="og:site_name" content="Metall Vsem" />

@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ $product['title'] }}</h1>
    </div>
    <div class="padding-top"></div>


    <div class="padding-block-0-2">
        <?php $count = count($menu) - 1; ?>
        <ul class="breadcrumb">
            <li> <a class="orange-list-a" href="{{ route('products-index') }}" title="">{{ trans('index.menu.products') }}</a> </li>
            @foreach($menu AS $key => $item)
                @if($key == $count)
                    <li> <a class="orange-list-a" href="{{ route('products-index', array_slice($item, 0, -1)) }}" title="">{{ $item['name'] }}</a> </li>
                @else
                    <li class="active">{{ $item['name'] }}</li>
                @endif
            @endforeach
            <li class="active">{{ $product['title'] }}</li>
        </ul>
    </div>

    <div class="row">

        <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="padding-block-0-2">
                <div class="wow slideInLeft">

                    @if (count($product['images']) > 1)
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($product['images'] as $key => $img)
                                    <div class="item {{ ($key == 0) ? 'active' : '' }}">
                                        <img alt="{{ $img['name'] }}" src="/images/products/{{ $img['name'] }}" style="width: 100%; height: auto;">
                                    </div>
                                @endforeach
                            </div>
                            <a class="left carousel-control" data-slide="prev" role="button" href="#carousel-example-generic">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" data-slide="next" role="button" href="#carousel-example-generic">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @else
                        <img alt="{{ $product['images'][0]['name'] }}" src="/images/products/{{ $product['images'][0]['name'] }}" style="width: 100%; height: auto;">
                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-7 col-xs-12">

            <div class="wow slideInRight">
                <span class="text-16">{!! $product['description'] !!}</span>
            </div>

            <div class="padding-block-1-2" style="font-size: 16px;">
                <strong>{{ trans('offices.office') }}</strong>:
                <a class="orange-list-a" href="{{ url('/office/'.$product['office_city'].'/'.$product['office_id']) }}" title="{{ $product['office_title'] }}">
                    {{ $product['office_title'] }}
                </a>
            </div>

            <?php $flag = true; ?>
            @foreach($product['prices'] as $price)
                <div class="margin-bottom-5">
                    @if ($price['type'] == 'agreed')
                        <div class="shopping-cart-block">
                            <div class="card-price-block">
                                <div class="card-price" style="border-radius: 4px;">
                                    {{ trans('products.measures.'.$price['type']) }}
                                </div>
                            </div>
                        </div>
                        <?php $flag = false; ?>
                    @else
                        <div class="shopping-cart">
                            <div class="card-price-block">
                                <div class="card-price">
                                    {{ $price['price'] }}
                                    <span class="card-price-uah">
                                        {{ trans('products.uah') }} / {{ trans('products.measures.'.$price['type']) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach

            @if ($flag)
                <div class="padding-block-2-2">
                    <button type="button" class="btn btn-success add-cart pull-right" data-id="{{ $product['id'] }}">
                        <i class="fa fa-cart-plus" aria-hidden="true"> </i> {{ trans('products.add-cart') }}
                    </button>
                    <div class="clearfix"> </div>
                </div>
            @endif
        </div>

    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".products").addClass('active');

        $("body").on('click', '.add-cart', function(event){
            var tut = this;
            var id  = $(this).data('id');
            var count = 1;

            if ($('#quantity').is(':empty')) {
                count = $('#quantity').val();
            }

            $.post('/products/product-to-cart', {id: id, count: count}, function(response){
                if (response.status == 'ok') {
                    if (response.data > 0) {
                        $(".shopping-cart-badge").removeClass("hidden");
                        $(".shopping-cart-badge").text(response.data);

                        $(tut).addClass('btn-default').removeClass('btn-success');
                        $(tut).text(response.message);
                    } else {
                        $(".shopping-cart-badge").addClass("hidden");
                        $(".shopping-cart-badge").text('');
                    }
                } else if ((response.status == 'bad') && (response.auth)) {
                    $(".not-auth-user").removeClass('hidden');
                    $(".not-auth-user").html('<p><b>' + response.message + '</p></b>');
                    $("#login-form").modal('show');
                }
            });
        });
    </script>
@endsection

