<div class="col-lg-3 sidebar order-md-last ftco-animate">
    <div class="sidebar-wrap ftco-animate">
        <h3 class="heading mb-4">Find Destination</h3>
        <form action="search_locations.php" method="post">
            <div class="fields">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Destination">
                </div>

                <div class="form-group">
                    <input type="text" name="city" class="form-control" placeholder="City">
                </div>

            <div class="form-group">
                <div class="select-wrap one-third">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="dis_id" id="dis_id" class="form-control">
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
                    <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-primary py-3 px-5" name="search_location">
                </div>
            </div>                            
        </form>
        

        <h3 class="heading my-4">Activities of Destination</h3>
        <form action="search_locations_using_activity.php" method="post">
            <div class="fields">
                <!-- Activity -->
                <div class="form-group">
                    <div class="select-wrap one-third">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="activity" id="activity" class="form-control">
                            <option>Select Activity</option>
<?php
    $query_act = "SELECT * FROM tbl_activities";
    $result_act = mysqli_query($conn,$query_act);
    if(!$result_act){
        die("Fetching District Query Failed! " . mysqli_error($conn)); 
    }
    while ($row = mysqli_fetch_assoc($result_act)) {
        $act_id     = $row['act_id'];
        $act_title  = $row['act_title'];

            echo "<option value='$act_id'>{$act_title}</option>";  
    }
?>
                        </select>
                    </div>
                </div>
                
    <div class="form-group">
        <input type="submit" value="Search" class="btn btn-primary py-3 px-5" name="search_loc_using_activity">
    </div>
            </div>                            
        </form>
    </div>
</div><!-- END-->


