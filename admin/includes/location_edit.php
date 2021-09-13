<?php
    if(isset($_GET['loc_id']))
    {
      $get_location_id =  $_GET['loc_id'];
    }

    $query = "SELECT * FROM tbl_locations WHERE loc_id = {$get_location_id}";
    $select_loc_by_id = mysqli_query($conn,$query);  
    while($row = mysqli_fetch_assoc($select_loc_by_id)) 
    {
      $loc_id       = $row['loc_id'];
      $title        = $row['title'];
      $district_id  = $row['district_id'];
      $city         = $row['city'];
      $lat          = $row['lat'];
      $lan          = $row['lan'];
      $img          = $row['img'];
      $keyword      = $row['keyword'];
      $description  = $row['description'];
    }

    if(isset($_POST['update_location'])) 
    {
      $title        =  $_POST['title'];
      $district_id  =  $_POST['district_id'];
      $city         =  $_POST['city'];
      $lat          =  $_POST['lat'];
      $lan          =  $_POST['lan'];

      // Update Image
      $img          =  $_FILES['image']['name'];
      $img_temp     =  $_FILES['image']['tmp_name'];

      $keyword      =  $_POST['keyword'];
      $description  =  $_POST['description'];
        
      move_uploaded_file($img_temp, "images/locations/$img");

      // Fetch The Existing Image from the DB
      if(empty($img)) 
      {          
        $query = "SELECT * FROM tbl_locations WHERE loc_id = $get_location_id ";
        $select_image = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($select_image)) 
        {
          $img = $row['img'];
        }
      }

      $title = mysqli_real_escape_string($conn, $title);

      $query = "UPDATE tbl_locations SET ";
      $query .="title           = '{$title}', ";
      $query .="district_id     = '{$district_id}', ";
      $query .="city            = '{$city}', ";
      $query .="lat             = '{$lat}', ";
      $query .="lan             = '{$lan}', ";
      $query .="img             = '{$img}', ";
      $query .="keyword         = '{$keyword}', ";
      $query .="description     = '{$description}', ";
      $query .="u_date          =  now() ";
      $query .="WHERE loc_id    = '{$get_location_id}' ";
      
      $update_location = mysqli_query($conn,$query);
      if(!$update_location ) 
      {
        die("QUERY FAILED ." . mysqli_error($conn));
      }
      else
      {
        echo "<p class='text-center alert alert-success' role='alert'>Location Updated Successfully. <a href='includes/location_images_add.php?loc_id={$get_location_id}'>Add Images </a> or <a href='locations.php'>View All Locations</a></p>";
      }
    }

?>


<!-- enctype="multipart/form-data" for the IMAGE -->
<form id="frmLocation" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input value="<?php echo $title; ?>"  type="text" class="form-control" name="title">
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
                            while ($row = mysqli_fetch_assoc($result_dis)) 
                            {
                                $dis_id = $row['district_id'];
                                $dis_title = $row['district_title'];

                                if($dis_id == $district_id)
                                {
                                  echo "<option selected value='$dis_id'>{$dis_title}</option>";    
                                }
                                else
                                {
                                  echo "<option value='$dis_id'>{$dis_title}</option>";
                                }                                
                            }// end While Loop
                        ?>
                    </select>
                </div>
            </div>

          <div class="col-lg-6">
              <div class="form-group">
                  <label for="city">City</label>
                  <input value="<?php echo $city; ?>" type="text" class="form-control" name="city">
              </div>
          </div>
        </div>

        <!-- Lattitude and longitude-->
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lat">Lattitude</label>
                    <input value="<?php echo $lat; ?>" type="text" class="form-control" name="lat">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lan">longitude</label>
                    <input value="<?php echo $lan; ?>" type="text" class="form-control" name="lan">
                </div>
            </div>
        </div>


        <div class="row">
          <div class="col-lg-6">
                <div class="form-group">
                    <img width="100" src="images/locations/<?php echo $img; ?>" alt="">
                    <input type="file" name="image" class="form-control-file">
                </div>
          </div>
        </div>  
        <!-- end row -->

        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input value="<?php echo $keyword; ?>" type="text" class="form-control" name="keyword">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"><?php echo $description; ?></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_location" value="Update Location" >
        </div>      
</form>