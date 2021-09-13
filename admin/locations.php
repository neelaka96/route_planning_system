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
                    <a href="Locations.php">Locations</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>


            <div class="row">
                    <div class="col-lg-12">
                        

                        
<!-- SWITCHING STATEMENT FOR "add_posts.php", "edit_post.php" & "view_all_posts.php" -->
<?php 
if(isset($_GET['source'])){
    $source = $_GET['source'];
}else{
    $source = '';
}

switch($source){

    case 'add_location';
    include "includes/location_add.php";
    break;

    case 'edit_location';
    include "includes/location_edit.php";
    break;

    default:
    include "includes/view_all_locations.php";
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
