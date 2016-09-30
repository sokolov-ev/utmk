@extends('layouts.site')

@section('title')
    {{ trans('products.title') }}
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
            <div class="col-md-6 col-sm-4 col-xs-12 padding-block-1-1">
                <input id="product-name" class="form-control" type="text" placeholder="{{ trans('products.product-search') }}...">
            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 padding-block-1-1">
                <select id="product-city" name="product-city" class="form-control">
                    <option value="">{{ trans('products.select-city') }}...</option>
                    @foreach($offices as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 col-sm-5 col-xs-12 text-right padding-block-1-1">
                {{ csrf_field() }}
                <button class="btn btn-success" type="button" onclick="searchProducts()">
                    <i class="fa fa-search" aria-hidden="true"></i> {{ trans('products.search') }}
                </button>

                <a href="{{ route('products-index') }}" class="btn btn-warning" style="padding-right: -5px; margin-right: 4px;">
                    <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('products.reset') }}
                </a>
            </div>
        </div>

    </div>
</section>

<section class="container">
    <div class="padding-top"></div>

        <div class="row products-cards">

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="products-menu-block">
                    <div class="menu-selected hidden" data-id="{{ $menu_id }}"> </div>
                    <ul class="list-unstyled catalog" id="catalog-content"> </ul>
                </div>
            </div>

            @foreach ($products as $product)
                <?php
                    $params = request()->query();
                    $params['slug'] = $product['slug'];
                    $params['id'] = $product['id'];
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12 card">
                    <div class="thumbnail">
                        <img class="green-img" alt="{{ $product['title'] }}" src="{{ $product['images'] }}" style="max-width: 360px; max-height: 240px">

                        <div class="caption">
                            <a class="text-black-h3" href="{{ route('products-view', $params) }}">{{ $product['title'] }}</a>

                            <div class="padding-block-1-2">
                                <span class="text-gray-16">{{ str_limit($product['description'], 250, '...') }}</span>
                            </div>
                        </div>

                        <div class="caption-footer">

                            <a class="btn btn-default pull-left" role="button" href="{{ route('products-view', $params) }}">{{ trans('products.more') }}</a>

                            <button type="button" class="btn btn-success pull-right add-cart" data-id="{{ $product['id'] }}">
                                <i class="fa fa-cart-plus" aria-hidden="true"> </i>
                                <span>{{ trans('products.add-cart') }}</span>
                            </button>

                            <div class="clearfix"> </div>

                        </div>
                    </div>
                </div>
            @endforeach

            @if (empty($products))
                <div class="empty-products">{{ trans('products.catalog-enpty') }}</div>
            @endif
        </div>

        <div id="pagination" class="text-center"> </div>
        <div class="first hidden">{{ trans('pagination.first') }}</div>
        <div class="last hidden">{{ trans('pagination.last') }}</div>

    <div class="padding-top"></div>
</section>

{{-- Подгружаем шаблон для меню --}}
@include('partial.product-menu-template')
{{-- Подгружаем шаблон для карточки продукции --}}
@include('partial.product-card-template')

@endsection

