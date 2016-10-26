@extends('layouts.site')

@section('title')
    {{ trans('index.menu.network_of_offices') }}
@endsection

@section('meta')

    @include('partial.metatags')

@endsection

@section('css')

@endsection

@section('content')

<section class="container sales-title text-center">
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text">{{ trans('index.menu.network_of_offices') }}</h1>
    </div>
    <div class="padding-top"></div>

    <div id="map" style="height: 600px; border-radius: 5px;"></div>
</section>

{{-- Список оффисов --}}

<section class="container sales-list-offices">
    <div class="padding-top"></div>
    <div class="row">
        @foreach ($offices as $office)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="wow fadeInUp">
                    <a class="text-green-20 font-up" href="{{ url('/office/'.$office['city'].'/'.$office['id']) }}" title="">{{ $office['title'] }}</a>
                    <div class="hidden sales-office-address" data-latitude="{{ $office['latitude'] }}" data-longitude="{{ $office['longitude'] }}"></div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-2-2">
                        <span class="text-gray-16">{{ $office['address'] }}</span>
                    </div>
                </div>

                <div class="wow fadeInUp">
                    <div class="padding-block-0-2 row">
                        @foreach ($office['contacts'] as $contact)
                            <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">{{ trans('offices.contactType.'.$contact['type']) }}:</div>
                            <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">{{ $contact['contact'] }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="padding-top"></div>
</section>

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
                text = $(val).prev("a").text();

                marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29),

                    label: text,
                    title: text,
                });

                marker.setPosition({lat: $(val).data('latitude'), lng: $(val).data('longitude')});
            });
        }

        $(".network-of-offices").addClass('active');

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&signed_in=true&callback=initMap" async defer></script>

@endsection

