<?php
if (isset($_POST['submit'])) {
    require 'dbHandler.inc.php'; //cek koneksi ke database

    $token = $_POST['tokenPosting'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $date = $_POST['date'];

    if (empty($date)) {
        $register = base_url("index.php/backend/uploadProduct?error=emptyDate&msg=" . $message);
        header("Location: $register");
        exit();
    } else {
        $sql = "INSERT INTO konfirmasi (token_postingan, nama, email, phone, pesan_user, tanggal) VALUES (?,?,?,?,?,?)";
        $stmt = $this->db->call_function('stmt_init', $conn);
        if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
            $register = base_url("index.php/home/konfirmasi?Upload=Failed&token=" . $token);
            header("Location: $register");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 'ssssss', $token, $nama, $email, $phone, $message, $date);
            $this->db->call_function('stmt_execute', $stmt);
            $register = base_url("index.php/home/konfirmasi?Upload=Success&token=" . $token);
            header("Location: $register");
            exit();
        }
    }
}
