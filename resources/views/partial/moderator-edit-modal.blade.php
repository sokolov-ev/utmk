<!-- Модальное окно добавления нового менеджера -->
<div class="modal fade edit-moderator" aria-labelledby="moderator-modal" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header box box-success">
                <button class="close" aria-label="Close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="moderator-modal" class="modal-title">Редактирование менеджера</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('administration/moderator') }}" id="form-edit-moderator">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="edit_id" value="" id="edit_id">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('edit_username') ? ' has-error' : '' }}">
                        <label for="edit_username" class="col-md-4 control-label">Имя менеджера (ФИО)</label>
                        <div class="col-md-6">
                            <input id="edit_username" type="text" class="form-control" name="edit_username" value="{{ old('edit_username') }}">

                            @if ($errors->has('edit_username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit_username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('edit_office_id') ? ' has-error' : '' }}">
                        <label for="edit_office_id" class="col-md-4 control-label">Филиал</label>

                        <div class="col-md-6">
                            <select name="edit_office_id" id="edit_office_id" class="form-control">
                                @foreach($offices as $key => $office)
                                    <option value="{{ $key }}">{{ $office }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('edit_office_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit_office_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('edit_email') ? ' has-error' : '' }}">
                        <label for="edit_email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="edit_email" type="edit_email" class="form-control" name="edit_email" value="{{ old('edit_email') }}">

                            @if ($errors->has('edit_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('edit_role') ? ' has-error' : '' }}">
                        <label for="edit_role" class="col-md-4 control-label">Роль (права доступа)</label>

                        <div class="col-md-6">
                            <select name="edit_role" id="edit_role" class="form-control">
                                @foreach($roleForm as $key => $edit_role)
                                    <option value="{{$key}}">{{$edit_role}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('edit_role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit_role') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('edit_status') ? ' has-error' : '' }}">
                        <label for="edit_status" class="col-md-4 control-label">Статус</label>

                        <div class="col-md-6">
                            <select name="edit_status" id="edit_status" class="form-control">
                                @foreach($status as $key => $edit_status)
                                    <option value="{{$key}}">{{$edit_status}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('edit_status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit_status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('edit_password') ? ' has-error' : '' }}">
                        <label for="edit_password" class="col-md-4 control-label">Пароль</label>

                        <div class="col-md-6">
                            <input id="edit_password" type="password" class="form-control" name="edit_password">

                            @if ($errors->has('edit_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('edit_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                    <div class="form-group">
                        <button class="btn btn-default pull-left clearfix" data-dismiss="modal" type="button">
                            Отмена
                        </button>
                        <button type="submit" class="btn btn-warning pull-right clearfix" form="form-edit-moderator">
                            <i class="fa fa-repeat" aria-hidden="true"></i> Сохранить
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- /Модальное окно добавления нового менеджера -->