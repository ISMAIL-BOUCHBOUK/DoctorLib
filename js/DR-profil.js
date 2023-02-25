var posi;
if (posi != undefined) {

    var map = L.map('map').setView(posi, 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var marker = L.marker(posi).addTo(map);

    marker.bindPopup("<b>"+dr_name+"</b>").openPopup();
}

