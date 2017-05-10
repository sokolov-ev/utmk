<script id="shopping-cart-product"  type="text/x-handlebars-template">

    <div class="row" id="bonds-@{{ bonds }}">

        <button class="close delete-product" type="button" onclick="deleteProduct(@{{ bonds }})">
            <span aria-hidden="true">×</span>
        </button>

        <div class="col-md-2 hidden-sm hidden-xs">
            <img class="green-img" alt="@{{ title }}" src="@{{ images }}" style="max-width: 155px;">
        </div>

        <div class="col-md-10 col-sm-12 col-xs-12">

            <a class="text-black-h3" href="@{{ work_link }}" title="@{{ title }}">@{{ title }}</a>

            <div class="padding-block-1-1">
                <strong>{{ trans('offices.office') }}</strong>:
                <a class="orange-list-a" href="@{{ office_linck }}" title="@{{ office_title }}">@{{ office_title }}</a>
            </div>

            <div class="row shopping-cart text-right">

                <div class="padding-horizon">
                    <div class="shopping-type-product">
                        <select name="price_type" class="form-control price-type price-type-@{{ work_key }}" data-workid="@{{ work_key }}">
                            @{{#prices}}
                                <option value="@{{ id }}">@{{ type }}</option>
                            @{{/prices}}
                        </select>
                    </div>

                    <div class="shopping-price-product">
                        <div class="card-price">
                            <div class="price price-@{{ work_key }}"> </div>
                            <span class="card-price-uah">{{ trans('products.uah') }}</span>
                        </div>
                    </div>
                </div>

                <div class="padding-horizon">
                    <div class="shopping-count-product padding-horizon">
                        <button type="button" class="btn btn-link cart-quantity-minus" data-workid="@{{ work_key }}">
                            <i class="fa fa-minus" aria-hidden="true"> </i>
                        </button>
                        <input type="text"
                               class="quantity quantity-@{{ work_key }}"
                               value="@{{ quantity }}"
                               data-workid="@{{ work_key }}" />
                        <button type="button" class="btn btn-link cart-quantity-plus" data-workid="@{{ work_key }}">
                            <i class="fa fa-plus" aria-hidden="true"> </i>
                        </button>
                    </div>

                    <div class="shopping-price-total">
                        {{ trans('products.sum') }}:
                        <div class="card-price">
                            <div class="sum-price sum-price-@{{ work_key }}"> </div>
                            <span class="card-price-uah">{{ trans('products.uah') }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</script>