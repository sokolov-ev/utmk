@extends('layouts.admin')

@section('title')
    Редактирование: "{{ $office['title_name'] }}"
@endsection

@section('content')

<section class="container">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title pull-left clearfix">Редактирование: "{{ $office['title_name'] }}"</h3>
        </div>
        <div class="box-body">

            <ol class="breadcrumb">
                <li><a href="{{ url('administration/offices/index') }}">Филиалы</a></li>
                <li class="active">{{ $office['title_name'] }}</li>
            </ol>

            <form class="" role="form" method="POST" action="{{ url('administration/offices/edit/'.$office['office_id']) }}" id="form-edit-office">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="form-group{{ $errors->has('office_type') ? ' has-error' : '' }}">
                            <label for="office_type" class="control-label">Тип офиса</label>

                            <select id="office_type" name="office_type" class="form-control">
                                @foreach($officeType as $key => $type)
                                    @if ($key == old('office_type', $office['office_type']))
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
                                    <input type="text"
                                           id="title_en"
                                           name="title_en"
                                           class="form-control"
                                           value="{{ old('title_en', $office['title_en']) }}"
                                           placeholder="Английский">

                                    @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="title_ru-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input type="text"
                                           id="title_ru"
                                           name="title_ru"
                                           class="form-control"
                                           value="{{ old('title_ru', $office['title_ru']) }}"
                                           placeholder="Русский">

                                    @if ($errors->has('title_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="title_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="title_uk-tab">
                                <div class="form-group{{ $errors->has('title_ru') ? ' has-error' : '' }}">
                                    <input type="text"
                                           id="title_uk"
                                           name="title_uk"
                                           class="form-control"
                                           value="{{ old('title_uk', $office['title_uk']) }}"
                                           placeholder="Украинский">

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
                                    <textarea id="description_en" class="form-control" value="" name="description_en" placeholder="Английский" rows="6">{{ old('description_en', $office['description_en']) }}</textarea>

                                    @if ($errors->has('description_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_en') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_ru" class="tab-pane fade in active" role="tabpanel" aria-labelledby="description_ru-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_ru" class="form-control" value="" name="description_ru" placeholder="Русский" rows="6">{{ old('description_ru', $office['description_ru']) }}</textarea>

                                    @if ($errors->has('description_ru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_ru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div id="description_uk" class="tab-pane fade" role="tabpanel" aria-labelledby="description_uk-tab">
                                <div class="form-group{{ $errors->has('description_ru') ? ' has-error' : '' }}">
                                    <textarea id="description_uk" class="form-control" value="" name="description_uk" placeholder="Украинский" rows="6">{{ old('description_uk', $office['description_uk']) }}</textarea>

                                    @if ($errors->has('description_uk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_uk') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('address_ru') || $errors->has('city_en') || $errors->has('city_ru') || $errors->has('city_uk')) ? ' has-error' : '' }}">
                            <label for="address_ru" class="control-label">
                                Адрес <i class="fa fa-spinner fa-pulse fa-fw hidden" aria-hidden="true" id="fa-spinner-load"></i>
                            </label>

                            <input type="hidden" id="address_en" name="address_en" value="{{ old('address_en', $office['address_en']) }}">
                            <input type="text"   id="address_ru" name="address_ru" class="form-control" value="{{ old('address_ru', $office['address_ru']) }}">
                            <input type="hidden" id="address_uk" name="address_uk" value="{{ old('address_uk', $office['address_uk']) }}">

                            <input type="hidden" id="city_en" name="city_en" value="{{ old('city_en', $office['city_en']) }}">
                            <input type="hidden" id="city_ru" name="city_ru" value="{{ old('city_ru', $office['city_ru']) }}">
                            <input type="hidden" id="city_uk" name="city_uk" value="{{ old('city_uk', $office['city_uk']) }}">

                            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $office['latitude']) }}">
                            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $office['longitude']) }}">

                            @if ($errors->has('address_ru'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address_ru') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
{{-- Карата --}}
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div id="map" class="office-map"></div>
                    </div>
{{-- /Карата --}}
                </div>
{{-- Контаткты офиса --}}
                <div class="row">
                    <div id="office-contacts" class="col-md-7 col-sm-7 col-xs-12">

                        <div class="form-group{{ $errors->has('contacts_data.0') ? ' has-error' : '' }}" style="margin-bottom: 0;">
                            <label for="" class="control-label">Контакты</label>
                        </div>
{{-- Первый контакт с кнопкой добавить --}}
                        <div class="form-group{{ $errors->has('contacts_data.0') ? ' has-error' : '' }}">
                            <div class="flex">
                                <input type="hidden" id="" name="contacts_id[]" class="contacts-id" value="{{ old('contacts_id.0', $contacts['id'][0]) }}">
                                <div>
                                    <select id="" name="contacts_type[]" class="form-control contacts-type">
                                        @foreach($contactType as $key => $type)
                                            @if ($key == old('contacts_type.0', $contacts['type'][0]))
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
                                        <?php $id = empty($contacts['id'][$i]) ? '' : $contacts['id'][$i] ?>
                                        <?php $data = empty($contacts['data'][$i]) ? '' : $contacts['data'][$i] ?>
                                        <?php $type = empty($contacts['type'][$i]) ? 'mobile' : $contacts['type'][$i] ?>
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
                </div>
{{-- /Контаткты офиса --}}
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="form-group">
                            <button type="button"
                                    class="btn btn-danger pull-left clearfix"
                                    data-target="#delete-modal"
                                    data-toggle="modal"
                                    data-id="{{ $office['office_id'] }}"
                                    data-name="{{ $office['title_name'] }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Удалить филиал
                            </button>
                            <button class="btn btn-warning pull-right clearfix" type="submit" from="form-edit-office">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Сохранить изменения
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

    <!-- Модальное окно удаления филиала/модератора/продукции -->
    @include('partial.delete-modal')

@endsection

@section('scripts')

    <script>
        var map;
        var marker;
        // Добавить новый контакт
        $(".btn-add").click(function(event){
            var body = $(this).closest('.form-group').clone();
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

            var noPoi = [{
                featureType: "poi",
                stylers: [
                    { visibility: "off" }
                ]
            }];
            var latitude  = +$("#latitude").val();
            var longitude = +$("#longitude").val();

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
                map.setZoom(15);
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
                    $.each(response.results, function(key, place){
                        if (place.geometry.location_type == "APPROXIMATE") {
                            $("#city_" + language).val(place.address_components[1].long_name);
                            return false;
                        }
                    });
                }
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&libraries=places&callback=initMap&hl=ru" async defer></script>

@endsection