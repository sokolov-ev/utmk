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
            $count = count($menu)-1;
        ?>
        <ul class="breadcrumb">
            <li> <a class="orange-list-a" href="{{ route('products-index') }}" title="">{{ trans('index.menu.products') }}</a> </li>
            @foreach($menu AS $key => $item)
                @if($key == $count)
                    <li> <a class="orange-list-a" href="{{ route('products-index', $item) }}" title="">{{ $item['name'] }}</a> </li>
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


            @foreach($product['prices'] as $price)
                <div class="row margin-bottom-5">
                    <div class="col-md-2 col-sm-3 col-xs-6 up-first card-white-price up-first">{{ trans('products.measures.'.$price['type']) }}</div>
                    <div class="col-md-10 col-sm-9 col-xs-6">
                        <div class="card-price">
                            {{ $price['price'] }} <span class="card-price-uah">{{ trans('products.uah') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="padding-block-2-2">
                <button type="button" class="btn btn-success add-cart pull-right" data-id="{{ $product['id'] }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"> </i> {{ trans('products.add-cart') }}
                </button>
                <div class="clearfix"> </div>
            </div>
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

