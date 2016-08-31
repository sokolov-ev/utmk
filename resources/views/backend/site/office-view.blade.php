@extends('layouts.admin')

@section('title')
    Продосмотр оффиса
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
{{--     <div class="row">
        <div class="col-md-9 col-md-offset-3"> --}}

            <div class="box box-primary">
                <div class="box-header">
                    <h1 class="box-title pull-left clearfix">{{ $office['title'] }}</h1>
                </div>
                <div class="box-body">
                    <p>{{ $office['description'] }}</p>

                    <div class="padding-top-30"></div>

                    <p><strong>{{ trans('offices.contact') }}:</strong></p>
                    @foreach ($office['contacts'] as $contact)
                        <p><strong>{{ $contact['type'] }}</strong>: {{ $contact['data'] }}</p>
                    @endforeach
                    <p><strong>{{ trans('offices.address') }}</strong>: {{ $office['address'] }}</p>

                    <div id="map" class="office-map" data-latitude="{{ $office['latitude'] }}" data-longitude="{{ $office['longitude'] }}"></div>
                </div>
            </div>

{{--         </div>
    </div> --}}
</section>

{{-- roadmap, satellite, hybrid и terrain --}}

@endsection

@section('scripts')

    <script>
        function initMap() {
            var map;
            var marker;
            var latitude  = +$("#map").data('latitude');
            var longitude = +$("#map").data('longitude');
            var noPoi = [{
                featureType: "poi",
                stylers: [
                    { visibility: "off" }
                ]
            }];

            map = new google.maps.Map(document.getElementById('map'), { center: {lat: latitude, lng: longitude}, zoom: 15 });
            map.setOptions({styles: noPoi})
            marker = new google.maps.Marker({ map: map, anchorPoint: new google.maps.Point(0, -29), });
            marker.setPosition({lat: latitude, lng: longitude});
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&libraries=places&callback=initMap&hl=ru" async defer></script>
@endsection