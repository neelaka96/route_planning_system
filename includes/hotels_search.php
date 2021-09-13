<div class="col-lg-3 sidebar order-md-last ftco-animate">
	<div class="sidebar-wrap ftco-animate">
		<h3 class="heading mb-4 text-center">Find Hotel</h3>
		<form action="search_hotel.php" method="post">
			<div class="fields">

			  <div class="form-group">
	            <input type="text" name="hotel_name" class="form-control" placeholder="Hotel Name">
	          </div>

	          <div class="form-group">
	            <input type="text" name="city" class="form-control" placeholder="City">
	          </div>


	          <div class="form-group">
	            <div class="select-wrap one-third">
	            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	            <select name="dis_id" id="dis_id" class="form-control" placeholder="Keyword search">
	              <option value="">Select District</option>
<?php
    $query_dis = "SELECT * FROM tbl_districts";
    $result_dis = mysqli_query($conn,$query_dis);
    if(!$result_dis){
        die("Fetching District Query Failed! " . mysqli_error($conn)); 
    }
    while ($row = mysqli_fetch_assoc($result_dis)) {
        $dis_id = $row['district_id'];
        $dis_title = $row['district_title'];

        	echo "<option value='$dis_id'>{$dis_title}</option>";  
    }
?>
	            </select>
	          </div>
	          </div>



          <div class="form-group">
            <input type="submit" value="Search" name="search" class="btn btn-primary py-3 px-5">
          </div>
        </div>
    </form>
	</div>
        		

        		
        		 