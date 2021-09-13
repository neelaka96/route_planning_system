<?php
    if(isset($_GET['hotel_id']))
    {
      $get_hotel_id =  $_GET['hotel_id'];
    }

    $query = "SELECT * FROM tbl_hotels WHERE id = {$get_hotel_id}";
    $select_hot_by_id = mysqli_query($conn,$query);  
    while($row = mysqli_fetch_assoc($select_hot_by_id)) 
    {
      $hotel_id           = $row['id'];
      $hotel_name         = $row['name'];
      $hotel_address      = $row['address'];
      $hotel_district_id  = $row['district_id'];
      $hotel_city         = $row['city'];
      $hotel_image        = $row['image'];
      $hotel_description  = $row['description'];
      $hotel_tel_no       = $row['tel_no'];
      $hotel_lat          = $row['lat'];
      $hotel_lan          = $row['lan'];
      $hotel_type         = $row['type'];
      $hotel_status       = $row['status'];
      $hotel_email        = $row['email'];
      $hotel_password     = $row['password'];
    }

    if(isset($_POST['update_hotel'])) 
    {
      $name         =  $_POST['name'];
      $address      =  $_POST['address'];
      $district_id  =  $_POST['district_id'];
      $city         =  $_POST['city'];
      
      // Update Image
      $image        =  $_FILES['image']['name'];
      $img_temp     =  $_FILES['image']['tmp_name'];

      $description  =  $_POST['description'];
      $tel_no       =  $_POST['tel_no'];
      $lat          =  $_POST['lat'];
      $lan          =  $_POST['lan'];
      $type         =  $_POST['type'];
      $status       =  $_POST['status'];
      $email       =  $_POST['u_email'];
      $password       =  $_POST['u_password'];
        
      move_uploaded_file($img_temp, "./../images/uploaded_images/$image");

      // Fetch The Existing Image from the DB
      if(empty($image)) 
      {          
        $query = "SELECT * FROM tbl_hotels WHERE id = $get_hotel_id ";
        $select_image = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($select_image)) 
        {
          $image = $row['image'];
        }
      }

      // $title = mysqli_real_escape_string($conn, $title);

      $query = "UPDATE tbl_hotels SET ";
      $query .="name           = '{$name}', ";
      $query .="address           = '{$address}', ";
      $query .="district_id     = '{$district_id}', ";
      $query .="city            = '{$city}', ";
      $query .="image            = '{$image}', ";
      $query .="description     = '{$description}', ";
      $query .="tel_no     = '{$tel_no}', ";
      $query .="lat             = '{$lat}', ";
      $query .="lan             = '{$lan}', ";
      $query .="type             = '{$type}', ";
      $query .="status             = '{$status}', ";
      $query .="email             = '{$email}', ";
      $query .="password             = '{$password}', ";
      $query .="date     =  now() ";
      $query .="WHERE id    = '{$get_hotel_id}' ";
      
      $update_hotel = mysqli_query($conn,$query);
      if(!$update_hotel ) 
      {
        die("QUERY FAILED ." . mysqli_error($conn));
      }
      else
      {
        echo "<p class='bg-success'>Hotel Updated. <a href='../hotels.php?hotel_id={$get_hotel_id}'>View Hotel Details </a> or <a href='hotels.php'>Edit More Hotels</a></p>";
      }
    }
?>


<!-- enctype="multipart/form-data" for the IMAGE -->
<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input value="<?php echo $hotel_name; ?>" type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input value="<?php echo $hotel_address; ?>" type="text" class="form-control" name="address">
        </div>

        <!-- DISPLAY District title instead of District  ID -->
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>District</label><br>
                    <select name="district_id" id="district_id" class="form-control">
                        <option value="">Choose...</option>
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

                                if($dis_id == $hotel_district_id) {
                                echo "<option selected value='{$dis_id}'>{$dis_title}</option>";
                                } 
                                else
                                {
                                  echo "<option value='{$dis_id}'>{$dis_title}</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="city">City</label>
                    <input value="<?php echo $hotel_city; ?>" type="text" class="form-control" name="city">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                <img width="100" src="../images/uploaded_images/<?php echo $hotel_image; ?>" alt="">
                <input type="file" name="image" class="form-control-file">
            </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status</label><br>
                    <select name="type" id="type" class="form-control">
                        <option value='<?php echo $hotel_type; ?>'><?php echo $hotel_type; ?></option>

                        <?php
                        if($hotel_type == 'Hotel & Restaurant')
                        {
                          echo "<option value='Restaurant'>Restaurant</option>";
                        }else
                        {
                          echo "<option value='Hotel & Restaurant'>Hotel & Restaurant</option>";
                        }
                        ?>                       
                        
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tel_no">Telephone No</label>
                    <input value="<?php echo $hotel_tel_no; ?>" type="text" class="form-control" name="tel_no">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status</label><br>
                    <select name="status" id="status" class="form-control">
                      <option value='<?php echo $hotel_status; ?>'><?php echo $hotel_status; ?></option>  
                      <?php
                        if($hotel_status == 'Published' ) 
                        {
                        echo "<option value='Draft'>Draft</option>";
                        } 
                        else 
                        {
                        echo "<option value='Published'>Publish</option>";
                        }
                      ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Lattitude and longitude-->
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lat">Lattitude</label>
                    <input value="<?php echo $hotel_lat; ?>" type="text" class="form-control" name="lat">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lan">longitude</label>
                    <input value="<?php echo $hotel_lan; ?>" type="text" class="form-control" name="lan">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"><?php echo $hotel_description; ?></textarea>
        </div>

        <h5 class="text-center">User Details</h5>
        <div class="form-group">
            <label for="u_email">Email address</label>
            <input value="<?php echo $hotel_email; ?>" type="email" name="u_email" class="form-control">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="u_password">Password</label>
            <input value="<?php echo $hotel_password; ?>" type="password" name="u_password" class="form-control">
        </div> 

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_hotel" value="Publish Hotel" >
        </div>      
</form>
