
<!-- Edit Field Bootstarp Label+Text Field + PHP -->
<div class="col-xs-6">
    <h4 class="text-center">Edit Amenities</h4>
    <form action="" method="post">

    <?php 
        if(isset($_GET['edit']))
        {
            $amenities_id = $_GET['edit'];
            $query_edit = "SELECT * FROM tbl_amenities WHERE id = $amenities_id ";
            $result_edit = mysqli_query($conn, $query_edit);
            while ($row = mysqli_fetch_assoc($result_edit)) 
            {
                $id = $row['id'];
                $amenities_title = $row['amenities'];
                $image = $row['image'];
            } 
        }
    ?>

        <div class="form-group">
            <label for="amenities_title">Edit Amenities</label>
            <input value="<?php if(isset($amenities_title)) {echo $amenities_title; } ?>" type="text" name="amenities_title" class="form-control">
        </div>

        <div class="form-group">
            <img src="images/amenities/<?php echo $image; ?>" alt="">
            <input type="file" name="image" class="form-control-file">
        </div>

<?php 
if(isset($_POST['update_amenities']))
{
    $amenities_title = $_POST['amenities_title'];
    
    // Update Image
    $image          =  $_FILES['image']['name'];
    $image_temp     =  $_FILES['image']['tmp_name'];

    move_uploaded_file($image_temp, "images/amenities/$image");

    // Fetch The Existing Image from the DB
    if(empty($image)) 
    {          
        $query = "SELECT * FROM tbl_amenities WHERE id = $amenities_id ";
        $select_image = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($select_image)) 
        {
          $image = $row['image'];
        }
    }

    $query = "UPDATE tbl_amenities SET amenities = '{$amenities_title}', image = '{$image}' WHERE id = {$amenities_id} ";
    $query_update = mysqli_query($conn,$query);
        if (!$query_update) 
        {
            die('Update Query Failed' . mysqli_error($conn));            
        }else{
            header("Location: amenities.php");
        }
} 
?>


        <div class="form-group">
            <input type="submit" name="update_amenities" value="Edit Amenities" class="btn btn-primary">
        </div>
    </form>
</div>

