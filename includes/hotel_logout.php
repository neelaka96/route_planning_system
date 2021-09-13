<?php session_start(); ?>

<?php

	$_SESSION['id']		= null; 
	$_SESSION['name']	= null; 
	$_SESSION['email']	= null; 

	header("Location: ../index.php");


?>