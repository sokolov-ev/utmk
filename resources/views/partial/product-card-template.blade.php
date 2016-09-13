<script id="product-card-template" type="text/x-handlebars-template">

    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="thumbnail">
            <img alt="@{{ title }}" src="@{{ images }}">
            <div class="caption">
                <h3>@{{ title }}</h3>
                <p>@{{ description }}</p>
            </div>
            <div class="caption-footer">

                <div class="shopping-cart row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <a class="btn btn-default" role="button" href="@{{ work_link }}">{{ trans('products.more') }}</a>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 in-shoping-cart">
                        <button type="button" class="btn btn-success pull-right clearfix add-cart" data-id="@{{ id }}">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            <div style="margin-left: 20px;">{{ trans('products.add-cart') }}</div>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</script>