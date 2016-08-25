@extends('layouts.admin')

@section('title')
    Личный кабинет
@endsection

@section('content')

    <section class="content-header">
        <h1>Профиль пользователя</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">

                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center">{{ $user->username }}</h3>
                        <p class="text-muted text-center">
                            @if ($user->role == 'Admin')
                                Администратор сайта
                            @else
                                Менеджер сайта
                            @endif
                        </p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Регион</b>
                                <a class="pull-right">{{ $user->region }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>E-mail</b>
                                <a class="pull-right">{{ $user->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Последняя активность</b>
                                <a class="pull-right">{{ date('H:i d-m-Y', $user->activity) }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Филиал: "{{ json_decode($user->office->title, true)[App::getLocale()] }}"</h3>
                    </div>
                    <div class="box-body">
                        <strong>
                            <i class="fa fa-book margin-r-5"></i> Описание
                        </strong>
                            <p class="text-muted"> {{ json_decode($user->office->description, true)[App::getLocale()] }} </p>
                        <hr>

                        <strong>
                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i> Контакты:
                        </strong>
                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>
                        <hr>

                        <strong>
                            <i class="fa fa-map-marker margin-r-5"></i> Адрес
                        </strong>
                            <p class="text-muted"> {{ json_decode($user->office->address, true)[App::getLocale()] }} </p>
                        <hr>

                        <div id="map" class="my-room-map" data-lat="{{ $user->office->latitude }}" data-lng="{{ $user->office->longitude }}">
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection

@section('scripts')
        <script>
        var map;
        var marker;

        function initMap() {

            var noPoi = [{
                featureType: "poi",
                stylers: [
                    { visibility: "off" }
                ]
            }];
            var latitude  = +$("#map").data('lat');
            var longitude = +$("#map").data('lng');

            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: latitude, lng: longitude},
                zoom: 15,
            });

            map.setOptions({styles: noPoi})

            // autocomplete = new google.maps.places.Autocomplete((document.getElementById('address_ru')), {types: ['geocode']});
            // autocomplete.addListener('place_changed', fillInAddress);

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
            });

            marker.setPosition({lat: latitude, lng: longitude});
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&libraries=places&callback=initMap&hl=ru" async defer></script>
@endsection