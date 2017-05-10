@extends('layouts.admin')

@section('title')
    Новый офис
@endsection

@section('content')

<section class="content container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Новый офис</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/offices/index') }}">Филиалы</a></li>
                <li class="active">Новый офис</li>
            </ol>

            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-xs-offset-1 col-xs-12">

                    <form id="form-add-office" role="form" method="POST" action="{{ url('administration/offices/add') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="control-label">Тип офиса</label>

                            <select name="type" id="type" class="form-control">
                                @foreach($officeType as $key => $type)
                                    <option value="{{$key}}" {{ ($key == old('type')) ? 'selected=""' : '' }}>
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

                        @include('backend.site.partial.input-add', ['name' => 'title', 'title' => 'Заголовок'])
                        @include('backend.site.partial.input-add', ['name' => 'title_short', 'title' => 'Короткий заголовок (на главной)'])

                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="control-label">Slug (отображение в адресной строке)</label>
                            <input id="slug" name="slug" type="text" class="form-control" value="{{ old('slug') }}">

                            @if ($errors->has('slug'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                </span>
                            @endif
                        </div>

                        @include('backend.site.partial.textarea-add', ['name' => 'text_top', 'title' => 'Текст в верху'])

                        @include('backend.site.partial.textarea-add', ['name' => 'description', 'title' => 'Описание'])

                        @include('backend.site.partial.textarea-add', ['name' => 'text_bottom', 'title' => 'Текст в низу'])

                        <div class="form-group{{ ($errors->has('address.ru') || $errors->has('city.en') || $errors->has('city.ru') || $errors->has('city.uk')) ? ' has-error' : '' }}">
                            <label for="address_ru" class="control-label">
                                Адрес <i class="fa fa-spinner fa-pulse fa-fw hidden" aria-hidden="true" id="fa-spinner-load"></i>
                            </label>

                            <input type="hidden" id="address_en" name="address[en]" value="">
                            <input type="text"   id="address_ru" name="address[ru]" class="form-control">
                            <input type="hidden" id="address_uk" name="address[uk]" value="">

                            <input type="hidden" id="city_en" name="city[en]" value="">
                            <input type="hidden" id="city_ru" name="city[ru]" value="">
                            <input type="hidden" id="city_uk" name="city[uk]" value="">

                            <input type="hidden" id="latitude" name="latitude" value="">
                            <input type="hidden" id="longitude" name="longitude" value="">

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
                                    <div>
                                        <select id="" name="contacts_type[]" class="form-control contacts-type">
                                            @foreach($contactType as $key => $type)
                                                <option value="{{ $key }}" {{ ($key == old('contacts_type.0')) ? 'selected=""' : '' }}>
                                                    {{ trans('offices.contactType.'.$type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <input id="" name="contacts_data[]" class="form-control contacts-data" type="text" value="{{ old('contacts_data.0') }}" placeholder="Контакт">
                                    </div>
                                    <div class="btn-wrap">
                                        <button class="btn btn-success btn-add" type="button">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                                @if ($errors->has('contacts_data.0'))
                                    <span class="help-block" style="color: #dd4b39;">
                                        <strong>{{ $errors->first('contacts_data.0') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{-- /Первый контакт с кнопкой добавить --}}

                            {{-- Остальные контакты с кнопкой удалить --}}
                            @if (count(old('contacts_data')) > 1)
                                @for($i = 1; $i < count(old('contacts_data')); $i++)
                                    <div class="form-group{{ $errors->has('contacts_data.'.$i) ? ' has-error' : '' }}">
                                        <div class="flex">
                                            <div>
                                                <select id="" name="contacts_type[]" class="form-control contacts-type">
                                                    @foreach($contactType as $key => $type)
                                                        @if ($key == old('contacts_type.'.$i))
                                                            <option value="{{$key}}" selected="">{{ trans('offices.contactType.'.$type) }}</option>
                                                        @else
                                                            <option value="{{$key}}">{{ trans('offices.contactType.'.$type) }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <input id="" type="text" name="contacts_data[]" class="form-control contacts-data" value="{{ old('contacts_data.'.$i) }}" placeholder="Контакт">
                                            </div>
                                            <div class="btn-wrap">
                                                <button class="btn btn-danger btn-delete" type="button">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>

                                        @if ($errors->has('contacts_data.'.$i))
                                            <span class="help-block" style="color: #dd4b39;">
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
                            <button class="btn btn-success pull-right" type="submit" name="submitbtn">
                                Добавить
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
    
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

    <script>
        let map;
        let marker;

        $(".btn-add").click(function(event){
            let body = $(this).closest('.form-group').clone();
            $(body).find('.contacts-type').val('mobile');
            $(body).find('.contacts-data').val('');
            $(body).find('button').removeClass('btn-add btn-success').addClass('btn-danger btn-delete');
            $(body).find('i').removeClass('fa-plus').addClass('fa-trash-o');
            $("#office-contacts").append(body);
        });

        $("#office-contacts").on('click', '.btn-delete', function(event){
            $(this).closest('.form-group').remove();
        });

        $("form").keydown(function(event) {
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });

        function initMap() {
            let noPoi = [{
                featureType: "poi",
                stylers: [
                    { visibility: "off" }
                ]
            }];

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 50.450090972, lng: 30.523414806},
                zoom: 10,
            });

            map.setOptions({styles: noPoi})

            autocomplete = new google.maps.places.Autocomplete((document.getElementById('address_ru')), {types: ['geocode']});
            autocomplete.addListener('place_changed', fillInAddress);

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
            });
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
                map.setZoom(13);
            }

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            $("#fa-spinner-load").addClass('hidden');
        }

        function getMyAddress(geometry, language) {
            $.get('https://maps.googleapis.com/maps/api/geocode/json?latlng='+geometry.lat()+','+geometry.lng()+'&language='+language, function(response) {
                if (response.status == "OK") {
                    if (language == 'en') {
                        $("#address_en").val(response.results[0].formatted_address);
                    }
                    if (language == 'uk') {
                        $("#address_uk").val(response.results[0].formatted_address);
                    }

                    $.each(response.results, function(key, place) {
                        if (place.geometry.location_type == "APPROXIMATE") {
                            $.each(place.address_components, function(key1, value1) {
                                if (value1.types.indexOf('locality') >= 0) {
                                    $("#city_" + language).val(value1.long_name);
                                    return false;
                                }
                            });
                            return false;
                        }
                    });
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&libraries=places&callback=initMap&hl=ru" async defer></script>
@endsection