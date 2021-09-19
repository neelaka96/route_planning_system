let map;
let data = ["-34.397:150.644"];
const labels = "A";
let labelIndex = 0;

let MAP_URL =
  "http://localhost/dilshan/route_planning_system/route/maps.php?city=";
let LOCATION_URL =
  "http://localhost/dilshan/route_planning_system/route/location.php";

async function getapi(url, prms) {
  let response = await fetch(url);
  data = await response.json();
  console.log(data);
  if (prms == "first") {
    initMap_first();
  } else if (prms == "second") {
    initMapw();
  } else {
    initMap_third();
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
  const api_url_filter = MAP_URL + city;
  getapi(api_url_filter, "second");
}
function select_first_city() {
  let city = document.getElementById("citydrop_one").value;
  console.log(city);
  const api_url_filter = MAP_URL + city;
  getapi(api_url_filter, "first");
}
function select_third_city() {
  let city = document.getElementById("citythird").value;
  console.log(city);
  const api_url_filter = MAP_URL + city;
  getapi(api_url_filter, "third");
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
        title: "DEVELOPED BY ExploreCeylon.lk",
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
        title: "DEVELOPED BY ExploreCeylon.lk",
      });
    }
  }
}

function initMap_third() {
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

  const directionsService2 = new google.maps.DirectionsService();
  const directionsRenderer2 = new google.maps.DirectionsRenderer();

  directionsRenderer2.setMap(map);
  calculateAndDisplayRoutetwo(directionsService2, directionsRenderer2);

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
        title: "DEVELOPED BY ExploreCeylon.lk",
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

function calculateAndDisplayRoutetwo(directionsService, directionsRenderer) {
  directionsService
    .route({
      origin: {
        query: document.getElementById("citydrop").value,
      },
      destination: {
        query: document.getElementById("citythird").value,
      },
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);
    })
    .catch((e) => window.alert("Directions request failed due to " + status));
}

async function getlocations() {
  let response = await fetch(LOCATION_URL);
  data = await response.json();

  daySelect = document.getElementById("citydrop_one");

  for (let i = 0; i < data.length; i++) {
    let loc_name = data[i].split(",");

    console.log(loc_name);
    daySelect.options[daySelect.options.length] = new Option(
      loc_name[0],
      data[i]
    );
  }

  daySelect = document.getElementById("citydrop");

  for (let i = 0; i < data.length; i++) {
    let loc_name = data[i].split(",");
    daySelect.options[daySelect.options.length] = new Option(
      loc_name[0],
      data[i]
    );
  }

  daySelect = document.getElementById("citythird");

  for (let i = 0; i < data.length; i++) {
    let loc_name = data[i].split(",");
    daySelect.options[daySelect.options.length] = new Option(
      loc_name[0],
      data[i]
    );
  }
}
getlocations();
