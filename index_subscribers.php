<!-- DB -->
<?php include "includes/db.php"; ?>

<!-- HEADER -->
<?php include "includes/i_header.php"; ?>

<!-- NAVIGATION -->
<?php include "includes/i_navigation.php"; ?>

<!-- BACKGROUND IMAGE -->
    <!-- STARTS header-->
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bgbg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
                    <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Discover <br>New Place in Sri Lanka</h1>
                    <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Find great places to stay, eat, shop, or visit from local experts</p>
                </div>
            </div>
        </div>
    </div>
    <!-- END header-->

<div class="container">
	<div class="row justify-content-center">
    <table class="float-right mt-4">
        <tbody>
<?php
	if(isset($_GET['subscriber_id']))
	{
		$get_subscriber_id = $_GET['subscriber_id'];
	}
	$query = "SELECT * FROM tbl_users WHERE id = $get_subscriber_id ";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		$db_id = $row['id'];				
		$db_title = $row['title'];				
		$db_full_name = $row['full_name'];				
		$db_username = $row['username'];				
		$db_email = $row['email'];				
		$db_password = $row['password'];				
		$db_gender = $row['gender'];				
		$db_nationality = $row['nationality'];				
		$db_role = $row['role'];				
		$db_tel_no = $row['tel_no'];				
		$db_date = $row['date'];
	}
?>
            <tr>
                <th class="text-right">Full Name :</th>
                <td> <?php echo $db_title . " " . $db_full_name ; ?></td>
            </tr>
            <tr>
                <th class="text-right">Username :</th>
                <td> <?php echo $db_username; ?></td>
            </tr>
            <tr>
                <th class="text-right">User Email :</th>
                <td> <?php echo $db_email; ?></td>
            </tr>
            <tr>
                <th class="text-right">Nationality :</th>
                <td> <?php echo $db_nationality; ?></td>
            </tr>
        </tbody>
    </table>
</div>

		<div class="table-responsive">
        	<h3>Reservation Details</h3>
              	<table class="table table-bordered" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
					<th>User Id</th>			
					<th>Hotel</th>
					<th>Room Id</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Guests</th>
					<th>Status</th>
					<th>Date Booked</th>
                  </tr>
                </thead>
                <tbody>

<?php

	$query = "SELECT * FROM tbl_reservations WHERE user_id = {$get_subscriber_id} ORDER BY id DESC";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		$reservation_id		= $row['id'];				
		$user_id 			= $row['user_id'];				
		$hotel_id 			= $row['hotel_id'];				
		$room_id 			= $row['room_id'];				
		$check_in 			= $row['check_in'];				
		$check_out			= $row['check_out'];
		$no_of_guests 		= $row['no_of_guests'];
		$status 			= $row['status'];				
		$date 				= $row['date'];

		// if($status == "Approved")
		// {
			echo "<tr>";
			echo "<td>$reservation_id</td>";
			echo "<td>$user_id</td>";

				// Display Hotel Name Instead of Id 
				$query_hotels = "SELECT * FROM tbl_hotels WHERE id = {$hotel_id} ";
				$result_hotels = mysqli_query($conn,$query_hotels);  
				while($row = mysqli_fetch_assoc($result_hotels)) 
				{
					$id = $row['id'];
					$name = $row['name'];

					echo "<td>$name</td>";						
				}
			
			echo "<td>$room_id</td>";
			echo "<td>$check_in</td>";
			echo "<td>$check_out</td>";
			echo "<td>$no_of_guests</td>";
			echo "<td class='text-success font-weight-bold'>$status</td>";
			echo "<td>$date</td>";

// Cancel
			if($status === "Pending")
			{
				echo "<td><a class='btn btn-sm btn-danger' href='index_subscribers.php?cancel={$reservation_id}'>Cancel</a></td>";
			}

			
			if($status === "CheckOut")
			{
				echo "<td><a class='btn btn-sm btn-success' target='_blank' href='invoice/template.php?reservation_id={$reservation_id}&hotel_id={$hotel_id}&room_id={$room_id}&user_id={$user_id}'>View Invoice</a></td>";
			}

				echo "</tr>";
		// }// end if 
	}//end while loop

			
?>






			






<?php

	if(isset($_GET['cancel']))
	{
    	$get_cancel_reservation_id = $_GET['cancel'];
	    $query_cancel = "DELETE FROM tbl_reservations WHERE id = {$get_cancel_reservation_id} AND status = 'Pending' ";
    	$cancel_query = mysqli_query($conn, $query_cancel);
    	header("Location: index_subscribers.php?subscriber_id={$_SESSION['id']} ");
	}

?>

                </tbody>
            </table>
        </div>



</div>
<br>



<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>


