$(document).ready(function() {

    new WOW().init();

    $("#shopping-cart").on("show.bs.modal", function (event) {
        $.get("/products/get-order-data", function(response){
            if (response.status == "ok") {
                $(".load-block").addClass("hidden");

                var count = response.data.length;

                if (count > 0) {
                    $(".cart-empty").addClass('hidden');
                    $(".content-block").removeClass('hidden');
                    $(".block-total-price").removeClass('hidden');
                    $("#shopping-cart button[type='submit']").removeClass('hidden');
                    $(".product-list").empty();

                    var template = $('#shopping-cart-product').html();
                    Mustache.parse(template);

                    $.each(response.data, function(key, product){
                        product.work_price = product.price * product.quantity;
                        product.work_id = key;

                        $(".product-list").append(Mustache.render(template, product));
                        $(".product-list").append('<hr/>');
                    });

                    totalSum();
                } else {
                    $(".empty-block").removeClass('hidden');
                    $(".content-block").addClass('hidden');
                    $(".block-total-price").addClass('hidden');
                    $("#shopping-cart button[type='submit']").addClass('hidden');
                }
            } else if ( (response.status == "bad") && (response.auth)){
                $("#shopping-cart").modal('hide');

                $(".not-auth-user").removeClass('hidden');
                $(".not-auth-user").html('<p><b>' + response.message + '</p></b>');
                $("#login-form").modal('show');
            }
        });
    });

    $("[data-target='#login-form']").click(function (event) {
        $(".not-auth-user").addClass('hidden');
    });

    $("body").on('click', ".cart-quantity-minus", function(event){
        var id    = $(this).next("input").data('id');
        var count = +$(this).next("input").val();
        var price = $(this).next("input").data('price');
        var bonds = $(this).next("input").data('bonds');

        if (count > 1) {
            $(this).next("input").val(--count);
            $("#sum-price-" + id).html(price * count);
            changeCountProduct(bonds, count);
        }

        totalSum();
    });

    $("body").on('click', ".cart-quantity-plus", function(event){
        var id    = $(this).prev("input").data('id');
        var count = +$(this).prev("input").val();
        var price = $(this).prev("input").data('price');
        var bonds = $(this).prev("input").data('bonds');

        $(this).prev("input").val(++count);
        $("#sum-price-" + id).html(price * count);

        changeCountProduct(bonds, count);
        totalSum();
    });

    // $("body").on('change keyup', ".quantity", function(event){
    //     var bonds = $(this).data('bonds');

    //     this.value = this.value.replace( /^\D+/g, '');

    //     if ( (this.value == '') || (this.value < 1) ) {
    //         this.value = 1;
    //     }

    //     changeCountProduct(bonds, this.value);
    //     totalSum();
    // });


    var checkError = function(event) {
        $.each($("#login-form-send, #email-form-reset").find('.help-block'), function(key, val){
            if ($(val).text()) {
                $("#login-form").modal('show');
                return false;
            }
        });
    }();
});

function changeCountProduct(id, count)
{
    $.post('/products/change-count-products', {id: id, count: count}, function(response){});
}

function totalSum()
{
    var sum = 0;
    $.each($('.sum-price'), function(key, price){
        sum += +$(price).text();
    });

    $(".total-price").text(sum);
}

function deleteProduct(id)
{
    $.post('/products/remove-product-to-cart', {id: id}, function(response){
        if (response.status == 'ok') {

            if (response.data > 0) {
                $(".shopping-cart-badge").removeClass("hidden");
                $(".shopping-cart-badge").text(response.data);
            } else {
                $(".shopping-cart-badge").addClass("hidden");
                $(".shopping-cart-badge").text('');

                $(".cart-empty").removeClass('hidden');
                $(".empty-block").removeClass('hidden');
                $(".content-block").addClass('hidden');
                $(".block-total-price").addClass('hidden');
                $("#shopping-cart button[type='submit']").addClass('hidden');
            }

            $("#bonds-" + id).next("hr").remove();
            $("#bonds-" + id).remove();

            totalSum();
        }
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val(),
    }
});

/* перемотка в верх */
$(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
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

$(".show-reset-pass-form").click(function(event){
  $("#show-login-form").hide(400);
  $("#show-reset-pass-form").show(400);
});

$(".show-login-form").click(function(event){
  $("#show-reset-pass-form").hide(400);
  $("#show-login-form").show(400);
});

