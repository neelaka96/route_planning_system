let map;
let data = ["-34.397:150.644"];
const labels = "A";
let labelIndex = 0;

async function getapi(url, prms) {
  let response = await fetch(url);
  data = await response.json();
  console.log(data);
  if (prms == "first") {
    initMap_first();
  } else {
    initMapw();
  }
}
// async function getapi_first(url) {
//     let response = await fetch(url);
//     data = await response.json();
//     console.log(data);
//     initMap_first();
// }

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 7.8731, lng: 80.7718 },
    zoom: 8,
  });
}

function select_city() {
  let city = document.getElementById("citydrop").value;
  console.log(city);
  const api_url_filter =
    "http://localhost/dilshan/route_planning_system/route/maps.php?city=" +
    city;
  getapi(api_url_filter, "second");
}
function select_first_city() {
  let city = document.getElementById("citydrop_one").value;
  console.log(city);
  const api_url_filter =
    "http://localhost/dilshan/route_planning_system/route/maps.php?city=" +
    city;
  getapi(api_url_filter, "first");
}
function initMapw() {
  const myLatLng = {
    lat: parseFloat(data[0].split(":")[0]),
    lng: parseFloat(data[0].split(":")[1]),
  };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 5,
    center: myLatLng,
  });
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer();

  directionsRenderer.setMap(map);
  calculateAndDisplayRoute(directionsService, directionsRenderer);

  if (data.length > 0) {
    for (let i = 0; i < data.length; i++) {
      let lat_lang = data[i];
      let spy = lat_lang.split(":");
      let lat_ad = parseFloat(spy[0]);
      let lang_ad = parseFloat(spy[1]);
      const myLatLng2 = { lat: lat_ad, lng: lang_ad };

      var measle = new google.maps.Marker({
        position: myLatLng2,
        map: map,
        icon: {
          url: "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle.png",
          size: new google.maps.Size(7, 7),
          anchor: new google.maps.Point(4, 4),
        },
      });

      new google.maps.Marker({
        position: myLatLng2,
        icon: {
          url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
          labelOrigin: new google.maps.Point(75, 32),
          size: new google.maps.Size(32, 32),
          anchor: new google.maps.Point(16, 32),
        },
        label: {
          text: spy[2],
          color: "#C70E20",
          fontWeight: "bold",
        },
        map,
        title: "DEVELOPED BY DILSHAN NEELAKA",
      });
    }
  }
}

function initMap_first() {
  const myLatLng = {
    lat: parseFloat(data[0].split(":")[0]),
    lng: parseFloat(data[0].split(":")[1]),
  };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: myLatLng,
  });

  if (data.length > 0) {
    for (let i = 0; i < data.length; i++) {
      let lat_lang = data[i];
      let spy = lat_lang.split(":");
      let lat_ad = parseFloat(spy[0]);
      let lang_ad = parseFloat(spy[1]);
      const myLatLng2 = { lat: lat_ad, lng: lang_ad };

      var measle = new google.maps.Marker({
        position: myLatLng2,
        map: map,
        icon: {
          url: "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle.png",
          size: new google.maps.Size(7, 7),
          anchor: new google.maps.Point(4, 4),
        },
      });

      new google.maps.Marker({
        position: myLatLng2,
        icon: {
          url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
          labelOrigin: new google.maps.Point(75, 32),
          size: new google.maps.Size(32, 32),
          anchor: new google.maps.Point(16, 32),
        },
        label: {
          text: spy[2],
          color: "#C70E20",
          fontWeight: "bold",
        },
        map,
        title: "DEVELOPED BY DILSHAN NEELAKA",
      });
    }
  }
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  directionsService
    .route({
      origin: {
        query: document.getElementById("citydrop_one").value,
      },
      destination: {
        query: document.getElementById("citydrop").value,
      },
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
    })
    .catch((e) => window.alert("Directions request failed due to " + status));
}
