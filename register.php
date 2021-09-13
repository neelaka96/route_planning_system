<!-- DB -->
<?php include "includes/db.php"; ?>

<?php ob_start(); ?>

<?php include "admin/includes/login_header.php"; ?>

<?php
    $sender_domain = 'premium93.web-hosting.com';
    $to = 'neelakadilshan@gmail.com';
    $site_name = 'ExploreCeylon.lk';
    if(isset($_POST['register_user']))
    {
        $title      = $_POST['title'];
        $full_name  = $_POST['full_name'];
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $date       = date('d-m-y');

        // contact form fields
	    $subject = "User Registered";
	    $message = "XXXXXXXXX";

        $query = "INSERT INTO tbl_users (title,full_name,username,email,password,role,date) VALUES ('{$title}','{$full_name}','{$username}','{$email}','{$password}','Subscriber',now())";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            die("Query Failed ". mysqli_error($conn));
        }
        else 
        {
            $body = "Name: $full_name \n\nEmail: $email \n\nMessage: $message";
			
			$headers = "From: " . $site_name . ' <' . $sender_domain . '> ' . "\r\n";
			$headers .= "Reply-To: " . $name . ' <' . $email . '> ' . "\r\n";

            $mail_result = mail( $to, $subject, $body, $headers );
			
			if ( $mail_result == true )
				{ echo 'success'; }
			else
				{ echo 'unsuccess'; }
            echo "<p class='bg-success'>User Created: <a href='login.php'>Login</a></p>";            
        }
    }
?>



  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form id="frmRegister" action="" method="post" enctype="multipart/form-data">
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

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password">
                  </div>
              </div>
              
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="con_password">Confirm Password</label>
                      <input type="text" class="form-control" name="con_password">
                  </div>
              </div>
          </div>
          
          <div class="form-group">
              <input class="btn btn-primary btn-block" type="submit" name="register_user" value="Register" >
              <a class="btn btn-primary btn-block" href="login.php">Back</a>
          </div>  
        </form>
        <div class="text-center">
          <a class="d-block small" href="hotel_login.php">Hotel Managers Login</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/javascriptfiles.js"></script>

</body>

</html>
