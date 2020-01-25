<?php
if (isset($_POST['submit'])) {
    require 'C:\xampp\htdocs\CodeIgniter\application\views\backend\includes\dbHandler.inc.php'; //cek koneksi ke database
    // $conn = $this->load->database();

    // inisialisasi data yang di input
    $fn = $_POST['firstname'];
    $ln = $_POST['lastname'];
    $username = $_POST['uid'];
    $em = $_POST['email'];
    $pass = $_POST['pass'];
    $confpass = $_POST['confPass'];
    $token = bin2hex(random_bytes(8));

    // cek apakah ada yang kosong saat mengisi form register
    if (empty($fn) || empty($ln) || empty($username) || empty($em) || empty($pass) || empty($confpass)) {
        $register = base_url("index.php/backend/adminReg?error=emptyFields&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username . "&email=" . $em);
        header("Location: $register");
        exit();
    } //cek apakah format email dan username valid
    elseif (!filter_var($em, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $register = base_url("index.php/backend/adminReg?error=invalidEmail&fn=" . $fn . "&ln=" . $ln);
        header("Location: $register");
        exit();
    } //cek  apakah format email valid
    elseif (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $register = base_url("index.php/backend/adminReg?error=invalidEmail&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username);
        header("Location: $register");
        exit();
    } // cek apakah username valid
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $register = base_url("index.php/backend/adminReg?error=invalidUID&fn=" . $fn . "&ln=" . $ln . "&email=" . $em);
        header("Location: $register");
        exit();
    } //cek apakah password dan confirm password sama
    elseif ($pass !== $confpass) {
        $register = base_url("index.php/backend/adminReg?error=passwodchecked&fn="  . $fn . "&ln=" . $ln . "&uid=" . $username . "&email=" . $em);
        header("Location: $register");
        exit();
    } //lanjut jika lolos pemeriksaan tahap 1
    else {
        // cek username di database
        $sql = "SELECT uid FROM admin_list WHERE uid=?";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/backend/adminReg?error=sqlerror1");
            header("Location: $register");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            $this->db->call_function('stmt_execute', $stmt);
            $this->db->call_function('stmt_store_result', $stmt);
            $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
            if ($checkResult > 0) {
                $register = base_url("index.php/backend/adminReg?error=usernametaken&fn=" . $fn . "&ln=" . $ln . "&email=" . $em);
                header("Location: $register");
                exit();
            } else {
                //cek email di database
                $sql = "SELECT uid FROM admin_list WHERE email=?";
                $stmt = $this->db->call_function('stmt_init', $conn);
                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                    $register = base_url("index.php/backend/adminReg?error=sqlerror2");
                    header("Location: $register");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 's', $em);
                    $this->db->call_function('stmt_execute', $stmt);
                    $this->db->call_function('stmt_store_result', $stmt);
                    $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
                    if ($checkResult > 0) {
                        $register = base_url("index.php/backend/adminReg?error=emailtaken&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username);
                        header("Location: $register");
                        exit();
                    } else {
                        $sql = "SELECT uid FROM admin_list WHERE token=?";
                        $stmt = $this->db->call_function('stmt_init', $conn);
                        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                            $register = base_url("index.php/backend/adminReg?error=sqlerror3");
                            header("Location: $register");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, 's', $token);
                            $this->db->call_function('stmt_execute', $stmt);
                            $this->db->call_function('stmt_store_result', $stmt);
                            $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
                            if ($checkResult > 0) {
                                $register = base_url("index.php/backend/adminReg?error=duplicatetoken&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username);
                                header("Location: $register");
                                exit();
                            } else {
                                //upload form register ke database
                                $sql = "INSERT INTO admin_list (nama_depan ,nama_belakang , uid, email, password, token) VALUES (?,?,?,?,?,?)";
                                $stmt = $this->db->call_function('stmt_init', $conn);
                                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                                    $register = base_url("index.php/backend/adminReg?error=sqlerror4");
                                    header("Location: $register");
                                    exit();
                                } else {
                                    $hashPass = password_hash($pass,  PASSWORD_DEFAULT);
                                    mysqli_stmt_bind_param($stmt, 'ssssss', $fn, $ln, $username, $em, $hashPass, $token);
                                    $this->db->call_function('stmt_execute', $stmt);
                                    $register = base_url("index.php/backend/adminReg?register=success");
                                    header("Location: $register");
                                    exit();
                                }
                            }
                        }
                    }
                }
            }
        }
        //memutuskan koneksi dengan database
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
} else {
    //redirect saat user input tanpa klik submit
    $register = base_url("index.php/backend/adminReg");
    header("Location: $register");
    exit();
}
