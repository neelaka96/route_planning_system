        <!-- DB -->
        <?php include "includes/db.php"; ?>

        <!-- HEADER -->
        <?php include "includes/i_header.php"; ?>

        <!-- NAVIGATION -->
        <?php include "includes/i_navigation.php"; ?>

        <!-- BACKGROUND IMAGE -->
        <?php include "includes/routes_background_image.php"; ?>



        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
    <link rel="stylesheet" href="route/GoogleMap/map.css" />
    <!-- JavaScript Bundle with Popper -->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->
    <script src="route/GoogleMap/map.js"></script>




    <section class="ftco-section" style="padding: 20px;">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-4">
            <h2>Select Location</h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="">Destination One</label>
              <select class="form-control" name="citydrop_one" id="citydrop_one" onchange="select_first_city()">
                <option value="#">SELECT</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Destination Two</label>
              <select class="form-control" name="citydrop" id="citydrop" onchange="select_city(this)">
                <option value="#">SELECT</option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Destination Three</label>
              <select class="form-control" name="citythird" id="citythird" onchange="select_third_city(this)">
                <option value="#">SELECT</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col" style="height: 100vh">
            <div id="map"></div>
          </div>
        </div>
        <div class="row">

<!-- start cards -->

                <?php

// $city_one = $_POST['citydrop_one'];
// $city_two = $_POST['citydrop'];
// $city_three = $_POST['citythird'];
// $query = "SELECT * FROM tbl_hotels WHERE city LIKE '%$city_one%' OR city LIKE '%$city_two%' OR city LIKE '%$city_three%' ORDER BY id DESC";
$query = "SELECT * FROM tbl_hotels ORDER BY id DESC";

$result = mysqli_query($conn, $query);
if(!$result)
{
    die("Query Failed " . mysqli_error($conn));
}
$count = mysqli_num_rows($result);
        if ($count == 0) 
        {
            echo "<h1 class='text-danger'> No Hotels Found </h1>";
        }
while($row = mysqli_fetch_assoc($result))
{
    $id				= $row['id'];               
    $name			= $row['name'];               
    $address		= $row['address'];               
    $district_id	= $row['district_id'];               
    $city			= $row['city'];               
    $image			= $row['image'];               
    // $description    = $row['description'];               
    $description	= substr($row['description'],0,70);

    $tel_no			= $row['tel_no'];               
    $lat			= $row['lat'];               
    $lan			= $row['lan'];               
    $type			= $row['type'];               
    $status			= $row['status'];               
    $date			= $row['date'];               
    $email			= $row['email'];               
    $password		= $row['password'];   

    if($status == "Published")            
    {
?>
<div class="col-sm col-md-6 col-lg-4 ftco-animate">
  <div class="destination">
    <a
      href="hotel-single.php?hotel_id=<?php echo $id; ?>"
      class="img img-2 d-flex justify-content-center align-items-center"
      style="
        background-image: url(images/uploaded_images/<?php echo $image; ?>);
      "
    >
      <div class="icon d-flex justify-content-center align-items-center">
        <span class="icon-link"></span>
      </div>
    </a>
    <div class="text p-3">
      <div class="d-flex">
        <div class="one">
          <h3>
            <a href="hotel-single.php?hotel_id=<?php echo $id; ?>"
              ><?php echo $name; ?></a
            >
          </h3>
          <p class="rate">
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star-o"></i>
            <span>8 Rating</span>
          </p>
        </div>
        <div class="two">
          <span class="price per-price">$40<br /><small>/night</small></span>
        </div>
      </div>
      <p><?php echo $description; ?></p>
      <hr />
      <p class="bottom-area d-flex">
        <span
          ><i class="icon-map-o"></i>
          <?php echo $city; ?></span
        >
        <span class="ml-auto"
          ><a href="hotel-single.php?hotel_id=<?php echo $id; ?>"
            >Rooms</a
          ></span
        >
      </p>
    </div>
  </div>
</div>
<?php } } ?>


                <!-- end cards-->

        </div>
      </div>
    </section>



<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC40BvbUOtVa8XBmSzj8dhoIr36Hp6XGNs&callback=initMap&libraries=&v=weekly&channel=2" async></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>