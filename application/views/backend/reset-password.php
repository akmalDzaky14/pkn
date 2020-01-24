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
                    <h4>Type Your New Password</h4>
                    <p>Please type new password.</p>
                </div>
                <?php
                if (isset($_GET['reset'])) {
                    if ($_GET['reset'] == "success") {
                        echo '<p style="color: green; text-align: center;">Success, Please check your email!</p>';
                    }
                }

                $selector = &$_GET["selector"];
                $validator = &$_GET["validator"];
                if (empty($selector) || empty($validator)) {
                    echo  '<p style="color: red; text-align: center;">Could not validate your request!</p>'; ?>
                    <div class="text-center">
                        <a class="d-block small mt-3" href="<?php echo base_url(); ?>index.php/backend/register">Register an Account</a>
                        <a class="d-block small" href="<?php echo base_url(); ?>index.php/backend/forgot">Forgot Password?</a>
                        <a class="d-block small" href="<?php echo base_url(); ?>" class="tombol">Home</a>
                    </div>
                    <?php
                } else {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                        if (isset($_GET['newpwd'])) {
                            if ($_GET['newpwd'] == "notMatch") {
                                echo '<p style="color: red; text-align: center;">Password not match, please retype password!</p>';
                            } elseif ($_GET['newpwd'] == "empty") {
                                echo '<p style="color: red; text-align: center;">Please fill all form!</p>';
                            }
                        }
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "sqlerror1" || $_GET['error'] == "sqlerror2" || $_GET['error'] == "sqlerror3" || $_GET['error'] == "sqlerror4" || $_GET['error'] == "sqlerror5" || $_GET['error'] == "sqlerror6" || $_GET['error'] == "sqlerror7") {
                                echo '<p style="color: red; text-align: center;">Something wrong, please try again or send another request!!</p>';
                            } else {
                                echo '<p style="color: red; text-align: center;">Something wrong, please try again or send another request!!</p>';
                            }
                        }
                    ?>
                        <form action="<?php echo base_url(); ?>index.php/backend/resetPasswordValidate" method="POST">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                                    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                                    <input type="password" name="password-repeat" id="password-repeat" class="form-control" placeholder="Confirm Password" required="required">
                                </div>
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" name="reset-pass-submit" value="Reset Password">
                        </form>
                        <div class="text-center">
                            <a class="d-block small mt-3" href="<?php echo base_url(); ?>index.php/backend/register">Register an Account</a>
                            <a class="d-block small" href="<?php echo base_url(); ?>index.php/backend/forgot">Forgot Password?</a>
                            <a class="d-block small" href="<?php echo base_url(); ?>" class="tombol">Home</a>
                        </div>
                <?php
                    }
                }
                ?>
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