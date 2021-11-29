const mapboxKey ='pk.eyJ1IjoiYXN3aWZ0Y2VjdHVyZSIsImEiOiJja3cydG56bzEwNXFxMnVtbnpwYThlZzAwIn0.t3QbWA_MylD6LO9mdj4P3A';

const mymap = L.map('map').setView([-7.256758, 112.750570], 13);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: mapboxKey
}).addTo(mymap);

fetch('https://cdn.glitch.me/1f433756-e45c-40f0-b559-1e8c6553c5c4%2Fsbycafe.geojson?v=1637741159110')
 .then(function(response){
     return response.json();
 })
 .then(function(data){
     L.geoJSON(data).addTo(mymap)
 })