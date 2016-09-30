<script id="shopping-cart-product"  type="text/x-handlebars-template">

    <div class="row" id="bonds-@{{ bonds }}">

        <button class="close delete-product" type="button" onclick="deleteProduct(@{{ bonds }})">
            <span aria-hidden="true">×</span>
        </button>

        <div class="col-md-2 hidden-sm hidden-xs">
            <img class="green-img" alt="@{{ title }}" src="@{{ images }}" style="max-width: 155px;">
        </div>

        <div class="col-md-10 col-sm-12 col-xs-12">

            <a class="text-black-h3" href="/catalog/details/@{{ slug }}/@{{ id }}" title="@{{ title }}">@{{ title }}</a>

            <div class="padding-block-1-1">
                <strong>{{ trans('offices.office') }}</strong>: @{{ office }}
            </div>

            <div class="shopping-cart row">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="card-price">
                        @{{ price }}
                        <span class="card-price-uah">{{ trans('products.uah') }}</span>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-6 count-products text-right">
                    <button type="button" class="btn btn-link cart-quantity-minus">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                    <input type="text"
                           value="@{{ quantity }}"
                           class="quantity"
                           data-id="@{{ work_id }}"
                           data-price="@{{ price }}"
                           data-bonds="@{{ bonds }}" />
                    <button type="button" class="btn btn-link cart-quantity-plus">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="col-md-5 col-sm-5 col-xs-12 price-total text-right">
                    {{ trans('products.sum') }}:
                    <div class="card-sum-price">
                        <div id="sum-price-@{{ work_id }}" class="sum-price">@{{ work_price }}</div>
                        <span class="card-price-uah">{{ trans('products.uah') }}</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</script>