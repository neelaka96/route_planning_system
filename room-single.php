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
      <div class="col-lg-12">
      	<div class="row">

      		<!-- Carousal -->
      		<div class="col-md-12 ftco-animate">
      			<div class="single-slider owl-carousel">
<!-- Fetch tbl_room_images images to carousel -->
<?php
if(isset($_GET['room_id']))
	{
		$get_room_id = $_GET['room_id'];
	}
	$query_room_img = "SELECT * FROM tbl_room_images WHERE room_id = '{$get_room_id}' ORDER BY id ASC";
 	$result_room_img = mysqli_query($conn, $query_room_img);
 	if(!$result_room_img)
 	{
 		die(mysqli_error($conn));
 	}
 	while($row = mysqli_fetch_assoc($result_room_img))
 	{
 		$db_id = $row['id'];
 		$db_hotel_id = $row['hotel_id'];
 		$db_room_id = $row['room_id'];
 		$db_image = $row['image'];	
?>
				<div class="item">
					<div class="hotel-img" style="background-image: url(admin/images/rooms/<?php echo $db_image; ?>);"></div>
				</div>
<?php } ?>
      			</div>
      		</div>

			<!-- Room Post -->
      		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">

<!-- FETCH ROOM DETAILS FROM DB -->
<?php
	if(isset($_GET['room_id']))
	{
		$get_room_id = $_GET['room_id'];
	}

	if(isset($_SESSION['id']))
	{
		$get_user_id = $_SESSION['id'];
	}

		$query = "SELECT * FROM tbl_rooms WHERE id = {$get_room_id} ";
		$result = mysqli_query($conn, $query);
		if(!$result)
		{
		    die("Query Failed " . mysqli_error($conn));
		}
		while($row = mysqli_fetch_assoc($result))
		{
		    $id				= $row['id'];               
		    $hotel_id		= $row['hotel_id'];               
		    $room_id		= $row['room_id'];               
		    $type			= $row['type'];               
		    $image			= $row['image'];               
		    $description	= $row['description'];               
		    $price_perday	= $row['price_perday'];               
		    $status			= $row['status'];               
		    $date			= $row['date'];               
}
?>

