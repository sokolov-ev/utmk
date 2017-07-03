@extends('layouts.admin')

@section('title')
    {{ $product['title'] }}
@endsection

@section('css')

@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">{{ $product['title'] }}</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/products') }}">Продукция</a></li>
                <li class="active">{{ $product['title'] }}</li>
            </ol>

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

                    <br>

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

                </div>

            </div>

        </div>
    </div>
</section>

@include('partial.delete-modal')

@endsection

@section('scripts')

@endsection