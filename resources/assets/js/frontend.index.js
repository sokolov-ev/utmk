$(document).ready(function() {
    new WOW().init();

    var checkError = function(event) {
        $.each($('#login-form-send, #email-form-reset').find('.help-block'), function(key, val){
            if ($(val).text()) {
                $('#login-form').modal('show');
                return false;
            }
        });
    }();
});

    var prices = {};

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val(),
        }
    });

    $('[data-target="#login-form"]').click(function (event) {
        $('.not-auth-user').addClass('hidden');
    });

    $('#shopping-cart').on('show.bs.modal', function (event) {
        $.get('/products/get-order-data', function(response){
            if (response.status == 'ok') {
                $('.load-block').addClass('hidden');

                var count = response.data.length;

                if (count > 0) {
                    $('.cart-empty').addClass('hidden');
                    $('.content-block').removeClass('hidden');
                    $('.block-total-price').removeClass('hidden');
                    $('#shopping-cart button[type="submit"]').removeClass('hidden');
                    $('.product-list').empty();

                    var template = $('#shopping-cart-product').html();
                    Mustache.parse(template);

                    prices = {};

                    $.each(response.data, function(key, product) {
                        product.work_key = key;

                        var id = 0;
                        var temp;

                        $.each(product.order_prices, function(priceId, price){
                            temp = {};

                            temp.price = price.price;
                            temp.bonds = product.bonds;

                            prices[priceId] = temp;
                        });

                        $('.product-list').append(Mustache.render(template, product));
                        $('.product-list').append('<hr/>');

                        if (product.price_id > 0) {
                            id = product.price_id;
                        } else {
                            id = product.order_prices[0].id;
                        }

                        $('option[value="' + id + '"]').attr('selected', '');
                        $('.price-' + key).text(prices[id].price);
                        $('.quantity-' + key).data('priceid', id);
                        $('.sum-price-' + key).text(prices[id].price * product.quantity);
                    });

                    totalSum();
                } else {
                    $('.empty-block').removeClass('hidden');
                    $('.content-block').addClass('hidden');
                    $('.block-total-price').addClass('hidden');
                    $('#shopping-cart button[type="submit"]').addClass('hidden');
                }
            } else if ( (response.status == 'bad') && (response.auth)){
                $('#shopping-cart').modal('hide');

                $('.not-auth-user').removeClass('hidden');
                $('.not-auth-user').html('<p><b>' + response.message + '</p></b>');
                $('#login-form').modal('show');
            }
        });
    });

    $('body').on('change', '.price-type', function(event) {
        var tut = this;
        var key = $(tut).data('workid');
        var id  = $(tut).val();
        var quantity = $('.quantity-' + key).val();

        $('.price-' + key).text(prices[id].price);
        $('.sum-price-' + key).text(quantity * prices[id].price);

        changeCountProduct(prices[id].bonds, quantity, id);
        totalSum();
    });

    $('body').on('click', '.cart-quantity-minus', function(event){
        var tut = this;
        var key = $(tut).data('workid');
        var id  = $('.price-type-' + key).val();
        var quantity = $('.quantity-' + key).val();

        if (quantity > 1) {
            $('.quantity-' + key).val(--quantity);
            $('.sum-price-' + key).text(quantity * prices[id].price);
            changeCountProduct(prices[id].bonds, quantity, id);
        }

        totalSum();
    });

    $('body').on('click', '.cart-quantity-plus', function(event){
        var tut = this;
        var key = $(tut).data('workid');
        var id  = $('.price-type-' + key).val();
        var quantity = $('.quantity-' + key).val();

        $('.quantity-' + key).val(++quantity);
        $('.sum-price-' + key).text(prices[id].price * quantity);

        changeCountProduct(prices[id].bonds, quantity, id);
        totalSum();
    });

    $('body').on('change keyup', '.quantity', function(event){
        var tut = this;
        var key = $(tut).data('workid');
        var id  = $('.price-type-' + key).val();

        tut.value = tut.value.replace("/^\D+/g", '');

        if ( (tut.value == '') || (tut.value < 1) ) {
            tut.value = 1;
        }

        $('.sum-price-' + key).text(prices[id].price * tut.value);

        changeCountProduct(prices[id].bonds, tut.value, id);
        totalSum();
    });

function changeCountProduct(orderId, productCount, priceId)
{
    $.post('/products/change-count-products', {id: orderId, count: productCount, price: priceId}, function(response){});
}

function totalSum()
{
    var sum = 0;

    $.each($('#shopping-cart').find('.sum-price'), function(key, price){
        sum += +$(price).text();
    });

    $('.modal-footer .total-sum-price').text(sum);

    sum = 0;

    $.each($('.product-card').find('.sum-price'), function(key, price){
        sum += +$(price).text();
    });

    $(".total-price").text(sum);
}

function deleteProduct(id)
{
    $.post('/products/remove-product-to-cart', {id: id}, function(response){
        if (response.status == 'ok') {

            if (response.data > 0) {
                $('.shopping-cart-badge').removeClass('hidden');
                $('.shopping-cart-badge').text(response.data);
            } else {
                location.reload();
            }

            $('#bonds-' + id).next('hr').remove();
            $('#bonds-' + id).remove();

            totalSum();
        }
    });
}

/* перемотка в верх */
$(window).scroll(function () {
    if ($(this).scrollTop() > 40) {
        $('.scroller').fadeIn();
    } else {
        $('.scroller').fadeOut();
    }
});

$('.scroller').click(function () {
    $('body,html').animate({scrollTop: 0}, 400);

    return false;
});

if ($(window).scrollTop() > 10) {
    $('.scroller').fadeIn();
}
/* конец перемотки в верх */

;(function($) {
  $(window).on('scroll', sticker);
  $(window).on('resize', sticker);

  function sticker() {
    var topContent = $('#top__content').outerHeight(true);
    var menuHeight = $('#w-sticker').outerHeight(true);

    if( $(window).scrollTop() >= topContent && $(window).innerWidth() > 767) {
      $('#w-sticker').css('height', menuHeight);
      $('#sticker').addClass('active');
    } else {
      $('#sticker').removeClass('active');
      $('#w-sticker').removeAttr('style');
    }
  }
})(jQuery);

$('.show-reset-pass-form').click(function(event){
  $('#show-login-form').hide(400);
  $('#show-reset-pass-form').show(400);
});

$('.show-login-form').click(function(event){
  $('#show-reset-pass-form').hide(400);
  $('#show-login-form').show(400);
});

$('#info-modal').on('hide.bs.modal', function(event){
    location.reload();
});