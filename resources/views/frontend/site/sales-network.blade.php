@extends('layouts.site')

@section('title')
    SALES NETWORK
@endsection

@section('css')

@endsection

@section('content')

<section class="container sales-title text-center">
    <div class="padding-top"></div>
    <h1>Sales network</h1>
    <div class="padding-top"></div>

    <div id="map" style="height: 600px; border-radius: 20px;"></div>
</section>

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
                        <div class="col-md-3 col-sm-3 col-xs-3 sales-office-contact">{{ trans('offices.contactType.'.$contact['type']) }}:</div>
                        <div class="col-md-9 col-sm-9 col-xs-9 sales-office-contact">{{ $contact['contact'] }}</div>
                    @endforeach
                </div>
                <div class="padding-top"></div>
            </div>
        @endforeach
    </div>
</section>

<section class="sales-footer">
    <div class="container">
        <div class="padding-top"></div>
        <div class="col-md-4">
            <div class="sales-footer-title">COMPANY</div>
            <br/>
            <a href="#" title=""></a>
            <br/>
            <a href="#" title=""></a>
            <br/>
            <a href="#" title=""></a>
            <br/>
            <a href="#" title=""></a>
            <br/>
            <a href="#" title=""></a>
            <br/>
        </div>
    </div>
</section>

@endsection

@section('scripts')

    <script type="text/javascript">

        var map;
        var optionsMap = {
                zoom: 6,
                center: {lat: 49.027500, lng: 31.482778},
                disableDefaultUI: true,
                scrollwheel: false,
                // styles: [{
                //     featureType: "poi",
                //     stylers: [
                //         { visibility: "off" }
                //     ]
                // }]
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



    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&signed_in=true&callback=initMap" async defer></script>

@endsection

