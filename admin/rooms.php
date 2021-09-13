<?php ob_start(); ?>

<!-- DB -->
<?php include "../includes/db.php"; ?>

<!-- Header -->
<?php include "includes/admin_header.php"; ?>

<!-- Navbar-->
<?php include "includes/admin_nav.php"; ?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/admin_sidebar.php"; ?>


    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="rooms.php">Rooms</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>


            <div class="row">
                    <div class="col-lg-12">
                        

                        
<!-- SWITCHING STATEMENT -->
<?php 
if(isset($_GET['source'])){
    $source = $_GET['source'];
}else{
    $source = '';
}

switch($source){

    case 'add_room';
    include "includes/room_add.php";
    break;

    case 'edit_room';
    include "includes/room_edit.php";
    break;

    case 'add_amenities_to_rooms';
    include "includes/amenities_add_to_rooms.php";
    break;

    default:
    include "includes/view_all_rooms.php";
    break;
}
?>                        



                    </div>
                </div>


           
            
            <!-- Any other Jquery Plugins -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->



<!-- Footer-->
<?php include "includes/admin_footer.php"; ?>
