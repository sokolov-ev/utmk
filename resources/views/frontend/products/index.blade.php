@extends('layouts.site')

@section('title')
    {{ trans('products.title') }}
@endsection

@section('meta')

    <meta name="keywords" content="{{ $metatags['keywords'] }}" />
    <meta name="title" content="{{ $metatags['title'] }}" />
    <meta name="description" content="{{ $metatags['description'] }}" />

    <!-- Schema.org markup (Google) -->
    <meta itemprop="name" content="{{ $metatags['title'] }}">
    <meta itemprop="description" content="{{ $metatags['description'] }}">
    <meta itemprop="image" content="{{ url('/') }}/images/logo.jpeg">

    <!-- Twitter Card markup-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $metatags['title'] }}">
    <meta name="twitter:description" content="{{ $metatags['description'] }}">
    <meta name="twitter:creator" content="">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image" content="{{ url('/') }}/images/logo.jpeg">
    <meta name="twitter:image:alt" content="">

    <!-- Open Graph markup (Facebook, Pinterest) -->
    <meta property="og:title" content="{{ $metatags['title'] }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ url('/') }}/images/logo.jpeg" />
    <meta property="og:description" content="{{ $metatags['description'] }}" />
    <meta property="og:site_name" content="Metall Vsem" />

@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ trans('products.title') }}</h1>
    </div>
    <div class="padding-top"></div>
</section>

