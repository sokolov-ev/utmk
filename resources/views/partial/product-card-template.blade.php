<script id="product-card-template" type="text/x-handlebars-template">

    <div class="col-md-4 col-sm-4 col-xs-12 card">
        <div class="thumbnail">
            <img class="green-img" alt="@{{ title }}" src="@{{ images }}" style="max-width: 360px; max-height: 240px">

            <div class="caption">
                <a class="text-black-h3" href="@{{ work_link }}">@{{ title }}</a>

                <div class="padding-block-1-2">
                    <span class="text-16">@{{{ description }}}</span>
                </div>
            </div>

            <div class="caption-footer">
                <a class="btn btn-default pull-left" role="button" href="@{{ work_link }}">{{ trans('products.more') }}</a>
                @{{^prices_type}}
                    <button type="button" class="btn btn-success pull-right add-cart" data-id="@{{ id }}">
                        <i class="fa fa-cart-plus" aria-hidden="true"> </i>
                        <span>{{ trans('products.add-cart') }}</span>
                    </button>
                @{{/prices_type}}
                @{{#prices_type}}
                    <div class="shopping-cart-block pull-right">
                        <div class="card-price-block">
                            <div class="card-price">
                                {{ trans('products.measures.agreed') }}
                            </div>
                        </div>
                    </div>
                @{{/prices_type}}
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

</script>