<!-- FETCH HOTEL DETAILS FROM DB -->
<?php
	$query_hotel = "SELECT * FROM tbl_hotels WHERE id = {$hotel_id} ";
	$result_hotel = mysqli_query($conn, $query_hotel);
	if(!$result_hotel)
	{
	    die("Query Failed " . mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($result_hotel))
	{
	    $hotel_id			= $row['id'];               
	    $hotel_name			= $row['name'];               
	    $hotel_address		= $row['address'];               
	    $hotel_district_id	= $row['district_id'];               
	    $hotel_city			= $row['city'];               
	    $hotel_image		= $row['image'];               
	    $hotel_description	= $row['description'];               
	    $hotel_tel_no		= $row['tel_no'];               
	    $hotel_lat			= $row['lat'];               
	    $hotel_lan			= $row['lan'];               
	    $hotel_type			= $row['type'];               
	    $hotel_status		= $row['status'];               
	    $hotel_date			= $row['date'];               
	    $hotel_email		= $row['email'];               
	    $hotel_password		= $row['password'];
	}               
?>

  			<span>Our Best Rooms &amp; Resorts in <?php echo $hotel_name; ?> </span>
			<div class="row">
				<div class="col-md-8">
					<h2><?php echo $type; ?> Room</h2>		
				</div>
				<div class="col-md-4 ">
					<input class="btn btn-primary float-lg-right my-2" data-toggle="modal" data-target="#reservationModal" type="submit" name="reservation" value="Reserve now" >
				</div>
			</div>

			
			<h5>$<?php echo $price_perday; ?> <small> /night</small></h5>		
  			<p class="rate mb-5">
  				<span class="loc"><a href="#"><i class="icon-map"></i> <?php echo $hotel_address; ?></a></span>
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
<h4>Amenities</h4>
			<div class="row">

<!-- View Amenities -->
<?php	
	$query_am_room = "SELECT * FROM tbl_amenities_rooms WHERE hotel_id = {$hotel_id} AND room_id = {$get_room_id}";
	$result_am_room = mysqli_query($conn, $query_am_room);
	if(!$result_am_room)
	{
	    die("Query Failed " . mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($result_am_room))
	{
		$am_id = $row['id'];
		$am_hotel_id = $row['hotel_id'];
		$am_room_id = $row['room_id'];
		$am_amenities_id = $row['amenities_id'];
?>

<?php
	$query_amenities = "SELECT * FROM tbl_amenities WHERE id = {$am_amenities_id}";
	$result_amenities = mysqli_query($conn, $query_amenities);
	if(!$result_amenities)
	{
	    die("Query Failed " . mysqli_error($conn));
	}
	while($row = mysqli_fetch_assoc($result_amenities))
	{
		$amenities_id = $row['id'];
		$amenities = $row['amenities'];
		$amenities_image = $row['image'];
?>
				<div class="col-md-4">
					<p><img src='admin/images/amenities/<?php echo $amenities_image; ?>'> <?php echo $amenities; ?></p>
				</div>	
<?php
	}}
?>			
			</div>
			<br>

  		</div>
      	</div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</section> <!-- .section -->

<?php

if(isset($_POST['reserve_room']))
{
	// No Role
	if(!isset($_SESSION['role']))
	{
			echo '
					<script type="text/javascript">
					$(document).ready(function(){
					  swal.fire({
						title: "Require Signin",
						text: "To Reserve a Room Please Login to the System",
						type: "error",
						showCancelButton: false,
						confirmButtonText: "Ok",
						closeOnConfirm: true
						}, function() {
						});
					});
					</script>
			';
	}
	else 
	{
		$check_in = $_POST['check_in'];
		$check_out = $_POST['check_out'];
		$no_of_guests = $_POST['no_of_guests'];
		$query_fetch_db = "SELECT * FROM tbl_reservations WHERE room_id = {$get_room_id}";
		$result_fetch_db = mysqli_query($conn, $query_fetch_db);
		if(!$result_fetch_db) { die("Query Failed". mysqli_error($conn)); }
		while($row = mysqli_fetch_assoc($result_fetch_db))
		{
			$db_check_in = $row['check_in'];
			$db_check_out = $row['check_out'];
			$db_status = $row['status'];
		
		}
		if((($check_in >= $db_check_in) && ($check_in <= $db_check_out)) || (($check_out >= $db_check_in) && ($check_out <= $db_check_out)) ||  (($check_in <= $db_check_in) && ($check_out >= $db_check_out)) )
		{
			//  between Error for check_in
			echo '
					<script type="text/javascript">
					$(document).ready(function(){
					  swal.fire({
						title: "Error",
						text: "Cannot Reserve the Room, Please Try Another Room",
						type: "warning",
						showCancelButton: false,
						confirmButtonText: "Ok",
						closeOnConfirm: true
						}, function() {

						});
					});
					</script>
			';
		}
		else if($check_in > $check_out )
		{
			// Error Message for Invalid Check-in & Check-out
			echo '
					<script type="text/javascript">
					$(document).ready(function(){
					  swal.fire({
						title: "Error",
						text: "Check-out date should not be less than check-in date",
						type: "warning",
						showCancelButton: false,
						confirmButtonText: "Ok",
						closeOnConfirm: true
						}, function() {

						});
					});
					</script>
			';
		}
		else
		{
			// If it is Success
			$query_reserve = "INSERT INTO tbl_reservations(user_id,hotel_id,room_id,check_in,check_out,no_of_guests,status,date) VALUES ('{$get_user_id}','{$hotel_id}','{$get_room_id}','{$check_in}','{$check_out}','{$no_of_guests}','Pending', now() )";
			$result_reserve = mysqli_query($conn, $query_reserve);
			if(!$result_reserve) { die("query Failed " . mysqli_error($conn)); }
			else
			{
				echo '
					<script type="text/javascript">
					$(document).ready(function(){
					  swal.fire({
						title: "Reservation Submited ",
						text: "Wait for the confirmation from the Hotel Administration",
						type: "success",
						showCancelButton: false,
						confirmButtonText: "Ok",
						closeOnConfirm: true
						}, function() {
						});
					});
					</script>
				';

			}
		}
		
	} //end else
} //end SESSION





	

	

	









	
?>


<!-- Reservation Modal-->
<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Reservation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">

	<form action="" method="post">
				
		<div class="form-group row">
			<label for="check_in" class="col-sm-4 col-form-label">Check In</label>
			<div class="col-sm-8">
		  		<input class="form-control input-sm" type="date" name="check_in">
			</div>
		</div>

		<div class="form-group row">
			<label for="check_out" class="col-sm-4 col-form-label">Check Out</label>
			<div class="col-sm-8">
		  		<input class="form-control input-sm" type="date" name="check_out">
			</div>
		</div>

		<div class="form-group row">
			<label for="no_of_guests" class="col-sm-4 col-form-label">No of Guests</label>
			<div class="col-sm-8">
		  		<select name="no_of_guests" id="no_of_guests" class="form-control">
		  			<option value="1">1</option>
		  			<option value="2">2</option>
		  			<option value="3">3</option>
		  			<option value="4">4</option>
		  			<option value="5">5</option>
		  			<option value="6">6</option>
		  			<option value="7">7</option>
		  			<option value="8">8</option>
		  			<option value="9">9</option>
		  			<option value="10">10</option>
		  		</select>
			</div>
		</div>


        </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <input class="btn btn-primary" type="submit" name="reserve_room" value="Reserve" >
            </div>
            	</form>
        </div>
    </div>
</div>












<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>    


