<?php
// Connecting to the Database
$conn = mysqli_connect('localhost:3308','root','','db_route');
if(!$conn)
{
	die("Connection Failed " . mysqli_error($conn));
}
?>





