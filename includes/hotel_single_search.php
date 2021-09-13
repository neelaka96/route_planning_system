
<div class="col-lg-3 sidebar">
    		<div class="sidebar-wrap ftco-animate">
    			<h3 class="heading mb-4">Room Types</h3>
<?php
if(isset($_GET['hotel_id']))
{
	$get_hotel_id = $_GET['hotel_id'];
}
?>
    			<form action="search_rooms.php?hotel_id=<?php echo $get_hotel_id; ?>" method="post">
    				<div class="fields">
<!-- 			
	              <div class="form-group">
	                <input type="text" name="check_in" class="form-control checkin_date " placeholder="Date from">
	              </div>

	              <div class="form-group">
	                <input type="text" name="check_out" class="form-control checkin_date" placeholder="Date to">
	              </div>
			 -->

 	              <div class="form-group">
	                <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="room_type" id="room_type" class="form-control">
                      	<option value="">Select Room Type...</option>
		                <option value="Single">Single</option>
		                <option value="Double">Double</option>
		                <option value="Triple">Triple</option>
		                <option value="Quad">Quad</option>
		                <option value="Suite">Suite</option>
                    </select>
                  </div>
	              </div>
	              

	              <div class="form-group">
	                <input type="submit" value="Search" name="search_rooms" class="btn btn-primary py-3 px-5">
	              </div>
	            </div>
            </form>
    		</div>
			