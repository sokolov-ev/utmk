var pageSize = 9;
var query    = '';
var url      = location.pathname;
var format   = $('.format').text();
var menuId   = null;

var locale   = location.pathname.split('/')[1];

if ($.inArray(locale, ['en', 'uk']) == -1) {
    locale = false;
}

$('.products').addClass('active');

$('.change-format').click(function(event){
    if (format == 'cards') {
        format = 'list';
        $('#format-list').addClass('hidden');
        $('#format-cards').removeClass('hidden');
    } else {
        format = 'cards';
        $('#format-list').removeClass('hidden');
        $('#format-cards').addClass('hidden');
    }

    changeLocation('format', format);

    location.reload();
});

$('#filter-city').change(function(event){
    var id = $(this).val();
    var city = $('#filter-city > option[value="' + id + '"]').data('city');

    changeLocation('city', city);

    location.reload();
});

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
            $('#' + selected + ' span').addClass('active');
            $.each($('#' + selected).parents('li'), function(key, val){
                $(val).children('ul').slideDown(200);
                $(val).children('i').addClass('fa-angle-down').removeClass('fa-angle-right');
            });
        }
    } else {
        $('#catalog-content').empty();
        $('#catalog-content').text(response.message);
    }
});

$('#catalog-content').on('click', 'span',function(event){
    var slug = $(this).closest('li').data('slug');
    var cityId = $('#filter-city').val();
    var cityName = $('#filter-city > option[value="' + cityId + '"]').data('city');

    if (locale) {
        url = '/' + locale + slug + '?city=' + cityName;
    } else {
        url = slug + '?city=' + cityName;
    }

    window.history.replaceState('', '', url);

    if ($(this).siblings('ul').children().is('li')) {
        if ($(this).siblings('ul').css('display') == 'none') {
            $(this).siblings('ul').slideDown(200);
            $(this).siblings('i').addClass('fa-angle-down').removeClass('fa-angle-right');
        } else {
            $(this).siblings('ul').slideUp(200);
            $(this).siblings('i').removeClass('fa-angle-down').addClass('fa-angle-right');
        }
    } else {
        var id = $(this).closest('li').attr('id');

        $('.text-black-h3').removeClass('active');
        $(this).addClass('active');

        query = 'menu=' + id + '&city=' + cityId;

        $.get('/catalog/get-products?' + query, function(response){
            $('#pagination').twbsPagination('destroy');

            viewProducts(response, id);
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
    var cityId = $('#product-city').val();
    var cityName = $('#product-city > option[value="' + cityId + '"]').data('city');

    var name = $("#product-name").val();

    if ((name != undefined) && (name != '')) {
        changeLocation('name', name);

        if ((cityId != undefined) && (cityId != '')) {
            changeLocation('city', cityName);
        }

        $.get('/catalog/get-products' + location.search, function(response){
            if (locale) {
                url = '/' + locale + '/products' + location.search;
            } else {
                url = '/products' + location.search;
            }

            window.history.replaceState('', '', url);

            $('#pagination').twbsPagination('destroy');
            viewProducts(response, cityId);
        });
    }

    return true;
}

function viewProducts(response, id) {

    if (response.status == 'ok') {
        $('.products-cards').find('.card').remove();
        $('.container .breadcrumb').hide();

        if (format == 'cards') {
            var template = $('#product-card-template').html();
        } else if (format == 'list') {
            var template = $('#product-list-template').html();
        }

        Mustache.parse(template);

        $.each(response.data, function(key, item){
            var keys = Object.keys(item.prices)[0];
            item.price = item.prices[keys].price;
            item.price_type = item.prices[keys].type;

            $('.products-cards').append(Mustache.render(template, item));
        });

        $('.h1-tag').html(response.h1);

        if (response.count <= pageSize) {
            $('#pagination').twbsPagination('destroy');
        } else {
            initPagination(response.count);
        }
    } else {
        $('.h1-tag').html('');
        $('#pagination').twbsPagination('destroy');
        $('.products-cards').find('.card').remove();
        $('.products-cards').append('<div class="col-md-12 col-sm-12 col-xs-12 card text-center font-up text-black-h2">' + response.message + '</div>');
    }

    $('.default-pagination').addClass('hidden');
    $('.articles').addClass('hidden');
}

function changeLocation(partLinck, data) {
    var get = location.search;
    var address = '?';
    var flag = false;

    if (get = get.substr(1).split('&')) {
        $.each(get, function(key, val){
            if ( (val != '') && (val != undefined) ) {
                part = val.split('=');

                if ((part[0] != '') && (part[1] != '')) {
                    if (part[0] == partLinck) {
                        part[1] = data;
                        flag = true;
                    }
                    address += part[0] + '=' + part[1] + '&';
                }
            }
        });

        if (flag) {
            address = address.slice(0, -1);
        } else {
            address += partLinck + '=' + data;
        }
    } else {
        address += partLinck + '=' + data;
    }

    window.history.replaceState('', '', address);
}

function initPagination(count)
{
    pages = Math.ceil(count/pageSize);

    $('#pagination').twbsPagination({
        totalPages: pages,
        visiblePages: 9,
        first: false,
        prev: '«',
        next: '»',
        last: false,
        onPageClick: function (event, page) {
            changeLocation('page', page);
            $.get('/catalog/get-products' + location.search + '&' + query, function(response){
                viewProducts(response);
            });
        }
    });
}

$('body').on('click', '.add-cart', function(event){
    var tut = this;
    var id = $(this).data('id');

    $.post('/products/product-to-cart', {id: id}, function(response){
        if (response.status == 'ok') {
            if (response.data > 0) {
                $('.shopping-cart-badge').removeClass('hidden');
                $('.shopping-cart-badge').text(response.data);

                $(tut).addClass('btn-default').removeClass('btn-success');
                $(tut).text(response.button);
            } else {
                $('.shopping-cart-badge').addClass('hidden');
                $('.shopping-cart-badge').text('');
            }

            if (response.message !== '') {
                var message = '<span class="text-gray-16">' + response.message + '</span>';
                $('#info-modal .modal-body').html(message);
                $('#info-modal').modal('show');
            }
        } else if ((response.status == 'bad') && (response.error == 'auth')) {
            if (!$('#login-form-send #email').closest('.form-group').hasClass('has-error')) {
                var message = '<span class="help-block"><strong>' + response.message + '</strong></span>';
                $('#login-form-send #email').closest('.form-group').addClass('has-error');
                $('#login-form-send #email').closest('.form-group').append(message);
            }

            $('#login-form').modal('show');
        }
    });
});