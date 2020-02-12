<?php
require 'dbHandler.inc.php'; //cek koneksi ke database

$token = $_GET['tokenPosting'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$message = $_GET['message'];
$date = $_GET['date'];
$agenToken = $_GET['admToken'];

if (empty($date)) {
    $register = base_url("index.php/backend/tables?type=Klist&error=emptyDate");
    header("Location: $register");
    exit();
} else {
    $sql = "INSERT INTO konfirmasi2 (token_agent,token_postingan, nama, email, phone, pesan_user, date) VALUES (?,?,?,?,?,?,?)";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        $register = base_url("index.php/backend/tables?type=Klist&Upload=Failed");
        header("Location: $register");
        exit();
    } else {
        // masih error di sini
        mysqli_stmt_bind_param($stmt, 'sssssss', $agenToken, $token, $nama, $email, $phone, $message, $date);
        $this->db->call_function('stmt_execute', $stmt);
        $sql = "DELETE FROM konfirmasi WHERE phone = $phone";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            // echo ("Error description: <br>" . $conn->error);
            $register = base_url("index.php/backend/tables?type=Klist&Upload=Failed2");
            header("Location: $register");
            exit();
        } else {
            $this->db->call_function('stmt_execute', $stmt);
            $register = base_url("index.php/backend/tables?type=Klist&Upload=Success");
            header("Location: $register");
            exit();
        }
    }
}
