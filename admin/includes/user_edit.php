<?php
    if(isset($_GET['user_id']))
    {
        $get_user_id =  $_GET['user_id'];
    }

    $query_get_user_details = "SELECT * FROM tbl_users WHERE id = {$get_user_id}";
    $result_get_user_details = mysqli_query($conn, $query_get_user_details);
    while($row = mysqli_fetch_assoc($result_get_user_details))
    {
        $id         = $row['id'];
        $title      = $row['title'];
        $full_name  = $row['full_name'];
        $username   = $row['username'];
        $email      = $row['email'];
        $password   = $row['password'];
        $gender     = $row['gender'];
        $nationality = $row['nationality'];
        $role       = $row['role'];
        $tel_no     = $row['tel_no'];
    }

    if(isset($_POST['edit_user']))
    {
        $title = $_POST['title'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $role = $_POST['role'];
        $tel_no = $_POST['tel_no'];
        
        $query = "UPDATE tbl_users SET ";
        $query .="title             = '{$title}', ";
        $query .="full_name         = '{$full_name}', ";
        $query .="username          = '{$username}', ";
        $query .="email             = '{$email}', ";
        $query .="password          = '{$password}', ";
        $query .="gender            = '{$gender}', ";
        $query .="nationality       = '{$nationality}', ";
        $query .="role              = '{$role}', ";
        $query .="tel_no            = '{$tel_no}' ";
        $query .="WHERE id    = '{$get_user_id}' ";

        $update_user = mysqli_query($conn,$query);
        if(!$update_user ) 
        {
            die("QUERY FAILED ." . mysqli_error($conn));
        }
        else
        {
            echo "<p class='text-center alert alert-success' role='alert'>User Details Updated Successfully. <a href='users.php'>View All Users</a></p>";
        }
    }

?>

<!-- enctype="multipart/form-data" for the IMAGE -->
<form id="frmUser" action="" method="post" enctype="multipart/form-data">
    
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group">
                <label>Title</label><br>
                <select name="title" id="title" class="form-control">
                    <option value="<?php echo $title; ?>"><?php echo $title; ?></option>
            <?php 
                if($title == 'Mr' )
                {
                    echo "<option value='Mrs'>Mrs.</option>";
                }
                else
                {
                    echo "<option value='Mr'>Mr.</option>";
                }
            ?>
                </select>
            </div>
        </div>
        
        <div class="col-lg-10">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input value="<?php echo $full_name; ?>" type="text" class="form-control" name="full_name">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input value="<?php echo $email; ?>" type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input value="<?php echo $password; ?>" type="password" class="form-control" name="password">
    </div>

    
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value='<?php echo $gender; ?>'>
                <?php
                    if($gender == 1) { echo "Male"; } else { echo "Female"; }
                ?>
            </option>

            <?php
                if($gender == 1)
                {
                    echo "<option value=0>Female</option>";
                }else
                {
                    echo "<option value=1>Male</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Nationality</label><br>
        <select name="nationality" id="nationality" class="form-control">
            <option value="<?php echo $nationality; ?>"><?php echo $nationality; ?></option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="United Kindom">United Kindom</option>
        </select>
    </div>

    <div class="form-group">
        <label for="role">Role</label><br>
        <select name="role" id="role" class="form-control">
            <option value='<?php echo $role; ?>'><?php echo $role; ?></option>
            <?php
                if($role = 'Subscriber')
                {
                    echo "<option value='Admin'>Admin</option>";
                }else
                {
                    echo "<option value='Subscriber'>Subscriber</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="tel_no">Telephone No</label>
        <input value="<?php echo $tel_no; ?>" type="text" class="form-control" name="tel_no">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User" >
    </div>      

</form>