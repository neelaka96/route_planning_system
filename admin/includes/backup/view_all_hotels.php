<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Title</th>			
			<th>District</th>
			<th>City</th>
			<th>Image</th>
			<th>Tel No</th>
			
			<th>Type</th>			
			<th>Status</th>			
			<th>Date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$query = "SELECT * FROM tbl_hotels ORDER BY id DESC";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				$id = $row['id'];				
				$name = $row['name'];				
				$address = $row['address'];				
				$dis_id = $row['district_id'];				
				$city = $row['city'];
				$image = $row['image'];
				$desc = $row['description'];
				$tel = $row['tel_no'];
				$lat = $row['lat'];				
				$lan = $row['lan'];				
				$type = $row['type'];				
				$status = $row['status'];				
				$date = $row['date'];

											

		?>

		<?php
				echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$name</td>";
				

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
				echo "<td><img width='75' height='55' src='../images/uploaded_images/$image' alt='image'></td>";
				echo "<td>$tel</td>";
				
				echo "<td>$type</td>";
				echo "<td>$status</td>";
				echo "<td>$date</td>";

				// Edit
        		echo "<td><a class='btn btn-sm btn-info' href='hotels.php?source=edit_hotel&hotel_id={$id}'>Edit</a></td>";

        		// Delete
        		echo "<td><a class='btn btn-sm btn-danger' href='hotels.php?delete={$id}'>Delete</a></td>";
        

				echo "</tr>";

			}//end while loop
		?>


		<!-- Delete Hotel Details Using "GET" Method -->
		<?php
		if(isset($_GET['delete'])){
		    $hotel_id = $_GET['delete'];
		    $query = "DELETE FROM tbl_hotels WHERE id = {$hotel_id}";
		    $result_del = mysqli_query($conn,$query);
		    if (!$result_del) 
		    {
		        die("Delete Query Failed! " . mysqli_error($conn));        
		    }
		    else
		    {
		        // Redirect to Same Page
		        header("Location: hotels.php");
		    }
		}
		?>
		
	</tbody>
	
</table>