<div class="table-responsive" >
<h3>Check Out Reservations</h3>
<table align="center" style="margin: 0px auto;" class="table table-responsive table-bordered table-hover">
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
			<th>Invoice</th>
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

		if($status == "CheckOut")
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
			echo "<td class='text-danger font-weight-bold'>$status</td>";
			echo "<td>$date</td>";
			echo "<td><a class='btn btn-sm btn-warning' target='_blank' href='invoice/template.php?reservation_id={$reservation_id}&hotel_id={$hotel_id}&room_id={$room_id}&user_id={$user_id}'>Print Invoice</a></td>";

			echo "</tr>";
		}// end if 
	}//end while loop
}
?>

		
	</tbody>
	
</table>
</div>


