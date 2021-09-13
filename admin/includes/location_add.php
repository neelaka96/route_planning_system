<?php
 if(isset($_POST['create_location'])){
    $title = $_POST['title'];
    $dis_id = $_POST['district_id'];
    $city = $_POST['city'];
    $lat = $_POST['lat'];
    $lan = $_POST['lan'];

    // Activity Checkboxes
    $activity_array = $_POST['activity'];

    // Images
    $u_img = $_FILES['image']['name'];
    $u_img_temp = $_FILES['image']['tmp_name'];

    $keyword = $_POST['keyword'];
    $description = $_POST['description'];
    $u_date = date('d-m-y');

    move_uploaded_file($u_img_temp, "images/locations/$u_img");

$query_insert = "INSERT INTO tbl_locations(title,district_id,city,lat,lan,img,keyword,description,u_date) VALUES ('{$title}','{$dis_id}','{$city}','{$lat}','{$lan}','{$u_img}', '{$keyword}','{$description}', now()) ";

$result_insert = mysqli_query($conn, $query_insert);
    if (!$result_insert)
    {
        die("Create Query Failed! " . mysqli_error($conn));    
    }else{
        // Pull out Last Created ID
        $location_id  = mysqli_insert_id($conn);
        echo "<p class='text-center alert alert-success' role='alert'>Location Created Successfully: <a href='includes/location_images_add.php?loc_id={$location_id}'>Add Images</a> or <a href='locations.php'>View All Locations</a></p>";


        // Relationship M : M  (tbl_locations , tbl_activities = tbl_location_activities)
        foreach ($activity_array as $multi_activity_array)
        {
            $query_insert_act = "INSERT INTO tbl_location_activities(location_id,activity_id) VALUES ({$location_id},{$multi_activity_array}) ";

            $result_insert_act = mysqli_query($conn, $query_insert_act);
            if (!$result_insert_act)
            {
                die("Create Query Failed! " . mysqli_error($conn));    
            }
        }
    }
}
?>

<!-- enctype="multipart/form-data" for the IMAGE -->
<form id="frmLocation" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <!-- DISPLAY District title instead of District  ID -->
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>District</label><br>
                    <select name="district_id" id="district_id" class="form-control">
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

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city">
                </div>
            </div>
        </div>

        <!-- Lattitude and longitude-->
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lat">Lattitude</label>
                    <input type="text" class="form-control" name="lat">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lan">longitude</label>
                    <input type="text" class="form-control" name="lan">
                </div>
            </div>
        </div>


    <div class="row">

    <div class="col-lg-6">
    <label>Activity</label><br>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Activities (Multi Select)
        </button>
        <div class="dropdown-menu">
        <?php 
            $query = "SELECT * FROM tbl_activities";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_assoc($result))
            {
                $id = $row['act_id'];
                $title = $row['act_title'];
                echo "<li class='dropdown-item checkbox keep-open'><label><input type='checkbox' name='activity[]' value={$id}> {$title}</label></li>";
            }
        ?>
        </div>
    </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
    </div>
    </div>  
    <!-- end row -->

        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" class="form-control" name="keyword">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_location" value="Publish Location" >
        </div>      
</form>