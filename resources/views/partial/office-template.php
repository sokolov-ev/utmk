<script id="office-template" type="text/x-handlebars-template">

    <div class="box box-primary">
        <div class="box-header">
            <h1 class="box-title pull-left clearfix">{{ data.title }}</h1>
        </div>
        <div class="box-body">
            <p>{{ data.description }}</p>

            <div class="padding-top-30"></div>

            <p><strong>{{ data.office_contact }}:</strong></p>
            {{#data.contacts}}
                <p><strong>{{ type }}</strong>: {{ data }}</p>
            {{/data.contacts}}
            <p><strong>{{ data.office_address }}</strong>: {{ data.address }}</p>

            <div id="map" class="office-map" data-latitude="{{ data.latitude }}" data-longitude="{{ data.longitude }}"></div>
        </div>
    </div>

</script>