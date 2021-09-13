<!-- Edit Field Bootstarp Label+Text Field + PHP -->
<div class="col-xs-6">
    <form action="" method="post">
        <div class="form-group">
            <label for="province_title">Edit Province</label>

<?php 
if(isset($_GET['edit'])){
    $province_id = $_GET['edit'];
    $query_edit = "SELECT * FROM tbl_provinces WHERE province_id = $province_id ";
    $result_edit = mysqli_query($conn, $query_edit);
    while ($row = mysqli_fetch_assoc($result_edit)) 
    {
        $province_id = $row['province_id'];
        $province_title = $row['province_title'];
    } 
?>

    <input value="<?php if(isset($province_title)) {echo $province_title; } ?>" type="text" name="province_title" class="form-control">

<?php } ?>



<?php 
if(isset($_POST['update_province']))
{
    $province_title = $_POST['province_title'];
    $query = "UPDATE tbl_provinces SET province_title = '{$province_title}' WHERE province_id = {$province_id} ";
    $query_update = mysqli_query($conn,$query);
        if (!$query_update) 
        {
            die('Update Query Failed' . mysqli_error($conn));            
        }else{
            header("Location: provinces.php");
        }
} 
?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update_province" value="Edit Province" class="btn btn-primary">
                    </div>
                </form>
            </div>