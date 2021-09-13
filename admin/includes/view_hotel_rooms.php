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
<?php
	if(isset($_GET['hotel_id']))
	{
		$get_hotel_id = $_GET['hotel_id'];

		$query_hotel = "SELECT * FROM tbl_hotels WHERE id = {$get_hotel_id} ";
		$result_hotel = mysqli_query($conn,$query_hotel);  
		while($row = mysqli_fetch_assoc($result_hotel)) 
		{
			$hotel_name = $row['name'];
		}
	}
?>

<h2 class="text-center"><?php echo $hotel_name; ?></h2>

<a class="btn btn-success mb-2" href="hotels.php?source=add_hotel_room&hotel_id=<?php echo $get_hotel_id; ?>">Add Room</a>
<div class="table-responsive">
<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Hotel Name</th>			
			<th>Room Ref</th>
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
		if(isset($_GET['hotel_id']))
		{
			$get_hotel_id = $_GET['hotel_id'];
		
			$query = "SELECT * FROM tbl_rooms WHERE hotel_id = {$get_hotel_id} ORDER BY id DESC";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				$id 				= $row['id'];				
				$hotel_id 			= $row['hotel_id'];				
				$room_id 			= $row['room_id'];				
				$type 				= $row['type'];				
				$image 				= $row['image'];
			$description 		= $row['description'];
				$available_rooms 	= $row['available_rooms'];				
				$price 				= $row['price_perday'];				
				$status 			= $row['status'];				
				$date 				= $row['date'];

				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$hotel_name</td>";						
				echo "<td>$room_id</td>";
				echo "<td>$type</td>";
				echo "<td><img width='75' height='55' src='images/rooms/$image' alt='image'></td>";
				echo "<td>$price</td>";
				echo "<td>$status</td>";
				echo "<td>$date</td>";

// Amenities
echo "<td><a class='btn btn-sm btn-warning' href='hotels.php?source=add_amenities_to_hotel_rooms&room_id={$id}&hotel_id={$get_hotel_id}'>Amenities</a></td>";

// Images to Carousel
echo "<td><a class='btn btn-sm btn-secondary' href='includes/hotel_room_images_add.php?room_id={$id}&hotel_id={$hotel_id}'>Images</a></td>";


// Edit AND Delete
echo "<td><a class='' href='hotels.php?source=edit_hotel_room&room_id={$id}'><i class='fas fa-edit'></i></a>

<a rid='$id' hid='$get_hotel_id' class='text-danger float-right delete_link' href='javascript:void(0)'><i class='fas fa-trash-alt'></i></a></td>";
        		
// <a class='text-danger float-right' href='hotels.php?source=view_hotel_rooms&hotel_id={$get_hotel_id}&delete={$id}'><i class='fas fa-trash-alt'></i></a></td>";


	// Display Room Availability 
	$query_room_reservation = "SELECT * FROM tbl_reservations WHERE room_id = {$id} AND CURDATE() between check_in and check_out ";
	$result_room_reservation = mysqli_query($conn,$query_room_reservation);  
	while($row = mysqli_fetch_assoc($result_room_reservation)) 
	{
		$reservation_id 	= $row['id'];
		$reservation_status = $row['status'];

		if ($reservation_status == 'Pending') 
		{
			 echo "<td class='text-primary'>Pending</td>";
		}
		else if($reservation_status == 'Approved') 
		{
			echo "<td class='text-primary'>Approved</td>";
		}
		else if($reservation_status == 'CheckIn') 
		{
			echo "<td class='text-primary'>Check In</td>";
		}
		else if($reservation_status == 'CheckOut') 
		{
			echo "<td class='text-success font-weight-bold'>Available</td>";
		}
	}

				echo "</tr>";

			}//end while loop
				$room_count = mysqli_num_rows($result);
				if ($room_count == 0) 
		        {
		            echo "<h1 class='text-center text-danger'> No Rooms </h1>";
		        }
			
		}


		// <!-- Delete Hotel Details Using "GET" Method -->
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
	    		header("Location: hotels.php?source=view_hotel_rooms&hotel_id={$get_hotel_id}");
		    }
		}
		?>
		
	</tbody>
	
</table>
</div>

<script>
	$(document).ready(function(){
		$(".delete_link").on('click', function(){
			var rid = $(this).attr("rid");
			var hid = $(this).attr("hid");
			var delete_url = "hotels.php?source=view_hotel_rooms&hotel_id="+ hid +"&delete="+ rid +"";

			$(".modal_delete_link").attr("href", delete_url);

			$("#myModal").modal('show');
			
		});
	});
</script>