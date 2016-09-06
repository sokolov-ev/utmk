<script id="product-card-template" type="text/x-handlebars-template">

    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="thumbnail">
            <img alt="{{ title }}" src="{{ images }}">
            <div class="caption">
                <h3>{{ title }}</h3>
                <p>{{ description }}</p>
            </div>
            <div class="caption-footer">

                <form class="" role="form" method="POST" action="/products/add-cart" id="form-add-cart-{{ id }}">
                    <input type="hidden" value="{{ work_token }}" name="_token">
                    <input type="hidden" name="product-id" value="{{ id }}">
                    <div class="shopping-cart row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a class="btn btn-default" role="button" href="{{ work_link }}">{{ work_more }}</a>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 in-shoping-cart">
                            <button type="submit" class="btn btn-success pull-right clearfix" form="form-add-cart-{{ id }}">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <div style="margin-left: 20px;">{{ work_add_card }}</div>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</script>