<!-- STARTS nav-->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="ion-ios-pin lg" style="color: #ff0000; font-size: 25px;"></i> ExploreCeylon.lk</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
<?php 
$active_home = '';
$active_places = '';
$active_search_locations = '';
$active_search_locations_act = '';
$active_place_single = '';

$active_hotels = '';
$active_hotel_single = '';
$active_search_hotel = '';
$active_room_single = '';
$active_search_room = '';

$active_hotel_login = '';
$active_login = '';

$active_user_account = '';
$active_hotel_account = '';


// ---------------------------------------------------------
$pageName = basename($_SERVER['PHP_SELF']);
// ---------------------------------------------------------

$active_home = 'index.php';
$active_places = 'places.php';
$active_search_locations = 'search_locations.php';
$active_search_locations_act = 'search_locations_using_activity.php';
$active_place_single = 'place-single.php';

$active_hotels = 'hotels.php';
$active_route = 'route.php';
$active_hotel_single = 'hotel-single.php';
$active_search_hotel = 'search_hotel.php';
$active_room_single = 'room-single.php';
$active_search_room = 'search_rooms.php';

$active_hotel_login = 'hotel_login.php';
$active_login = 'login.php';

$active_user_account = 'index_subscribers.php';
$active_hotel_account = 'index_hotel_users.php';

// ---------------------------------------------------------

if($pageName == $active_home){
    $active_home = 'active';
}else if($pageName == $active_places){
    $active_places = 'active';
}else if ($pageName == $active_hotels) {
    $active_hotels = 'active';   
}else if ($pageName == $active_hotel_single){
    $active_hotel_single = 'active';
}else if ($pageName == $active_hotel_login){
    $active_hotel_login = 'active';
}else if ($pageName == $active_login){
    $active_login = 'active';    
}else if ($pageName == $active_search_hotel){
    $active_search_hotel = 'active';    
}else if ($pageName == $active_room_single){
    $active_room_single = 'active';    
}else if ($pageName == $active_search_room){
    $active_search_room = 'active';    
}else if ($pageName == $active_search_locations){
    $active_search_locations = 'active';    
}else if ($pageName == $active_search_locations_act){
    $active_search_locations_act = 'active';    
}else if ($pageName == $active_place_single){
    $active_place_single = 'active';    
}else if ($pageName == $active_user_account){
    $active_user_account = 'active';    
}else if ($pageName == $active_hotel_account){
    $active_hotel_account = 'active';    
}else if ($pageName == $active_route){
    $active_route = 'active';    
}

?>
    
                    <li class=" <?php echo $active_home; ?> nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class=" 
                    <?php echo $active_places .' '.$active_search_locations.' '.$active_search_locations_act.' '.$active_place_single; ?> nav-item">
                    <a href="places.php" class="nav-link">Places</a>
                </li>

                <li class=" 
                    <?php echo $active_hotels . ' ' . $active_hotel_single . ' ' . $active_search_hotel .' '. $active_room_single .' '. $active_search_room; ?> 
                    nav-item">
                    <a href="hotels.php" class="nav-link">Hotels and Restaurants</a>
                </li>

                <li class=" 
                    <?php echo $active_route . ' ' . $active_hotel_single . ' ' . $active_search_hotel .' '. $active_room_single .' '. $active_search_room; ?> 
                    nav-item">
                    <a href="route.php" class="nav-link">Route Plan</a>
                </li>

                <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
                

<?php if(isset($_SESSION['role'])): ?>

    <!-- -------------------- One Link ------------------------- -->
    <li class="<?php echo $active_user_account; ?> nav-item"><a href="
    <?php 
        if($_SESSION['role'] == 'Admin'){
            echo "admin/index.php";
        }else{
            echo "index_subscribers.php?subscriber_id={$_SESSION['id']}";
        }
    ?>
        " class="nav-link"><?php echo "Account ". $_SESSION['username']; ?></a></li>
    <!-- -------------------- End One Link ------------------------- -->
    
    <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">Logout</a></li>

<?php else:  ?>
    <li class=" <?php echo $active_login; ?> nav-item"><a href="login.php"  class="nav-link">Login</a></li>

    <li class=" <?php echo $active_login; ?> nav-item"><a href="register.php"  class="nav-link">Register</a></li>
    
<?php endif; ?>





<!-- ---------------------------------------------------------- -->
<!-- ------------------- Hotel Users ---------------------------- -->
<!-- ---------------------------------------------------------- -->

<?php if(isset($_SESSION['name'])): ?>

    <li class="<?php echo $active_hotel_account; ?> nav-item"><a href="index_hotel_users.php?hotel_id=<?php echo $_SESSION['id']; ?>" class="nav-link"><?php echo $_SESSION['name']; ?></a></li>

    <li class="nav-item"><a href="includes/hotel_logout.php" class="nav-link">Log out</a></li>

<?php else:  ?>
    
    
<?php endif; ?>


                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="includes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



