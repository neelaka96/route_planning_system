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
                    <a href="#">Provices</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>

<?php
if(isset($_POST['btn_insert']))
{
    $province_title = $_POST['province_title'];
    if ($province_title == "" || empty($province_title))
    {
        echo " <p class='alert alert-danger text-center' role='alert'>Fields cannot be empty</p>";
    }
    else
    {
        $query = "INSERT INTO tbl_provinces (province_title) VALUES ('{$province_title}') ";
        $result_insert = mysqli_query($conn,$query);
        if(!$result_insert)
        {
            die ("Insert Query Failed! " . mysqli_error($conn));
        }else{
            echo "<div class='alert alert-success text-center' role='alert'>Successfully Inserted</div><br>";
        }
    }
}
?>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Content -->
                    <form id="frmProvince" action="" method="post">
                        <div class="form-group">
                            <label for="province_title">Add Province</label>
                            <input type="text" name="province_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn_insert" value="Add Province" class="btn btn-primary">
                        </div>
                    </form>

<?php
if(isset($_GET['edit']))
{
    $edit_province = $_GET['edit'];
    include "includes/province_update.php";
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
                                <th>Province</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * FROM tbl_provinces";
$result_province_fetch = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result_province_fetch))            
{
    $province_id = $row['province_id'];
    $province_title = $row['province_title'];
    
    echo "<tr>";
        echo "<td>$province_id</td>";
        echo "<td>$province_title</td>";
        echo "<td><a href='provinces.php?edit={$province_id}'>Edit</a></td>";
        echo "<td><a href='provinces.php?delete={$province_id}'>Delete</a></td>";
    echo "</tr>";
}
?>
                        </tbody>
                    </table> <!--  /.TABLE  -->

<?php
if(isset($_GET['delete']))
{
    $province_id = $_GET['delete'];
    $query = "DELETE FROM tbl_provinces WHERE province_id = {$province_id} ";
    $result_del = mysqli_query($conn, $query);
    if(!$result_del){
        die ("Delete Query Failed! " . mysqli_error($conn));
    }else{
        header("Location: provinces.php");
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
