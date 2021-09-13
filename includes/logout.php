<?php session_start(); ?>

<?php

	$_SESSION['id'] 			= null; 
	$_SESSION['title'] 			= null; 
	$_SESSION['full_name'] 		= null; 
	$_SESSION['username'] 		= null; 
	$_SESSION['email'] 			= null; 
	$_SESSION['role'] 			= null;

	header("Location: ../index.php");


?>