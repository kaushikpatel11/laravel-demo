/**
 * @file Working with Google Maps API
 * @author David Cigala david.cigala@eriscae.com
 * @version 0.1
 */

"use strict";

let googleMap = null;
let marker = null;
let markers = null;

/**
 * Initialize and add the map
 */
function initMap() {
    // The location of Valencia
    let center = {lat: 39.4821632, lng: -0.3571712};
    // The map, centered at Valencia
    googleMap = new google.maps.Map(document.getElementById('kt_gmap_4'), {zoom: 18, center: center});
    // The marker, positioned at Valencia
    // marker = new google.maps.Marker({position: center, map: map, draggable:true});
    marker = setMarker(googleMap, new google.maps.Marker(), center);
    getCoordinates({'lat': 'latitude', 'lng': 'longitude'}, googleMap);
}

/**
 * Get the Latitude and Longitude where the user clicks on the map.
 *
 * It accepts two arguments
 * 1.) An object with the <input> ids to save the latitude and longitude (formFieldLatLngIds)
 * 2.) A Google Maps entity to listen the event click
 *
 * The formFieldLatLngIds argument has values
 *
 * {
 *      'lat': 'latitude',          // <input type="text" id="lattitude">
 *      'lng': 'longitude'          // <input type="text" id="longitude">
 * }
 *
 * by default.
 *
 * You can omit this argument calling it with the second argument.
 *
 * @example
 * getCoordinates(formFieldLatLngIds:{'lat': 'latitude', 'lng': 'longitude'}, map:MAP_INSTANCE); // set both <input type="text" id=""> with each coordinate
 * @example
 * getCoordinates(map:MAP_INSTANCE);  // retuns a coordinates format {lat:x.xxxxx, lng:y.yyyy} object
 *
 * @param formFieldLatLngIds Ids from the INPUT form field related to Latitude and Longitude
 * @param map Google Maps entity to listen the event click
 */
function getCoordinates(formFieldLatLngIds = {'lat': 'latitude', 'lng': 'longitude'}, googleMap = new google.maps.Map()) {
    if (undefined !== googleMap) {
        // Configure the click listener.
        googleMap.addListener('click', function (mapsMouseEvent) {
            if (undefined === formFieldLatLngIds || 0 === formFieldLatLngIds.length) {
                return {lat: mapsMouseEvent.latLng.lat(), lng: mapsMouseEvent.latLng.lng()};
            } else {
                setCoordinatesInputFields(formFieldLatLngIds, mapsMouseEvent.latLng);
            }
        });
    } else {
        alert("getCoordinates, map argument is undefined");
    }
}

/**
 * Set a latitude and longitude values in the <input type="text" id="xxxxx"> with each coordinate
 * It removes the previous marker and shows a new one in the position passed in the coordinates argument.
 *
 * The formFieldLatLngIds argument has values
 *
 * {
 *      'lat': 'latitude',          // <input type="text" id="lattitude">
 *      'lng': 'longitude'          // <input type="text" id="longitude">
 * }
 *
 * @param formFieldLatLngIds Ids from the INPUT form field related to Latitude and Longitude
 * @param coordinates
 */
function setCoordinatesInputFields(formFieldLatLngIds = {'lat': 'latitude','lng': 'longitude'}, coordinates = new google.maps.LatLng()) {
    if (![formFieldLatLngIds, coordinates].includes(undefined)) {
        marker = setMarker(googleMap, marker, coordinates);
        document.getElementById(formFieldLatLngIds['lat']).value = coordinates.lat();
        document.getElementById(formFieldLatLngIds['lng']).value = coordinates.lng();
    } else {
        alert('setCoordinatesInputFields, some function argument is omitted or undefined');
    }
}

/**
 * Set a new marker on the mao.
 * It removes previous one and shows a new one in the coordinates argument position.
 *
 * @param map The Google Maps entity where put the marker.
 * @param marker The current marker
 * @param coordinates The new position of the new marker on the map
 * @returns {google.maps.Marker}
 */
