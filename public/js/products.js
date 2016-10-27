function searchProducts(){var t=$("#product-city").val(),s=$("#product-name").val();return void 0!=s&&""!=s&&(query="name="+s,void 0!=t&&""!=t&&(query+="&id="+t),$.get("/catalog/get-products?"+query,function(t){viewProducts(t)})),!0}function viewProducts(t){if("ok"==t.status){if($(".products-cards").find(".card").remove(),"cards"==format)var s=$("#product-card-template").html();else if("list"==format)var s=$("#product-list-template").html();Mustache.parse(s),$.each(t.data,function(t,a){var e=Object.keys(a.prices)[0];a.price=a.prices[e].price,a.price_type=a.prices[e].type,$(".products-cards").append(Mustache.render(s,a))}),t.data.length<pageSize?$("#pagination").twbsPagination("destroy"):t.data.length!=pageSize&&initPagination(t.count)}else $(".products-cards").find(".card").remove(),$(".products-cards").append('<div class="col-md-12 col-sm-12 col-xs-12 card text-center font-up text-black-h2">'+t.message+"</div>"),$("#pagination").twbsPagination("destroy")}function changeUrl(t,s){if("undefined"!=typeof history.pushState){var a={Title:t,Url:s};history.pushState(a,a.Title,a.Url)}else alert("Browser does not support HTML5.")}function initPagination(t){pages=Math.ceil(t/pageSize),$("#pagination").twbsPagination({totalPages:pages,visiblePages:5,first:$(".first").text(),prev:"«",next:"»",last:$(".last").text(),onPageClick:function(t,s){$.get("/catalog/get-products?"+query+"&page="+s,function(t){viewProducts(t),url+="&page="+s,changeUrl("",url)})}})}var pageSize=9,query="",url="",format=$(".format").text();$(".change-format").click(function(t){"cards"==format?(format="list",$("#format-list").addClass("hidden"),$("#format-cards").removeClass("hidden")):(format="cards",$("#format-list").removeClass("hidden"),$("#format-cards").addClass("hidden")),""==query?url="format="+format:url+="&format="+format,$.get("/catalog/get-products?"+query+url,function(t){viewProducts(t),changeUrl(format,"/catalog/products?"+query+url)})}),$(".products").addClass("active"),$.get("/catalog/get-catalog",function(t){if("ok"==t.status){$("#catalog-content").empty();var s=$(".menu-selected").data("id"),a=$("#product-menu-template").html();Mustache.parse(a),$.each(t.data,function(t,s){s.parent>0?($("#"+s.parent+" > ul").append(Mustache.render(a,s)),$("#"+s.parent+" > ul").css("display","none"),$("#"+s.parent+" > i").addClass("fa fa-angle-right")):$("#catalog-content").append(Mustache.render(a,s))}),s&&($("#"+s+" span").addClass("active"),$.each($("#"+s).parents("li"),function(t,s){$(s).children("ul").slideDown(200),$(s).children("i").addClass("fa-angle-down").removeClass("fa-angle-right")}))}else $("#catalog-content").empty(),$("#catalog-content").text(t.message)}),$("#catalog-content").on("click","span",function(t){if($(this).siblings("ul").children().is("li"))"none"==$(this).siblings("ul").css("display")?($(this).siblings("ul").slideDown(200),$(this).siblings("i").addClass("fa-angle-down").removeClass("fa-angle-right")):($(this).siblings("ul").slideUp(200),$(this).siblings("i").removeClass("fa-angle-down").addClass("fa-angle-right"));else{var s=$(this).closest("li").attr("id"),a=$(this).closest("li").data("slug");$(".text-black-h3").removeClass("active"),$(this).addClass("active"),url="/catalog/products/"+a+"/"+s,query="menu="+s,$.get("/catalog/get-products?"+query,function(t){viewProducts(t),changeUrl(s,url)})}}),$("#product-name").on("change keyup",function(t){13==t.keyCode&&searchProducts()}),$("body").on("click",".add-cart",function(t){var s=this,a=$(this).data("id");$.post("/products/product-to-cart",{id:a},function(t){"ok"==t.status?t.data>0?($(".shopping-cart-badge").removeClass("hidden"),$(".shopping-cart-badge").text(t.data),$(s).addClass("btn-default").removeClass("btn-success"),$(s).text(t.message)):($(".shopping-cart-badge").addClass("hidden"),$(".shopping-cart-badge").text("")):"bad"==t.status&&t.auth&&($(".not-auth-user").removeClass("hidden"),$(".not-auth-user").html("<p><b>"+t.message+"</p></b>"),$("#login-form").modal("show"))})}),function(t,s,a,e){"use strict";var i=t.fn.twbsPagination,o=function(a,e){if(this.$element=t(a),this.options=t.extend({},t.fn.twbsPagination.defaults,e),this.options.startPage<1||this.options.startPage>this.options.totalPages)throw new Error("Start page option is incorrect");if(this.options.totalPages=parseInt(this.options.totalPages),isNaN(this.options.totalPages))throw new Error("Total pages option is not correct!");if(this.options.visiblePages=parseInt(this.options.visiblePages),isNaN(this.options.visiblePages))throw new Error("Visible pages option is not correct!");if(this.options.totalPages<this.options.visiblePages&&(this.options.visiblePages=this.options.totalPages),this.options.onPageClick instanceof Function&&this.$element.first().on("page",this.options.onPageClick),this.options.href){var i,o=this.options.href.replace(/[-\/\\^$*+?.|[\]]/g,"\\$&");o=o.replace(this.options.pageVariable,"(\\d+)"),null!=(i=new RegExp(o,"i").exec(s.location.href))&&(this.options.startPage=parseInt(i[1],10))}var n="function"==typeof this.$element.prop?this.$element.prop("tagName"):this.$element.attr("tagName");return"UL"===n?this.$listContainer=this.$element:this.$listContainer=t("<ul></ul>"),this.$listContainer.addClass(this.options.paginationClass),"UL"!==n&&this.$element.append(this.$listContainer),this.options.initiateStartPageClick?this.show(this.options.startPage):(this.render(this.getPages(this.options.startPage)),this.setupEvents()),this};o.prototype={constructor:o,destroy:function(){return this.$element.empty(),this.$element.removeData("twbs-pagination"),this.$element.off("page"),this},show:function(t){if(t<1||t>this.options.totalPages)throw new Error("Page is incorrect.");return this.render(this.getPages(t)),this.setupEvents(),this.$element.trigger("page",t),this},buildListItems:function(t){var s=[];if(this.options.first&&s.push(this.buildItem("first",1)),this.options.prev){var a=t.currentPage>1?t.currentPage-1:this.options.loop?this.options.totalPages:1;s.push(this.buildItem("prev",a))}for(var e=0;e<t.numeric.length;e++)s.push(this.buildItem("page",t.numeric[e]));if(this.options.next){var i=t.currentPage<this.options.totalPages?t.currentPage+1:this.options.loop?1:this.options.totalPages;s.push(this.buildItem("next",i))}return this.options.last&&s.push(this.buildItem("last",this.options.totalPages)),s},buildItem:function(s,a){var e=t("<li></li>"),i=t("<a></a>"),o=null;return o=this.options[s]?this.makeText(this.options[s],a):a,e.addClass(this.options[s+"Class"]),e.data("page",a),e.data("page-type",s),e.append(i.attr("href",this.makeHref(a)).addClass(this.options.anchorClass).html(o)),e},getPages:function(t){var s=[],a=Math.floor(this.options.visiblePages/2),e=t-a+1-this.options.visiblePages%2,i=t+a;e<=0&&(e=1,i=this.options.visiblePages),i>this.options.totalPages&&(e=this.options.totalPages-this.options.visiblePages+1,i=this.options.totalPages);for(var o=e;o<=i;)s.push(o),o++;return{currentPage:t,numeric:s}},render:function(s){var a=this;this.$listContainer.children().remove();var e=this.buildListItems(s);jQuery.each(e,function(t,s){a.$listContainer.append(s)}),this.$listContainer.children().each(function(){var e=t(this),i=e.data("page-type");switch(i){case"page":e.data("page")===s.currentPage&&e.addClass(a.options.activeClass);break;case"first":e.toggleClass(a.options.disabledClass,1===s.currentPage);break;case"last":e.toggleClass(a.options.disabledClass,s.currentPage===a.options.totalPages);break;case"prev":e.toggleClass(a.options.disabledClass,!a.options.loop&&1===s.currentPage);break;case"next":e.toggleClass(a.options.disabledClass,!a.options.loop&&s.currentPage===a.options.totalPages)}})},setupEvents:function(){var s=this;this.$listContainer.find("li").each(function(){var a=t(this);return a.off(),a.hasClass(s.options.disabledClass)||a.hasClass(s.options.activeClass)?void a.on("click",!1):void a.click(function(t){!s.options.href&&t.preventDefault(),s.show(parseInt(a.data("page")))})})},makeHref:function(t){return this.options.href?this.makeText(this.options.href,t):"#"},makeText:function(t,s){return t.replace(this.options.pageVariable,s).replace(this.options.totalPagesVariable,this.options.totalPages)}},t.fn.twbsPagination=function(s){var a,i=Array.prototype.slice.call(arguments,1),n=t(this),r=n.data("twbs-pagination"),l="object"==typeof s?s:{};return r||n.data("twbs-pagination",r=new o(this,l)),"string"==typeof s&&(a=r[s].apply(r,i)),a===e?n:a},t.fn.twbsPagination.defaults={totalPages:1,startPage:1,visiblePages:5,initiateStartPageClick:!0,href:!1,pageVariable:"{{page}}",totalPagesVariable:"{{total_pages}}",page:null,first:"First",prev:"Previous",next:"Next",last:"Last",loop:!1,onPageClick:null,paginationClass:"pagination",nextClass:"next",prevClass:"prev",lastClass:"last",firstClass:"first",pageClass:"page",activeClass:"active",disabledClass:"disabled",anchorClass:"page-link"},t.fn.twbsPagination.Constructor=o,t.fn.twbsPagination.noConflict=function(){return t.fn.twbsPagination=i,this}}(window.jQuery,window,document);