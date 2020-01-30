<?php

// session_start();
session_unset();
session_destroy();
$register = base_url("/index.php?logout=success");
header("refresh:1;url=$register");
$message = "Logout Success!";
echo "<script type='text/javascript'>alert('$message');</script>";