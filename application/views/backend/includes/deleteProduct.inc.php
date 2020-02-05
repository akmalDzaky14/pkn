<?php
require 'dbHandler.inc.php'; //cek koneksi ke database

$token = &$_GET['token'];
//UPDATE PRODUCT DI DATABASE
$sql = "DELETE FROM posting_list WHERE token = ?";
$stmt = $this->db->call_function('stmt_init', $conn);
if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
    $register = base_url("index.php/backend/tables?type=Plist&delete=failed");
    header("Location: $register");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, 's', $token);
    $this->db->call_function('stmt_execute', $stmt);
    $register = base_url("index.php/backend/tables?type=Plist&delete=success");
    header("Location: $register");
    exit();
}
