<script id="product-card-template" type="text/x-handlebars-template">

    <div class="col-md-4 col-sm-4 col-xs-12 card">
        <div class="thumbnail">
            <a class="text-black-h3 text-center width-100" href="@{{ work_link }}">
                <img class="green-img" alt="@{{ title }}" src="@{{ images }}" style="max-width: 360px; max-height: 240px">
            </a>

            <div class="caption">
                <a class="text-black-h3" href="@{{ work_link }}">@{{ title }}</a>

                <div class="padding-block-1-2">
                    @{{#steel_grade}}
                        <span class="text-16">
                            <strong>{{ trans('products.steel_grade') }}</strong>: @{{ steel_grade }}
                        </span>
                        <br/>
                    @{{/steel_grade}}

                    @{{#standard}}
                        <span class="text-16">
                            <strong>{{ trans('products.standard') }}</strong>: @{{ standard }}
                        </span>
                        <br/>
                    @{{/standard}}

                    @{{#sawing}}
                        <span class="text-16">
                            <strong>{{ trans('products.sawing') }}</strong>: @{{ sawing }}
                        </span>
                        <br/>
                    @{{/sawing}}

                    @{{#diameter}}
                        <span class="text-16">
                            <strong>{{ trans('products.diameter') }}</strong>: @{{ diameter }}
                        </span>
                        <br/>
                    @{{/diameter}}

                    @{{#height}}
                        <span class="text-16">
                            <strong>{{ trans('products.height') }}</strong>: @{{ height }}
                        </span>
                        <br/>
                    @{{/height}}

                    @{{#width}}
                        <span class="text-16">
                            <strong>{{ trans('products.width') }}</strong>: @{{ width }}
                        </span>
                        <br/>
                    @{{/width}}

                    @{{#thickness}}
                        <span class="text-16">
                            <strong>{{ trans('products.thickness') }}</strong>: @{{ thickness }}
                        </span>
                        <br/>
                    @{{/thickness}}

                    @{{#section}}
                        <span class="text-16">
                            <strong>{{ trans('products.section') }}</strong>: @{{ section }}
                        </span>
                        <br/>
                    @{{/section}}

                    @{{#coating}}
                        <span class="text-16">
                            <strong>{{ trans('products.coating') }}</strong>: @{{ coating }}
                        </span>
                        <br/>
                    @{{/coating}}

                    @{{#view}}
                        <span class="text-16">
                            <strong>{{ trans('products.view') }}</strong>: @{{ view }}
                        </span>
                        <br/>
                    @{{/view}}

                    @{{#brinell_hardness}}
                        <span class="text-16">
                            <strong>{{ trans('products.brinell_hardness') }}</strong>: @{{ brinell_hardness }}
                        </span>
                        <br/>
                    @{{/brinell_hardness}}
                </div>
            </div>

            <div class="caption-footer">
                <div class="row">
                @{{^prices_type}}
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="shopping-cart-block">
                            <div class="card-price-block">
                                <div class="card-price">
                                    @{{ prices_json.0.price }}
                                    <span class="card-price-uah">
                                        {{ trans('products.uah') }} / @{{ prices_json.0.type }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="shopping-cart">
                            <button type="button" class="btn btn-success add-cart" data-id="@{{ id }}">
                                <i class="fa fa-cart-plus" aria-hidden="true"> </i>
                                {{ trans('products.add-cart') }}
                            </button>
                        </div>
                    </div>
                @{{/prices_type}}
                @{{#prices_type}}
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="shopping-cart-block">
                            <div class="card-price-block">
                                <div class="card-price">
                                    {{ trans('products.measures.agreed') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <a class="btn btn-default" role="button" href="@{{ work_link }}">{{ trans('products.more') }}</a>
                    </div>
                @{{/prices_type}}
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

</script>