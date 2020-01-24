<?php

if (isset($_POST["reset-pass-submit"])) {

    $selector = $_POST['selector'];
    $valodator = $_POST['validator'];
    $pass = $_POST['inputPassword'];
    $passRepeat = $_POST['password-repeat'];

    if (empty($pass) || empty($passRepeat)) {
        $register = base_url("/index.php/backend/resetPassword?newpwd=empty");
        header("Location: $register");
        exit();
    } elseif ($pass != $passRepeat) {
        $register = base_url("/index.php/backend/resetPassword?newpwd=notMatch");
        header("Location: $register");
        exit();
    }

    $currentDate = date("U");
    require 'dbHandler.inc.php';

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= ? ";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        $message = "a!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
        $this->db->call_function('stmt_execute', $stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            $message = "b!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            exit();
        } else {
            $tokenBin = hex2bin($valodator);
            $tokenChecked = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenChecked === false) {
                $message = "c!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            } elseif ($tokenChecked === true) {

                $tokenEmail = $row["pwdResetEmail"];

                $sql = "SELECT * FROM user_list WHERE email = ?";
                $stmt = $this->db->call_function('stmt_init', $conn);
                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                    $message = "d!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                    $this->db->call_function('stmt_execute', $stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        $message = "e!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        exit();
                    } else {
                        $sql = "UPDATE user_list SET password=? WHERE email=?";
                        $stmt = $this->db->call_function('stmt_init', $conn);
                        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                            $message = "f!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            exit();
                        } else {
                            $newPwdHashed = password_hash($pass, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'ss', $newPwdHashed, $tokenEmail);
                            $this->db->call_function('stmt_execute', $stmt);

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
                            $stmt = $this->db->call_function('stmt_init', $conn);
                            if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                                $message = "g!";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                                $this->db->call_function('stmt_execute', $stmt);
                                $register = base_url("index.php/backend/login?newpwd=passwordupdated");
                                header("Location: $register");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    $register = base_url("index.php/backend/resetPassword");
    header("Location: $register");
    exit();
}
