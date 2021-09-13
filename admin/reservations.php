

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
                    <a href="#">Reservation</a>
                </li>
                <li class="breadcrumb-item active">
                <?php 
                if(isset($_GET['source'])){
                    $source = $_GET['source'];
                }else{
                    $source = '';
                }

                switch($source){ 
                    case 'checkout_reservations';
                    echo "Check Out";
                    break;

                    case 'checkin_reservations';
                    echo "Check In";
                    break;

                    case 'approved_reservations';
                    echo "Approved Reservation";
                    break;

                    default:
                    echo "Pending Reservations";
                    break;
                }

                ?>
                </li>
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

    // case 'add_hotel';
    // include "includes/hotel_add.php";
    // break;
    
    case 'checkout_reservations';
    include "includes/reservations_checkout.php";
    break;

    case 'checkin_reservations';
    include "includes/reservations_checkin.php";
    break;

    case 'approved_reservations';
    include "includes/reservations_approved.php";
    break;

    default:
    include "includes/reservations_pending.php";
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
