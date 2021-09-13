<?php ob_start(); ?>
<?php session_start(); ?>

<?php
    // if Role is not there
    if(!isset($_SESSION['role']))
    {
        header ("Location: ../index.php");
    } 
    else 
    // if Login as a Role : Subscriber go to Homepage 
    if(isset($_SESSION['role']))
    {
        if($_SESSION['role'] !== 'Admin')
        {
            header ("Location: ../index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Explore Ceylon Admin Panel</title>
    

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <script type="text/javascript" src="js/dashboard-charts.js"></script>

    <style>
      .error{
          color: #dc3545;
          font-style: italic;
          font-weight: bold;
          }
    </style>
    
</head>