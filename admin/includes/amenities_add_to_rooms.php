<?php

if(isset($_GET['room_id']))
{
	$get_room_id = $_GET['room_id'];
	$get_hotel_id = $_GET['hotel_id'];

if(isset($_POST['add_amenities_to_room']))
{
	$amenities_id	= $_POST['amenities_id'];

	foreach ($amenities_id as $multi_amenities_ids)
    {
        $query_insert = mysqli_prepare($conn, "INSERT INTO tbl_amenities_rooms(hotel_id,room_id,amenities_id) VALUES ({$get_hotel_id},{$get_room_id},?) ");

        mysqli_stmt_bind_param($query_insert, 's', $multi_amenities_ids);

        mysqli_stmt_execute($query_insert);
    }
}}
?>
<a href="rooms.php?source=edit_room&room_id=<?php echo $get_room_id; ?>">View Room Details</a>
or
<a href="includes/room_images_add.php?room_id=<?php echo $get_room_id; ?>&hotel_id=<?php echo $get_hotel_id; ?>">Add Images</a>
<?php
  $query_hotel = "SELECT * FROM tbl_hotels WHERE id = {$get_hotel_id} ";
  $result_hotel = mysqli_query($conn,$query_hotel);  
  while($row = mysqli_fetch_assoc($result_hotel)) 
  {
    $hotel_name = $row['name'];
  }
?>

<h3 class="text-center"><?php echo $hotel_name; ?></h3>


<!-- enctype="multipart/form-data" for the IMAGE -->
<form action="" method="post" enctype="multipart/form-data">
        <h5 class="text-center text-secondary mb-3">Available Amenities</h5>
        <div class="row">
            <?php 
            $query_am = "SELECT * FROM tbl_amenities";
            $result_am = mysqli_query($conn, $query_am);
            while($row = mysqli_fetch_assoc($result_am))
            {
                $am_id = $row['id'];
                $amenities = $row['amenities'];
                $image = $row['image'];
            ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <label><input  type='checkbox' name='amenities_id[]' value="<?php echo $am_id; ?>"><img src='images/amenities/<?php echo $image; ?>' alt=''><?php echo $amenities; ?></label>
            </div>

            <?php } ?>

        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_amenities_to_room" value="Add Amenities" >
        </div>    
</form>

<?php
if(isset($_GET['delete']))
{
    $get_am_id = $_GET['delete'];
    $query_del = "DELETE FROM tbl_amenities_rooms WHERE id = '{$get_am_id}'";
    $result_del = mysqli_query($conn,$query_del);
    if (!$result_del) 
    {
        die("Delete Query Failed! " . mysqli_error($conn));        
    }
    else
    {
    // Redirect to Same Page
    header ("Location: rooms.php?source=add_amenities_to_rooms&room_id={$get_room_id}&hotel_id={$get_hotel_id}");
    }
}

?>

        
    <h5 class="text-center text-secondary my-5">Selected Amenities</h5>
        <div class="row">
<?php
        // Fetch the tbl_amenities_rooms
        if(isset($_GET['room_id']))
        {
            $get_room_id = $_GET['room_id'];
        
        $query_rid = "SELECT * FROM tbl_amenities_rooms WHERE room_id = {$get_room_id}";
        $result_rid = mysqli_query($conn, $query_rid);
        if(!$result_rid){ die(mysqli_error($conn)); }
        while($row = mysqli_fetch_assoc($result_rid))
        {
            $db_id              = $row['id'];
            // $db_hotel_id        = $row['hotel_id'];
            // $db_room_id         = $row['room_id'];
            $db_amenities_id    = $row['amenities_id'];

        // Fetch the tbl_amenities
        $query_am = "SELECT * FROM tbl_amenities WHERE id = {$db_amenities_id} ";
        $result_am = mysqli_query($conn, $query_am);
        if(!$result_am){ die("Query Failed" .mysqli_error($conn)); }

        while($row = mysqli_fetch_assoc($result_am))
        {
            // $am_id      = $row['id'];
            $amenities  = $row['amenities'];
            $image      = $row['image'];
?>

                <div class="col-lg-3 col-md-6">
                    <label><img src='images/amenities/<?php echo $image; ?>'> <?php echo $amenities; ?> <a class="btn-danger" href="rooms.php?source=add_amenities_to_rooms&room_id=<?php echo $get_room_id; ?>&hotel_id=<?php echo $get_hotel_id; ?>&delete=<?php echo $db_id; ?>"> X </a> </label> 
                </div> 


<?php   } } } ?>           
            </div>
        

    
        
       
