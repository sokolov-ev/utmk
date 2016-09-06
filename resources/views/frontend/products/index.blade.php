@extends('layouts.site')

@section('title')
    {{ trans('index.menu.products') }}
@endsection

@section('css')

@endsection

@section('content')

<div class="padding-top"></div>
<section class="products-search-block">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-4 col-xs-12">
                <input id="product-name" class="form-control" type="text" placeholder="{{ trans('products.product-search') }}...">
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <select id="product-city" name="product-city" class="form-control">
                    <option value="">{{ trans('products.select-city') }}...</option>
                    @foreach($offices as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 col-sm-5 col-xs-12">
                {{ csrf_field() }}
                <button class="btn btn-default" type="button" onclick="searchProducts()" style="width: 50%;">
                    <i class="fa fa-search" aria-hidden="true"></i> {{ trans('products.search') }}
                </button>

                <button class="btn btn-default pull-right clearfix" type="button" onclick="searchClear()" style="width: 50%;">
                    <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('products.reset') }}
                </button>
            </div>
        </div>

    </div>
</section>

<section class="container">
    <div class="padding-top"></div>


        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('products.catalog') }}</div>
                    <div class="panel-body">
                        <ol class="menu" id="catalog-content"></ol>
                    </div>
                </div>

            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">

                <div class="row products-cards">
                    @foreach ($products as $product)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="thumbnail">
                                <img alt="{{ $product['title'] }}" src="{{ $product['images'] }}">
                                <div class="caption">
                                    <h3>{{ $product['title'] }}</h3>
                                    <p>{{ str_limit($product['description'], 250, '...') }}</p>
                                </div>
                                <div class="caption-footer">

                                    <form class="" role="form" method="POST" action="{{ url('/products/add-cart') }}" id="form-add-cart-{{ $product['id'] }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="product-id" value="{{ $product['id'] }}">
                                        <div class="shopping-cart row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php
                                                    $params = request()->query();
                                                    $params['slug'] = str_slug($product['title'], '_');
                                                    $params['id'] = $product['id'];
                                                ?>
                                                <a class="btn btn-default" role="button" href="{{ route('products-view', $params) }}">{{ trans('products.more') }}</a>
                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12 in-shoping-cart">
                                                <button type="submit" class="btn btn-success pull-right clearfix" form="form-add-cart-{{ $product['id'] }}">
                                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                    <div style="margin-left: 20px;">{{ trans('products.add-cart') }}</div>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="pagination" class="text-center"></div>
            </div>
        </div>

    <div class="padding-top"></div>
</section>

{{-- Подгружаем шаблон для меню --}}
@include('partial.catalog-template')
{{-- Подгружаем шаблон для карточки продукции --}}
@include('partial.product-card-template')

@endsection

@section('scripts')

    <script src="{{ elixir('js/mustache.js') }}"></script>
    <script src="{{ elixir('js/jquery-ui.js') }}"></script>
    <script src="{{ elixir('js/products.js') }}"></script>

    <script type="text/javascript">
        var pageSize = 2;
        var query = [];

        $(".products").addClass('active');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val(),
            }
        });

        $.get('/products/menu', function(response){
            if (response.status == 'ok') {
                $('#catalog-content').empty();
                var template = $('#catalog-template').html();
                Mustache.parse(template);

                $.each(response.data, function(key, item){
                    if (item.parent > 0) {
                        $('#' + item.parent + ' > ol').append(Mustache.render(template, item));
                        $('#' + item.parent + ' > ol').css('display', 'none');
                        $('#' + item.parent + ' > i').removeClass('fake-width').addClass('fa fa-angle-right pull-left');
                    } else {
                        $('#catalog-content').append(Mustache.render(template, item));
                    }
                });
            } else {
                $('#catalog-content').empty();
                $('#catalog-content').text(response.message);
            }
        });

        $("#catalog-content").on('click', 'span',function(event){
            if ($(this).siblings('ol').children().is('li')) {
                if ($(this).siblings('ol').css('display') == 'none') {
                    $(this).siblings('ol').slideDown(200);
                    $(this).siblings('i').addClass("fa-angle-down").removeClass("fa-angle-right");
                } else {
                    $(this).siblings('ol').slideUp(200);
                    $(this).siblings('i').removeClass("fa-angle-down").addClass("fa-angle-right");
                }
            } else {
                var id = $(this).closest('li').attr('id');
                query = 'menu=' + id;
                $.get('/products/catalog?' + query, function(response){
                    viewProducts(response);
                });
            }
        });

        $("#product-name").on('change keyup', function(event){
            if(event.keyCode == 13) {
                searchProducts();
            }
        });

        function searchProducts()
        {
            var id = $("#product-city").val();
            var name = $("#product-name").val();

            if ((name != undefined) && (name != '')) {
                query = 'name=' + name;
                if ((id != undefined) && (id != '')) {
                    query += '&id=' + id;
                }

                $.get('/products/catalog?' + query, function(response){
                    viewProducts(response);
                });
            }

            return true;
        }

        function searchClear()
        {
            query = '';

            $.get('/products/catalog', function(response){
                viewProducts(response);
            });
        }

        function viewProducts(response) {

            if (response.status == 'ok') {
                $('.products-cards').empty();
                var template = $('#product-card-template').html();
                Mustache.parse(template);

                $.each(response.data, function(key, item){
                    item['work_link'] = "/products/details/" + item['slug'] + "/" + item['id'];
                    $('.products-cards').append(Mustache.render(template, item));
                });

                fixHeight();
            } else {
                $('.products-cards').empty();
                $('.products-cards').html('<div class="empty-products">' + response.message + '</div>');
            }

            if (response.count > pageSize) {
                initPagination(response.count);
            } else {
                $('#pagination').twbsPagination('destroy');
                // $('#pagination').empty();
            }
        }

        $(window).on('load resize', function(event){
            fixHeight();
        });


        function fixHeight()
        {
            $.each($(".thumbnail").find(".caption"), function(key, val){
                $(val).height('auto');
            });

            if ($(window).width() >= '768'){
                var height  = 0;
                var caption = $(".thumbnail").find(".caption");

                for (var i = 0; i < caption.length;) {
                    if ($(caption[i]).height() > $(caption[i+1]).height()) {
                        height = $(caption[i]).height();
                    } else {
                        height = $(caption[i+1]).height();
                    }

                    $(caption[i]).height(height);
                    $(caption[i+1]).height(height);

                    i += 2;
                }
            }
        }

        function initPagination(count)
        {
            pages = Math.ceil(count/pageSize);

            var first = '';
            var last  = '';

            // if ($('.djc_pagination > .pagination > .first > span').text()) {
            //     first = $('.djc_pagination > .pagination > .first > span').text();
            // } else {
            //     first = $('.djc_pagination > .pagination > .first > a').text();
            // }

            // if ($('.djc_pagination > .pagination > .last > span').text()) {
            //     last = $('.djc_pagination > .pagination > .last > span').text();
            // } else {
            //     last = $('.djc_pagination > .pagination > .last > a').text();
            // }


            $('#pagination').twbsPagination({
                totalPages: pages,
                visiblePages: 5,
                // first: first,
                prev: '«',
                next: '»',
                // last: last,
                onPageClick: function (event, page) {
                    $.get('/products/catalog?' + query + '&page=' + page, function(response){
                        viewProducts(response);
                    });
                }
            });
        }
    </script>
@endsection

