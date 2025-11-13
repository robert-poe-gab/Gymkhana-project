const coordinates = document.getElementById('map').dataset.location

let [coordinateX, coordinateY] = coordinates.split(', ')

const map = L.map('map').setView(
  [parseFloat(coordinateX), parseFloat(coordinateY)],
  15
)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map)

var marker = L.marker([coordinateX - 0.001, coordinateY])
  .addTo(map)
  .bindPopup('Començament de la gimcana!')
  .openPopup()
