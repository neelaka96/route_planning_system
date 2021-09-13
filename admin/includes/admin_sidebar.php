<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="provinces.php">
            <i class="fas fa-globe"></i>
            <span>Provinces</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="districts.php">
            <i class="fas fa-thumbtack"></i>
            <span>Districts</span></a>
    </li>
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-map-marked-alt"></i>
            <span>Locations</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="./locations.php">View All Locations</a>
            <a class="dropdown-item" href="locations.php?source=add_location">Add Locations</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="./hotels.php" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-map-marked-alt"></i>
            <span>Hotels</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="./hotels.php">View All Hotels</a>
            <a class="dropdown-item" href="hotels.php?source=add_hotel">Add Hotel</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="amenities.php">
            <i class="fas fa-globe"></i>
            <span>Amenities</span></a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-map-marked-alt"></i>
            <span>Rooms</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="./rooms.php">View All Rooms</a>
            <a class="dropdown-item" href="rooms.php?source=add_room">Add a Room</a>
        </div>
    </li>
<!-- 
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="login.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.html">404 Page</a>
            <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
    </li>

  -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-map-marked-alt"></i>
            <span>Reservation</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="./reservations.php">Pending Reservations</a>
            <a class="dropdown-item" href="reservations.php?source=approved_reservations">Approved Reservations</a>
            <a class="dropdown-item" href="reservations.php?source=checkin_reservations">Check In</a>
            <a class="dropdown-item" href="reservations.php?source=checkout_reservations">Check Out</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-map-marked-alt"></i>
            <span>Users</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="./users.php">View All Users</a>
            <a class="dropdown-item" href="users.php?source=add_user">Add a User</a>
        </div>
    </li>

</ul>
