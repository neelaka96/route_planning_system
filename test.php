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
<div class="col-sm col-md-6 col-lg-6 ftco-animate">
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




                <!-- start drop -->
                <form method="POST" action="">
                <div class="row">
                <div class="col-md">
                        <div class="form-group">
          <label for="">Destination One</label>
          <select
            name="citydrop_one"
            id="citydrop_one"
            onchange="select_first_city()"
          >
            <option value="#">SELECT</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Destination Two</label>
          <select name="citydrop" id="citydrop" onchange="select_city(this)">
            <option value="#">SELECT</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Destination Third</label>
          <select
            name="citythird"
            id="citythird"
            onchange="select_third_city(this)"
          >
            <option value="#">SELECT</option>
          </select>
        </div>
                </div>
        </form>
                <!-- end drop -->