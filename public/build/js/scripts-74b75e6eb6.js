$(window).scroll(function(){$(this).scrollTop()>10?$(".scroller").fadeIn():$(".scroller").fadeOut()}),$(".scroller").click(function(){return $("body,html").animate({scrollTop:0},400),!1}),$(window).scrollTop()>10&&$(".scroller").fadeIn(),function(o){function s(){var s=o("#top__content").outerHeight(!0),e=o("#w-sticker").outerHeight(!0);o(window).scrollTop()>=s&&o(window).innerWidth()>=767?(o("#w-sticker").css("height",e),o("#sticker").addClass("active")):(o("#sticker").removeClass("active"),o("#w-sticker").removeAttr("style"))}o(window).on("scroll",s),o(window).on("resize",s)}(jQuery),$(".show-reset-pass-form").click(function(o){$("#show-login-form").hide(400),$("#show-reset-pass-form").show(400)}),$(".show-login-form").click(function(o){$("#show-reset-pass-form").hide(400),$("#show-login-form").show(400)});