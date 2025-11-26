const gymkhanaCoordinates = document.getElementById('map').dataset.location;

let questsArray = [];
if (document.getElementById('map').dataset.quests) {
  questsArray = JSON.parse(document.getElementById('map').dataset.quests);
} else if (document.getElementById('map').dataset.quest) {
  questsArray = [document.getElementById('map').dataset.quest];
}

const coords = questsArray.map(coord => {
  const [x, y] = coord.split(',').map(Number);
  return [x, y];
});

let [coordinateX, coordinateY] = gymkhanaCoordinates.split(',').map(Number);

const map = L.map('map').setView([coordinateX, coordinateY], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

L.marker([coordinateX - 0.001, coordinateY])
  .addTo(map)
  .bindPopup('¡Comienzo de la gymkhana!')
  .openPopup();

coords.forEach(([x, y], i) => {
  const numberIcon = L.divIcon({
    className: 'quest-number',
    html: `<div class="number-marker">${i + 1}</div>`,
    iconSize: [30, 30],
    iconAnchor: [15, 15]
  });

  L.marker([x, y], { icon: numberIcon }).addTo(map);
});

const polylinePoints = [[coordinateX - 0.001, coordinateY], ...coords];
L.polyline(polylinePoints, { color: 'green', weight: 2 }).addTo(map);
