(function(){
    'use strict';
    document.addEventListener('DOMContentLoaded', function(){
    var map = L.map('mapa').setView([-34.571192, -58.395445], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-34.571192, -58.395445]).addTo(map)
      .bindPopup('GDLWebCamp 2021 <br> Entradas Disponibles <br> Costa Salguero')
      .openPopup();




    })


})();