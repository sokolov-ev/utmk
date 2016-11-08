<script id="product-template" type="text/x-handlebars-template">

    <div class="box box-primary">
        <div class="box-header">
            <h1 class="box-title pull-left clearfix">@{{ data.title }}</h1>
        </div>
        <div class="box-body">
            <div class="row">

                <div class="col-md-5 col-sm-5 col-xs-12">
                    @{{#data.image_count}}
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @{{#data.images}}
                                    @{{#key}}<div class="item active">@{{/key}}
                                    @{{^key}}<div class="item">@{{/key}}
                                        <img alt="@{{ name }}" src="/images/products/@{{ name }}" style="width: 100%; height: auto;">
                                    </div>
                                @{{/data.images}}
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
                    @{{/data.image_count}}
                    @{{^data.image_count}}
                        @{{#data.images}}
                            <img alt="@{{ name }}" src="/images/products/@{{ name }}" style="width: 100%; height: auto;">
                        @{{/data.images}}
                    @{{/data.image_count}}
                </div>

                <div class="col-md-7 col-sm-5 col-xs-12">
                    <div class="visible-sm visible-xs padding-top-30"></div>

                    <p>@{{{ data.description }}}</p>

                    <strong>
                        @{{ data.office.office_work_title }}:
                        @{{#data.office.id}}
                            <a href="/administration/offices/index/@{{ data.office.id }}" title="@{{ data.office.title }}">
                                @{{ data.office.title }}
                            </a>
                        @{{/data.office.id}}
                        @{{^data.office.id}}
                            @{{ data.office.title }}
                        @{{/data.office.id}}
                    </strong>
                    <p></p>

                    @{{#data.prices}}
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
                    @{{/data.prices}}

                    <div class="padding-top-30"></div>
                </div>

            </div>

        </div>
    </div>

</script>