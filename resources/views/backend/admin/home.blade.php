@extends('layouts.admin')

@section('title')
    Личный кабинет
@endsection

@section('content')

    <section class="content-header">
        <h1>Профиль пользователя</h1>
    </section>

    <section class="content">
        @if ($isAdmin)
            <ol class="breadcrumb" style="background-color: #fff;">
                <li><a href="{{ url('/administration/moderators') }}">Менеджеры</a></li>
                <li class="active">{{ $user->username }}</li>
            </ol>
        @endif

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
                                <b>Город</b>
                                <a class="pull-right">{{ $office['city'][App::getLocale()] }}</a>
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
                        <h3 class="box-title">{{ trans('offices.officeType.' . $office['type']) }}: "{{ $office['title'][App::getLocale()] }}"</h3>
                    </div>
                    <div class="box-body">
                        <strong>
                            <i class="fa fa-book margin-r-5"></i> Описание
                        </strong>
                            <p class="text-muted">{{ $office['description'][App::getLocale()] }}</p>
                        <hr>

                        <strong>
                            <i class="fa fa-phone" aria-hidden="true"></i> Контакты:
                        </strong>
                        <div class="row">
                            @foreach ($office['contacts'] as $contact)
                                <div class="col-md-3 col-sm-3 col-xs-3 text-muted">{{ trans('offices.contactType.' . $contact['type']) }}:</div>
                                <div class="col-md-9 col-sm-9 col-xs-9 text-muted">{{ $contact['contact'] }}</div>
                            @endforeach
                        </div>
                        <hr>

                        <strong>
                            <i class="fa fa-map-marker margin-r-5"></i> Адрес
                        </strong>
                            <p class="text-muted"> {{ $office['address'][App::getLocale()] }} </p>
                        <hr>

                        <div id="map" class="my-room-map" data-lat="{{ $office['latitude'] }}" data-lng="{{ $office['longitude'] }}">
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

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
            });

            marker.setPosition({lat: latitude, lng: longitude});
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbN5mOk7ZEFHV-GTQvJBx8cQ7TBhmD2Us&libraries=places&callback=initMap&hl=ru" async defer></script>
@endsection