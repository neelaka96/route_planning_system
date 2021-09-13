<!-- DELETE MODAL -->
<?php include "delete_modal.php";  ?>


            <div class="table-responsive">
            	<h3>Room Details</h3>
              <table class="table table-bordered" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id</th>
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
}

$query = "SELECT * FROM tbl_rooms Where hotel_id = {$get_hotel_id} ORDER BY id DESC";
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

				echo "<td>$room_id</td>";
				echo "<td>$type</td>";
				echo "<td><img width='75' height='55' src='admin/images/rooms/$image' alt='image'></td>";
				echo "<td>$price</td>";
				echo "<td>$status</td>";
				echo "<td>$date</td>";

// Amenities
echo "<td><a class='btn btn-sm btn-warning' href='index_hotel_users.php?source=add_amenities&room_id={$id}&hotel_id={$get_hotel_id}'>Amenities</a></td>";

// Images
echo "<td><a class='btn btn-sm btn-secondary' href='includes/hotel_users_add_room_images.php?room_id={$id}&hotel_id={$hotel_id}'>Images</a></td>";

// Edit AND Delete
echo "<td><a class='text-danger' href='index_hotel_users.php?source=edit_room&room_id={$id}&hotel_id={$get_hotel_id}'><i class='icon-pencil-square-o'></i></a>

<a hid='$get_hotel_id' rid='$id' id='btn_delete' class='text-danger float-right delete_link' href='javascript:void(0)'><i class='icon-delete'></i></a></td>";

// <a id='btn_delete' class='text-danger float-right' href='index_hotel_users.php?hotel_id={$get_hotel_id}&delete={$id}'><i class='icon-delete'></i></a></td>";


	// Display Room Availability 
	$query_room_reservation = "SELECT * FROM tbl_reservations WHERE room_id = {$id} AND CURDATE() between check_in and check_out ";
	$result_room_reservation = mysqli_query($conn,$query_room_reservation);  
	while($row = mysqli_fetch_assoc($result_room_reservation)) 
	{
		$reservation_id 	= $row['id'];
		$reservation_status = $row['status'];

		if ($reservation_status == 'Pending') 
		{
			 echo "<td class='font-weight-bold'>Pending</td>";
		}
		else if($reservation_status == 'Approved') 
		{
			echo "<td class='font-weight-bold'>Approved</td>";
		}
		else if($reservation_status == 'CheckIn') 
		{
			echo "<td class='font-weight-bold'>Check In</td>";
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
		            echo "<h1 class='text-center text-danger'> No Rooms are Available </h1>";
		        }
		?>


		<!-- Delete Hotel Details Using "GET" Method -->
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
		        header("Location: index_hotel_users.php?hotel_id={$get_hotel_id}");
		    }
		}
		?>
                </tbody>
              </table>
            </div>


<script>
	$(document).ready(function(){
		$(".delete_link").on('click', function(){
			var hid = $(this).attr("hid");
			var rid = $(this).attr("rid");
			var delete_url = "index_hotel_users.php?hotel_id="+ hid +"&delete="+ rid +" ";

			$(".modal_delete_link").attr("href", delete_url);

			$("#myModal").modal('show');
			
		});
	});
</script>