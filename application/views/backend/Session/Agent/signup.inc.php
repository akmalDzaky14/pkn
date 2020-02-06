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
    $phone = $_POST['phoneNumber'];
    $token = bin2hex(random_bytes(8));
    $point = 0;

    // cek apakah ada yang kosong saat mengisi form register
    if (empty($fn) || empty($ln) || empty($username) || empty($em) || empty($pass) || empty($confpass)) {
        $register = base_url("index.php/backend/agentReg?error=emptyFields&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username . "&email=" . $em);
        header("Location: $register");
        exit();
    } //cek apakah format email dan username valid
    elseif (!filter_var($em, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $register = base_url("index.php/backend/agentReg?error=invalidEmail&fn=" . $fn . "&ln=" . $ln);
        header("Location: $register");
        exit();
    } //cek  apakah format email valid
    elseif (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $register = base_url("index.php/backend/agentReg?error=invalidEmail&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username);
        header("Location: $register");
        exit();
    } // cek apakah username valid
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $register = base_url("index.php/backend/agentReg?error=invalidUID&fn=" . $fn . "&ln=" . $ln . "&email=" . $em);
        header("Location: $register");
        exit();
    } //cek apakah password dan confirm password sama
    elseif ($pass !== $confpass) {
        $register = base_url("index.php/backend/agentReg?error=passwodchecked&fn="  . $fn . "&ln=" . $ln . "&uid=" . $username . "&email=" . $em);
        header("Location: $register");
        exit();
    } //lanjut jika lolos pemeriksaan tahap 1
    else {
        // cek username di database
        $sql = "SELECT uid FROM agent_list WHERE uid=?";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/backend/agentReg?error=sqlerror1");
            header("Location: $register");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $username);
            $this->db->call_function('stmt_execute', $stmt);
            $this->db->call_function('stmt_store_result', $stmt);
            $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
            if ($checkResult > 0) {
                $register = base_url("index.php/backend/agentReg?error=usernametaken&fn=" . $fn . "&ln=" . $ln . "&email=" . $em);
                header("Location: $register");
                exit();
            } else {
                //cek email di database
                $sql = "SELECT uid FROM agent_list WHERE email=?";
                $stmt = $this->db->call_function('stmt_init', $conn);
                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                    $register = base_url("index.php/backend/agentReg?error=sqlerror2");
                    header("Location: $register");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, 's', $em);
                    $this->db->call_function('stmt_execute', $stmt);
                    $this->db->call_function('stmt_store_result', $stmt);
                    $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
                    if ($checkResult > 0) {
                        $register = base_url("index.php/backend/agentReg?error=emailtaken&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username);
                        header("Location: $register");
                        exit();
                    } else {
                        $sql = "SELECT uid FROM agent_list WHERE token=?";
                        $stmt = $this->db->call_function('stmt_init', $conn);
                        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                            $register = base_url("index.php/backend/agentReg?error=sqlerror3");
                            header("Location: $register");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, 's', $token);
                            $this->db->call_function('stmt_execute', $stmt);
                            $this->db->call_function('stmt_store_result', $stmt);
                            $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
                            if ($checkResult > 0) {
                                $register = base_url("index.php/backend/agentReg?error=duplicatetoken&fn=" . $fn . "&ln=" . $ln . "&uid=" . $username);
                                header("Location: $register");
                                exit();
                            } else {
                                //upload form register ke database
                                $sql = "INSERT INTO agent_list (email,nama_depan ,nama_belakang , password, uid, token, point,phone) VALUES (?,?,?,?,?,?,?,?)";
                                $stmt = $this->db->call_function('stmt_init', $conn);
                                if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
                                    $register = base_url("index.php/backend/agentReg?error=sqlerror4");
                                    header("Location: $register");
                                    exit();
                                } else {
                                    $hashPass = password_hash($pass,  PASSWORD_DEFAULT);
                                    mysqli_stmt_bind_param($stmt, 'ssssssis', $em, $fn, $ln, $hashPass, $username, $token, $point, $phone);
                                    $this->db->call_function('stmt_execute', $stmt);
                                    $register = base_url("index.php/backend/agentReg?register=success");
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
    $register = base_url("index.php/backend/agentReg");
    header("Location: $register");
    exit();
}
