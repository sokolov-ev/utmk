<!-- Модальное окно удаления филиала/модератора/продукции -->
<div id="delete-modal" class="modal fade" aria-labelledby="modal-title" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-danger">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить: "<b><div class="delete-name" style="display: inline-block;"></div></b>"
                <form role="form" method="POST" action="" id="modal-delete-form">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <input type="hidden" id="delete-id" name="id" value="">
            </div>

            <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="btn btn-danger pull-right clearfix" from="form-delete-office">
                            <i class="fa fa-trash" aria-hidden="true"></i> Удалить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Модальное окно удаления филиала/модератора/продукции -->