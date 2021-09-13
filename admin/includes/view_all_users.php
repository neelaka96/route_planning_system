<?php include "delete_modal.php";  ?>

<div class="table-responsive">
<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Full Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Nationality</th>
			<th>Role</th>			
			<th>Mobile No</th>			
			<th>Date</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>

		<?php
			$query = "SELECT * FROM tbl_users ORDER BY id DESC";
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result))
			{
				$id = $row['id'];				
				$title = $row['title'];				
				$full_name = $row['full_name'];				
				$username = $row['username'];				
				$email = $row['email'];				
				$password = $row['password'];				
				$gender = $row['gender'];				
				$nationality = $row['nationality'];				
				$role = $row['role'];				
				$tel_no = $row['tel_no'];				
				$date = $row['date'];

		?>

		<?php
				echo "<tr>";
				echo "<td>$id</td>";
				
				echo "<td>$title . $full_name</td>";
				echo "<td>$username</td>";
				echo "<td>$email</td>";
				echo "<td>$nationality</td>";
				echo "<td>$role</td>";
				echo "<td>$tel_no</td>";
				echo "<td>$date</td>";

				// Edit
        		echo "<td><a class='btn btn-sm btn-info' href='users.php?source=edit_user&user_id={$id}'>Edit</a></td>";

// Delete
echo "<td><a rel='$id' class='btn btn-sm btn-danger delete_link' href='javascript:void(0)'>Delete</a></td>";
// echo "<td><a class='btn btn-sm btn-danger' href='users.php?delete={$id}'>Delete</a></td>";
        
				echo "</tr>";

			}//end while loop
		?>


		<!-- Delete Hotel Details Using "GET" Method -->
		<?php
		if(isset($_GET['delete'])){
		    $user_id = $_GET['delete'];
		    $query = "DELETE FROM tbl_users WHERE id = {$user_id}";
		    $result_del = mysqli_query($conn,$query);
		    if (!$result_del) 
		    {
		        die("Delete Query Failed! " . mysqli_error($conn));        
		    }
		    else
		    {
		        // Redirect to Same Page
		        header("Location: users.php");
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
			var delete_url = "users.php?delete="+ id +" ";

			$(".modal_delete_link").attr("href", delete_url);

			$("#myModal").modal('show');
		});
	});
</script>