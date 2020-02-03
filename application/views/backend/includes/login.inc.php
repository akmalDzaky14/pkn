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
        // cek koneksi user
        $sql = "SELECT * FROM user_list WHERE uid=? OR email =?";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/backend/login?error=sqlerror");
            header("refresh:1;url=$register");
            exit();
        } else {
            //cek apakah email atau username ada di database user
            mysqli_stmt_bind_param($stmt, 'ss', $emailuid, $emailuid); //bind parameter
            $this->db->call_function('stmt_execute', $stmt);
            $result = $this->db->call_function('stmt_get_result', $stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['password']); //boolean
                if ($pwdCheck == false) {
                    $register = base_url("index.php/backend/login?error=userwrongpass");
                    header("refresh:1;url=$register");
                    exit();
                } elseif ($pwdCheck == true) {
                    // session_start();
                    $_SESSION['userID'] = $row['id'];
                    $_SESSION['username'] = $row['uid'];
                    $_SESSION['status'] = 'user';

                    $register = base_url("/index.php?login=success");
                    header("refresh:1;url=$register");
                } else {
                    $register = base_url("index.php/backend/login?error=userwrongpass");
                    header("refresh:1;url=$register");
                    exit();
                }
            } else {
                //cek koneksi agent
                $sql = "SELECT * FROM agent_list WHERE uid=? OR email =?";
                $stmt = $this->db->call_function('stmt_init', $conn);
                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                    $register = base_url("index.php/backend/login?error=sqlerror");
                    header("refresh:1;url=$register");
                    exit();
                } else {
                    //cek apakah email atau username ada di database agent
                    mysqli_stmt_bind_param($stmt, 'ss', $emailuid, $emailuid);
                    $this->db->call_function('stmt_execute', $stmt);
                    $result = $this->db->call_function('stmt_get_result', $stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $pwdCheck = password_verify($password, $row['password']); //boolean
                        if ($pwdCheck == false) {
                            $register = base_url("index.php/backend/login?error=agentwrongpass");
                            header("refresh:1;url=$register");
                            exit();
                        } elseif ($pwdCheck == true) {
                            // session_start();
                            $_SESSION['userID'] = $row['id'];
                            $_SESSION['username'] = $row['uid'];
                            $_SESSION['status'] = 'agent';

                            $register = base_url("/index.php/backend");
                            header("refresh:1;url=$register");
                        } else {
                            $register = base_url("index.php/backend/login?error=agentwrongpass");
                            header("refresh:1;url=$register");
                            exit();
                        }
                    } else {
                        // cek koneksi admin
                        $sql = "SELECT * FROM admin_list WHERE uid=? OR email =?";
                        $stmt = $this->db->call_function('stmt_init', $conn);
                        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                            $register = base_url("index.php/backend/login?error=sqlerror");
                            header("refresh:1;url=$register");
                            exit();
                        } else {
                            //cek apakah email atau username ada di database agent
                            mysqli_stmt_bind_param($stmt, 'ss', $emailuid, $emailuid);
                            $this->db->call_function('stmt_execute', $stmt);
                            $result = $this->db->call_function('stmt_get_result', $stmt);
                            if ($row = mysqli_fetch_assoc($result)) {
                                $pwdCheck = password_verify($password, $row['password']); //boolean
                                if ($pwdCheck == false) {
                                    $register = base_url("index.php/backend/login?error=adminwrongpass");
                                    header("refresh:1;url=$register");
                                    exit();
                                } elseif ($pwdCheck == true) {
                                    // session_start();
                                    $_SESSION['userID'] = $row['id'];
                                    $_SESSION['username'] = $row['uid'];
                                    $_SESSION['status'] = 'admin';

                                    $register = base_url("/index.php/backend");
                                    header("refresh:1;url=$register");
                                } else {
                                    $register = base_url("index.php/backend/login?error=adminwrongpass");
                                    header("refresh:1;url=$register");
                                    exit();
                                }
                            } else {
                                $register = base_url("index.php/backend/login?error=usernotfound");
                                header("refresh:1;url=$register");
                                exit();
                            }
                        }
                    }
                }
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
