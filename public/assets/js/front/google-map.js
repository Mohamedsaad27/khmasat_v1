const lat = document.querySelector('#latitude').value;
const long = document.querySelector('#longitude').value;

function initMap() {
    const initialCoords = {
        lat: parseFloat(lat),
        lng: parseFloat(long)
    };

    const map = new google.maps.Map(document.getElementById("map"), {
        center: initialCoords,
        zoom: 14,
    });

    const marker = new google.maps.Marker({
        position: initialCoords,
        map: map,
        draggable: false,
        icon: {
            url: 'https://cdn-icons-png.flaticon.com/512/9166/9166073.png', // Default red marker icon
            scaledSize: new google.maps.Size(32, 32) // Adjust size as needed
        }
    });
}