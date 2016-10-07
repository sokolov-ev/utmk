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
                <strong>{{ trans('offices.office') }}</strong>:
                <a class="orange-list-a" href="@{{ office_linck }}" title="@{{ office_title }}">@{{ office_title }}</a>
            </div>

            <div class="shopping-cart text-center">
                <div class="card-white-price">
                    @{{ price }}
                    <span class="card-price-uah">{{ trans('products.uah') }} / @{{ price_type }}</span>
                </div>

                <div class="count-products">
                    <button type="button" class="btn btn-link cart-quantity-minus">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                    <input type="text"
                           value="@{{ quantity }}"
                           class="quantity"
                           data-id="@{{ work_id }}"
                           data-price="@{{ price }}"
                           data-priceType="@{{ price_type }}"
                           data-bonds="@{{ bonds }}" />
                    <button type="button" class="btn btn-link cart-quantity-plus">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="price-total">
                    {{ trans('products.sum') }}:
                    <div class="card-price">
                        <div id="sum-price-@{{ work_id }}" class="sum-price">@{{ work_price }}</div>
                        <span class="card-price-uah">{{ trans('products.uah') }} / @{{ price_type }}</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

</script>