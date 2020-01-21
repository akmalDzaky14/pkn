<?php
if (isset($_POST['login'])) {
    require 'dbHandler.inc.php'; //cek koneksi ke database

    $emailuid = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    if (empty($emailuid) || empty($password)) {
        $register = base_url("index.php/backend/login?error=emptyFields");
        header("refresh:1;url=$register");
        $message = "Empty Field!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    } else {
        $sql = "SELECT * FROM userlist WHERE uid=? OR email =?";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/backend/login?error=sqlerror");
            header("refresh:1;url=$register");
            $message = "SQL ERROR";
            echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $emailuid, $emailuid);
            $this->db->call_function('stmt_execute', $stmt);
            $result = $this->db->call_function('stmt_get_result', $stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']); //boolean
                if ($pwdCheck == false) {
                    $register = base_url("index.php/backend/login?error=nouser");
                    header("refresh:1;url=$register");
                    $message = "Wrong Password!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['id'];
                    $_SESSION['username'] = $row['uid'];

                    $register = base_url("/index.php?login=success");
                    header("refresh:1;url=$register");
                    $message = "Login Success!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                } else {
                    $register = base_url("index.php/backend/login?error=nouser");
                    header("refresh:1;url=$register");
                    $message = "Wrong Password!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    exit();
                }
            } else {
                $register = base_url("index.php/backend/login?error=nouser");
                header("refresh:1;url=$register");
                $message = "USER NOT FOUND!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            }
        }
    }
} else {
    //redirect saat user input tanpa klik login
    $register = base_url();
    header("refresh:1;url=$register");
    $message = "Please Login in Proper Way!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    exit();
}
