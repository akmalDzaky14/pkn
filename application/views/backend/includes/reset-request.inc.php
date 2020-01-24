<?php
//include phpmailer files
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
//define name space
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//koneksi ke database
require 'dbHandler.inc.php';
$userEmail = $_POST["email"];

if (isset($_POST["reset-Pass-request"])) {

    $sql = "SELECT uid FROM user_list WHERE email=?";
    $stmt = $this->db->call_function('stmt_init', $conn);
    if (!$this->db->call_function('stmt_prepare', $stmt, $sql)) {
        $register = base_url("index.php/backend/forgot?error=sqlerror");
        header("Location: $register");
        // echo ("Error description: " . $mysqli->error);
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $userEmail);
        $this->db->call_function('stmt_execute', $stmt);
        $this->db->call_function('stmt_store_result', $stmt);
        $checkResult = $this->db->call_function('stmt_num_rows', $stmt);
        if ($checkResult == 1) {

            //enkripsi token
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            //url untuk ganti password. ganti url sesuai kebutuhan, disini karena menggunakan CI jadi perhatikan controller.
            $url = "localhost/CodeIgniter/index.php/backend/resetPassword?selector=" . $selector . "&validator=" . bin2hex($token);

            //Tahun, untuk menyesuaikan waktu expire token
            $expires = date("U") + 1800;

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

            $header = "From : Developer Team <test@gmail.com>\r\n";
            $header .= "Reply To : Developer Team <test@gmail.com>\r\n";
            $header .= "Content-type: text/html\r\n";

            // //mengirim email menggunakan services mail yang ada dari github
            // //membuat instance dari phpmailer
            // $mail = new PHPMailer();
            // //define mailer to use smtp
            // $mail -> isSMTP();
            // //define smtp host
            // $mail ->Host="smtp.gmail.com";
            // //enable smtp authentication
            // $mail->SMTPAuth = "true";
            // //set type of encryption (ssl/tls)
            // $mail->SMTPSecure = "tls";
            // // set port to connect smtp
            // $mail->Port = "587";
            // // set gmail username
            // $mail -> Username = "akmaldzaky.lndi@gmail.com";
            // // set gmail password
            // $mail -> Password = "Kuhakuu1428";
            // //set email subject
            // $mail -> Subject = $subject;
            // //set sender email
            // $mail->setFrom("akmaldzaky.lndi@gmail.com");
            // // Enable HTML
            // $mail -> isHTML(true);
            // // Attachment
            // // $mail -> addAttachment('directory');
            // //email body
            // $mail -> $message;
            // //penerima
            // $mail -> addAddress("akmaldzaky.lndi@gmail.com");
            // //send email
            // if ($mail -> Send()) {
            //     echo "Email send !";
            // }else{
            //     echo "Something Wrong";
            // }
            // // close connection
            // $mail -> smtpClose();

            // dari youtube
            mail($to, $subject, $message, $header);

            $register = base_url("index.php/backend/forgot?reset=success");
            header("Location: $register");
        } elseif ($checkResult > 1) {
            $register = base_url("index.php/backend/forgot?reset=duplicateemail");
            header("Location: $register");
        } elseif ($checkResult == 0) {
            $register = base_url("index.php/backend/forgot?reset=unknowemail");
            header("Location: $register");
        }
    }
} else {
    $register = base_url();
    header("Location: $register");
    exit();
}
