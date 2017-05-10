<script id="reference-section-template" type="text/x-handlebars-template">

    <li class="sub-menu menu-down" id="{{id}}" parent="{{parent}}" sort="{{sort}}">
        <i class="fake-width"></i>
        <span class="menu-item">{{name}}</span>
        
        <a class="btn btn-default btn-xs btn-delete" href="/administration/spravka/delete/{{id}}">
            <i class="glyphicon glyphicon-remove text-danger" style="top: 3px;"></i>
        </a>        

        <a class="btn btn-default btn-xs btn-edit" href="/administration/spravka/{{slug}}">
            <i class="glyphicon glyphicon-pencil text-success" style="top: 3px;"></i>
        </a>

        <ol class="menu menu-empty"> </ol>
    </li>

</script>