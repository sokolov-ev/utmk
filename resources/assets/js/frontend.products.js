var pageSize = 9;
var query    = '';
var url      = '';
var format   = $('.format').text();

$(".change-format").click(function(event){
    if (format == 'cards') {
        format = 'list';
        $('#format-list').addClass('hidden');
        $('#format-cards').removeClass('hidden');
    } else {
        format = 'cards';
        $('#format-list').removeClass('hidden');
        $('#format-cards').addClass('hidden');
    }

    if (query == '') {
        url = 'format=' + format;
    } else {
        url += '&format=' + format;
    }

    $.get('/catalog/get-products?' + query + url, function(response){
        viewProducts(response);
        changeUrl(format, '/catalog/products?' + query + url);
    });
});

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

        $('.text-black-h3').removeClass('active');
        $(this).addClass('active');

        url   = '/catalog/products/' + slug + '/' + id;
        query = 'menu=' + id;

        $.get('/catalog/get-products?' + query, function(response){
            viewProducts(response);
            changeUrl(id, url);
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

        if (response.data.length < pageSize) {
            $('#pagination').twbsPagination('destroy');
        } else if (response.data.length != pageSize) {
            initPagination(response.count);
        }
    } else {
        $('.products-cards').find('.card').remove();
        $('.products-cards').append('<div class="col-md-12 col-sm-12 col-xs-12 card text-center font-up text-black-h2">' + response.message + '</div>');
        $('#pagination').twbsPagination('destroy');
    }
}

function changeUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
    } else {
        alert("Browser does not support HTML5.");
    }
}

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
                changeUrl('', url);
            });
        }
    });
}

$("body").on('click', '.add-cart', function(event){
    var tut = this;
    var id = $(this).data('id');

    $.post('/products/product-to-cart', {id: id}, function(response){
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