@extends('layouts.site')

@section('title')
    {{ trans('index.menu.network_of_offices') }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container sales-title text-center">
    <div class="padding-top"></div>
    <h1>{{ trans('index.menu.network_of_offices') }}</h1>
    <div class="padding-top"></div>

    <div id="map" style="height: 600px; border-radius: 5px;"></div>
</section>

{{-- Список оффисов --}}

<section class="container sales-list-offices">
    <div class="padding-top"></div>
    <div class="row">
        @foreach ($offices as $office)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h2>{{ $office['title'] }}</h2>
                <br/>
                <div class="hidden sales-office-address" data-latitude="{{ $office['latitude'] }}" data-longitude="{{ $office['longitude'] }}"></div>
                <p>{{ $office['address'] }}</p>
                <div class="row">
                    @foreach ($office['contacts'] as $contact)
                        <div class="col-md-4 col-sm-4 col-xs-4 sales-office-contact">{{ trans('offices.contactType.'.$contact['type']) }}:</div>
                        <div class="col-md-8 col-sm-8 col-xs-8 sales-office-contact">{{ $contact['contact'] }}</div>
                    @endforeach
                </div>
                <div class="padding-top"></div>
            </div>
        @endforeach
    </div>
</section>

{{-- <section class="container sales-list-offices">
    <div class="padding-top"></div>
        @foreach ($offices as $office)
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <h2>{{ $office['title'] }}</h2>
                            <div class="hidden sales-office-address" data-latitude="{{ $office['latitude'] }}" data-longitude="{{ $office['longitude'] }}"></div>
                            <p>{{ $office['address'] }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div style="text-align: justify;">{{ $office['description'] }}</div>
                            <div class="padding-top"></div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                @foreach ($office['contacts'] as $contact)
                                    <div class="col-md-4 col-sm-4 col-xs-4 sales-office-contact">{{ trans('offices.contactType.'.$contact['type']) }}:</div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 sales-office-contact">{{ $contact['contact'] }}</div>
                                @endforeach
                            </div>
                            <div class="padding-top"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="map-min" style="margin-top: 20px;">
                        <img src="https://maps.googleapis.com/maps/api/staticmap?center={{ $office['latitude'] }},{{ $office['longitude'] }}&zoom=12&size=600x400&maptype=roadmap
    &markers=color:red%7Clabel:{{ $office['title'] }}%7C{{ $office['latitude'] }},{{ $office['longitude'] }}&key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0" alt="{{ $office['address'] }}" style="width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        @endforeach
    <div class="padding-top"></div>
</section> --}}

{{-- https://maps.googleapis.com/maps/api/staticmap?center={{ $office['latitude'] }},{{ $office['longitude'] }}&zoom=7&size=600x600&maptype=roadmap
&markers=color:blue%7Clabel:{{ $office['title'] }}%7C{{ $office['latitude'] }},{{ $office['longitude'] }}&key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0 --}}

@endsection

@section('scripts')

    <script type="text/javascript">

        var map;
        var optionsMap = {
                zoom: 6,
                center: {lat: 49.027500, lng: 31.482778},
                // disableDefaultUI: true,
                scrollwheel: false,
                styles: [{
                    featureType: "poi",
                    stylers: [
                        { visibility: "off" }
                    ]
                }]
            };

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), optionsMap);
            var text = '';

            $.each($(".sales-office-address"), function(key, val){
                text = $(val).prevAll("h2").text();
                marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29),

                    label: text,
                    title: text,
                });

                marker.setPosition({lat: $(val).data('latitude'), lng: $(val).data('longitude')});
            });
        }

        // $(".section-map").click(function(event){
        //     optionsMap.scrollwheel = true;
        //     initMap();
        // });

        $(".network-of-offices").addClass('active');

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&signed_in=true&callback=initMap" async defer></script>

@endsection

