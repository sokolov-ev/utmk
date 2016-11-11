var pageSize = 9;
var query    = '';
var url      = location.pathname;
var format   = $('.format').text();
var menuId   = null;

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

    if (query == '') {
        url += '?format=' + format;
    } else {
        url += '&format=' + format;
    }

    $.get('/catalog/get-products' + location.search, function(response){
        viewProducts(response);
        changeLocation('format', format);
    });
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

    url = slug + '?city=' + cityName;
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

            $(".articles").addClass("hidden");
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
            url = '/products' + location.search;
            window.history.replaceState('', '', url);
            $('#pagination').twbsPagination('destroy');
            viewProducts(response, cityId);
            $(".articles").addClass("hidden");
        });
    }

    return true;
}

function viewProducts(response, id) {
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

        if (response.count <= pageSize) {
            $('#pagination').twbsPagination('destroy');
        } else {
            $('.default-pagination').addClass('hidden');
            initPagination(response.count);
        }
    } else {
        $('#pagination').twbsPagination('destroy');
        $('.products-cards').find('.card').remove();
        $('.products-cards').append('<div class="col-md-12 col-sm-12 col-xs-12 card text-center font-up text-black-h2">' + response.message + '</div>');
        $('#pagination').twbsPagination('destroy');
    }

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
            $.get('/catalog/get-products' + location.search, function(response){
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

            if (response.message != '') {
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
/*!
 * jQuery pagination plugin v1.4
 * http://esimakin.github.io/twbs-pagination/
 *
 * Copyright 2014-2015, Eugene Simakin
 * Released under Apache 2.0 license
 * http://apache.org/licenses/LICENSE-2.0.html
 */
(function ($, window, document, undefined) {

    'use strict';

    var old = $.fn.twbsPagination;

    // PROTOTYPE AND CONSTRUCTOR

    var TwbsPagination = function (element, options) {
        this.$element = $(element);
        this.options = $.extend({}, $.fn.twbsPagination.defaults, options);

        if (this.options.startPage < 1 || this.options.startPage > this.options.totalPages) {
            throw new Error('Start page option is incorrect');
        }

        this.options.totalPages = parseInt(this.options.totalPages);
        if (isNaN(this.options.totalPages)) {
            throw new Error('Total pages option is not correct!');
        }

        this.options.visiblePages = parseInt(this.options.visiblePages);
        if (isNaN(this.options.visiblePages)) {
            throw new Error('Visible pages option is not correct!');
        }

        if (this.options.totalPages < this.options.visiblePages) {
            this.options.visiblePages = this.options.totalPages;
        }

        if (this.options.onPageClick instanceof Function) {
            this.$element.first().on('page', this.options.onPageClick);
        }

        if (this.options.href) {
            var match, regexp = this.options.href.replace(/[-\/\\^$*+?.|[\]]/g, '\\$&');
            regexp = regexp.replace(this.options.pageVariable, '(\\d+)');
            if ((match = new RegExp(regexp, 'i').exec(window.location.href)) != null) {
                this.options.startPage = parseInt(match[1], 10);
            }
        }

        var tagName = (typeof this.$element.prop === 'function') ?
            this.$element.prop('tagName') : this.$element.attr('tagName');

        if (tagName === 'UL') {
            this.$listContainer = this.$element;
        } else {
            this.$listContainer = $('<ul></ul>');
        }

        this.$listContainer.addClass(this.options.paginationClass);

        if (tagName !== 'UL') {
            this.$element.append(this.$listContainer);
        }

        if (this.options.initiateStartPageClick) {
            this.show(this.options.startPage);
        } else {
            this.render(this.getPages(this.options.startPage));
            this.setupEvents();
        }

        return this;
    };

    TwbsPagination.prototype = {

        constructor: TwbsPagination,

        destroy: function () {
            this.$element.empty();
            this.$element.removeData('twbs-pagination');
            this.$element.off('page');

            return this;
        },

        show: function (page) {
            if (page < 1 || page > this.options.totalPages) {
                throw new Error('Page is incorrect.');
            }

            this.render(this.getPages(page));
            this.setupEvents();

            this.$element.trigger('page', page);

            return this;
        },

        buildListItems: function (pages) {
            var listItems = [];

            // Add "first" page button
            if (this.options.first) {
                listItems.push(this.buildItem('first', 1));
            }
            // Add "previous" page button
            if (this.options.prev) {
                var prev = pages.currentPage > 1 ? pages.currentPage - 1 : this.options.loop ? this.options.totalPages  : 1;
                listItems.push(this.buildItem('prev', prev));
            }
            // Add "pages"
            for (var i = 0; i < pages.numeric.length; i++) {
                listItems.push(this.buildItem('page', pages.numeric[i]));
            }
            // Add "next" page button
            if (this.options.next) {
                var next = pages.currentPage < this.options.totalPages ? pages.currentPage + 1 : this.options.loop ? 1 : this.options.totalPages;
                listItems.push(this.buildItem('next', next));
            }
            // Add "last" page button
            if (this.options.last) {
                listItems.push(this.buildItem('last', this.options.totalPages));
            }

            return listItems;
        },

        buildItem: function (type, page) {
            var $itemContainer = $('<li></li>'),
                $itemContent = $('<a></a>'),
                itemText = null;

            itemText = this.options[type] ? this.makeText(this.options[type], page) : page;
            $itemContainer.addClass(this.options[type + 'Class']);
            $itemContainer.data('page', page);
            $itemContainer.data('page-type', type);
            $itemContainer.append($itemContent.attr('href', this.makeHref(page)).addClass(this.options.anchorClass).html(itemText));

            return $itemContainer;
        },

        getPages: function (currentPage) {
            var pages = [];

            var half = Math.floor(this.options.visiblePages / 2);
            var start = currentPage - half + 1 - this.options.visiblePages % 2;
            var end = currentPage + half;

            // handle boundary case
            if (start <= 0) {
                start = 1;
                end = this.options.visiblePages;
            }
            if (end > this.options.totalPages) {
                start = this.options.totalPages - this.options.visiblePages + 1;
                end = this.options.totalPages;
            }

            var itPage = start;
            while (itPage <= end) {
                pages.push(itPage);
                itPage++;
            }

            return {"currentPage": currentPage, "numeric": pages};
        },

        render: function (pages) {
            var _this = this;
            this.$listContainer.children().remove();
            var items = this.buildListItems(pages);
            jQuery.each(items, function(key, item){
                _this.$listContainer.append(item);
            });

            this.$listContainer.children().each(function () {
                var $this = $(this),
                    pageType = $this.data('page-type');

                switch (pageType) {
                    case 'page':
                        if ($this.data('page') === pages.currentPage) {
                            $this.addClass(_this.options.activeClass);
                        }
                        break;
                    case 'first':
                            $this.toggleClass(_this.options.disabledClass, pages.currentPage === 1);
                        break;
                    case 'last':
                            $this.toggleClass(_this.options.disabledClass, pages.currentPage === _this.options.totalPages);
                        break;
                    case 'prev':
                            $this.toggleClass(_this.options.disabledClass, !_this.options.loop && pages.currentPage === 1);
                        break;
                    case 'next':
                            $this.toggleClass(_this.options.disabledClass,
                                !_this.options.loop && pages.currentPage === _this.options.totalPages);
                        break;
                    default:
                        break;
                }

            });
        },

        setupEvents: function () {
            var _this = this;
            this.$listContainer.find('li').each(function () {
                var $this = $(this);
                $this.off();
                if ($this.hasClass(_this.options.disabledClass) || $this.hasClass(_this.options.activeClass)) {
                    $this.on('click', false);
                    return;
                }
                $this.click(function (evt) {
                    // Prevent click event if href is not set.
                    !_this.options.href && evt.preventDefault();
                    _this.show(parseInt($this.data('page')));
                });
            });
        },

        makeHref: function (page) {
            return this.options.href ? this.makeText(this.options.href, page) : "#";
        },

        makeText: function (text, page) {
            return text.replace(this.options.pageVariable, page)
                .replace(this.options.totalPagesVariable, this.options.totalPages)
        }

    };

    // PLUGIN DEFINITION

    $.fn.twbsPagination = function (option) {
        var args = Array.prototype.slice.call(arguments, 1);
        var methodReturn;

        var $this = $(this);
        var data = $this.data('twbs-pagination');
        var options = typeof option === 'object' ? option : {};

        if (!data) $this.data('twbs-pagination', (data = new TwbsPagination(this, options) ));
        if (typeof option === 'string') methodReturn = data[ option ].apply(data, args);

        return ( methodReturn === undefined ) ? $this : methodReturn;
    };

    $.fn.twbsPagination.defaults = {
        totalPages: 1,
        startPage: 1,
        visiblePages: 5,
        initiateStartPageClick: true,
        href: false,
        pageVariable: '{{page}}',
        totalPagesVariable: '{{total_pages}}',
        page: null,
        first: 'First',
        prev: 'Previous',
        next: 'Next',
        last: 'Last',
        loop: false,
        onPageClick: null,
        paginationClass: 'pagination',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first',
        pageClass: 'page',
        activeClass: 'active',
        disabledClass: 'disabled',
        anchorClass: 'page-link'
    };

    $.fn.twbsPagination.Constructor = TwbsPagination;

    $.fn.twbsPagination.noConflict = function () {
        $.fn.twbsPagination = old;
        return this;
    };

})(window.jQuery, window, document);

//# sourceMappingURL=products.js.map
