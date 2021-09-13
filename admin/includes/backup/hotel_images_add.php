<?php
if(isset($_GET['hotel_id']))
{
	$get_hotel_id = $_GET['hotel_id'];
}
	
	$message = "";
if(isset($_POST['add_images']))
{
	// Images
    $img = $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($img_temp, "images/hotels/$img");

    $query = "INSERT INTO tbl_hotel_images (hotel_id,image) VALUES ({$get_hotel_id},'{$img}')";
    $result = mysqli_query($conn, $query);
    if (!$result)
    {
        die("Create Query Failed! " . mysqli_error($conn));    
    }else
    {
    	$message = "Image Uploaded Successfully";		       
    }
}
?>

<?php

	$query_carousel = "SELECT * FROM tbl_hotel_images WHERE hotel_id = {$get_hotel_id}";
	$result_carousel = mysqli_query($conn,$query_carousel);
	if(!$result_carousel)
	{
		die("Create Query Failed! " . mysqli_error($conn));
	}
	while ($row = mysqli_fetch_assoc($result_carousel)) 
	{
		$db_id = $row['id'];	    
		$db_hotel_id = $row['hotel_id'];	    
		$db_image = $row['image'];	    
	}

?>


<div class="container-fluid">
	<div class="row justify-content-center mb-1">
		<div class="col-lg-10">
		<div id="demo" class="carousel slide" data-ride="carousel">

	

		  <!-- Indicators -->
		  <ul class="carousel-indicators">
<?php 
	$i = 0;
	foreach($result_carousel as $carousel)
	{
		$actives = '';
		if ($i == 0) 
		{
			$actives = 'active';		  				
		}
?>
		    <li data-target="#demo" data-slide-to="<?php echo $i; ?>" class="<?php echo $actives; ?>"></li>

<?php echo $i++; } ?>

		  </ul>
		
		  <!-- The slideshow -->
		  <div class="carousel-inner">
<?php 
	$i = 0;
	foreach($result_carousel as $carousel)
	{
		$actives = '';
		if ($i == 0) 
		{
			$actives = 'active';		  				
		}
?>
		    <div class="carousel-item <?php echo $actives; ?>">
		      <img src='<?php echo "images/hotels/$db_image"; ?>' width = "100%" height = "400" >
		    </div>

<?php echo $i++; }  ?>

		  </div>

		  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>

		</div>	
		</div>
	</div>


	<div class="row justify-content-center">
		<div class="col-lg-4 bg-dark rounded px-4">
			<h4 class="text-center text-light p-1">Select Image To Upload</h4>

			<!-- enctype="multipart/form-data" for the IMAGE -->
			<form action="" method="post" enctype="multipart/form-data">
	            <div class="form-group bg-secondary">
	                <input type="file" name="image" class="form-control-file">
	            </div>

		        <div class="form-group">
		            <input class="btn btn-warning btn-block" type="submit" name="add_images" value="Add Images" >
		        </div>

		        <div class="form-group">
					<h5 class="text-center text-light"><?php echo $message; ?></h5>
	            </div>    
			</form>




		</div>
	</div>
</div>





