<?php
require 'dbHandler.inc.php'; //cek koneksi ke database

$token = $_GET['tp'];
$nama = $_GET['nm'];
$phone = $_GET['phone'];
$agenToken = $_GET['ta'];

$sql = "INSERT INTO terjual (token_postingan, token_agen, nama_pembeli, contact_user) VALUES (?,?,?,?)";
$stmt = $this->db->call_function('stmt_init', $conn);
if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
    // echo ("Error description: <br>" . $conn->error);
    $register = base_url("index.php/backend/tables?type=K2list&Upload=Failed&error=" . $conn->error);
    header("Location: $register");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, 'ssss',  $token, $agenToken, $nama, $phone);
    $this->db->call_function('stmt_execute', $stmt);
    // delete postingan yang pada tabel list yang bisa dilihat oleh semua agen
    $sql = "DELETE FROM konfirmasi2 WHERE phone = $phone";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        // echo ("Error description: <br>" . $conn->error);
        $register = base_url("index.php/backend/tables?type=K2list&Upload=Failed2&error=" . $conn->error);
        header("Location: $register");
        exit();
    } else {
        $this->db->call_function('stmt_execute', $stmt);
        // update status pada posting list
        $sql = "UPDATE posting_list SET status = 'Terjual' WHERE token = '$token'";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            // echo ("Error description: <br>" . $conn->error);
            $register = base_url("index.php/backend/tables?type=K2list&Upload=Failed3&error=" . $conn->error);
            header("Location: $register");
            exit();
        } else {
            $this->db->call_function('stmt_execute', $stmt);
            $register = base_url("index.php/backend/tables?type=K2list&Upload=Success");
            header("Location: $register");
            exit();
        }
    }
}
