<?php

if (isset($_POST["reset-pass-submit"])) {

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pass = $_POST['inputPassword'];
    $passRepeat = $_POST['password-repeat'];

    if (empty($pass) || empty($passRepeat)) {
        $register = base_url("/index.php/backend/resetPassword?newpwd=empty&selector=$selector&validator=$validator");
        header("Location: $register");
        exit();
    } elseif ($pass != $passRepeat) {
        $register = base_url("/index.php/backend/resetPassword?newpwd=notMatch&selector=$selector&validator=$validator");
        header("Location: $register");
        exit();
    }

    $currentDate = date("U");
    require 'dbHandler.inc.php';

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= ? ";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        $register = base_url("/index.php/backend/resetPassword?error=sqlerror1&selector=$selector&validator=$validator");
        header("Location: $register");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
        $this->db->call_function('stmt_execute', $stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            $register = base_url("/index.php/backend/resetPassword?error=sqlerror2&selector=$selector&validator=$validator");
            header("Location: $register");
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenChecked = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenChecked === false) {
                $register = base_url("/index.php/backend/resetPassword?error=sqlerror3&selector=$selector&validator=$validator");
                header("Location: $register");
                exit();
            } elseif ($tokenChecked === true) {
                // cek email di database
                $tokenEmail = $row["pwdResetEmail"];

                $sql = "SELECT * FROM user_list WHERE email = ?";
                $stmt = $this->db->call_function('stmt_init', $conn);
                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                    $register = base_url("/index.php/backend/resetPassword?error=sqlerror4&selector=$selector&validator=$validator");
                    header("Location: $register");
                    exit();
                } else {
                    // cek apakah email ada di database user_list
                    mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                    $this->db->call_function('stmt_execute', $stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        $register = base_url("/index.php/backend/resetPassword?error=sqlerror5&selector=$selector&validator=$validator");
                        header("Location: $register");
                        exit();
                    } else {
                        // update password di database dengan password baru jika email sama
                        $sql = "UPDATE user_list SET password=? WHERE email=?";
                        $stmt = $this->db->call_function('stmt_init', $conn);
                        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                            $register = base_url("/index.php/backend/resetPassword?error=sqlerror6&selector=$selector&validator=$validator");
                            header("Location: $register");
                            exit();
                        } else {
                            $newPwdHashed = password_hash($pass, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'ss', $newPwdHashed, $tokenEmail);
                            $this->db->call_function('stmt_execute', $stmt);

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
                            $stmt = $this->db->call_function('stmt_init', $conn);
                            if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                                $register = base_url("/index.php/backend/resetPassword?error=sqlerror7&selector=$selector&validator=$validator");
                                header("Location: $register");
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
