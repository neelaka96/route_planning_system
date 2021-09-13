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
                    <a href="#">District</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

<?php
if(isset($_POST['btn_insert']))
{
    $district_title = $_POST['district_title'];
    $province_id = $_POST['province_id'];
    if ($district_title == "" || empty($district_title) || $province_id == "" || empty($province_id))
    {
        echo " <p class='alert alert-danger text-center' role='alert'>Fields cannot be empty</p>";
    }
    else{
        $query = "INSERT INTO tbl_districts (district_title, province_id) VALUES ('{$district_title}', '{$province_id}') ";
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
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="district_title">Add District</label>
                            <input type="text" name="district_title" class="form-control">
                        </div>

                
                    <div class="form-group">
                        <label>Province</label><br>
                        <select name="province_id" id="province_id" class="form-control">
                            <option value="">Choose...</option>

                            <?php
                                $query_pro = "SELECT * FROM tbl_provinces";
                                $result_pro = mysqli_query($conn,$query_pro);
                                if(!$result_pro){
                                    die("Fetching Province Query Failed! " . mysqli_error($conn)); 
                                }
                                while ($row = mysqli_fetch_assoc($result_pro)) {
                                    $pro_id = $row['province_id'];
                                    $pro_title = $row['province_title'];

                                    echo "<option value='$pro_id'>{$pro_title}</option>";  
                                }
                            ?>
                        </select>
                    </div>
                

                        <div class="form-group">
                            <input type="submit" name="btn_insert" value="Add District" class="btn btn-primary">
                        </div>

                    </form>

<?php
if(isset($_GET['edit']))
{
    $edit_district = $_GET['edit'];
    include "includes/district_update.php";
}
?>
                </div>



                <div class="col-lg-6">
                    <br>
                    <table class="table table-border table-hover">
                        <!--   TABLE   -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$query = "SELECT * FROM tbl_districts";
$result_district_fetch = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result_district_fetch))            
{
    $district_id = $row['district_id'];
    $district_title = $row['district_title'];
    
    echo "<tr>";
        echo "<td>$district_id</td>";
        echo "<td>$district_title</td>";
        echo "<td><a href='districts.php?edit={$district_id}'>Edit</a></td>";
        echo "<td><a href='districts.php?delete={$district_id}'>Delete</a></td>";
    echo "</tr>";
}
?>
                        </tbody>
                    </table> <!--  /.TABLE  -->

                    <?php
if(isset($_GET['delete'])){
    $district_id = $_GET['delete'];
    
    $query = "DELETE FROM tbl_districts WHERE district_id = {$district_id} ";
    $result_del = mysqli_query($conn, $query);
    if(!$result_del){
        die ("Delete Query Failed! " . mysqli_error($conn));
    }else{
        header("Location: districts.php");
    }
}
?>
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
