<?php
if(isset($_POST['add_room']))
{
    $hotel_id = $_POST['hotel_id'];
    $room_id = $_POST['room_id'];
    $type = $_POST['type'];

    // Images
    $img = $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];

    $price = $_POST['price'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $date = date('d-m-y');

    move_uploaded_file($img_temp, "images/rooms/$img");


    $query_insert = "INSERT INTO tbl_rooms(hotel_id,room_id,type,image,description,price_perday, status,date) VALUES ('{$hotel_id}','{$room_id}','{$type}','{$img}','{$description}','{$price}','{$status}','{$date}');";

    $result_insert = mysqli_query($conn, $query_insert);
    if (!$result_insert)
    {
        die("Create Query Failed! " . mysqli_error($conn));    
    }else
    {
        // Pull out Last Created ID
        $r_id  = mysqli_insert_id($conn);

        echo "<p class='text-center alert alert-success' role='alert'>Room Added Successfully: 
        <a href='rooms.php?source=add_amenities_to_rooms&room_id={$r_id}&hotel_id={$hotel_id}'>Add Amenities</a> 
        or
        <a href='includes/room_images_add.php?room_id={$r_id}&hotel_id={$hotel_id}'>Add Caorousel Images</a></p>";
    }
}
?>


<!-- enctype="multipart/form-data" for the IMAGE -->
<form id="frmRoom" action="" method="post" enctype="multipart/form-data">
        
        <!-- DISPLAY Hotel Name instead of Hotel ID -->
        <div class="form-group">
            <label>Hotel Id</label><br>
            <select name="hotel_id" id="hotel_id" class="form-control">
                <option value="">Choose Hotel...</option>
                <?php
                    $query_hotel = "SELECT * FROM tbl_hotels";
                    $result_hotel = mysqli_query($conn,$query_hotel);
                    if(!$result_hotel){
                        die("Insert Query Failed " . mysqli_error($conn)); 
                    }
                    while ($row = mysqli_fetch_assoc($result_hotel)) {
                        $hotel_id = $row['id'];
                        $hotel_name = $row['name'];

                        echo "<option value='$hotel_id'>{$hotel_name}</option>";  
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="room_id">Room Reference</label>
            <input type="text" class="form-control" name="room_id">
        </div>

        <div class="form-group">
            <label>Type</label><br>
            <select name="type" id="type" class="form-control">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
                <option value="Quad">Quad</option>
                <option value="Suite">Suite</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Choose Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="price">Price Perday</label>
            <input type="text" class="form-control" name="price">
        </div>

        <div class="form-group">
            <label>Status</label><br>
            <select name="status" id="status" class="form-control">
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_room" value="Publish Room" >
        </div>      
</form>