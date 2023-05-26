var markers = [];
var tourStops = [
    [{ lat: 1.029197, lng: 120.856031 }, "Data Satu"],
    [{ lat: 1.031246, lng: 120.857469 }, "Data Dua"],
    [{ lat: 0.960118, lng: 120.740858 }, "Data Tiga"],
    [{ lat: 0.938444, lng: 120.668427 }, "Data Empat"],
];

function initMap() {
    var map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 0.9818254, lng: 120.3767526 },
        zoom: 10,
        //   mapId: "6c9de29038552d07",
    });
    if (tourStops.length > 0) {
        getAllMarker(map);
    }
}

function getAllMarker(map) {
    let infoWindow = new google.maps.InfoWindow();

    tourStops.forEach(([position, title], i) => {
        window.setTimeout(() => {
            var marker = new google.maps.Marker({
                position,
                map,
                title: `${i + 1}. ${title}`,
                animation: google.maps.Animation.DROP,
                optimized: false,
            });

            markers.push(marker);

            marker.addListener("click", () => {
                // clearBounce();
                toggleBounce(marker);

                infoWindow.close();
                infoWindow.setContent(marker.getTitle());
                infoWindow.open(marker.getMap(), marker);
            });
        }, i * 500);
    });
}

// clera Bonce Animatin
function clearBonce() {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setAnimation(null);
    }
}

//   animasi bergoyang
function toggleBounce(x) {
    if (x.getAnimation() !== null) {
        x.setAnimation(null);
    } else {
        clearBonce();
        x.setAnimation(google.maps.Animation.BOUNCE);
    }
}

// function initMap() {
//   const map = new google.maps.Map(document.getElementById("map"), {
//     center: { lat: 0.9818254, lng: 120.3767526 },
//     zoom: 10,
//     //   mapId: "6c9de29038552d07",
//   });

//   const tourStops = [
//     [{ lat: 1.029197, lng: 120.856031 }, "Data Satu"],
//     [{ lat: 1.031246, lng: 120.857469 }, "Data Dua"],
//     [{ lat: 0.960118, lng: 120.740858 }, "Data Tiga"],
//     [{ lat: 0.938444, lng: 120.668427 }, "Data Empat"],
//   ];

//   // Create an info window to share between markers.
//   const infoWindow = new google.maps.InfoWindow();

//   // Create the markers.
//   tourStops.forEach(([position, title], i) => {
//     var marker = new google.maps.Marker({
//       position,
//       map,
//       title: `${i + 1}. ${title}`,
//       animation: google.maps.Animation.DROP,
//       optimized: false,
//     });

//     //   Add a click listener for each marker, and set up the info window.
//     marker.addListener("click", () => {
//       // clearBounce();
//       toggleBounce(marker);

//       // infoWindow.close();
//       // infoWindow.setContent(marker.getTitle());
//       // infoWindow.open(marker.getMap(), marker);
//     });
//   });
// }

// function clearBounce() {
//   marker.setAnimation(null);
// }