@section('scripts')

    <script src="{{ elixir('js/jquery-ui.js') }}"></script>
    <script src="{{ elixir('js/mustache.js') }}"></script>
    <script src="{{ elixir('js/products.js') }}"></script>

    <script type="text/javascript">
        var pageSize = 20;
        var query    = [];
        var url      = '';

        $(".products").addClass('active');

        $.get('/catalog/get-catalog', function(response){
            if (response.status == 'ok') {
                $('#catalog-content').empty();
                var selected = $('.menu-selected').data('id');
                var template = $('#product-menu-template').html();
                Mustache.parse(template);

                $.each(response.data, function(key, item){
                    if (item.parent > 0) {
                        $('#' + item.parent + ' > ul').append(Mustache.render(template, item));
                        $('#' + item.parent + ' > ul').css('display', 'none');
                        $('#' + item.parent + ' > i').addClass('fa fa-angle-right');
                    } else {
                        $('#catalog-content').append(Mustache.render(template, item));
                    }
                });

                if (selected) {
                    $("#" + selected + " span").addClass('active');
                    $.each($("#" + selected).parents("li"), function(key, val){
                        $(val).children('ul').slideDown(200);
                        $(val).children('i').addClass("fa-angle-down").removeClass("fa-angle-right");
                    });
                }
            } else {
                $('#catalog-content').empty();
                $('#catalog-content').text(response.message);
            }
        });

        $("#catalog-content").on('click', 'span',function(event){
            if ($(this).siblings('ul').children().is('li')) {
                if ($(this).siblings('ul').css('display') == 'none') {
                    $(this).siblings('ul').slideDown(200);
                    $(this).siblings('i').addClass("fa-angle-down").removeClass("fa-angle-right");
                } else {
                    $(this).siblings('ul').slideUp(200);
                    $(this).siblings('i').removeClass("fa-angle-down").addClass("fa-angle-right");
                }
            } else {
                var id   = $(this).closest('li').attr('id');
                var slug = $(this).closest('li').data('slug');

                $('.menu-item').removeClass('active');
                $(this).addClass('active');

                url   = '/catalog/products/' + slug + '/' + id;
                query = 'menu=' + id;

                $.get('/catalog/get-products?' + query, function(response){
                    viewProducts(response);
                    ChangeUrl(id, url);
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
            var id   = $("#product-city").val();
            var name = $("#product-name").val();

            if ((name != undefined) && (name != '')) {
                query = 'name=' + name;
                if ((id != undefined) && (id != '')) {
                    query += '&id=' + id;
                }

                $.get('/catalog/get-products?' + query, function(response){
                    viewProducts(response);
                });
            }

            return true;
        }

        function viewProducts(response) {
            if (response.status == 'ok') {

                $('.products-cards').find('.card').remove();

                var template = $('#product-card-template').html();
                Mustache.parse(template);

                $.each(response.data, function(key, item){
                    item['work_link'] = "/catalog/details/" + item['slug'] + "/" + item['id'];
                    $('.products-cards').append(Mustache.render(template, item));
                });

                if (response.data.length < pageSize) {
                    $('#pagination').twbsPagination('destroy');
                } else if (response.data.length != pageSize) {
                    initPagination(response.count);
                }
            } else {
                $('.products-cards').find('.card').remove();
                $('.products-cards').append('<div class="col-md-8 col-sm-6 col-xs-12 card text-center font-up text-black-h2">' + response.message + '</div>');
                $('#pagination').twbsPagination('destroy');
            }
        }

        function ChangeUrl(title, url) {
            if (typeof (history.pushState) != "undefined") {
                var obj = { Title: title, Url: url };
                history.pushState(obj, obj.Title, obj.Url);
            } else {
                alert("Browser does not support HTML5.");
            }
        }

        // $(window).on('load resize', function(event){
            // fixHeight();
        // });

        // function fixHeight()
        // {
        //     $.each($(".thumbnail").find(".caption"), function(key, val){
        //         $(val).height('auto');
        //     });

        //     if ($(window).width() >= '768'){
        //         var height  = 0;
        //         var caption = $(".thumbnail").find(".caption");

        //         // for (var i = 0; i < caption.length;) {
        //         //     if ($(caption[i]).height() > $(caption[i+1]).height()) {
        //         //         height = $(caption[i]).height();
        //         //     } else {
        //         //         height = $(caption[i+1]).height();
        //         //     }

        //         //     $(caption[i]).height(height);
        //         //     $(caption[i+1]).height(height);

        //         //     i += 2;
        //         // }
        //     }
        // }

        function initPagination(count)
        {
            pages = Math.ceil(count/pageSize);

            $('#pagination').twbsPagination({
                totalPages: pages,
                visiblePages: 5,
                first: $('.first').text(),
                prev: '«',
                next: '»',
                last: $('.last').text(),
                onPageClick: function (event, page) {
                    $.get('/catalog/get-products?' + query + '&page=' + page, function(response){
                        viewProducts(response);
                        url += '&page=' + page;
                        ChangeUrl('', url);
                    });
                }
            });
        }

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

