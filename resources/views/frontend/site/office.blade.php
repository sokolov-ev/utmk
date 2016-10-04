@extends('layouts.site')

@section('title')
    {{ $office['title'] }}
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text text-center">{{ $office['title'] }}</h1>
    </div>
    <div class="padding-top"></div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow slideInLeft">
                <span class="text-gray-16 text-justify">{{ $office['description'] }}</span>
            </div>

            <div class="wow fadeInUp">
                <div class="padding-block-2-2">
                    <span class="text-black-h3">{{ $office['address'] }}</span>
                </div>
            </div>

            <div class="wow fadeInUp">
                <div class="padding-block-0-2 row">
                    @foreach ($office['contacts'] as $contact)
                        <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">{{ $contact['type'] }}:</div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">{{ $contact['data'] }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="wow slideInRight">
                <div id="map" class="map" data-latitude="{{ $office['latitude'] }}" data-longitude="{{ $office['longitude'] }}" > </div>
            </div>
        </div>
    </div>

    <div class="padding-top"></div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">
        $(".network-of-offices").addClass('active');

    var initMap = function() {

        var noPoi = [{
            featureType: "poi",
            stylers: [
                { visibility: "off" }
            ]
        }];

        var lat = $("#map").data('latitude');
        var lng = $("#map").data('longitude');

        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lat, lng: lng},
            zoom: 15,
        });

        map.setOptions({styles: noPoi});

        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29),
        });

        marker.setPosition({lat: lat, lng: lng});
    }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&callback=initMap" async defer></script>

@endsection