<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>/resources/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <?php
        if (isset($_GET['reset'])) {
          if ($_GET['reset'] == "success") {
            echo '<p style="color: green; text-align: center;">Success, Please check your email!</p>';
          } elseif ($_GET['reset'] == "duplicateemail") {
            echo '<p style="color: red; text-align: center;">Please Contact administrator!</p>';
          } elseif ($_GET['reset'] == "unknowemail") {
            echo '<p style="color: red; text-align: center;">Unknow email!</p>';
          }
        }
        ?>
        <form action="<?php echo base_url(); ?>index.php/backend/resetPasswordReq" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="reset-Pass-request" value="Reset Password">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url(); ?>index.php/backend/register">Register an Account</a>
          <a class="d-block small" href="<?php echo base_url(); ?>index.php/backend/login">Login Page</a>
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