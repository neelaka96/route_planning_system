<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
    <link rel="stylesheet" href="map.css" />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>
    <script src="map.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </head>

  <body>
    <!-- HEADER -->
    <?php include "../../includes/i_header.php"; ?>
    
    <div class="row" style="padding: 0; margin: 0">
      <div class="col-lg-2" style="padding: 50px; margin: 0">
        <div class="form-group">
          <label for="">Destination One</label><br />
          <select
            name="citydrop_one"
            id="citydrop_one"
            onchange="select_first_city()"
          >
            <option value="#">SELECT</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Destination Two</label><br />
          <select name="citydrop" id="citydrop" onchange="select_city(this)">
            <option value="#">SELECT</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Destination Third</label><br />
          <select
            name="citythird"
            id="citythird"
            onchange="select_third_city(this)"
          >
            <option value="#">SELECT</option>
          </select>
        </div>
      </div>
      <div class="col-lg-10" style="height: 100vh; padding: 0; margin: 0">
        <div id="map"></div>
      </div>
    </div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=&v=weekly&channel=2"
      async
    ></script>
  </body>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"
  ></script>
</html>
