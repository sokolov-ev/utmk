<div id="call-me-back-modal" class="modal fade" aria-labelledby="modal-title" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-danger">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ url('/call-me-back') }}" id="call-me-back">
                    {{ csrf_field() }}
                    <input type="text" id="call-phone" name="call-phone" value="" class="form-control" placeholder="{{ trans('index.enter-phone') }}">
                    <br/>
                    <span class="text-gray-16">{{ trans('index.enter-phone-notif') }}</span>
            </div>

            <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            {{ trans('auth.cancel') }}
                        </button>
                        <button type="submit" class="btn btn-success pull-right clearfix" from="call-me-back">
                            {{ trans('index.contacts.send') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>