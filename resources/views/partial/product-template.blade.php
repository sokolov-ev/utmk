<script id="product-template" type="text/x-handlebars-template">

    <div class="box box-primary">
        <div class="box-header">
            <h1 class="box-title pull-left clearfix">@{{ product.title }}</h1>
        </div>
        <div class="box-body">
            <div class="row">

                <div class="col-md-5 col-sm-5 col-xs-12">
                    <img alt="@{{ product.images.0 }}" src="@{{ product.images.0 }}" style="width: 100%; height: auto;">
                </div>

                <div class="col-md-7 col-sm-5 col-xs-12">
                    <div class="visible-sm visible-xs padding-top-30"></div>

                    <strong>
                        <a href="/administration/offices/index/@{{ product.office_id }}" title="@{{ product.office_title }}">
                            @{{ product.office_title }}
                        </a>
                    </strong>
                    <br>
                    
                    @{{#product.steel_grade}}
                        <span class="text-16">
                            <strong>{{ trans('products.steel_grade') }}</strong>: @{{ product.steel_grade }}
                        </span>
                        <br/>
                    @{{/product.steel_grade}}

                    @{{#product.standard}}
                        <span class="text-16">
                            <strong>{{ trans('products.standard') }}</strong>: @{{ product.standard }}
                        </span>
                        <br/>
                    @{{/product.standard}}

                    @{{#product.sawing}}
                        <span class="text-16">
                            <strong>{{ trans('products.sawing') }}</strong>: @{{ product.sawing }}
                        </span>
                        <br/>
                    @{{/product.sawing}}

                    @{{#product.diameter}}
                        <span class="text-16">
                            <strong>{{ trans('products.diameter') }}</strong>: @{{ product.diameter }}
                        </span>
                        <br/>
                    @{{/product.diameter}}

                    @{{#product.height}}
                        <span class="text-16">
                            <strong>{{ trans('products.height') }}</strong>: @{{ product.height }}
                        </span>
                        <br/>
                    @{{/product.height}}

                    @{{#product.width}}
                        <span class="text-16">
                            <strong>{{ trans('products.width') }}</strong>: @{{ product.width }}
                        </span>
                        <br/>
                    @{{/product.width}}

                    @{{#product.thickness}}
                        <span class="text-16">
                            <strong>{{ trans('products.thickness') }}</strong>: @{{ product.thickness }}
                        </span>
                        <br/>
                    @{{/product.thickness}}

                    @{{#product.section}}
                        <span class="text-16">
                            <strong>{{ trans('products.section') }}</strong>: @{{ product.section }}
                        </span>
                        <br/>
                    @{{/product.section}}

                    @{{#product.coating}}
                        <span class="text-16">
                            <strong>{{ trans('products.coating') }}</strong>: @{{ product.coating }}
                        </span>
                        <br/>
                    @{{/product.coating}}

                    @{{#product.view}}
                        <span class="text-16">
                            <strong>{{ trans('products.view') }}</strong>: @{{ product.view }}
                        </span>
                        <br/>
                    @{{/product.view}}

                    @{{#product.brinell_hardness}}
                        <span class="text-16">
                            <strong>{{ trans('products.brinell_hardness') }}</strong>: @{{ product.brinell_hardness }}
                        </span>
                        <br/>
                    @{{/product.brinell_hardness}}

                    <p></p>

                    @{{#product.prices}}
                        @{{#type_view}}
                            <div class="shopping-cart-block">
                                <div class="card-price-block">
                                    <div class="card-price" style="border-radius: 4px;">
                                        @{{ type }}
                                    </div>
                                </div>
                            </div>
                        @{{/type_view}}
                        @{{^type_view}}
                            <div class="shopping-cart">
                                <div class="card-price-block">
                                    <div class="card-price">
                                        @{{ price }}
                                        <span class="card-price-uah">
                                            {{ trans('products.uah') }} / @{{ type }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @{{/type_view}}
                    @{{/product.prices}}

                    <div class="padding-top-30"></div>
                </div>

            </div>

        </div>
    </div>

</script>