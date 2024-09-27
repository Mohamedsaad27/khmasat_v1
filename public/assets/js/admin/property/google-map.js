function initMap() {
    const initialCoords = {
        lat: 30.033333,
        lng: 31.233334
    }; // Cairo, Egypt (initial location)

    const map = new google.maps.Map(document.getElementById("map"), {
        center: initialCoords,
        zoom: 14,
    });

    const marker = new google.maps.Marker({
        position: initialCoords,
        map: map,
        draggable: true, // Allow the user to drag the marker
    });

    // Event listener for marker drag
    google.maps.event.addListener(marker, 'dragend', function () {
        const lat = marker.getPosition().lat();
        const lng = marker.getPosition().lng();

        // Set latitude and longitude to hidden input fields or any other elements
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        console.log("Latitude:", lat);
        console.log("Longitude:", lng);
    });
}