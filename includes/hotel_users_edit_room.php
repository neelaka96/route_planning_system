<?php
    if(isset($_GET['room_id']))
    {
        $get_room_id = $_GET['room_id'];
        $get_hotel_id = $_GET['hotel_id'];
    }
    
    // Fetching Room Details From the DB
    $query = "SELECT * FROM tbl_rooms WHERE id = {$get_room_id}";
    $select_room_by_id = mysqli_query($conn,$query);  
    while($row = mysqli_fetch_assoc($select_room_by_id)) 
    {
      $id              = $row['id'];
      $hotel_id        = $row['hotel_id'];
      $room_id         = $row['room_id'];
      $type            = $row['type'];
      $image           = $row['image'];
      $description     = $row['description'];
      $price_perday    = $row['price_perday'];
      $status          = $row['status'];
    }

    // Update 
    if(isset($_POST['update_room']))
    {
        $room_id            = $_POST['room_id'];
        $type               = $_POST['type'];

        // Images
        $img                = $_FILES['image']['name'];
        $img_temp           = $_FILES['image']['tmp_name'];

        $price              = $_POST['price'];
        $description        = $_POST['description'];
        $date               = date('d-m-y');

        move_uploaded_file($img_temp, "admin/images/rooms/$img");

        // Fetch The Existing Image from the DB
        if(empty($img)) 
        {          
            $query = "SELECT * FROM tbl_rooms WHERE id = $get_room_id ";
            $select_image = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($select_image)) 
            {
              $img = $row['image'];
            }
        }

        //Update Query 
        $query = "UPDATE tbl_rooms SET ";
        $query .=" hotel_id             = '{$get_hotel_id}', ";
        $query .=" room_id              = '{$room_id}', ";
        $query .=" type                 = '{$type}', ";
        $query .=" image                = '{$img}', ";
        $query .=" price_perday         = '{$price}', ";
        $query .=" status               = 'Draft', ";
        $query .=" description          = '{$description}', ";
        $query .=" date                 =  now() ";
        $query .=" WHERE id              = '{$get_room_id}' ";

        $update_room = mysqli_query($conn,$query);
        if(!$update_room ) 
        {
        die("QUERY FAILED ." . mysqli_error($conn));
        }
        else
        {
        echo "<p class='text-center alert alert-success' role='alert'>Room Updated Successfully, Wait for the confirmation from the Admin:
        <a class='font-weight-bold' href='index_hotel_users.php?hotel_id={$get_hotel_id}'>View Room Details </a></p>";
        }

    }
?>




<!-- enctype="multipart/form-data" for the IMAGE -->
<form id="frmHotelUserRoom" action="" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="room_id">Room Reference</label>
            <input value="<?php echo $room_id; ?>" type="text" class="form-control" name="room_id">
        </div>

        <div class="form-group">
            <label>Type</label><br>
            <select name="type" id="type" class="form-control">
                <option value='<?php echo $type; ?>'><?php echo $type; ?></option>                
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Quad">Quad</option>
                <option value="Suite">Suite</option>
            </select>
        </div>

        <div class="form-group">
            <img width="100" src="admin/images/rooms/<?php echo $image; ?>" alt="">
            <input type="file" name="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="price">Price Perday</label>
            <input value="<?php echo $price_perday; ?>" type="text" class="form-control" name="price">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"><?php echo $description; ?></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_room" value="Update Room" >
        </div> 
</form>