<!-- DB -->
<?php include "includes/db.php"; ?>
<?php include "admin/includes/login_header.php"; ?>

<?php

$db_email = '';
$db_username = '';
  if (isset($_POST['login_user'])) 
  {
    $email = $_POST['inputEmail'];
    $username = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $email = mysqli_real_escape_string($conn, $email);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM tbl_users WHERE email = '{$email}' OR username = '{$username}'";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      die("Query Failed". mysqli_error($conn));
    }
    while($row = mysqli_fetch_array($result))
    {
      $db_id            = $row['id'];
      $db_title         = $row['title'];
      $db_full_name     = $row['full_name'];
      $db_username      = $row['username'];
      $db_email         = $row['email'];
      $db_password      = $row['password'];
      $db_role          = $row['role'];
    }
    if (($email === $db_email || $username === $db_username) && $password === $db_password ) 
    {
      $_SESSION['id'] = $db_id;
      $_SESSION['title'] = $db_title;
      $_SESSION['full_name'] = $db_full_name;
      $_SESSION['username'] = $db_username;
      $_SESSION['email'] = $db_email;
      $_SESSION['role'] = $db_role;

      header ("Location: admin/index.php");      
    }
    else
    {
        echo '
            <script type="text/javascript">
            $(document).ready(function(){
              swal.fire({
              title: "Invalid Login",
              text: "Invalid Username or Password",
              type: "error",
              showCancelButton: false,
              confirmButtonText: "Ok",
              closeOnConfirm: true
              }, function() {

              });
            });
            </script>
        ';
    }
  }




?>




  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header text-center">Users Login</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <!-- <a class="btn btn-primary btn-block" href="index.php">Login</a> -->
          <div class="form-group">
              <input class="btn btn-primary btn-block" type="submit" name="login_user" value="Login" >
              <a class="btn btn-primary btn-block" href="index.php">Cancel</a>
          </div>  
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="hotel_login.php">Hotel Managers Login</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>



  <script src="js/sweetalert2.all.min.js"></script>


  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
