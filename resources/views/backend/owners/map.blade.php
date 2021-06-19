@extends('template.template')

@section('css')
@endsection

@section('top_menu')
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h1>@lang('Mapa Inmobiliarias')</h1></div>
                <div class="card-body map-max-height">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="kt_gmap_4" style="height: 650px; position: relative; overflow: hidden;">
                        <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                            <div class="gm-err-container">
                                <div class="gm-err-content">
                                    <div class="gm-err-icon">
                                        <img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png"
                                             draggable="false" style="user-select: none;">
                                    </div>
                                    <div class="gm-err-title">@lang('Sorry! Something went wrong.')</div>
                                    <div class="gm-err-message">
                                        @lang('This page didn')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap&libraries=&v=weekly"  defer></script>
    <script src="{{asset('/assets/backend/js/components/inmozon.maps.js')}}"></script>
    <script>
        /**
         * @override
         * Initialize and add the map
         */
        function initMap() {
            // Puerta del Sol, Madrid, Spain
            let center = {lat: 40.4169019, lng: -3.7056721};
            // The map, centered at "center" position
            googleMap = new google.maps.Map(document.getElementById('kt_gmap_4'), {zoom: 6, center: center});
        }

        /**
         * This function is called from asset('/assets/backend/js/components/inmozon.maps.js') loadMarkers method
         *
         * It returns a formated HTML string with the attributes, url from the JSON data.
         *
         * Format:
         * {  "success":true,
         *    "results":1,
         *    "response":[{
         *        "type":"realestate",  or "property"
         *        "id":1,
         *        "url":"http:\/\/inmozon.local\/real_estate\/1\/show",
         *        "attributes":{
         *              "name":"Inmobiliaria Costa S.L.",
         *              "phone_1":"999999999",
         *              "phone_2":"999999999",
         *              "punctuation":null,
         *              "street":"Inventada, 44",
         *              "postcode":"12008",
         *              "city_name":"CILLERUELO DE SAN MAMES",
         *              "county_name":"SEGOVIA",
         *              "state_name":"Castilla y Le\u00f3n",
         *              "country_name":"Espa\u00f1a"
         *         },
         *         "geometry":{
         *              "latitude":"38.32873900000000000",
         *              "longitude":"-0.51647420000000000"
         *          }
         *     }]
         * }

         * @param data
         * @returns {string}
         */
        function contentInfowindow(data) {
            return '<div id="">' +
            '<p class="">' + data.attributes.name + '</p>' +
            '<p class="">' + data.attributes.street + '</p>' +
            '<p class="">' + data.attributes.city_name + '</p>' +
            '<p class="">' + data.attributes.state_name+ '</p>' +
            '<p class="">' + data.attributes.postcode + '-' + data.attributes.country_name + '</p>' +
            '<br>' +
            '<p class="">Telef: '+ data.attributes.phone_1 + ' - ' + data.attributes.phone_2 +'</p>' +
            '<p class=""><a href="' + data.url + '">Ver inmobiliaria</a></p>' +
            '</div>'
            console.log(data.url)
        }

        jQuery(document).ready(function() {
            //loadMarkers(googleMap, 'http://inmozon.local/owner/json/realestates');
            loadMarkers(googleMap, "{{ route('owner.json.realestates') }}" );
        });
    </script>
@endsection
