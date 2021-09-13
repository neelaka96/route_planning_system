<div class="table-responsive">
<h3>Pending Reservations</h3>
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
			<th>Guests</th>
			<th>Status</th>
			<th>Date Booked</th>
			<th>Approve</th>
			<th>Cancel</th>
		</tr>
	</thead>
	<tbody>

<?php
	if(isset($_GET['hotel_id']))
	{
		$get_hotel_id = $_GET['hotel_id'];
	
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

		if($status == "Pending")
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
    		echo "<td><a class='btn btn-sm btn-info' href='index_hotel_users.php?source=pending_reservations&hotel_id={$get_hotel_id}&approve={$reservation_id}'>Approve</a></td>";

    		// Cancel
    		echo "<td><a class='btn btn-sm btn-danger' href='index_hotel_users.php?source=pending_reservations&hotel_id={$get_hotel_id}&cancel={$reservation_id}'>Cancel</a></td>";

			echo "</tr>";
		}// end if 
	}//end while loop
}
?>

<?php
	if(isset($_GET['approve']))
	{
    	$get_approve_id = $_GET['approve'];
	    $query_approve = "UPDATE tbl_reservations SET status = 'Approved' WHERE id = $get_approve_id ";
	    $approve_query = mysqli_query($conn, $query_approve);

        echo "<p class='text-center alert alert-success' role='alert'>Reservation Approved Successfully: <a href='index_hotel_users.php?source=pending_reservations&hotel_id={$get_hotel_id}'>View Reservations</a></p>";

	}

	if(isset($_GET['cancel']))
	{
    	$get_cancel_reservation_id = $_GET['cancel'];
	    $query_cancel = "UPDATE tbl_reservations SET status = 'Canceled' WHERE id = {$get_cancel_reservation_id} ";
	    $cancel_query = mysqli_query($conn, $query_cancel);

	    echo "<p class='text-center alert alert-danger' role='alert'>Reservation Canceled Successfully: <a href='index_hotel_users.php?source=pending_reservations&hotel_id={$get_hotel_id}'>View Reservations</a></p>";
	}

?>

		
	</tbody>
	
</table>
</div>



