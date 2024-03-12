/////////////////////////////////////////
////~~ location.js API integration  ~~///
////~~     Google and Modernizr     ~~///
/////////////////////////////////////////

function init() {
    var mapOptions = {
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: 12
    };
    var venueMap = new google.maps.Map(document.getElementById('map'), mapOptions);

    // Store location
    var storeLocation = new google.maps.LatLng(42.600060, -70.959070);
    var storeMarker = new google.maps.Marker({
        position: storeLocation,
        map: venueMap,
        title: 'Store Location'
    });

    // Geolocation
    if (Modernizr.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            var userMarker = new google.maps.Marker({
                position: userLocation,
                map: venueMap,
                title: 'Your Location'
            });

            // Center map on user's location
            venueMap.setCenter(userLocation);
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function loadScript() {
    var script = document.createElement('script');
    script.src = 'https://maps.googleapis.com/maps/api/js?callback=init';
    document.body.appendChild(script);
}

window.onload = loadScript;