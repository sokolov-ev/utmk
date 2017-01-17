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

            <form class="" role="form" method="POST" action="{{ url('administration/offices/add') }}" id="form-add-office">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group{{ $errors->has('office_type') ? ' has-error' : '' }}">
                            <label for="office_type" class="control-label">Тип офиса</label>

                            <select name="office_type" id="office_type" class="form-control">
                                @foreach($officeType as $key => $type)
                                    @if ($key == old('office_type'))
                                        <option value="{{$key}}" selected="">{{ trans('offices.officeType.'.$type) }}</option>
                                    @else
                                        <option value="{{$key}}">{{ trans('offices.officeType.'.$type) }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('office_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('office_type') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group{{ ($errors->has('title_en') || $errors->has('title_ru') || $errors->has('title_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-title" for="advertising-title">Заголовок</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="title_en-tab"
                                               class="tab-nice{{ $errors->has('title_en') ? ' has-error-label' : '' }}"
                                               href="#title_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="title_ru-tab"
                                               class="tab-nice{{ $errors->has('title_ru') ? ' has-error-label' : '' }}"
                                               href="#title_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="title_uk-tab"
                                               class="tab-nice{{ $errors->has('title_uk') ? ' has-error-label' : '' }}"
                                               href="#title_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="title_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabTitle" class="tab-content">
                            <div id="title_en" class="tab-pane fade" role="tabpanel" aria-labelledby="title_en-tab">
                                <div class="form-group{{ $errors->has('title_en') ? ' has-error' : '' }}">
                                    <input id="title_en" name="title_en" type="text" class="form-control" value="{{ old('title_en') }}" placeholder="Английский">

                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="title_ru-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input id="title_ru" name="title_ru" type="text" class="form-control" value="{{ old('title_ru') }}" placeholder="Русский">

                                    @if ($errors->has('title_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="title_uk-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input id="title_uk" name="title_uk" type="text" class="form-control" value="{{ old('title_uk') }}" placeholder="Украинский">

                                    @if ($errors->has('title_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('description_en') || $errors->has('description_ru') || $errors->has('description_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-description" for="advertising-description">Описание</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="description_en-tab"
                                               class="tab-nice{{ $errors->has('description_en') ? ' has-error-label' : '' }}"
                                               href="#description_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="description_ru-tab"
                                               class="tab-nice{{ $errors->has('description_ru') ? ' has-error-label' : '' }}"
                                               href="#description_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="description_uk-tab"
                                               class="tab-nice{{ $errors->has('description_uk') ? ' has-error-label' : '' }}"
                                               href="#description_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="description_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabdescription" class="tab-content">
                            <div id="description_en" class="tab-pane fade" role="tabpanel" aria-labelledby="description_en-tab">
                                <div class="form-group{{ $errors->has('description_en') ? ' has-error' : '' }}">
                                    <textarea id="description_en" name="description_en" class="form-control" placeholder="Английский" rows="6">{{ old('description_en') }}</textarea>

                                    @if ($errors->has('description_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="description_ru-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_ru" name="description_ru" class="form-control" placeholder="Русский" rows="6">{{ old('description_ru') }}</textarea>

                                    @if ($errors->has('description_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="description_uk-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_uk" name="description_uk" class="form-control" placeholder="Украинский" rows="6">{{ old('description_uk') }}</textarea>

                                    @if ($errors->has('description_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('text_top_en') || $errors->has('text_top_ru') || $errors->has('text_top_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-text_top" for="advertising-text_top">Текст в верху</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="text_top_en-tab"
                                               class="tab-nice{{ $errors->has('text_top_en') ? ' has-error-label' : '' }}"
                                               href="#text_top_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="text_top_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="text_top_ru-tab"
                                               class="tab-nice{{ $errors->has('text_top_ru') ? ' has-error-label' : '' }}"
                                               href="#text_top_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="text_top_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="text_top_uk-tab"
                                               class="tab-nice{{ $errors->has('text_top_uk') ? ' has-error-label' : '' }}"
                                               href="#text_top_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="text_top_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabtext_top" class="tab-content">
                            <div id="text_top_en" class="tab-pane fade" role="tabpanel" aria-labelledby="text_top_en-tab">
                                <div class="form-group{{ $errors->has('text_top_en') ? ' has-error' : '' }}">
                                    <textarea id="text_top_en" name="text_top_en" class="form-control" placeholder="Английский" rows="4">{{ old('text_top_en') }}</textarea>

                                    @if ($errors->has('text_top_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_top_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="text_top_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="text_top_ru-tab">
                                <div class="form-group{{ $errors->has('text_top_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_top_ru" name="text_top_ru" class="form-control" placeholder="Русский" rows="4">{{ old('text_top_ru') }}</textarea>

                                    @if ($errors->has('text_top_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_top_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="text_top_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="text_top_uk-tab">
                                <div class="form-group{{ $errors->has('text_top_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_top_uk" name="text_top_uk" class="form-control" placeholder="Украинский" rows="4">{{ old('text_top_uk') }}</textarea>

                                    @if ($errors->has('text_top_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_top_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ ($errors->has('text_bottom_en') || $errors->has('text_bottom_ru') || $errors->has('text_bottom_uk')) ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="control-label tab-text_bottom" for="advertising-text_bottom">Текст в низу</label>
                                </div>
                                <div class="col-md-8 customize-tab">
                                    <ul class="nav nav-pills pull-right customize-tab" role="tablist">
                                        <li role="presentation">
                                            <a id="text_bottom_en-tab"
                                               class="tab-nice{{ $errors->has('text_bottom_en') ? ' has-error-label' : '' }}"
                                               href="#text_bottom_en"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="text_bottom_en"
                                               aria-expanded="true">
                                                Английский
                                            </a>
                                        </li>
                                        <li class="active" role="presentation">
                                            <a id="text_bottom_ru-tab"
                                               class="tab-nice{{ $errors->has('text_bottom_ru') ? ' has-error-label' : '' }}"
                                               href="#text_bottom_ru"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="text_bottom_ru">
                                                Русский
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a id="text_bottom_uk-tab"
                                               class="tab-nice{{ $errors->has('text_bottom_uk') ? ' has-error-label' : '' }}"
                                               href="#text_bottom_uk"
                                               role="tab"
                                               data-toggle="tab"
                                               aria-controls="text_bottom_uk">
                                                Украинский
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div id="tabtext_bottom" class="tab-content">
                            <div id="text_bottom_en" class="tab-pane fade" role="tabpanel" aria-labelledby="text_bottom_en-tab">
                                <div class="form-group{{ $errors->has('text_bottom_en') ? ' has-error' : '' }}">
                                    <textarea id="text_bottom_en" name="text_bottom_en" class="form-control" placeholder="Английский" rows="4">{{ old('text_bottom_en') }}</textarea>

                                    @if ($errors->has('text_bottom_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_bottom_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="text_bottom_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="text_bottom_ru-tab">
                                <div class="form-group{{ $errors->has('text_bottom_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_bottom_ru" name="text_bottom_ru" class="form-control" placeholder="Русский" rows="4">{{ old('text_bottom_ru') }}</textarea>

                                    @if ($errors->has('text_bottom_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_bottom_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="text_bottom_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="text_bottom_uk-tab">
                                <div class="form-group{{ $errors->has('text_bottom_ru') ? ' has-error' : '' }}">
                                    <textarea id="text_bottom_uk" name="text_bottom_uk" class="form-control" placeholder="Украинский" rows="4">{{ old('text_bottom_uk') }}</textarea>

                                    @if ($errors->has('text_bottom_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('text_bottom_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('address_ru') || $errors->has('city_en') || $errors->has('city_ru') || $errors->has('city_uk')) ? ' has-error' : '' }}">
                            <label for="address_ru" class="control-label">
                                Адрес <i class="fa fa-spinner fa-pulse fa-fw hidden" aria-hidden="true" id="fa-spinner-load"></i>
                            </label>

                            <input type="hidden" id="address_en" name="address_en" value="" >
                            <input type="text"   id="address_ru" name="address_ru" class="form-control">
                            <input type="hidden" id="address_uk" name="address_uk" value="" >

                            <input type="hidden" id="city_en" name="city_en" value="" >
                            <input type="hidden" id="city_ru" name="city_ru" value="" >
                            <input type="hidden" id="city_uk" name="city_uk" value="" >

                            <input type="hidden" id="latitude" name="latitude" value="" >
                            <input type="hidden" id="longitude" name="longitude" value="" >

                            @if ($errors->has('address_ru'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address_ru') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="map" class="office-map"></div>
                    </div>
                </div>

                <div class="row">
                    <div id="office-contacts" class="col-md-6 col-sm-6 col-xs-12">

                        <div class="form-group{{ $errors->has('contacts_data.0') ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <label for="" class="control-label">Контакты</label>
                        </div>

                        <div class="form-group{{ $errors->has('contacts_data.0') ? ' has-error' : '' }}">
                            <div class="flex">
                                <div>
                                    <select id="" name="contacts_type[]" class="form-control contacts-type">
                                        @foreach($contactType as $key => $type)
                                            @if ($key == old('contacts_type.0'))
                                                <option value="{{$key}}" selected="">{{ trans('offices.contactType.'.$type) }}</option>
                                            @else
                                                <option value="{{$key}}">{{ trans('offices.contactType.'.$type) }}</option>
                                            @endif
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

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <button class="btn btn-success pull-right" type="submit">
                            Добавить
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script>
        var map;
        var marker;

        $(".btn-add").click(function(event){
            var body = $(this).closest('.form-group').clone();
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
            var noPoi = [{
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

            var place = autocomplete.getPlace();
            var geometry = place.geometry.location;

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
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&libraries=places&callback=initMap&hl=ru" async defer></script>
@endsection