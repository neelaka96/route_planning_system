<?php ob_start(); ?>

<!-- DB -->
<?php include "../includes/db.php"; ?>

<!-- Header -->
<?php include "includes/admin_header.php"; ?>

<!-- Navbar-->
<?php include "includes/admin_nav.php"; ?>


<div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/admin_sidebar.php"; ?>


    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Amenities</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>


<?php
if(isset($_POST['btn_insert']))
{
    $amenities = $_POST['amenities'];

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_temp, "images/amenities/$image");

    // if ($amenities == "" || empty($amenities) || $image == "" || empty($image))
    if ($amenities == "" || empty($amenities))
    {
        echo " <p class='alert alert-danger text-center' role='alert'>Fields cannot be empty</p>";
    }
    else{
        $query = "INSERT INTO tbl_amenities (amenities, image) VALUES ('{$amenities}', '{$image}') ";
        $result_insert = mysqli_query($conn,$query);
        if(!$result_insert){
            die ("Insert Query Failed! " . mysqli_error($conn));
        }
            else{
                //echo "Successfully Inserted <br><br> ";
                echo "<div class='alert alert-success text-center' role='alert'>Successfully Inserted</div><br>";
            }
        }       
}
?>
           
            <div class="row">
                <div class="col-lg-6">
                    <!-- Content -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="amenities">Add Amenities</label>
                            <input type="text" name="amenities" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btn_insert" value="Add Amenities" class="btn btn-primary">
                        </div>
                    </form>

<?php
if(isset($_GET['edit']))
{
    $edit_amenities = $_GET['edit'];
    include "includes/amenities_update.php";
}
?>
                </div>



                <div class="col-lg-6">
                    <br>
                    <div class="table-responsive">
                    <table class="table table-border table-hover">
                        <!--   TABLE   -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amenities</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
$query = "SELECT * FROM tbl_amenities";
$result_amenities = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result_amenities))            
{
    $id = $row['id'];
    $amenities = $row['amenities'];
    $image = $row['image'];
    
    echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$amenities</td>";
        echo "<td><img src='images/amenities/$image' alt='Image'></td>";

        echo "<td><a class='btn btn-sm btn-info' href='amenities.php?edit={$id}'>Edit</a></td>";
        echo "<td><a class='btn btn-sm btn-danger' href='amenities.php?delete={$id}'>Delete</a></td>";
    echo "</tr>";
}
?>
                        </tbody>
                    </table> <!--  /.TABLE  -->

                    <?php
if(isset($_GET['delete'])){
    $amenities_id = $_GET['delete'];
    
    $query = "DELETE FROM tbl_amenities WHERE id = {$amenities_id} ";
    $result_del = mysqli_query($conn, $query);
    if(!$result_del){
        die ("Delete Query Failed! " . mysqli_error($conn));
    }else{
        header("Location: amenities.php");
    }
}
?>
                </div>
            </div>



            </div>
            <!-- Any other Jquery Plugins -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->



<!-- Footer-->
<?php include "includes/admin_footer.php"; ?>
