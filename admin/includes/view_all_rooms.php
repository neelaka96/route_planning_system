<?php include "delete_modal.php";  ?>

<style>
	table thead tr th 
	{
		font-size: 14px;
	}
	table tbody tr td 
	{
		font-size: 14px;
	}
</style>
<div class="table-responsive">
<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Hotel Name</th>			
			<th>Room Id</th>
			<th>Type</th>
			<th>Image</th>
			<th>Price per day</th>
			<th>Status</th>
			<th>Date</th>
			<th>Add Amenities</th>			
			<th>Images</th>			
			<th>Action</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$query = "SELECT * FROM tbl_rooms ORDER BY id DESC";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				$id 				= $row['id'];				
				$hotel_id 			= $row['hotel_id'];				
				$room_id 			= $row['room_id'];				
				$type 				= $row['type'];				
				$image 				= $row['image'];
			$description 		= $row['description'];
				$price 				= $row['price_perday'];				
				$status 			= $row['status'];				
				$date 				= $row['date'];
		?>

		<?php
				echo "<tr>";
				echo "<td>$id</td>";

				// Display Hotel Name Instead of Id 
				$query_hotel = "SELECT * FROM tbl_hotels WHERE id = {$hotel_id} ";
				$result_hotel = mysqli_query($conn,$query_hotel);  
				while($row = mysqli_fetch_assoc($result_hotel)) 
				{
					$hot_id = $row['id'];
					$hot_name = $row['name'];

						echo "<td>$hot_name</td>";						
					}

				echo "<td>$room_id</td>";
				echo "<td>$type</td>";
				echo "<td><img width='75' height='55' src='images/rooms/$image' alt='image'></td>";
				echo "<td>$price</td>";
				echo "<td>$status</td>";
				echo "<td>$date</td>";

// Amenities
echo "<td><a class='btn btn-sm btn-warning' href='rooms.php?source=add_amenities_to_rooms&room_id={$id}&hotel_id={$hotel_id}'>Amenities</a></td>";

// Images
echo "<td><a class='btn btn-sm btn-secondary' href='includes/room_images_add.php?room_id={$id}&hotel_id={$hotel_id}'>Images</a></td>";

// Edit AND Delete
echo "<td><a href='rooms.php?source=edit_room&room_id={$id}'><i class='fas fa-edit'></i></a>

<a rel='$id' class='text-danger float-right delete_link' href='javascript:void(0)'><i class='fas fa-trash-alt'></i></a></td>";

// <a class='text-danger float-right' href='rooms.php?delete={$id}'><i class='fas fa-trash-alt'></i></a></td>";


					// Display Room Availability 
					$query_room_reservation = "SELECT * FROM tbl_reservations WHERE room_id = {$id} AND CURDATE() between check_in and check_out ";
					$result_room_reservation = mysqli_query($conn,$query_room_reservation);  
					while($row = mysqli_fetch_assoc($result_room_reservation)) 
					{
						$reservation_id 	= $row['id'];
						$reservation_status = $row['status'];

						if ($reservation_status === "Pending") 
						{
							 echo "<td class='text-primary'>Pending</td>";
						}
						else if($reservation_status === "Approved") 
						{
							echo "<td class='text-primary'>Approved</td>";
						}
						else if($reservation_status === "CheckIn") 
						{
							echo "<td class='text-primary'>Check In</td>";
						}
						else if($reservation_status === "CheckOut") 
						{
							echo "<td class='text-success font-weight-bold'>Available</td>";
						}
					}
        		
				echo "</tr>";

			}//end while loop


		?>


		<!-- Delete Hotel Rooms Using "GET" Method -->
		<?php
		if(isset($_GET['delete'])){
		    $r_id = $_GET['delete'];
		    $query = "DELETE FROM tbl_rooms WHERE id = {$r_id}";
		    $result_del = mysqli_query($conn,$query);
		    if (!$result_del) 
		    {
		        die("Delete Query Failed! " . mysqli_error($conn));        
		    }
		    else
		    {
		        // Redirect to Same Page
		        header("Location: rooms.php");
		    }
		}
		?>
		
	</tbody>
	
</table>
</div>


<script>
	$(document).ready(function(){
		$(".delete_link").on('click', function(){
			var id = $(this).attr("rel");
			var delete_url = "rooms.php?delete="+ id +" ";

			$(".modal_delete_link").attr("href", delete_url);

			$("#myModal").modal('show');
		});
	});
</script>