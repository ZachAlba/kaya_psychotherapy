/////////////////////////////////////////
////~~ location.js API integration  ~~///
////~~    Leaflet and Modernizr     ~~///
/////////////////////////////////////////

const storeLat = 42.600060;
const storeLong = -70.959070;

var map = L.map('map').setView([storeLat, storeLong], 13);

var marker = L.marker([storeLat, storeLong]).addTo(map);
marker.bindPopup("<b>Kaya Office Location.").openPopup();

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

if (Modernizr.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        
        map.setView([latitude, longitude]); // Set view after obtaining geolocation
        var userMarker = L.marker([latitude, longitude]).addTo(map);
        userMarker.bindPopup("You are here!").openPopup();
        
    });
}