function searchProducts(){var t=$("#product-city").val(),a=$('#product-city > option[value="'+t+'"]').data("city"),s=$("#product-name").val();return void 0!=s&&""!=s&&(changeLocation("name",s),void 0!=t&&""!=t&&changeLocation("city",a),$.get("/catalog/get-products"+location.search,function(a){url=locale?"/"+locale+"/products"+location.search:"/products"+location.search,window.history.replaceState("","",url),$("#pagination").twbsPagination("destroy"),viewProducts(a,t)})),!0}function viewProducts(t,a){if("ok"==t.status){if($(".products-cards").find(".card").remove(),"cards"==format)var s=$("#product-card-template").html();else if("list"==format)var s=$("#product-list-template").html();Mustache.parse(s),$.each(t.data,function(t,a){var e=Object.keys(a.prices)[0];a.price=a.prices[e].price,a.price_type=a.prices[e].type,$(".products-cards").append(Mustache.render(s,a))}),$(".h1-tag").html(t.h1),t.count<=pageSize?$("#pagination").twbsPagination("destroy"):initPagination(t.count)}else $(".h1-tag").html(""),$("#pagination").twbsPagination("destroy"),$(".products-cards").find(".card").remove(),$(".products-cards").append('<div class="col-md-12 col-sm-12 col-xs-12 card text-center font-up text-black-h2">'+t.message+"</div>");$(".default-pagination").addClass("hidden"),$(".articles").addClass("hidden")}function changeLocation(t,a){var s=location.search,e="?",i=!1;(s=s.substr(1).split("&"))?($.each(s,function(s,o){""!=o&&void 0!=o&&(part=o.split("="),""!=part[0]&&""!=part[1]&&(part[0]==t&&(part[1]=a,i=!0),e+=part[0]+"="+part[1]+"&"))}),i?e=e.slice(0,-1):e+=t+"="+a):e+=t+"="+a,window.history.replaceState("","",e)}function initPagination(t){pages=Math.ceil(t/pageSize),$("#pagination").twbsPagination({totalPages:pages,visiblePages:9,first:!1,prev:"«",next:"»",last:!1,onPageClick:function(t,a){changeLocation("page",a),$.get("/catalog/get-products"+location.search+"&"+query,function(t){viewProducts(t)})}})}var pageSize=9,query="",url=location.pathname,format=$(".format").text(),menuId=null,locale=location.pathname.split("/")[1];$.inArray(locale,["en","uk"])==-1&&(locale=!1),$(".products").addClass("active"),$(".change-format").click(function(t){"cards"==format?(format="list",$("#format-list").addClass("hidden"),$("#format-cards").removeClass("hidden")):(format="cards",$("#format-list").removeClass("hidden"),$("#format-cards").addClass("hidden")),changeLocation("format",format),location.reload()}),$("#filter-city").change(function(t){var a=$(this).val(),s=$('#filter-city > option[value="'+a+'"]').data("city");changeLocation("city",s),location.reload()}),$.get("/catalog/get-catalog",function(t){if("ok"==t.status){$("#catalog-content").empty();var a=$(".menu-selected").data("id"),s=$("#product-menu-template").html();Mustache.parse(s),$.each(t.data,function(t,a){a.parent>0?($("#"+a.parent+" > ul").append(Mustache.render(s,a)),$("#"+a.parent+" > ul").css("display","none"),$("#"+a.parent+" > i").addClass("fa fa-angle-right")):$("#catalog-content").append(Mustache.render(s,a))}),a&&($("#"+a+" span").addClass("active"),$.each($("#"+a).parents("li"),function(t,a){$(a).children("ul").slideDown(200),$(a).children("i").addClass("fa-angle-down").removeClass("fa-angle-right")}))}else $("#catalog-content").empty(),$("#catalog-content").text(t.message)}),$("#catalog-content").on("click","span",function(t){var a=$(this).closest("li").data("slug"),s=$("#filter-city").val(),e=$('#filter-city > option[value="'+s+'"]').data("city");if(url=locale?"/"+locale+a+"?city="+e:a+"?city="+e,window.history.replaceState("","",url),$(this).siblings("ul").children().is("li"))"none"==$(this).siblings("ul").css("display")?($(this).siblings("ul").slideDown(200),$(this).siblings("i").addClass("fa-angle-down").removeClass("fa-angle-right")):($(this).siblings("ul").slideUp(200),$(this).siblings("i").removeClass("fa-angle-down").addClass("fa-angle-right"));else{var i=$(this).closest("li").attr("id");$(".text-black-h3").removeClass("active"),$(this).addClass("active"),query="menu="+i+"&city="+s,$.get("/catalog/get-products?"+query,function(t){$("#pagination").twbsPagination("destroy"),viewProducts(t,i)})}}),$("#product-name").on("change keyup",function(t){13==t.keyCode&&searchProducts()}),$("body").on("click",".add-cart",function(t){var a=this,s=$(this).data("id");$.post("/products/product-to-cart",{id:s},function(t){if("ok"==t.status){if(t.data>0?($(".shopping-cart-badge").removeClass("hidden"),$(".shopping-cart-badge").text(t.data),$(a).addClass("btn-default").removeClass("btn-success"),$(a).text(t.button)):($(".shopping-cart-badge").addClass("hidden"),$(".shopping-cart-badge").text("")),""!=t.message){var s='<span class="text-gray-16">'+t.message+"</span>";$("#info-modal .modal-body").html(s),$("#info-modal").modal("show")}}else if("bad"==t.status&&"auth"==t.error){if(!$("#login-form-send #email").closest(".form-group").hasClass("has-error")){var s='<span class="help-block"><strong>'+t.message+"</strong></span>";$("#login-form-send #email").closest(".form-group").addClass("has-error"),$("#login-form-send #email").closest(".form-group").append(s)}$("#login-form").modal("show")}})}),function(t,a,s,e){"use strict";var i=t.fn.twbsPagination,o=function(s,e){if(this.$element=t(s),this.options=t.extend({},t.fn.twbsPagination.defaults,e),this.options.startPage<1||this.options.startPage>this.options.totalPages)throw new Error("Start page option is incorrect");if(this.options.totalPages=parseInt(this.options.totalPages),isNaN(this.options.totalPages))throw new Error("Total pages option is not correct!");if(this.options.visiblePages=parseInt(this.options.visiblePages),isNaN(this.options.visiblePages))throw new Error("Visible pages option is not correct!");if(this.options.totalPages<this.options.visiblePages&&(this.options.visiblePages=this.options.totalPages),this.options.onPageClick instanceof Function&&this.$element.first().on("page",this.options.onPageClick),this.options.href){var i,o=this.options.href.replace(/[-\/\\^$*+?.|[\]]/g,"\\$&");o=o.replace(this.options.pageVariable,"(\\d+)"),null!=(i=new RegExp(o,"i").exec(a.location.href))&&(this.options.startPage=parseInt(i[1],10))}var n="function"==typeof this.$element.prop?this.$element.prop("tagName"):this.$element.attr("tagName");return"UL"===n?this.$listContainer=this.$element:this.$listContainer=t("<ul></ul>"),this.$listContainer.addClass(this.options.paginationClass),"UL"!==n&&this.$element.append(this.$listContainer),this.options.initiateStartPageClick?this.show(this.options.startPage):(this.render(this.getPages(this.options.startPage)),this.setupEvents()),this};o.prototype={constructor:o,destroy:function(){return this.$element.empty(),this.$element.removeData("twbs-pagination"),this.$element.off("page"),this},show:function(t){if(t<1||t>this.options.totalPages)throw new Error("Page is incorrect.");return this.render(this.getPages(t)),this.setupEvents(),this.$element.trigger("page",t),this},buildListItems:function(t){var a=[];if(this.options.first&&a.push(this.buildItem("first",1)),this.options.prev){var s=t.currentPage>1?t.currentPage-1:this.options.loop?this.options.totalPages:1;a.push(this.buildItem("prev",s))}for(var e=0;e<t.numeric.length;e++)a.push(this.buildItem("page",t.numeric[e]));if(this.options.next){var i=t.currentPage<this.options.totalPages?t.currentPage+1:this.options.loop?1:this.options.totalPages;a.push(this.buildItem("next",i))}return this.options.last&&a.push(this.buildItem("last",this.options.totalPages)),a},buildItem:function(a,s){var e=t("<li></li>"),i=t("<a></a>"),o=null;return o=this.options[a]?this.makeText(this.options[a],s):s,e.addClass(this.options[a+"Class"]),e.data("page",s),e.data("page-type",a),e.append(i.attr("href",this.makeHref(s)).addClass(this.options.anchorClass).html(o)),e},getPages:function(t){var a=[],s=Math.floor(this.options.visiblePages/2),e=t-s+1-this.options.visiblePages%2,i=t+s;e<=0&&(e=1,i=this.options.visiblePages),i>this.options.totalPages&&(e=this.options.totalPages-this.options.visiblePages+1,i=this.options.totalPages);for(var o=e;o<=i;)a.push(o),o++;return{currentPage:t,numeric:a}},render:function(a){var s=this;this.$listContainer.children().remove();var e=this.buildListItems(a);jQuery.each(e,function(t,a){s.$listContainer.append(a)}),this.$listContainer.children().each(function(){var e=t(this),i=e.data("page-type");switch(i){case"page":e.data("page")===a.currentPage&&e.addClass(s.options.activeClass);break;case"first":e.toggleClass(s.options.disabledClass,1===a.currentPage);break;case"last":e.toggleClass(s.options.disabledClass,a.currentPage===s.options.totalPages);break;case"prev":e.toggleClass(s.options.disabledClass,!s.options.loop&&1===a.currentPage);break;case"next":e.toggleClass(s.options.disabledClass,!s.options.loop&&a.currentPage===s.options.totalPages)}})},setupEvents:function(){var a=this;this.$listContainer.find("li").each(function(){var s=t(this);return s.off(),s.hasClass(a.options.disabledClass)||s.hasClass(a.options.activeClass)?void s.on("click",!1):void s.click(function(t){!a.options.href&&t.preventDefault(),a.show(parseInt(s.data("page")))})})},makeHref:function(t){return this.options.href?this.makeText(this.options.href,t):"#"},makeText:function(t,a){return t.replace(this.options.pageVariable,a).replace(this.options.totalPagesVariable,this.options.totalPages)}},t.fn.twbsPagination=function(a){var s,i=Array.prototype.slice.call(arguments,1),n=t(this),r=n.data("twbs-pagination"),l="object"==typeof a?a:{};return r||n.data("twbs-pagination",r=new o(this,l)),"string"==typeof a&&(s=r[a].apply(r,i)),s===e?n:s},t.fn.twbsPagination.defaults={totalPages:1,startPage:1,visiblePages:5,initiateStartPageClick:!0,href:!1,pageVariable:"{{page}}",totalPagesVariable:"{{total_pages}}",page:null,first:"First",prev:"Previous",next:"Next",last:"Last",loop:!1,onPageClick:null,paginationClass:"pagination",nextClass:"next",prevClass:"prev",lastClass:"last",firstClass:"first",pageClass:"page",activeClass:"active",disabledClass:"disabled",anchorClass:"page-link"},t.fn.twbsPagination.Constructor=o,t.fn.twbsPagination.noConflict=function(){return t.fn.twbsPagination=i,this}}(window.jQuery,window,document);