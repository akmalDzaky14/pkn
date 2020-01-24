<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>/resources/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "emailtaken") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Email Already Taken!</p>';
          } elseif ($_GET['error'] == "invalidEmailandUsername") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Check Email and Usernames</p>';
          } elseif ($_GET['error'] == "emptyFields") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Fill All Fields</p>';
          } elseif ($_GET['error'] == "invalidEmail") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Invalid Email</p>';
          } elseif ($_GET['error'] == "invalidUID") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Use Other Username</p>';
          } elseif ($_GET['error'] == "passwodchecked") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Password Dont Match</p>';
          } elseif ($_GET['error'] == "sqlerror1") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Something Wrong, please try again!</p>';
          } elseif ($_GET['error'] == "sqlerror2") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Something Wrong, please try again!</p>';
          } elseif ($_GET['error'] == "sqlerror3") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Something Wrong, please try again!</p>';
          } elseif ($_GET['error'] == "usernametaken") {
            echo '<p style="color: red; text-align: center;" class="signuperror">Username Already Taken, Please User Other Username</p>';
          }
        } elseif (isset($_GET['register'])) {
          if ($_GET['register'] == "success") {
            echo '<p style="color: green; text-align: center;">Register Success!</p>';
          }
        }
        ?>
      </div>
      <div class="card-body">
        <form action="<?php echo base_url(); ?>index.php/backend/signup" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <?php
                  $fn = &$_GET['fn'];
                  $ln = &$_GET['ln'];
                  $uid = &$_GET['uid'];
                  $em = &$_GET['email'];
                  ?>
                  <input value="<?php echo $fn; ?>" type="text" name="firstname" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input value="<?php echo $ln; ?>" type="text" name="lastname" id="lastName" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input value="<?php echo $uid; ?>" type="text" name="uid" id="uid" class="form-control" placeholder="Username" required="required">
              <label for="uid">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input value="<?php echo $em; ?>" type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input value="" type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="confPass" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="submit">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url(); ?>index.php/backend/login">Login Page</a>
          <a class="d-block small" href="<?php echo base_url(); ?>index.php/backend/forgot">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/resources/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>