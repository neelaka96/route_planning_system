<?php
    if(isset($_POST['add_user']))
    {
        $title      = $_POST['title'];
        $full_name  = $_POST['full_name'];
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $gender     = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $role       = $_POST['role'];
        $tel_no     = $_POST['tel_no'];
        $date       = date('d-m-y');

        $query = "INSERT INTO tbl_users(title,full_name,username,email,password,gender,nationality,role,tel_no,date) VALUES ('{$title}','{$full_name}','{$username}','{$email}','{$password}','{$gender}','{$nationality}','{$role}','{$tel_no}',now())";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            die(mysqli_error($conn));
        }
        else 
        {
            echo "<p class='text-center alert alert-success' role='alert'>User Created Successfully: <a href='users.php'>View Users</a></p>";            
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
                    <option value="Mr">Mr.</option>
                    <option value="Mrs">Mrs.</option>
                </select>
            </div>
        </div>
        
        <div class="col-lg-10">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" name="full_name">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="form-control">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
    </div>

    <div class="form-group">
        <label>Nationality</label><br>
        <select name="nationality" id="nationality" class="form-control">
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="United Kindom">United Kindom</option>
        </select>
    </div>

    <div class="form-group">
        <label for="role">Role</label><br>
        <select name="role" id="role" class="form-control">
            <option value="Subscriber">Choose..</option>
            <option value="Subscriber">Subscriber</option>
            <option value="Admin">Admin</option>
        </select>
    </div>

    <div class="form-group">
        <label for="tel_no">Telephone No</label>
        <input type="text" class="form-control" name="tel_no">
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User" >
    </div>      

</form>