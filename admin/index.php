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
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-location-arrow"></i>
                            </div>
<?php 
$query_loc = "SELECT * FROM tbl_locations";
$result_loc = mysqli_query($conn, $query_loc);
$num_loc = mysqli_num_rows($result_loc);
    echo "<div class='mr-5'>{$num_loc} Locations</div>";
?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="locations.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-landmark"></i>
                            </div>
<?php 
$query_hotels = "SELECT * FROM tbl_hotels";
$result_hotels = mysqli_query($conn, $query_hotels);
$num_hotels = mysqli_num_rows($result_hotels);
    echo "<div class='mr-5'>{$num_hotels} Hotels</div>";
?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="hotels.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-parachute-box"></i>
                            </div>
<?php 
$query_rooms = "SELECT * FROM tbl_rooms";
$result_rooms = mysqli_query($conn, $query_rooms);
$num_rooms = mysqli_num_rows($result_rooms);
    echo "<div class='mr-5'>{$num_rooms} Rooms</div>";
?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="rooms.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-users"></i>
                            </div>
<?php 
$query_users = "SELECT * FROM tbl_users";
$result_users = mysqli_query($conn, $query_users);
$num_users = mysqli_num_rows($result_users);
    echo "<div class='mr-5'>{$num_users} Users</div>";
?>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="users.php">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Any other Jquery Plugins -->
<?php 
$query_hotel_draft = "SELECT * FROM tbl_hotels WHERE status='Draft'";
$result_hotel_draft = mysqli_query($conn, $query_hotel_draft);
$num_hotel_draft = mysqli_num_rows($result_hotel_draft);
  
$query_rooms_draft = "SELECT * FROM tbl_rooms WHERE status='Draft'";
$result_rooms_draft = mysqli_query($conn, $query_rooms_draft);
$num_rooms_draft = mysqli_num_rows($result_rooms_draft);

$query_subscriber = "SELECT * FROM tbl_users WHERE role='Subscriber'";
$result_subscriber = mysqli_query($conn, $query_subscriber);
$num_subscriber = mysqli_num_rows($result_subscriber);

$query_pending_reservations = "SELECT * FROM tbl_reservations WHERE status='Pending'";
$result_pending_reservations = mysqli_query($conn, $query_pending_reservations);
$num_pending_reservations = mysqli_num_rows($result_pending_reservations);

$query_approved_reservations = "SELECT * FROM tbl_reservations WHERE status='Approved'";
$result_approved_reservations = mysqli_query($conn, $query_approved_reservations);
$num_approved_reservations = mysqli_num_rows($result_approved_reservations);

?>

<div class="row">
    <div class="container">
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Counts'],

<?php 

$element_text = ['Locations', 'Hotels', 'Draft Hotels', 'Rooms', 'Pending Rooms', 'Subscribers', 'Pending Res', 'Approved Res'];
$element_count = [$num_loc, $num_hotels, $num_hotel_draft, $num_rooms, $num_rooms_draft, $num_subscriber, $num_pending_reservations, $num_approved_reservations];
    for($i = 0; $i < 8; $i++)
    {
        echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],"; 
    }

?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    </div>
</div>





            
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->



<!-- Footer-->
<?php include "includes/admin_footer.php"; ?>
