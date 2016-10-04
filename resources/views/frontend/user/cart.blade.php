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
        <div class="cart-empty">
            <div class="padding-top"></div>

            <div class="empty-block">
                <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                {{ trans('products.empty-cart') }}
            </div>

            <div class="padding-top"></div>
        </div>
    @endif

    <form class="" role="form" method="POST" action="{{ url('/products/formed-order') }}" id="finish-order">
        {{ csrf_field() }}
        <?php $sum = 0 ?>
        <div class="product-list">

            @foreach ($products as $key => $product)
                <?php $total = $product['price'] * $product['quantity']; ?>
                <?php $sum += $total ?>
                <div class="padding-block-2-2">
                    <div class="row" id="bonds-{{ $product['bonds'] }}">

                        <button class="close delete-product" type="button" onclick="deleteProduct({{ $product['bonds'] }})">
                            <span aria-hidden="true">×</span>
                        </button>

                        <div class="col-md-2 hidden-sm hidden-xs">
                            <img class="green-img" alt="{{ $product['title'] }}" src="{{ $product['images'] }}" style="max-width: 155px;">
                        </div>

                        <div class="col-md-10 col-sm-12 col-xs-12">

                            <a class="text-black-h3" href="/catalog/details/{{ $product['slug'] }}/{{ $product['id'] }}" title="{{ $product['title'] }}">
                                {{ $product['title'] }}
                            </a>

                            <div class="padding-block-1-2">
                                <strong>{{ trans('offices.office') }}</strong>: {{ $product['office'] }}
                            </div>

                            <div class="shopping-cart row">
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="card-price">
                                        {{ $product['price'] }}
                                        <span class="card-price-uah">{{ trans('products.uah') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-6 count-products text-right">
                                    <button type="button" class="btn btn-link cart-quantity-minus">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input type="text"
                                           value="{{ $product['quantity'] }}"
                                           class="quantity"
                                           data-id="{{ $key }}"
                                           data-price="{{ $product['price'] }}"
                                           data-bonds="{{ $product['bonds'] }}" />
                                    <button type="button" class="btn btn-link cart-quantity-plus">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>

                                <div class="col-md-5 col-sm-5 col-xs-12 price-total text-right">
                                    {{ trans('products.sum') }}:
                                    <div class="card-sum-price">
                                        <div id="sum-price-{{ $key }}" class="sum-price">{{ $total }}</div>
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

    </script>
@endsection

