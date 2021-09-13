<!-- Edit Field Bootstarp Label+Text Field + PHP -->
<div class="col-xs-6">
    <form action="" method="post">
        <div class="form-group">
            <label for="district_title">Edit District</label>

            <?php 
            if(isset($_GET['edit'])){
                $district_id = $_GET['edit'];
                $query_edit = "SELECT * FROM tbl_districts WHERE district_id = $district_id ";
                $result_edit = mysqli_query($conn, $query_edit);
                while ($row = mysqli_fetch_assoc($result_edit)) 
                {
                    $district_id = $row['district_id'];
                    $district_title = $row['district_title'];
                } 
            ?>

    <input value="<?php if(isset($district_title)) {echo $district_title; } ?>" type="text" name="district_title" class="form-control">

            <?php } ?>

<?php 
if(isset($_POST['update_district']))
{
    $district_title = $_POST['district_title'];
    $query = "UPDATE tbl_districts SET district_title = '{$district_title}' WHERE district_id = {$district_id} ";
    $query_update = mysqli_query($conn,$query);
        if (!$query_update) 
        {
            die('Update Query Failed' . mysqli_error($conn));            
        }else{
            header("Location: districts.php");
        }
} 
?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update_district" value="Edit District" class="btn btn-primary">
                    </div>
                </form>
            </div>