<div id="shopping-cart" class="modal fade" aria-labelledby="shopping-cart-label" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="shopping-cart-label" class="modal-title text-green-20 font-up" style="margin-right: 30px">{{ trans('products.shopping-cart') }}</h4>
            </div>

            <form class="" role="form" method="POST" action="{{ url('/products/formed-order') }}" id="finish-order">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="content-block hidden">
                        <div class="product-list">

                        </div>
                        <div class="form-group">
                            <textarea id="order-wish" name="wish" class="form-control" rows="5" style="resize: none;" placeholder="{{ trans('products.wish') }}"></textarea>
                        </div>
                        <input type="text" name="contacts" value="" class="form-control" placeholder="{{ trans('auth.more-contacts') }}" />
                    </div>
                    <div class="cart-empty">
                        <div class="padding-top"></div>

                        <div class="load-block">
                            <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="empty-block hidden">
                            <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                            {{ trans('products.empty-cart') }}
                        </div>

                        <div class="padding-top"></div>
                    </div>
                </div>

                <div class="modal-footer text-left">
                    <div class="block-total-price hidden">
                        <div class="card-price-text">
                            {{ trans('products.total') }}:
                        </div>
                        <div class="card-price">
                            <div class="total-sum-price"> </div>
                            <span class="card-price-uah">{{ trans('products.uah') }}</span>
                        </div>

                        <p class="clearfix"></p>
                    </div>

                    <button class="btn btn-default pull-left" data-dismiss="modal" type="button">
                        {{ trans('auth.close') }}
                    </button>

                    <button type="submit" class="btn btn-warning pull-right hidden" form="finish-order">
                        {{ trans('products.finish-order') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>