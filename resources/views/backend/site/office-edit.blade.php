@extends('layouts.admin')

@section('title')
    Редактирование: "{{ $office['title']['ru'] }}"
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Редактирование: "{{ $office['title']['ru'] }}"</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/offices/index') }}">Филиалы</a></li>
                <li class="active">{{ $office['title']['ru'] }}</li>
            </ol>

            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-xs-offset-1 col-xs-12">

                    <form id="form-edit-office" role="form" method="POST" action="{{ url('administration/offices/edit/'.$office['id']) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="control-label">Тип офиса</label>

                            <select id="type" name="type" class="form-control">
                                @foreach($officeType as $key => $type)
                                    <option value="{{ $key }}" {{ ($key == old('type', $office['type'])) ? 'selected=""' : "" }}>
                                        {{ trans('offices.officeType.'.$type) }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>

                        @include('backend.site.partial.input-edit', ['name' => 'title', 'title' => 'Заголовок', 'data' => $office['title']])
                        @include('backend.site.partial.input-edit', ['name' => 'title_short', 'title' => 'Короткий заголовок (на главной)', 'data' => $office['title_short']])

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="control-label">Slug (отображение в адресной строке)</label>
                            <input id="slug" name="slug" type="text" class="form-control" value="{{ old('slug', $office['slug']) }}">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

                        @include('backend.site.partial.textarea-edit', ['name' => 'text_top', 'title' => 'Текст в верху', 'data' => $office['text_top']])

                        @include('backend.site.partial.textarea-edit', ['name' => 'description', 'title' => 'Описание', 'data' => $office['description']])

                        @include('backend.site.partial.textarea-edit', ['name' => 'text_bottom', 'title' => 'Текст в низу', 'data' => $office['text_bottom']])

                        <div class="form-group{{ ($errors->has('address.ru') || $errors->has('city.en') || $errors->has('city.ru') || $errors->has('city.uk')) ? ' has-error' : '' }}">
                            <label for="address_ru" class="control-label">
                                Адрес <i class="fa fa-spinner fa-pulse fa-fw hidden" aria-hidden="true" id="fa-spinner-load"></i>
                            </label>

                            <input id="address_ru"
                                   type="text"
                                   name="address[ru]"
                                   class="form-control"
                                   value="{{ old('address.ru', $office['address']['ru']) }}">

                            <input id="address_en"
                                   type="text"
                                   name="address[en]"
                                   class="form-control"
                                   value="{{ old('address.en', $office['address']['en']) }}"
                                   placeholder="Адрес в транслите">

                            <input id="address_uk"
                                   type="text"
                                   name="address[uk]"
                                   class="form-control"
                                   value="{{ old('address.uk', $office['address']['uk']) }}"
                                   placeholder="Адрес на украинском">

                            <input type="hidden" id="city_en" name="city[en]" value="{{ old('city.en', $office['city']['en']) }}">
                            <input type="hidden" id="city_ru" name="city[ru]" value="{{ old('city.ru', $office['city']['ru']) }}">
                            <input type="hidden" id="city_uk" name="city[uk]" value="{{ old('city.uk', $office['city']['uk']) }}">

                            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $office['latitude']) }}">
                            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $office['longitude']) }}">

                            @if ($errors->has('address.ru'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address.ru') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div id="map" class="office-map"></div>

                        <hr>

                        {{-- Контаткты офиса --}}
                        <div id="office-contacts">
                            <div class="form-group{{ $errors->has('contacts_data.0') ? ' has-error' : '' }}" style="margin-bottom: 0;">
                                <label class="control-label">Контакты</label>
                            </div>
                            {{-- Первый контакт с кнопкой добавить --}}
                            <div class="form-group{{ $errors->has('contacts_data.0') ? ' has-error' : '' }}">
                                <div class="flex">
                                    <input type="hidden" id="" name="contacts_id[]" class="contacts-id" value="{{ old('contacts_id.0', $contacts['id'][0]) }}">
                                    <div>
                                        <select id="" name="contacts_type[]" class="form-control contacts-type">
                                            @foreach($contactType as $key => $type)
                                                <option value="{{ $key }}" {{ ($key == old('contacts_type.0', $contacts['type'][0])) ? 'selected=""' : '' }} >
                                                    {{ trans('offices.contactType.'.$type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <input type="text"
                                               id=""
                                               name="contacts_data[]"
                                               class="form-control contacts-data"
                                               value="{{ old('contacts_data.0', $contacts['data'][0]) }}"
                                               placeholder="Контакт">
                                    </div>
                                    <div class="btn-wrap">
                                        <button class="btn btn-success btn-add" type="button">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                                @if ($errors->has('contacts_data.0'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contacts_data.0') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- /Первый контакт с кнопкой добавить --}}

                            {{-- Остальные контакты с кнопкой удалить --}}
                            @if (count(old('contacts_data', $contacts['data'])) > 1)
                                @for($i = 1; $i < count( old('contacts_data', $contacts['data']) ); $i++)
                                    <div class="form-group{{ $errors->has('contacts_data.'.$i) ? ' has-error' : '' }}">
                                        <div class="flex">
                                            <?php
                                                $id = empty($contacts['id'][$i]) ? '' : $contacts['id'][$i];
                                                $data = empty($contacts['data'][$i]) ? '' : $contacts['data'][$i];
                                                $type = empty($contacts['type'][$i]) ? 'mobile' : $contacts['type'][$i];
                                            ?>
                                            <input type="hidden" id="" name="contacts_id[]" value="{{ old('contacts_id.'.$i, $id) }}">
                                            <div>
                                                <select id="" name="contacts_type[]" class="form-control contacts-type">
                                                    @foreach($contactType as $key => $type)
                                                        @if ($key == old('contacts_type.'.$i, $contacts['type'][$i]))
                                                            <option value="{{$key}}" selected="">{{ trans('offices.contactType.'.$type) }}</option>
                                                        @else
                                                            <option value="{{$key}}">{{ trans('offices.contactType.'.$type) }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <input type="text"
                                                       id=""
                                                       name="contacts_data[]"
                                                       class="form-control contacts-data"
                                                       value="{{ old('contacts_data.'.$i, $data) }}"
                                                       placeholder="Контакт">
                                            </div>
                                            <div class="btn-wrap">
                                                <button class="btn btn-danger btn-delete" type="button">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>

                                        @if ($errors->has('contacts_data.'.$i))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contacts_data.'.$i) }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @endfor
                            @endif
                            {{-- Остальные контакты с кнопкой удалить --}}
                        </div>
                        {{-- /Контаткты офиса --}}

                        <div class="form-group">
                            <button type="button"
                                    class="btn btn-danger pull-left clearfix"
                                    data-target="#delete-modal"
                                    data-toggle="modal"
                                    data-id="{{ $office['id'] }}"
                                    data-name="{{ $office['title']['ru'] }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Удалить филиал
                            </button>
                            <button class="btn btn-warning pull-right clearfix" type="submit" name="submitbtn" form="form-edit-office">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Сохранить изменения
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

    <!-- Модальное окно удаления филиала/модератора/продукции -->
    @include('partial.delete-modal')

@endsection

@section('scripts')

    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script>
        let map;
        let marker;
        // Добавить новый контакт
        $(".btn-add").click(function(event){
            let body = $(this).closest('.form-group').clone();
            $(body).find('.contacts-id').val('');
            $(body).find('.contacts-type').val('mobile');
            $(body).find('.contacts-data').val('');
            $(body).find('button').removeClass('btn-add btn-success').addClass('btn-danger btn-delete');
            $(body).find('i').removeClass('fa-plus').addClass('fa-trash-o');
            $("#office-contacts").append(body);
        });
        // удалить контакт
        $("#office-contacts").on('click', '.btn-delete', function(event){
            $(this).closest('.form-group').remove();
        });
        // не отправлять форму по нажатию на Enter (см. автокомплит)
        $("form").keydown(function(event) {
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        $('[data-target="#delete-modal"]').on('click', function(event){
            $("#modal-title").text("Удаление филиала");
            $("#modal-delete-form").prop('action', '/administration/offices');
            $("#delete-id").val($(this).data('id'));
            $(".delete-name").text($(this).data('name'));
        });

        function initMap() {
            let noPoi = [{
                featureType: "poi",
                stylers: [
                    { visibility: "off" }
                ]
            }];

            let latitude  = +$("#latitude").val();
            let longitude = +$("#longitude").val();

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: latitude, lng: longitude},
                zoom: 15,
            });

            map.setOptions({styles: noPoi})

            autocomplete = new google.maps.places.Autocomplete((document.getElementById('address_ru')), {types: ['geocode']});
            autocomplete.addListener('place_changed', fillInAddress);

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
            });

            marker.setPosition({lat: latitude, lng: longitude});
        }

        function fillInAddress() {
            $("#fa-spinner-load").removeClass('hidden');

            let place = autocomplete.getPlace();
            let geometry = place.geometry.location;

            $("#latitude").prop('value', geometry.lat());
            $("#longitude").prop('value', geometry.lng());

            getMyAddress(place.geometry.location, 'en');
            getMyAddress(place.geometry.location, 'ru');
            getMyAddress(place.geometry.location, 'uk');

            marker.setVisible(false);

            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(15);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            $("#fa-spinner-load").addClass('hidden');
        }

        function getMyAddress(geometry, language) {
            $.get('https://maps.googleapis.com/maps/api/geocode/json?latlng='+geometry.lat()+','+geometry.lng()+'&language='+language, function(response) {
                if (response.status == "OK") {

                    console.log(response);

                    $.each(response.results, function(key, place) {
                        if (place.geometry.location_type == "ROOFTOP") {
                            if (language == 'en') {
                                $("#address_en").val(place.formatted_address);
                            }
                            if (language == 'uk') {
                                $("#address_uk").val(place.formatted_address);
                            }
                        }
                    });

                    if (language == 'ru') {
                        $.each(response.results[2].address_components, function(key, address) {
                            if (address.types.indexOf('locality') >= 0) {
                                $("#city_" + language).val(address.long_name);
                                return false;
                            }
                        });
                        return false;
                    } else {
                        $.each(response.results, function(key, place) {
                            if (place.geometry.location_type == "APPROXIMATE") {
                                $.each(place.address_components, function(key, address) {
                                    if (address.types.indexOf('locality') >= 0) {
                                        $("#city_" + language).val(address.long_name);
                                        return false;
                                    }
                                });
                                return false;
                            }
                        });
                    }
                }
            });
        }

        function saveArticle()
        {
            tinyMCE.get('text_top_en, text_top_ru, text_top_uk').save();
            tinyMCE.get('text_bottom_en, text_bottom_ru, text_bottom_uk').save();
        }

        function initArticle()
        {
            tinyMCE.init({
                selector: '#text_top_en, #text_top_ru, #text_top_uk',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });

            tinyMCE.init({
                selector: '#text_bottom_en, #text_bottom_ru, #text_bottom_uk',
                language: 'ru',
                plugins: 'textcolor colorpicker advlist autolink link image media lists charmap table preview',
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor'
            });
        }

        initArticle();

        function destroyArticle()
        {
            tinyMCE.get('text_top_en, text_top_ru, text_top_uk').remove();
            tinyMCE.get('text_bottom_en, text_bottom_ru, text_bottom_uk').remove();
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbN5mOk7ZEFHV-GTQvJBx8cQ7TBhmD2Us&libraries=places&callback=initMap&hl=ru" async defer></script>

@endsection