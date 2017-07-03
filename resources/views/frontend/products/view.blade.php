@extends('layouts.site')

@section('title')
    {{ $metatags['title'] }}
@endsection

@section('meta')

    <meta name="keywords" content="{{ $metatags['keywords'] }}" />
    <meta name="title" content="{{ $metatags['title'] }}" />
    <meta name="description" content="{{ $metatags['description'] }}" />

    <!-- Schema.org markup (Google) -->
    <meta itemprop="name" content="{{ $metatags['title'] }}">
    <meta itemprop="description" content="{{ $metatags['description'] }}">
    <meta itemprop="image" content="{{ url('/') . $product['images'][0] }}">

    <!-- Twitter Card markup-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $metatags['title'] }}">
    <meta name="twitter:description" content="{{ $metatags['description'] }}">
    <meta name="twitter:creator" content="">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image" content="{{ url('/') . $product['images'][0] }}">
    <meta name="twitter:image:alt" content="">

    <!-- Open Graph markup (Facebook, Pinterest) -->
    <meta property="og:title" content="{{ $metatags['title'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ url('/') . $product['images'][0] }}" />
    <meta property="og:description" content="{{ $metatags['description'] }}" />
    <meta property="og:site_name" content="Metall Vsem" />

    <script type="application/ld+json">
        {!! json_encode($schemaBreadcrumb) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($schemaProduct) !!}
    </script>
@endsection

@section('css')

@endsection

@section('content')

<section class="container">

    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ $product['title'] }}</h1>
        <div id="productid" data-id="{{ $product['id'] }}"></div>
    </div>
    <div class="padding-top"></div>


    <div class="padding-block-0-2">
        <ul class="breadcrumb">
            <li>
                <a class="orange-list-a" href="{{ route('products-index') }}" title="{{ trans('index.menu.products') }}">
                    {{ trans('index.menu.products') }}
                </a>
            </li>
            @foreach($menu as $item)
                <li>
                    <a class="orange-list-a" href="{{ url($locale.$item['slug']) }}" title="{{ $item['name'] }}">
                        {{ $item['name'] }}
                    </a>
                </li>
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
                                        <img alt="{{ $product['title'] }}" src="{{ $img }}" style="width: 100%; height: auto;">
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
                        <img alt="{{ $product['title'] }}" src="{{ $product['images'][0] }}" style="width: 100%; height: auto;">
                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="wow slideInRight">
                <div class="padding-block-0-1">
                    <div id="rateYo"></div>
                    <span class="text-16" style="display: inline-block; vertical-align: text-bottom;">
                        <span class="appraisal">{{ $rating['appraisal'] }}</span>
                        ({{ trans('products.vote') }}: <span class="appraisal-count">{{ $rating['count'] }}</span>)
                    </span>
                </div>
            </div>

            @if(!empty($product['description']))
                <div class="wow slideInRight">
                    <span class="text-16">
                        {{ $product['description'] }}
                    </span>
                </div>
            @endif

            @foreach ($data as $element)
                @if($product[$element])
                    <div class="wow slideInRight">
                        <span class="text-16">
                            <strong>{{ trans('products.'.$element) }}</strong>: {{ $product[$element] }}
                        </span>
                    </div>
                @endif
            @endforeach

            <div class="wow slideInRight">
                <span class="text-16">
                    <strong>{{ trans('products.in_stock') }}</strong>: {{ $product['in_stock'] ? trans('index.yes') : trans('index.no') }}
                </span>
            </div>

            <div class="padding-block-1-2" style="font-size: 16px;">
                <strong>{{ trans('offices.office') }}</strong>:
                <a class="orange-list-a" href="{{ url($product['office_linck']) }}" title="{{ $product['office_title'] }}">
                    {{ $product['office_title'] }}
                </a>
            </div>

            @foreach($product['prices'] as $price)
                <div class="margin-bottom-5">
                    @if ($price['type_view'] == 'agreed')
                        <div class="shopping-cart-block">
                            <div class="card-price-block">
                                <div class="card-price" style="border-radius: 4px;">
                                    {{ $price['type'] }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="shopping-cart">
                            <div class="card-price-block">
                                <div class="card-price">
                                    {{ $price['price'] }}
                                    <span class="card-price-uah">
                                        {{ trans('products.uah') }} / {{ $price['type'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach

            @if (!$product['prices_type'])
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
    <script src="{{ elixir('js/jquery.rateyo.js') }}"></script>

    <script type="text/javascript">
        $(".products").addClass('active');

        $("body").on('click', '.add-cart', function(event){

            console.info($(this).data('id'));

            let tut = this;
            var id  = $(this).data('id');
            let count = 1;

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
                } else if ((response.status == 'bad') && (response.error == 'auth')) {
                    $(".not-auth-user").removeClass('hidden');
                    $(".not-auth-user").html('<p><b>' + response.message + '</p></b>');
                    $("#login-form").modal('show');
                }
            });
        });

        $( "#rateYo" ).tooltip({ show: { effect: "blind", duration: 800 } });

        $(document).ready(function() {
            let id = $('#productid').data('id');

            function getRate() {
                $.get('/products/rating/' + id, function(res) {
                    let appraisal = res.data.appraisal;
                    let count = res.data.count;

                    $('#rateYo').rateYo({
                        precision: 1,
                        starWidth : '20px',
                        rating: appraisal,
                        onSet: function (rating, rateYoInstance) {
                            $.post('/products/rating/' + id, {data: rating}, function(res) {
                                if (res.success) {
                                    $('#rateYo').rateYo('option', 'readOnly', true);
                                    getRate();
                                }
                            });
                        }
                    });

                    $('.appraisal').text(appraisal);
                    $('.appraisal-count').text(count);
                });
            }

            getRate();
        });
    </script>
@endsection