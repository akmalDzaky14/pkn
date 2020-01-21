<?php

if (isset($_POST["reset-Pass-request"])) {

    //enkripsi token
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    //ganti url sesuai kebutuhan, disini karena menggunakan CI jadi perhatikan controller.
    $url = "localhost/CodeIgniter/index.php/backend/resetPassword?selector=" . $selector . "&validator=" . bin2hex($token);

    //Tahun, untuk menyesuaikan waktu expire token
    $expires = date("U") + 1800;

    //koneksi ke database
    require 'dbHandler.inc.php';

    $userEmail = $_POST["email"];

    //menghapus token jika user mencoba request reset password dalam jangka waktu pendek
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        $message = "Something Wrong, try again later!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $userEmail);
        $this->db->call_function('stmt_execute', $stmt);
    }

    //memasukan token ke database
    $sql = "INSERT INTO pwdreset
    (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires)
    VALUES (?,?,?,?);";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        $message = "Something Wrong, try again later!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit();
    } else {
        //hash token, demi keamanan
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, 'ssss', $userEmail, $selector, $hashedToken, $expires);
        $this->db->call_function('stmt_execute', $stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    //menyapkan isi pesan yang akan dikirimkan
    $to = $userEmail;
    $subject = "Reset Your Password";

    $message = '<p>We recive reset password request. If you dont request this, you can ignore this</p>';
    $message .= '<p>Here is your password reset link : <br>';
    $message .= '<a href"' . $url . '">' . $url . '</a></p>';

    $headera = "From : Developer Team <test@gmail.com>\r\n";
    $headera .= "Reply To : Developer Team <test@gmail.com>\r\n";
    $headera .= "Content-type: text/html\r\n";

    //mengirim email menggunakan services mail yang ada

} else {
    $register = base_url();
    header("Location: $register");
    exit();
}
