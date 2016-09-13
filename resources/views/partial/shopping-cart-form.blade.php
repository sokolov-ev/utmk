<div id="shopping-cart" class="modal fade" aria-labelledby="shopping-cart-label" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="shopping-cart-label" class="modal-title font-up">{{ trans('products.shopping-cart') }}</h4>
            </div>

            <div class="modal-body">
                <div class="cart-empty ">
                    <div class="padding-top"></div>

                    <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
                    {{ trans('products.empty-cart') }}

                    <div class="padding-top"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-default pull-left" data-dismiss="modal" type="button">{{ trans('auth.close') }}</button>
            </div>
        </div>
    </div>
</div>