<script id="product-template" type="text/x-handlebars-template">

    <div class="box box-primary">
        <div class="box-header">
            <h1 class="box-title pull-left clearfix">@{{ product.title }}</h1>
        </div>
        <div class="box-body">
            <div class="row">

                <div class="col-md-5 col-sm-5 col-xs-12">
                    @{{#product.image_count}}
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @{{#product.images}}
                                    @{{#key}}<div class="item active">@{{/key}}
                                    @{{^key}}<div class="item">@{{/key}}
                                        <img alt="@{{ name }}" src="/images/products/@{{ name }}" style="width: 100%; height: auto;">
                                    </div>
                                @{{/product.images}}
                            </div>
                            <a class="left carousel-control" data-slide="prev" role="button" href="#carousel-example-generic">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" data-slide="next" role="button" href="#carousel-example-generic">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @{{/product.image_count}}
                    @{{^product.image_count}}
                        @{{#product.images}}
                            <img alt="@{{ name }}" src="/images/products/@{{ name }}" style="width: 100%; height: auto;">
                        @{{/product.images}}
                    @{{/product.image_count}}
                </div>

                <div class="col-md-7 col-sm-5 col-xs-12">
                    <div class="visible-sm visible-xs padding-top-30"></div>

                    <strong>
                        @{{ product.office.office_work_title }}:
                        @{{#product.office.id}}
                            <a href="/administration/offices/index/@{{ product.office.id }}" title="@{{ product.office.title }}">
                                @{{ product.office.title }}
                            </a>
                        @{{/product.office.id}}
                        @{{^product.office.id}}
                            @{{ product.office.title }}
                        @{{/product.office.id}}
                    </strong>
                    <p></p>
                    
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
                        @{{#work_type}}
                            <div class="shopping-cart-block">
                                <div class="card-price-block">
                                    <div class="card-price" style="border-radius: 4px;">
                                        @{{ type }}
                                    </div>
                                </div>
                            </div>
                        @{{/work_type}}
                        @{{^work_type}}
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
                        @{{/work_type}}
                    @{{/product.prices}}

                    <div class="padding-top-30"></div>
                </div>

            </div>

        </div>
    </div>

</script>