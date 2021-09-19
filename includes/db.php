<?php
// Connecting to the Database
$conn = mysqli_connect('localhost:3307','root','','db_route');
if(!$conn)
{
	die("Connection Failed " . mysqli_error($conn));
}
?>





