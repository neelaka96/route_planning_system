<?php
 if(isset($_POST['add_hotel'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $dis_id = $_POST['district_id'];
    $city = $_POST['city'];

    // Images
    $img = $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];

    $description = $_POST['description'];
    $tel_no = $_POST['tel_no'];
    $lat = $_POST['lat'];
    $lan = $_POST['lan'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $date = date('d-m-y');

    $email = $_POST['u_email'];
    $password = $_POST['u_password'];

    move_uploaded_file($img_temp, "./../images/uploaded_images/$img");

$query_insert = "INSERT INTO tbl_hotels(name,address, district_id,city, image, description, tel_no, lat,lan,type,status,date,email,password) VALUES ('{$name}','{$address}','{$dis_id}','{$city}','{$img}','{$description}','{$tel_no}','{$lat}','{$lan}','{$type}','{$status}', now(),'{$email}','{$password}')";

$result_insert = mysqli_query($conn, $query_insert);
    if (!$result_insert)
    {
        die("Create Query Failed! " . mysqli_error($conn));    
    }else{
        // Pull out Last Created ID
        $hotel_id  = mysqli_insert_id($conn);

        echo "<p class='bg-success'>Hotel created: <a href='../hotels.php?hotel_id={$hotel_id}'>View Hotel Details</a> or <a href='hotels.php'>Edit More Hotels</a></p>";
    }
}
?>

<!-- enctype="multipart/form-data" for the IMAGE -->
<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address">
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

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="image">Choose Image</label>
                    <input type="file" name="image" class="form-control-file">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tel_no">Telephone No</label>
                    <input type="text" class="form-control" name="tel_no">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status</label><br>
                    <select name="type" id="type" class="form-control">
                        <option value="">Choose...</option>
                        <option value="Hotel & Restaurant">Hotel & Restaurant</option>
                        <option value="Restaurant">Restaurant</option>
                    </select>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status</label><br>
                    <select name="status" id="status" class="form-control">
                        <option value="">Choose...</option>
                        <option value="Published">Publish</option>
                        <option value="Draft">Draft</option>
                    </select>
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
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"></textarea>
        </div><br>

        <h5 class="text-center">User Details</h5>
        <div class="form-group">
            <label for="u_email">Email address</label>
            <input type="email" name="u_email" class="form-control">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="u_password">Password</label>
            <input type="password" name="u_password" class="form-control">
        </div>    

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_hotel" value="Publish Hotel" >
        </div>      

</form>