function setMarker(googleMap = new google.maps.Map(), marker = gogle.maps.Marker(), coordinates = new google.maps.LatLng()) {
    if (![googleMap, marker, coordinates].includes(undefined)) {
        marker.setMap(null);
        return new google.maps.Marker({
            map: googleMap,
            // draggable:true,
            position: coordinates
        });
    } else {
        alert('setMarker, some function argument is omitted or undefined');
    }
}

/**
 * It obtains the coordinates (lat, long) from a postal address
 *
 * It needs all the <input type="text" id="xxx"> to form a string with the address.
 * It has an array formFieldIds:['street', 'city', 'postcode', 'county', 'country'] with Ids by default
 * It is mandatory pass one at least with a complete postal address.
 * In the end it concats all of them in a single string and asks for the coordinates related to that string/address
 *
 * @param formFieldIds The necessary Ids from the INPUT form field to set the address
 * @param formFieldLatLngIds Ids from the INPUT form field related to Latitude and Longitude
 */
function getCoordinatesFromAddress(formFieldIds = ['street', 'city', 'postcode', 'county', 'state', 'country'], formFieldLatLngIds = {'lat': 'latitude', 'lng': 'longitude'}) {
    let address = '';
    const geocoder = new google.maps.Geocoder();

    for (let i = 0; i < formFieldIds.length; i++) {
        let element = document.getElementById(formFieldIds[i]);
        if('SELECT' === element.nodeName) {
            address += element.options[element.selectedIndex].text;
        } else {
            address += element.value;
        }
        address += ((i < formFieldIds.length - 1) ? ', ' : '');
    }

    geocoder.geocode({address: address}, (results, status) => {
        // console.log('ADDRESS: ', address);
        // console.log('STATUS: ', status);
        // console.log('LAT-LONG: ', results[0].geometry.location);

        if (status === "OK") {
            googleMap.setCenter(results[0].geometry.location);
            marker = setMarker(googleMap, marker, results[0].geometry.location);
            setCoordinatesInputFields(formFieldLatLngIds,results[0].geometry.location);
            getCoordinates({'lat': 'latitude', 'lng': 'longitude'}, googleMap);
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

/**
 * It loads data from an url and populates the map with markers and htlm for infoWindows.
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
 *
 * Also there is a function contentInfowindow(data) which has to be declared in the view
 * It returns a formated HTML string with the attributes, url from the JSON data.
 *
 *  function contentInfowindow(data) {
 *            return '<div id="">' +
 *           '<p class="">' + data.attributes.name + '</p>' +
 *           '<p class="">' + data.attributes.street + '</p>' +
 *           '<p class="">' + data.attributes.city_name + '</p>' +
 *           ....
 *           ....
 *           ....
 *           ....
 *   }
 *
 * @param googleMap The Google Maps entity where put the marker.
 * @param url A JSON url
 */
function loadMarkers(googleMap, url) {

    const alicante = { lat: 38.2402802, lng: -0.7266459 };
    googleMap.setCenter(new google.maps.LatLng(alicante));
    googleMap.setZoom(10)

    jQuery.ajax({
        url: url,
        cache: false,
        dataType: "json",
        success: function (response) {
            if(true == response.success) {
                // Create a infowindow for the marker
                let infowindow = new google.maps.InfoWindow();
                markers = response.response.map(function (data) {
                    // Get the coordinates
                    let latlng = new google.maps.LatLng(data.geometry.latitude, data.geometry.longitude);

                    // Create a new maker for the coordinates
                    let marker = new google.maps.Marker({
                        map: googleMap, title: data.attributes.name, position: latlng
                    });

                    // Add a mouse listener to the marker
                    marker.addListener('click', function () {
                        // Close previous opened infowindow
                        if (infowindow) {
                            infowindow.close();
                        }
                        // Create a infowindow for the marker
                        infowindow = new google.maps.InfoWindow({
                            // This function has to be declared in the view
                            content: contentInfowindow(data)
                        });
                        // New infowindow
                        infowindow.open(googleMap, marker);
                    });

                    return marker;
                });

                // Add a marker clusterer to manage the markers.
                let markerCluster = new MarkerClusterer(googleMap, markers, {
                    //imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
                    imagePath: window.location.protocol + '//' + window.location.hostname + '/assets/m'

                });
            } else {
                console.error('ERROR AL CARGAR DATOS JSON DEL MAPA');
            }
        }
    });
}

