@extends('layouts.site')

@section('title')
    SALES NETWORK
@endsection

@section('css')

@endsection

@section('content')

<section class="container">
    <div class="sales-title text-center">
        <p>Sales network</p>
    </div>

    <div id="map" style="height: 600px; border-radius: 20px; margin-bottom: 100px;"></div>
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

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
                color: "green",
                label: "Q",
            });

            marker.setPosition(map.center);

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29),
                color: "green",
                label: "Q",
            });

            marker.setPosition({lat: 50.450090972, lng: 30.523414806});
        }

        // $(".section-map").click(function(event){
        //     optionsMap.scrollwheel = true;
        //     initMap();
        // });



    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMQhkBZnzMm8RM9L1DnfOCES5Hb2HFtW0&signed_in=true&callback=initMap" async defer></script>

@endsection

