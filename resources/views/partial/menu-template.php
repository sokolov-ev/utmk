<script id="menu-template" type="text/x-handlebars-template">

    <li class="sub-menu menu-down" id="{{id}}" parent="{{parent}}" sort="{{sort}}">
        <i class="fake-width"></i>
        <span class="menu-item">{{name}}</span>
        <button class="btn btn-default btn-xs btn-delete" data-id="{{id}}" data-name="{{name}}" data-target="#modalDeleteItem" data-toggle="modal">
            <i class="glyphicon glyphicon-remove text-danger" style="top: 3px;"></i>
        </button>
        <button class="btn btn-default btn-xs btn-edit" data-id="{{id}}">
            <i class="glyphicon glyphicon-pencil text-success" style="top: 3px;"></i>
        </button>

        <button class="btn btn-default btn-xs btn-clean" data-id="{{id}}" data-name="{{name}}" data-toggle="modal" data-target="#cleanPrice">
            <i class="fa fa-trash-o" aria-hidden="true" style="top: 3px;"></i>
        </button>
        <ol class="menu menu-empty"> </ol>
    </li>

</script>