
var map = "";

function initMap() {
	// Create a map object and specify the DOM element for display.
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 3.0, lng: 20.00},
		zoom: 3
	});

	map.addListener('click', function(event) {
		alert(event.latLng);
	});
}