@extends('layouts.site')

@section('title')
    {{ $product['title'] }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
        <div class="padding-top-30"></div>
        <h1>{{ $product['title'] }}</h1>

        <div class="padding-top-30"></div>
            <ol class="breadcrumb">
                <li><a href="{{ route('products-index', request()->query()) }}">{{ trans('index.menu.products') }}</a></li>
                <li class="active">{{ $product['title'] }}</li>
            </ol>
        <div class="padding-top-30"></div>
        <div class="row">

            <div class="col-md-5 col-sm-5">
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

            <div class="col-md-7 col-sm-7">
                <div class="visible-sm visible-xs padding-top-30"></div>

                <p>{{ $product['description'] }}</p>

                <?php
                    $office = json_decode($product['office']['title'], true)[App::getLocale()];
                ?>

                <p>
                    <b>
                        {{ trans('offices.office') }}:
                        <a href="{{ url('/administration/offices/'.$product['office']['id']) }}" title="{{ $office }}">
                            {{ $office }}
                        </a>
                    </b>
                </p>

            </div>

        </div>

        <div class="padding-top-30"></div>

        <div class="row">
            <div class="col-md-5 col-sm-5">

            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">

                <form class="" role="form" method="POST" action="{{ url('user/shopping-cart') }}" id="form-add-cart">
                    {{ csrf_field() }}
                    <div class="shopping-cart row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="card-price">
                                {{ $product['price'] }}
                                <span class="card-price-uah">{{ trans('products.uah') }}</span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 cart-quantity">
                            <button type="button" class="btn btn-link cart-quantity-minus">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>
                            <input type="text" id="quantity" name="quantity" value="1">
                            <button type="button" class="btn btn-link cart-quantity-plus">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12 in-shoping-cart">
                            <button type="submit" class="btn btn-success" form="form-add-cart">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <div style="margin-left: 20px;">{{ trans('products.add-cart') }}</div>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>



    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".products").addClass('active');

        $(".cart-quantity-minus").click(function(event){
            var value = +$("#quantity").val();
            if (value > 1) {
                $("#quantity").val(--value);
            }
        });

        $(".cart-quantity-plus").click(function(event){
            var value = +$("#quantity").val();
            $("#quantity").val(++value);
        });

        $('#quantity').on('change keyup', function(event){
            this.value = this.value.replace(/[^0-9]/g, '');
            if ( (this.value == '') || (this.value < 1) ) {
                this.value = 1;
            }
        });
    </script>
@endsection

