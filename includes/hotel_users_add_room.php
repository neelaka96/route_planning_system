<?php
    if(isset($_GET['hotel_id']))
    {
        $get_hotel_id = $_GET['hotel_id'];
    }

    if(isset($_POST['add_room'])){
    

    $room_id = $_POST['room_id'];
    $type = $_POST['room_type_temp'];

    // Images
    $img = $_FILES['image']['name'];
    $img_temp = $_FILES['image']['tmp_name'];

    // Amenities DOESNT NEED
    // $multi_amenities_id = $_POST['amenities_id'];

    $price = $_POST['price'];
    $description = $_POST['description'];
    $date = date('d-m-y');

    move_uploaded_file($img_temp, "admin/images/rooms/$img");


    $query_insert = "INSERT INTO tbl_rooms(hotel_id,room_id,type,image,description, price_perday, status,date) VALUES ('{$get_hotel_id}','{$room_id}','{$type}','{$img}','{$description}','{$price}','Draft','{$date}');";


    

$result_insert = mysqli_query($conn, $query_insert);
    if (!$result_insert)
    {
        die("Create Query Failed! " . mysqli_error($conn));    
    }else{
        // Pull out Last Created ID
        $r_id  = mysqli_insert_id($conn);

        echo "<p class='text-center alert alert-success' role='alert'>Room added Successfully, Wait for the confirmation from the Admin: 
        <a href='index_hotel_users.php?source=add_amenities&room_id={$r_id}&hotel_id={$get_hotel_id}'>Add Amenities</a> or 
        <a href='includes/hotel_users_add_room_images.php?room_id={$r_id}&hotel_id={$get_hotel_id}'>Add Images to Room</a></p>";
    }
}
?>


<!-- enctype="multipart/form-data" for the IMAGE -->
<form id="frmHotelUserRoom" action="" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label for="room_id">Room Reference</label>
            <input type="text" class="form-control" name="room_id">
        </div>

        <div class="form-group">
            <label>Type</label><br>
            <select name="room_type_temp" id="room_type_temp" class="form-control">
                <option value="">Choose...</option>
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
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="ckeditor" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_room" value="Publish Room" >
        </div>      
</form>

