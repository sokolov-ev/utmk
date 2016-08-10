<!-- Модальное окно удаление менеджера -->
<div class="modal fade delete-moderator" aria-labelledby="moderator-modal" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-danger">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="moderator-modal" class="modal-title">Удаление менеджера</h4>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить: <div class="moderator-name" style="display: inline-block;"></div>
                <form role="form" method="POST" action="{{ url('administration/moderator') }}" id="form-delete-moderator">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="" id="moderator-id">
            </div>

            <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="btn btn-danger pull-right clearfix" from="form-delete-moderator">
                            <i class="fa fa-trash" aria-hidden="true"></i> Удалить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Модальное окно удаление менеджера -->