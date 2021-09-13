<!-- DB -->
<?php include "includes/db.php"; ?>

<!-- HEADER -->
<?php include "includes/i_header.php"; ?>

<!-- NAVIGATION -->
<?php include "includes/i_navigation.php"; ?>

<!-- BACKGROUND IMAGE -->
<?php include "includes/i_background.php"; ?>
    
<!-- SEARCH -->
<?php include "includes/i_search.php"; ?>


    <!-- STARTS about us-->
    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url(images/about.jpg);"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">About <i class="ion-ios-pin lg" style="color: #ff0000; font-size: 45px;"></i> ExploreCeylon.lk</h2>
            </div>
            <div>
                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
            </div>
        </div>
    </section>
    

    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-yatch"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Special Activities</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-around"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Travel Arrangements</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-compass"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Private Guide</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-map-of-roads"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Location Manager</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END about us-->


    <!-- STARTS most popular destination -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Most Popular Destination</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">


<?php
$query = "SELECT * FROM tbl_locations ORDER BY loc_id ASC LIMIT 4 ";
$result = mysqli_query($conn, $query);
if(!$result)
{
    die("Query Failed " . mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($result))
{
        $loc_id = $row['loc_id'];               
    $title = $row['title'];             
        $dis_id = $row['district_id'];              
        $city = $row['city'];
        $lat = $row['lat'];             
        $lan = $row['lan'];             
    $img = $row['img'];             
        $keyword = $row['keyword'];  
    $description    = substr($row['description'],0,70);
        $date = $row['u_date'];

?>

                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="place-single.php?location_id=<?php echo $loc_id; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(admin/images/locations/<?php echo $img; ?>);">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="place-single.php?location_id=<?php echo $loc_id; ?>"><?php echo $title; ?></a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                            </div>
                            <p><?php echo $description; ?></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> <?php echo $city; ?></span>
                                <span class="ml-auto"><a href="place-single.php?location_id=<?php echo $loc_id; ?>">Locate</a></span>
                            </p>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div>
            <span class="ml-auto"><a class="btn text-success float-right" href="places.php">More Locations </a></span>
        </div>
    </section>
    <!-- END most popular destination -->
    

<!-- STARTS no of count -->
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
<?php 
$query_users = "SELECT * FROM tbl_users";
$result_users = mysqli_query($conn, $query_users);
$num_users = mysqli_num_rows($result_users);
?>
                            <div class="text">
                                <strong class="number" data-number="<?php echo $num_users; ?>">0</strong>
                                <span>Happy Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
<?php 
$query_loc = "SELECT * FROM tbl_locations";
$result_loc = mysqli_query($conn, $query_loc);
$num_loc = mysqli_num_rows($result_loc);
?>
                            <div class="text">
                                <strong class="number" data-number="<?php echo $num_loc; ?>">0</strong>
                                <span>Destination Places</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
<?php 
$query_hotels = "SELECT * FROM tbl_hotels";
$result_hotels = mysqli_query($conn, $query_hotels);
$num_hotels = mysqli_num_rows($result_hotels);
?>
                            <div class="text">
                                <strong class="number" data-number="<?php echo $num_hotels;  ?>">0</strong>
                                <span>Hotels & Restuarents</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END no of count -->


    <!-- STARTS hotels -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4"><strong>Popular</strong> Hotels</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
<?php
$query = "SELECT * FROM tbl_hotels ORDER BY id ASC LIMIT 4";
$result = mysqli_query($conn, $query);
if(!$result)
{
    die("Query Failed " . mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($result))
{
    $id             = $row['id'];               
    $name           = $row['name'];               
    $address        = $row['address'];               
    $district_id    = $row['district_id'];               
    $city           = $row['city'];               
    $image          = $row['image'];               
    // $description    = $row['description'];               
    $description    = substr($row['description'],0,80);

    $tel_no         = $row['tel_no'];               
    $lat            = $row['lat'];               
    $lan            = $row['lan'];               
    $type           = $row['type'];               
    $status         = $row['status'];               
    $date           = $row['date'];               
    $email          = $row['email'];               
    $password       = $row['password'];   

    if($status == "Published")            
    {
?>
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="destination">
                        <a href="hotel-single.php?hotel_id=<?php echo $id; ?>" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/uploaded_images/<?php echo $image; ?>);">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="hotel-single.php?hotel_id=<?php echo $id; ?>"><?php echo $name; ?></a></h3>
                                    <p class="rate">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <span>8 Rating</span>
                                    </p>
                                </div>
                                <div class="two">
                                    <span class="price per-price">$40<br><small>/night</small></span>
                                </div>
                            </div>
                            <p><?php echo $description; ?></p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> <?php echo $city; ?></span>
                                <span class="ml-auto"><a href="hotel-single.php?hotel_id=<?php echo $id; ?>">Rooms</a></span>
                            </p>
                        </div>
                    </div>
                </div>
<?php } } ?>
            </div>
            <span class="ml-auto"><a class="btn text-success float-right" href="hotels.php">More Hotels</a></span>
        </div>
    </section>
    <!-- END hotels -->
    
    <!-- STARTS customer say -->
    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Web</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Web</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Web</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Web</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Web</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END customer say -->
    
    <!-- STARTS restaurent -->
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Recommended Restaurants</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-1.jpg);">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Discover</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-2.jpg);">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-3.jpg);">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="destination">
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/restaurant-4.jpg);">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-link"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <h3><a href="#">Luxury Restaurant</a></h3>
                            <p class="rate">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                <span>8 Rating</span>
                            </p>
                            <p>Far far away, behind the word mountains, far from the countries</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="icon-map-o"></i> San Franciso, CA</span>
                                <span class="ml-auto"><a href="#">Book Now</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END restaurent -->
    

    
<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>