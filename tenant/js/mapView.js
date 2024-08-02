var getLat = parseFloat(document.getElementById('getLat').value);
var getLon = parseFloat(document.getElementById('getLong').value);

// Initialize the map
var map = L.map('map').setView([getLat, getLon], 13); // Set the default view using the input coordinates

// Add the tile layer to the map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

// Add a marker using the input coordinates
var marker = L.marker([getLat, getLon]).addTo(map);
marker.bindPopup("Location").openPopup();

// Center the map view on the marker
map.setView([getLat, getLon], 13);
