@extends('layouts.site')

@section('title')
    {{ trans('auth.my-office') }} - {{ trans('products.shopping-cart') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="wow fadeInLeft">
                <div class="well text-center">
                    <span class="text-orange">{{ trans('products.shopping-cart') }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="wow fadeInRight">
                <div class="panel panel-default" style="border-radius: 4px; margin-bottom: 0;">
                    <div class="panel-body text-center" style="padding: 18px;">
                        <a class="text-orange-20" href="{{ route('formed-orders') }}" title="">{{ trans('products.my-orders') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="padding-top"></div>

    @if (empty($products))
        <div class="wow fadeInUp">
            <div class="cart-empty">
                <div class="padding-top"></div>

                <div class="empty-block">
                    <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                    {{ trans('products.empty-cart') }}
                </div>

                <div class="padding-top"></div>
            </div>
        </div>
    @endif

    <form class="" role="form" method="POST" action="{{ url('/products/formed-order') }}" id="finish-order">
        {{ csrf_field() }}
        <?php $sum = 0 ?>
        <div class="product-card">

            @foreach ($products as $key => $product)
                <?php
                    $sum += $product['prices'][$product['price_id']]['price'] * $product['quantity'];
                    $counter = ($key + 1) * 797;
                ?>
                <div class="padding-block-2-2">
                    <div class="row" id="bonds-{{ $product['bonds'] }}">

                        <button class="close delete-product" type="button" onclick="deleteProduct({{ $product['bonds'] }})">
                            <span aria-hidden="true">×</span>
                        </button>

                        <div class="col-md-2 hidden-sm hidden-xs">
                            <img class="green-img" alt="{{ $product['title'] }}" src="{{ $product['images'] }}" style="max-width: 155px;">
                        </div>

                        <div class="col-md-10 col-sm-12 col-xs-12">

                            <a class="text-black-h3" href="{{ $product['work_link'] }}" title="{{ $product['title'] }}">
                                {{ $product['title'] }}
                            </a>

                            <div class="padding-block-1-2">
                                <strong>{{ trans('offices.office') }}</strong>:
                                <a class="orange-list-a" href="{{ $product['office_linck'] }}" title="{{ $product['office_title'] }}">
                                    {{ $product['office_title'] }}
                                </a>
                            </div>

                            <div class="row modal-body shopping-cart text-right">

                                <div class="padding-horizon">
                                    <div class="shopping-type-product">
                                        <select name="price_type" class="form-control price-type price-type-{{ $counter }}" data-workid="{{ $counter }}">
                                            @foreach($product['prices'] as $price)
                                                @if($price['id'] == $product['price_id'])
                                                    <option value="{{ $price['id'] }}" selected="">{{ $price['type'] }}</option>
                                                @else
                                                    <option value="{{ $price['id'] }}">{{ $price['type'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="shopping-price-product">
                                        <div class="card-price">
                                            <div class="price price-{{ $counter }}">{{ $product['prices'][$product['price_id']]['price'] }}</div>
                                            <span class="card-price-uah">{{ trans('products.uah') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="shopping-count-product padding-horizon">
                                    <button type="button" class="btn btn-link cart-quantity-minus" data-workid="{{ $counter }}">
                                        <i class="fa fa-minus" aria-hidden="true"> </i>
                                    </button>
                                    <input type="text"
                                           class="quantity quantity-{{ $counter }}"
                                           value="{{ $product['quantity'] }}"
                                           data-workid="{{ $counter }}" />
                                    <button type="button" class="btn btn-link cart-quantity-plus" data-workid="{{ $counter }}">
                                        <i class="fa fa-plus" aria-hidden="true"> </i>
                                    </button>
                                </div>

                                <div class="shopping-price-total padding-horizon">
                                    {{ trans('products.sum') }}:
                                    <div class="card-price">
                                        <div class="sum-price sum-price-{{ $counter }}">
                                            {{ $product['prices'][$product['price_id']]['price'] * $product['quantity'] }}
                                        </div>

                                        <span class="card-price-uah">{{ trans('products.uah') }}</span>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        @if (!empty($products))
            <div class="padding-block-1-2">
                <div class="form-group">
                    <textarea id="order-wish" name="wish" class="form-control" rows="5" style="resize: none;" placeholder="{{ trans('products.wish') }}"></textarea>
                </div>
                <input type="text" name="contacts" value="" class="form-control" placeholder="{{ trans('auth.more-contacts') }}" />
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="card-price-text" style="top: 0;">
                        <strong>{{ trans('products.total') }}:</strong>
                    </div>
                    <div class="card-price">
                        <div class="total-price">{{ $sum }}</div>
                        <span class="card-price-uah">{{ trans('products.uah') }}</span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <button type="submit" class="btn btn-warning pull-right" form="finish-order">
                        {{ trans('products.finish-order') }}
                    </button>
                </div>
            </div>
        @endif
    </form>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')
    <script type="text/javascript">
        $.get("/products/get-order-data", function(response){
            if (response.status == "ok") {
                var count = response.data.length;
                prices = [];

                if (count > 0) {
                    $.each(response.data, function(key, product){
                        product.work_key = (key + 1) * 797;

                        var id = 0;
                        var temp;

                        $.each(product.prices, function(priceId, price){
                            temp = {};

                            temp.price = price.price;
                            temp.bonds = product.bonds;

                            prices[priceId] = temp;
                        });

                        if (product.price_id > 0) {
                            id = product.price_id;
                        } else {
                            id = product.prices[0].id;
                        }
                    });

                    totalSum();
                }
            }
        });
    </script>
@endsection

