<!-- DB -->
<?php include "includes/db.php"; ?>
<?php include "admin/includes/login_header.php"; ?>

<?php
$db_hotel_email = '';
  if (isset($_POST['login_hotel'])) 
  {
    $email    = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM tbl_hotels WHERE email = '{$email}' ";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
      die("Query Failed". mysqli_error($conn));
    }
    while($row = mysqli_fetch_array($result))
    {
      $db_hotel_id            = $row['id'];
      $db_hotel_name          = $row['name'];
      $db_hotel_email         = $row['email'];
      $db_hotel_password      = $row['password'];
    }

    if ($email === $db_hotel_email  && $password === $db_hotel_password) 
    {
      $_SESSION['id']    = $db_hotel_id;
      $_SESSION['name']  = $db_hotel_name;
      $_SESSION['email'] = $db_hotel_email;

      header ("Location: index_hotel_users.php?hotel_id={$db_hotel_id}");      
    }
    else
    {
      // header ("Location: index.php");

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
      <div class="card-header text-center">Hotel Managers Login</div>
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
              <input class="btn btn-primary btn-block" type="submit" name="login_hotel" value="Login" >
              <a class="btn btn-primary btn-block" href="index.php">Home Page</a>
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
  <!-- <script src="admin/vendor/jquery/jquery.min.js"></script> -->
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