<section class="products-search-block">
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-sm-7 col-xs-12 padding-block-1-1">
                <input id="product-name" class="form-control" type="text" placeholder="{{ trans('products.product-search') }}...">
            </div>

            <div class="col-md-3 col-sm-5 col-xs-12 padding-block-1-1">
                @if($ordersLocked)
                    <select id="product-city" name="product-city" class="form-control" disabled="">
                @else
                    <select id="product-city" name="product-city" class="form-control">
                @endif
                    <option value="">{{ trans('products.select-city') }}...</option>
                    @foreach($offices as $office)
                        <option value="{{ $office['id'] }}" data-city="{{ $office['slug'] }}">
                            {{ json_decode($office['city'], true)[App::getLocale()] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 text-right padding-block-1-1">
                {{ csrf_field() }}
                <button class="btn btn-success" type="button" onclick="searchProducts()">
                    {{ trans('products.search') }}
                </button>

                <a href="{{ route('products-index') }}" class="btn btn-default">
                    {{ trans('products.reset') }}
                </a>

                <a href="javascript: void(0);" class="btn btn-warning change-format">
                    @if($format == 'cards')
                        <span id="format-list" class="">{{ trans('products.list') }}</span>
                        <span id="format-cards" class="hidden">{{ trans('products.cards') }}</span>
                    @else
                        <span id="format-list" class="hidden">{{ trans('products.list') }}</span>
                        <span id="format-cards" class="">{{ trans('products.cards') }}</span>
                    @endif
                </a>
            </div>
        </div>

    </div>
</section>

<section class="container">
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12" style="padding: 0;">
            <div class="padding-block-0-1">
                @if($ordersLocked)
                    <select id="filter-city" name="filter-city" class="form-control" disabled="">
                @else
                    <select id="filter-city" name="filter-city" class="form-control">
                @endif
                    @foreach($offices as $office)
                        @if($office['id'] == $filterCity)
                            <option value="{{ $office['id'] }}" data-city="{{ json_decode($office['city'], true)['en'] }}" selected="">
                                {{ json_decode($office['city'], true)[App::getLocale()] }}
                            </option>
                        @else
                            <option value="{{ $office['id'] }}" data-city="{{ json_decode($office['city'], true)['en'] }}">
                                {{ json_decode($office['city'], true)[App::getLocale()] }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="products-menu-block">
                <div class="menu-selected hidden" data-id="{{ $menu_id }}"> </div>
                <ul class="list-unstyled catalog" id="catalog-content"> </ul>
            </div>
            <div class="padding-top"> </div>
        </div>
        <div class="col-md-9 col-sm-12 col-xs-12">

            <div class="row products-cards">
                @if (empty($result))
                    <div class="col-md-12 col-sm-12 col-xs-12 card text-center font-up text-black-h2">{{ trans('products.products-missing') }}</div>
                @endif

                @foreach ($result as $product)
                    <?php $price = current($product['prices']); ?>
                    @if($format == 'cards')
                        <div class="col-md-4 col-sm-4 col-xs-12 card">
                            <div class="thumbnail">
                                <a class="text-black-h3" href="{{ $product['work_link'] }}">
                                    <img class="green-img" alt="{{ $product['title'] }}" src="{{ $product['images'] }}" style="max-width: 360px; max-height: 240px">
                                </a>
                                <div class="caption">
                                    <a class="text-black-h3" href="{{ $product['work_link'] }}">{{ $product['title'] }}</a>

                                    <div class="padding-block-1-2">
                                        <span class="text-16">{!! $product['description'] !!}</span>
                                    </div>
                                </div>

                                <div class="caption-footer">
                                    @if ($product['prices_type'])
                                        <div class="shopping-cart-block pull-left">
                                            <div class="card-price-block">
                                                <div class="card-price">
                                                    {{ trans('products.measures.agreed') }}
                                                </div>
                                            </div>
                                        </div>

                                        <a class="btn btn-default pull-right" role="button" href="{{ $product['work_link'] }}">{{ trans('products.more') }}</a>
                                    @else
                                        <div class="shopping-cart-block pull-left">
                                            <div class="card-price-block">
                                                <div class="card-price">
                                                    {{ $price['price'] }}
                                                    <span class="card-price-uah">
                                                        {{ trans('products.uah') }} / {{ $price['type'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shopping-cart pull-right">
                                            <button type="button" class="btn btn-success add-cart" data-id="{{ $product['id'] }}">
                                                <i class="fa fa-cart-plus" aria-hidden="true"> </i>
                                                {{ trans('products.add-cart') }}
                                            </button>
                                        </div>
                                    @endif

                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="panel panel-default card">
                            <div class="panel-body">
                                <div class="product-title pull-left">
                                    <a class="text-black-h3" href="{{ $product['work_link'] }}">{{ $product['title'] }}</a>
                                </div>

                                @if ($product['prices_type'])
                                    <div class="shopping-cart pull-right">
                                        <div class="card-price-block">
                                            <div class="card-price">
                                                {{ trans('products.measures.agreed') }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="shopping-cart pull-right">
                                        <div class="card-price-block">
                                            <div class="card-price">
                                                {{ $price['price'] }}
                                                <span class="card-price-uah">
                                                    {{ trans('products.uah') }} / {{ $price['type'] }}
                                                </span>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-success add-cart" data-id="{{ $product['id'] }}">
                                            <i class="fa fa-cart-plus" aria-hidden="true"> </i> {{ trans('products.add-cart') }}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12"> </div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="text-center default-pagination">
                @if (!$offPaginate)
                    {{ $products->appends($query)->render() }}
                @endif
            </div>
            <div id="pagination" class="text-center"> </div>
        </div>
    </div>

    @if(!empty($metatags['articles']))
        <div class="row articles">
            <div class="col-md-3 col-sm-12 col-xs-12"> </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="padding-block-2-0">
                    <span class="text-gray-16 text-justify">
                        {{ $metatags['articles'] }}
                    </span>
                </div>
            </div>
        </div>
    @endif

    <div class="first hidden">{{ trans('pagination.first') }}</div>
    <div class="last hidden">{{ trans('pagination.last') }}</div>
    <div class="format hidden">{{ $format }}</div>

    <div class="padding-top"></div>
</section>

{{-- Подгружаем шаблон для меню --}}
@include('partial.product-menu-template')
{{-- Подгружаем шаблон для карточки продукции --}}
@include('partial.product-card-template')
@include('partial.product-list-template')

@endsection

@section('scripts')

    <script src="{{ elixir('js/jquery-ui.js') }}"></script>
    <script src="{{ elixir('js/mustache.js') }}"></script>
    <script src="{{ elixir('js/products.js') }}"></script>

@endsection

