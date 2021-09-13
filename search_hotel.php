        <!-- DB -->
        <?php include "includes/db.php"; ?>

		<!-- HEADER -->
        <?php include "includes/i_header.php"; ?>

        <!-- NAVIGATION -->
        <?php include "includes/i_navigation.php"; ?>

        <!-- BACKGROUND IMAGE -->
        <?php include "includes/hotels_background_image.php"; ?>


	<section class="ftco-section">
      <div class="container">
        <div class="row">
        	
        	<!-- SEARCH -->
        	<?php include "includes/hotels_search.php"; ?>	
            
        </div><!-- END-->


                    <!-- ***************** FORM: Includes/hotels-search.php ***************** -->



          <div class="col-lg-9">
          	<div class="row">
<?php
    if(isset($_POST['search']))
    {
        $city       = $_POST['city'];
        $hotel_name = $_POST['hotel_name'];
        $dis_id     = $_POST['dis_id'];

        $query_search = "SELECT * FROM tbl_hotels WHERE city LIKE '%$city%' AND name LIKE '%$hotel_name%' AND district_id LIKE '%$dis_id%' ";
        $result_search = mysqli_query($conn,$query_search);
        if(!$result_search)
        { 
            die("Query Failed" . mysqli_error($conn)); 
        }
        $count = mysqli_num_rows($result_search);
        if ($count == 0) 
        {
            echo "<h1 class='text-danger'> No Hotels Found </h1>";
        }
        else
        {
            while($row = mysqli_fetch_assoc($result_search))
            {
                $id             = $row['id'];               
                $name           = $row['name'];               
                $address        = $row['address'];               
                $district_id    = $row['district_id'];               
                $city           = $row['city'];               
                $image          = $row['image'];               
                // $description    = $row['description'];               
                $description    = substr($row['description'],0,70);

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
                <div class="col-sm col-md-6 col-lg-4 ftco-animate">
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
<?php } } } } ?>

    		</div>
<?php  
if (!$count == 0)
{
?>
			<!-- Pagination -->
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
<?php 
}       
?>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>