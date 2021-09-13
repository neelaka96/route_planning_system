        <!-- DB -->
        <?php include "includes/db.php"; ?>

		<!-- HEADER -->
        <?php include "includes/i_header.php"; ?>

        <!-- NAVIGATION -->
        <?php include "includes/i_navigation.php"; ?>

        <!-- BACKGROUND IMAGE -->
        <?php include "includes/hotels_background_image.php"; ?>

        
    

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
    	<!-- BACKGROUND IMAGE -->
        <?php include "includes/hotel_single_search.php"; ?>
	</div>

      <div class="col-lg-9">
      	<div class="row">

      		<!-- Carousal -->
      		<div class="col-md-12 ftco-animate">
      			<div class="single-slider owl-carousel">

<!-- Fetch tbl_hotel_images images to carousel -->
<?php
if(isset($_GET['hotel_id']))
	{
		$get_hotel_id = $_GET['hotel_id'];
	}
	$query_hotel_img = "SELECT * FROM tbl_hotel_images WHERE hotel_id = '{$get_hotel_id}' ORDER BY id ASC";
 	$result_hotel_img = mysqli_query($conn, $query_hotel_img);
 	if(!$result_hotel_img)
 	{
 		die(mysqli_error($conn));
 	}
 	while($row = mysqli_fetch_assoc($result_hotel_img))
 	{
 		$db_id = $row['id'];
 		$db_hotel_id = $row['hotel_id'];
 		$db_image = $row['image'];	
?>

      				<div class="item">
      					<div class="hotel-img" style="background-image: url(admin/images/hotels/<?php echo $db_image; ?>);"></div>
      				</div>

<?php }//end While ?>

      			</div>
      		</div>

			<!-- Hotel Post -->
      		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">

<?php
	if(isset($_GET['hotel_id']))
	{
		$get_hotel_id = $_GET['hotel_id'];
	}

		$query = "SELECT * FROM tbl_hotels WHERE id = {$get_hotel_id} ";
		$result = mysqli_query($conn, $query);
		if(!$result)
		{
		    die("Query Failed " . mysqli_error($conn));
		}
		while($row = mysqli_fetch_assoc($result))
		{
		    $id				= $row['id'];               
		    $name			= $row['name'];               
		    $address		= $row['address'];               
		    $district_id	= $row['district_id'];               
		    $city			= substr($row['city'],0,15);          
		    $image			= $row['image'];               
		    $description	= $row['description'];               
		    $tel_no			= $row['tel_no'];               
		    $lat			= $row['lat'];               
		    $lan			= $row['lan'];               
		    $type			= $row['type'];               
		    $status			= $row['status'];               
		    $date			= $row['date'];               
		    $email			= $row['email'];               
		    $password		= $row['password'];               
}

?>

      			<span>Our Best hotels &amp; Rooms</span>
      			<h2><?php echo $name; ?></h2>
      			<p class="rate mb-5">
      				<span class="loc"><a href="#"><i class="icon-map"></i> <?php echo $address; ?></a></span>
      				<span class="star">
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star-o"></i>
							14 Rating</span>
						</p>
						<p><?php echo $description; ?>.</p>
      		</div>

      		





      		<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
      			<h4 class="mb-4">Our Rooms</h4>
      			<div class="row">

<?php
	$query = "SELECT * FROM tbl_rooms WHERE hotel_id = {$get_hotel_id} ";
	$result = mysqli_query($conn, $query);
	if(!$result)
	{
	    die("Query Failed " . mysqli_error($conn));
	}
	$count = mysqli_num_rows($result);
    if ($count == 0) 
    {
        echo "<h3 class='text-danger ml-3'> No Rooms Available </h3>";
    }
    else
    {
    	while($row = mysqli_fetch_assoc($result))
		{
	    $id				= $row['id'];               
	    $hotel_id		= $row['hotel_id'];               
	    $room_id		= $row['room_id'];               
	    $type			= $row['type'];               
	    $image			= $row['image'];               
	    // $description	= $row['description'];               
	    $description	= substr($row['description'],0,75);
	                   
	    $price_perday	= $row['price_perday'];               
	    $status			= $row['status'];               
	    $date			= $row['date'];
    	
    	if($status == "Published")
    	{
	               

?>

	<div class="col-md-4">
	    <div class="destination">
	        <a href="room-single.php?room_id=<?php echo $id; ?>" class="img img-2" style="background-image: url(admin/images/rooms/<?php echo $image; ?>);"></a>
	        <div class="text p-3">
	            <div class="d-flex">
	                <div class="one">
	                    <h3><a href="room-single.php?room_id=<?php echo $id; ?>"><?php echo $type; ?></a></h3>
	                    <p class="rate">
	                        <i class="icon-star"></i>
	                        <i class="icon-star"></i>
	                        <i class="icon-star"></i>
	                        <i class="icon-star"></i>
	                        <i class="icon-star-o"></i>
	                        <span>9 Rating</span>
	                    </p>
	                </div>
	                <div class="two">
	                    <span class="price per-price">$<?php echo $price_perday; ?><br><small>/night</small></span>
	                </div>
	            </div>
	            <p><?php echo $description; ?></p>
	            <hr>
	            <p class="bottom-area d-flex">
	                <span><i class="icon-map-o"></i> <?php echo $city; ?></span> 
	                <span class="ml-auto"><a href="#">Book Now</a></span>
	            </p>
	        </div>
	    </div>
	</div>

<?php 
	}
} }?>
			
		</div>

	</div>



		<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
  			<h4 class="mb-4">Location</h4>
  			<div class="block-16">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="800" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $name; ?>&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">utilitysavingexpert.com</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
            </div>
  		</div>

      	</div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->


<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>    