@extends('layouts.site')

@section('title')
    {{ $product['title'] }}
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
        <?php
            $params = request()->query();
            $params['slug'] = $menu['slug'];
            $params['id'] = $menu['id'];
        ?>
        <ul class="breadcrumb">
            <li> <a class="orange-list-a" href="{{ route('products-index') }}" title="">{{ trans('index.menu.products') }}</a> </li>
            <li> <a class="orange-list-a" href="{{ route('products-index', $params) }}" title="">{{ $menu['name'] }}</a> </li>
            <li class="active">{{ $product['title'] }}</li>
        </ul>
    </div>

    <div class="row">

        <div class="col-md-5 col-sm-5">
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

        <div class="col-md-7 col-sm-7">

            <div class="wow slideInRight">
                <div class="padding-block-0-2">
                    <span class="text-16">{!! $product['description'] !!}</span>
                </div>
            </div>

            <div class="padding-block-0-2">
                <strong>{{ trans('offices.office') }}</strong>:
                <a class="orange-list-a" href="{{ url('/office/'.$product['office_city'].'/'.$product['office']['id']) }}" title="{{ $product['office_title'] }}">
                    {{ $product['office_title'] }}
                </a>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-md-5 col-sm-5">

        </div>
        <div class="col-md-7 col-sm-7 col-xs-12">

            <div class="shopping-cart">
                <div class="card-price-block pull-left">
                    <div class="card-price">
                        {{ $product['price'] }}
                        <span class="card-price-uah">{{ trans('products.uah') }} / {{ trans('products.measures.'.$product['price_type']) }}</span>
                    </div>
                </div>

                <button type="button" class="btn btn-success add-cart pull-right" data-id="{{ $product['id'] }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"> </i> {{ trans('products.add-cart') }}
                </button>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".products").addClass('active');

        $("body").on('click', '.add-cart', function(event){
            var id = $(this).data('id');
            var count = 1;

            if ($('#quantity').is(':empty')) {
                count = $('#quantity').val();
            }

            $.post('/products/product-to-cart', {id: id, count: count}, function(response){
                if (response.status == 'ok') {
                    if (response.data > 0) {
                        $(".shopping-cart-badge").removeClass("hidden");
                        $(".shopping-cart-badge").text(response.data);
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

