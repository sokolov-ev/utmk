<!-- Модальное окно удаления филиала/модератора/продукции -->
<div id="delete-modal" class="modal fade" aria-labelledby="modal-title" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-danger">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="modal-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить: "<strong class="delete-name"></strong>"

                <form role="form" method="POST" action="" id="modal-delete-form">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" id="delete-id" name="id" value="">
                </form>
            </div>

            <div class="modal-footer">
                <div class="form-group">
                    <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                        Отмена
                    </button>
                    <button type="submit" class="btn btn-danger pull-right clearfix" form="modal-delete-form">
                        <i class="fa fa-trash" aria-hidden="true"></i> Удалить
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Модальное окно удаления филиала/модератора/продукции -->