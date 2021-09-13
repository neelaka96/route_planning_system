<?php include "delete_modal.php";  ?>

<div class="table-responsive">
<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>District</th>
			<th>City</th>
			<th>Lattitude</th>
			<th>Longitude</th>
			<th>Image</th>
			<th>Date</th>
			<th>Images</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$query = "SELECT * FROM tbl_locations ORDER BY loc_id DESC";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				$loc_id = $row['loc_id'];				
				$title = $row['title'];				
				$dis_id = $row['district_id'];				
				$city = $row['city'];
				$lat = $row['lat'];				
				$lan = $row['lan'];				
				$img = $row['img'];				
				$date = $row['u_date'];

				echo "<tr>";							

		?>

		<?php
				
				echo "<td>$loc_id</td>";
				echo "<td>$title</td>";

					// Display District Name Instead of Id 
					$query_dis = "SELECT * FROM tbl_districts WHERE district_id = {$dis_id} ";
					$result_dis = mysqli_query($conn,$query_dis);  
					while($row = mysqli_fetch_assoc($result_dis)) 
					{
						$district_id = $row['district_id'];
						$district_title = $row['district_title'];

						echo "<td>$district_title</td>";						
					}

				echo "<td>$city</td>";
				echo "<td>$lat</td>";
				echo "<td>$lan</td>";

				echo "<td><img width='75' height='55' src='images/locations/$img' alt='image'></td>";
				echo "<td>$date</td>";

				// Images
        		echo "<td><a class='btn btn-sm btn-primary' href='includes/location_images_add.php?loc_id={$loc_id}'>Images</a></td>";

				// Edit
        		echo "<td><a class='btn btn-sm btn-info' href='locations.php?source=edit_location&loc_id={$loc_id}'>Edit</a></td>";

// Delete
echo "<td><a rel='$loc_id' class='btn btn-sm btn-danger delete_link' href='javascript:void(0)'>Delete</a></td>";
// echo "<td><a class='btn btn-sm btn-danger' href='locations.php?delete={$loc_id}'>Delete</a></td>";
        
        
				echo "</tr>";

			}//end while loop
		?>


		<!-- Delete Location Details Using "GET" Method -->
		<?php
		if(isset($_GET['delete'])){
		    $get_loc_del = $_GET['delete'];

		    $query = "DELETE FROM tbl_locations WHERE loc_id = {$get_loc_del};";
		    $query .= "DELETE FROM tbl_location_activities WHERE location_id = {$get_loc_del}";

		    $result_del = mysqli_multi_query($conn,$query);
		    if (!$result_del) 
		    {
		        die("Delete Query Failed! " . mysqli_error($conn));        
		    }
		    else
		    {
		        // Redirect    
		        header("Location: locations.php");
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
			var delete_url = "locations.php?delete="+ id +" ";

			$(".modal_delete_link").attr("href", delete_url);

			$("#myModal").modal('show');
			
		});
	});
</script>