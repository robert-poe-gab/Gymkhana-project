$(document).ready(function () {
  const $map = $('#mapQuests');

  const actualQuest = $map.data('actualquest')?.trim();
  const nextQuest = $map.data('nextquest')?.trim();
  const actualQuestNumber = $map.data('actualquestnumber');
  const nextQuestNumber = $map.data('nextquestnumber');

  if (!actualQuest || !nextQuest) {
    console.error('error pq le faltan coords a la quest');
    return;
  }

  const parseCoords = str => {
    const parts = str.split(',').map(s => s.trim());
    const lat = parseFloat(parts[0]);
    const lng = parseFloat(parts[1]);
    if (isNaN(lat) || isNaN(lng)) return [undefined, undefined];
    return [lat, lng];
  };

  const [actualLat, actualLng] = parseCoords(actualQuest);
  const [nextLat, nextLng] = parseCoords(nextQuest);

  if (
    actualLat === undefined || actualLng === undefined ||
    nextLat === undefined || nextLng === undefined
  ) {
    console.error('Error: coordenadas inválidas', { actualQuest, nextQuest });
    return;
  }

  const mapCenterLat = (actualLat + nextLat) / 2;
  const mapCenterLng = (actualLng + nextLng) / 2;

  const map = L.map('mapQuests').setView([mapCenterLat, mapCenterLng], 16);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  const createNumberIcon = n =>
    L.divIcon({
      className: 'quest-number',
      html: `<div class="number-marker">${n}</div>`,
      iconSize: [30, 30],
      iconAnchor: [15, 15]
    });

  if (!actualQuestNumber) {
    L.marker([actualLat, actualLng])
      .addTo(map)
      .bindPopup('¡Inicio de la gymkhana!');

    L.marker([nextLat, nextLng], { icon: createNumberIcon(1) })
      .addTo(map)
      .bindPopup('Prueba 1')
      .openPopup();

    L.polyline([[actualLat, actualLng], [nextLat, nextLng]], { color: 'green', weight: 2 }).addTo(map);
  } else {
    L.marker([actualLat, actualLng], { icon: createNumberIcon(actualQuestNumber) })
      .addTo(map)
      .bindPopup(`Prueba ${actualQuestNumber}`);

    L.marker([nextLat, nextLng], { icon: createNumberIcon(nextQuestNumber) })
      .addTo(map)
      .bindPopup(`Prueba ${nextQuestNumber}`)
      .openPopup();

    L.polyline([[actualLat, actualLng], [nextLat, nextLng]], { color: 'blue', weight: 2 }).addTo(map);
  }

  let userMarker = null;

  const userIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/64/64572.png', // icono de usuario más visible
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -35]
  });

  function updateUserPosition() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        position => {
          let { latitude, longitude } = position.coords;

          // Fallback si coords son inválidas
          if (!latitude || !longitude || isNaN(latitude) || isNaN(longitude)) {
            latitude = mapCenterLat;
            longitude = mapCenterLng;
          }

          if (!userMarker) {
            userMarker = L.marker([latitude, longitude], { icon: userIcon })
              .addTo(map)
              .bindPopup('Tu posición (fallback posible)');
          } else {
            userMarker.setLatLng([latitude, longitude]);
          }
        },
        error => {
          if (!userMarker) {
            userMarker = L.marker([mapCenterLat, mapCenterLng], { icon: userIcon })
              .addTo(map)
              .bindPopup('Posición por defecto');
          }
        },
        { enableHighAccuracy: true }
      );
    } else {
      if (!userMarker) {
        userMarker = L.marker([mapCenterLat, mapCenterLng], { icon: userIcon })
          .addTo(map)
          .bindPopup('Posición por defecto');
      }
    }
  }

  updateUserPosition();
  setInterval(updateUserPosition, 5000);
});
