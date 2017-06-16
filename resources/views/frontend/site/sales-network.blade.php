@extends('layouts.site')

@section('title')
    {{ trans('index.menu.network_of_offices_h1') }}
@endsection

@section('meta')

    @include('partial.metatags')

@endsection

@section('css')

@endsection

@section('content')

<?php $locale = (in_array(App::getLocale(), ['en', 'uk'])) ? '/' . App::getLocale() : ''; ?>

<section class="container sales-title text-center">
    <div class="padding-top"></div>
    <div class="wow slideInRight">
        <h1 class="welcome-text">{{ trans('index.menu.network_of_offices_h1') }}</h1>
    </div>
    <div class="padding-top"></div>

    <div id="map" style="height: 600px; border-radius: 5px;"></div>
</section>

{{-- Список оффисов --}}

<section class="container sales-list-offices">
    <div class="padding-top"></div>
    <div class="row ">
        @foreach ($offices as $office)
            <div class="col-md-4 col-sm-6 col-xs-12 office">
                <div class="wow fadeInUp">
                    <a class="text-green-20 font-up" href="{{ url($locale . '/office/' . $office['slug']) }}" title="">{{ $office['title'] }}</a>
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

                            @if (in_array($contact['type'], ['mobile', 'phone', 'accounting-tel']))
                                <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">
                                    <a href="tel:{{ preg_replace('~\D+~','',$contact['contact']) }}">{{ $contact['contact'] }}</a>
                                </div>
                            @elseif ($contact['type'] == 'email')
                                <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">
                                    <a href="mailto:{{ $contact['contact'] }}">{{ $contact['contact'] }}</a>
                                </div>
                            @else
                                <div class="col-md-6 col-sm-6 col-xs-6 text-gray-16">{{ $contact['contact'] }}</div>
                            @endif
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
        let map;
        let optionsMap = {
                zoom: 6,
                center: {lat: 49.027500, lng: 31.482778},
                scrollwheel: false,
            };

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), optionsMap);
            let text = '';

            $.each($(".sales-office-address"), function(key, val){
                text = $(val).prev("a").text();

                marker = new google.maps.Marker({
                    map: map,
                    anchorPoint: new google.maps.Point(0, -29),

                    label: text[0],
                    title: text,
                });

                marker.setPosition({lat: $(val).data('latitude'), lng: $(val).data('longitude')});
            });
        }

        $(".network-of-offices").addClass('active');

        $(window).on('load resize', function(event){
            if ($(window).width() >= '768'){
                let height  = 0;
                let caption = $(".sales-list-offices").find(".office");

                for (let i = 0; i < caption.length;) {

                    if ($(caption[i]).height() > $(caption[i + 1]).height()) {
                        if ($(caption[i]).height() > $(caption[i + 2]).height()) {
                            height = $(caption[i]).height();
                        } else {
                            height = $(caption[i + 2]).height();
                        }
                    } else if ($(caption[i + 1]).height() > $(caption[i + 2]).height()) {
                        height = $(caption[i + 1]).height();
                    } else {
                        height = $(caption[i + 2]).height();
                    }

                    $(caption[i]).height(height);
                    $(caption[i + 1]).height(height);
                    $(caption[i + 2]).height(height);

                    i += 3;
                }
            }
        });

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbN5mOk7ZEFHV-GTQvJBx8cQ7TBhmD2Us&signed_in=true&callback=initMap" async defer></script>

@endsection

