<script id="product-card-template" type="text/x-handlebars-template">

    <div class="col-md-4 col-sm-6 col-xs-12 card">
        <div class="thumbnail">
            <img class="green-img" alt="@{{ title }}" src="@{{ images }}" style="max-width: 360px; max-height: 240px">

            <div class="caption">
                <a class="text-black-h3" href="@{{ work_link }}">@{{ title }}</a>

                <div class="padding-block-1-2">
                    <span class="text-gray-16">@{{ description }}</span>
                </div>
            </div>

            <div class="caption-footer">

                <a class="btn btn-default pull-left" role="button" href="@{{ work_link }}">{{ trans('products.more') }}</a>

                <button type="button" class="btn btn-success pull-right add-cart" data-id="@{{ id }}">
                    <i class="fa fa-cart-plus" aria-hidden="true"> </i>
                    <span>{{ trans('products.add-cart') }}</span>
                </button>

                <div class="clearfix"> </div>

            </div>
        </div>
    </div>

</script>