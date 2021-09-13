<div class="table-responsive">
<h3>Check In Reservations</h3>
<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>User Id</th>			
			<th>Full Name</th>			
			<!-- <th>Hotel</th> -->
			<th>Room Id</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>No of Guests</th>
			<th>Status</th>
			<th>Date Booked</th>
			<th>Check Out</th>
			<!-- <th>Cancel</th> -->
		</tr>
	</thead>
	<tbody>

<?php
	if(isset($_GET['hotel_id']))
	{
		$get_hotel_id = $_GET['hotel_id'];
	}
	$query = "SELECT * FROM tbl_reservations WHERE hotel_id = {$get_hotel_id} ORDER BY id DESC";
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

		if($status == "CheckIn")
		{
			echo "<tr>";
			echo "<td>$reservation_id</td>";
			echo "<td>$user_id</td>";

				// Display User's Name Instead of Id 
				$query_users = "SELECT * FROM tbl_users WHERE id = {$user_id} ";
				$result_users = mysqli_query($conn,$query_users);  
				while($row = mysqli_fetch_assoc($result_users)) 
				{
					$id = $row['id'];
					$title = $row['title'];
					$full_name = $row['full_name'];

					echo "<td>$title . $full_name</td>";						
				}

				// Display Hotel Name Instead of Id 
				// $query_hotels = "SELECT * FROM tbl_hotels WHERE id = {$hotel_id} ";
				// $result_hotels = mysqli_query($conn,$query_hotels);  
				// while($row = mysqli_fetch_assoc($result_hotels)) 
				// {
				// 	$id = $row['id'];
				// 	$name = $row['name'];

				// 	echo "<td>$name</td>";						
				// }
			
			echo "<td>$room_id</td>";
			echo "<td>$check_in</td>";
			echo "<td>$check_out</td>";
			echo "<td>$no_of_guests</td>";
			echo "<td>$status</td>";
			echo "<td>$date</td>";

			// Approve
			echo "<td><a class='btn btn-sm btn-warning' href='index_hotel_users.php?source=checkin_reservations&hotel_id={$get_hotel_id}&check_out={$reservation_id}'>Check Out</a></td>";

			echo "</tr>";
		}// end if 
	}//end while loop
?>

<?php
	if(isset($_GET['check_out']))
	{
    	$get_check_out_id = $_GET['check_out'];
	    $query_checkin = "UPDATE tbl_reservations SET status = 'CheckOut' WHERE id = $get_check_out_id ";
	    $checkin_query = mysqli_query($conn, $query_checkin);

	    // header("Location: index_hotel_users.php?source=checkin_reservations&hotel_id={$get_hotel_id}");

	    echo "<p class='text-center alert alert-success' role='alert'>Reservation has been Check-out Successfully: <a href='index_hotel_users.php?source=checkin_reservations&hotel_id={$get_hotel_id}'>View Check in Reservations</a></p>";
	}

?>

		
	</tbody>
	
</table>
</div>



