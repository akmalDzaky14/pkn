<?php 
// isi nama host, username mysql, dan password mysql anda
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pkn";
$conn = $this->db->call_function('connect', $servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    $error = $this->db->error();
    echo implode(" ", $error);
    die("--Connection failed");
}else {
    echo "berhasil";
}
