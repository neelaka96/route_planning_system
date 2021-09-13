        <!-- DB -->
        <?php include "includes/db.php"; ?>

		<!-- HEADER -->
        <?php include "includes/i_header.php"; ?>

        <!-- NAVIGATION -->
        <?php include "includes/i_navigation.php"; ?>

        <!-- BACKGROUND IMAGE -->
        <?php include "includes/places_backgroung_image.php"; ?>

        
    

<section class="ftco-section ftco-degree-bg">
  <div class="container">
      <div class="col-lg-12">
      	<div class="row">

      		<!-- Carousal -->
      		<div class="col-md-12 ftco-animate">
      			<div class="single-slider owl-carousel">

<!-- Fetch tbl_location_images images to carousel -->
<?php
if(isset($_GET['location_id']))
	{
		$get_location_id = $_GET['location_id'];
	}
	$query_loc_img = "SELECT * FROM tbl_location_images WHERE location_id = '{$get_location_id}' ORDER BY id ASC";
 	$result_loc_img = mysqli_query($conn, $query_loc_img);
 	if(!$result_loc_img)
 	{
 		die("Query Failed". mysqli_error($conn));
 	}
 	while($row = mysqli_fetch_assoc($result_loc_img))
 	{
 		$db_id 			= $row['id'];
 		$db_location_id	= $row['location_id'];
 		$db_image 		= $row['image'];	
?>
				<div class="item">
					<div class="hotel-img" style="background-image: url(admin/images/locations/<?php echo $db_image; ?>);"></div>
				</div>
<?php } ?>
      			</div>
      		</div>

			<!-- Room Post -->
      		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">

<!-- FETCH LOCATION DETAILS FROM DB -->
<?php
	if(isset($_GET['location_id']))
	{
		$get_location_id = $_GET['location_id'];
	}

		$query_loc = "SELECT * FROM tbl_locations WHERE loc_id = {$get_location_id} ";
		$result_loc = mysqli_query($conn, $query_loc);
		if(!$result_loc)
		{
		    die("Query Failed " . mysqli_error($conn));
		}
		while($row = mysqli_fetch_assoc($result_loc))
		{
		    $loc_id = $row['loc_id'];               
            $title = $row['title'];             
                $dis_id = $row['district_id'];              
                $city = $row['city'];
                $lat = $row['lat'];             
                $lan = $row['lan'];             
            $img = $row['img'];             
                $keyword = $row['keyword'];  
            $description = $row['description'];  
                $date = $row['u_date'];             
}
?>


  			<span>Our Best Destinations in <?php echo $city; ?> </span>
			<div class="row">
				<div class="col-md-8">
					<h2><?php echo $title; ?></h2>		
				</div>

			</div>

			
			
  			<p class="rate mb-5">
  				<span class="star">
					<i class="icon-star"></i>
					<i class="icon-star"></i>
					<i class="icon-star"></i>
					<i class="icon-star-o"></i>
					<i class="icon-star-o"></i>
					8 Rating</span>
			</p>

			
			<p><?php echo $description; ?>.</p>
			


<br>
<h4>Activities</h4>
			<div class="row">

<!-- View Activities -->
<?php	
	$query_act = "SELECT tbl_activities.act_title  FROM tbl_activities JOIN tbl_location_activities ON tbl_activities.act_id = tbl_location_activities.activity_id WHERE tbl_location_activities.location_id = {$get_location_id}";
	$result_act = mysqli_query($conn, $query_act);
	if(!$result_act)
	{
	    die("Query Failed " . mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($result_act))
	{
		$act_title	= $row['act_title'];
?>
				<div class="col-md-3">
					<p><?php echo $act_title; ?></p>
				</div>	
<?php
	}
?>			
			</div>
			


<div class="row">
	<div class="col-lg-6">
	<h4 class="mt-3 mb-2">Location</h4>
	<div class="mapouter"><div class="gmap_canvas"><iframe width="800" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $title; ?>&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.utilitysavingexpert.com">utilitysavingexpert.com</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
		
		<!-- 
		<div class="row">
			<div id="map"></div>					
		</div>
		 -->
	</div>
</div>


  		</div>
      	</div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->














<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>    


