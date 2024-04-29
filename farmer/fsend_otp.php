<?php
session_start();
require('../sql.php'); // Includes Login Script
require 'C:\xampp\htdocs\agriculture-portal-main\vendor\autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_SESSION['farmer_login_user'];
$res = mysqli_query($conn, "SELECT * FROM farmerlogin WHERE email='$email'");
$count = mysqli_num_rows($res);

if ($count > 0) {
    $otp = rand(11111, 99999);
    mysqli_query($conn, "UPDATE farmerlogin SET otp='$otp' WHERE email ='$email'");
    $html = "Your otp verification code for Agriculture Portal is " . $otp;
    $_SESSION['farmer_login_user'];
    smtp_mailer($email, 'OTP Verification', $html);
    echo "yes";
} else {
    echo "not exist";
}

function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer(true); // Passing 'true' enables exceptions

    try {
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'bandidinesh503@gmail.com';
        $mail->Password = 'aurd fmwh hwpj dhzq';
        $mail->setFrom('bandidinesh503@gmail.com' , "Agriculture Portal");
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $subject;
        $mail->Body = $msg;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
