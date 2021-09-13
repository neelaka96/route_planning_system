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

          <div class="col-lg-9">
          	<div class="row">

<?php
$query = "SELECT * FROM tbl_hotels ORDER BY id DESC";
$result = mysqli_query($conn, $query);
if(!$result)
{
    die("Query Failed " . mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($result))
{
    $id				= $row['id'];               
    $name			= $row['name'];               
    $address		= $row['address'];               
    $district_id	= $row['district_id'];               
    $city			= $row['city'];               
    $image			= $row['image'];               
    // $description    = $row['description'];               
    $description	= substr($row['description'],0,70);

    $tel_no			= $row['tel_no'];               
    $lat			= $row['lat'];               
    $lan			= $row['lan'];               
    $type			= $row['type'];               
    $status			= $row['status'];               
    $date			= $row['date'];               
    $email			= $row['email'];               
    $password		= $row['password'];   

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
<?php } } ?>
    		</div>

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
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

<!-- FOOTER -->
<?php include "includes/i_footer.php"; ?>