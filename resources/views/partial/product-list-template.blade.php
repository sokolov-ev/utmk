<script id="product-list-template" type="text/x-handlebars-template">

    <div class="panel panel-default card">
        <div class="panel-body">
            <div class="product-title pull-left">
                <a class="text-black-h3" href="@{{ work_link }}">@{{ title }}</a>
            </div>

            <div class="shopping-cart pull-right">
                <div class="card-price-block">
                    <div class="card-price">
                        @{{ price }}
                        <span class="card-price-uah">{{ trans('products.uah') }} / @{{ price_type }}</span>
                    </div>
                </div>

                <button type="button" class="btn btn-success add-cart" data-id="@{{ id }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"> </i> {{ trans('products.add-cart') }}
                </button>
            </div>
        </div>
    </div>

</script>