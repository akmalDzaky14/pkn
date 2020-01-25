<?php
$log = base_url("index.php/backend/login");
// header("location:$log");

$fn = $_POST['firstname'];
$ln = $_POST['lastname'];
$em = $_POST['email'];
$pass = $_POST['pass'];
$confpass = $_POST['confPass'];

$emailConfirm = "SELECT*FROM user_list where email = '$em'";
$result = $this->db->query($emailConfirm);
$num = $result->num_rows();
if ($pass == $confpass) {
    if ($num == 1) {
        $register = base_url("index.php/backend/register?error=invalidEmail&firstname=".$fn."&lastname=".$ln);
        header("refresh:1;url=$register");
        $message = "Email already taken, you will automaticly redirect";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $upload = "INSERT INTO user_list (nama_depan, nama_belakang, email, password) VALUES ('$fn', '$ln', '$em', '$pass')";
        $this->db->query($upload);
        $log = base_url("index.php/backend/login");
        header("refresh:1;url=$log");
        $message = "Registration success, you will automaticly redirect";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
} else {
    $register = base_url("index.php/backend/register");
    header("refresh:1;url=$register");
    $message = "Password don't match, you will automaticly redirect";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
