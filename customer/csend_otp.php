<?php
session_start();
require('../sql.php'); // Includes Login Script

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_SESSION['customer_login_user'];
$res = mysqli_query($conn, "SELECT * FROM custlogin WHERE email='$email'");
$count = mysqli_num_rows($res);

if ($count > 0) {
    $otp = rand(11111, 99999);
    mysqli_query($conn, "UPDATE custlogin SET otp='$otp' WHERE email ='$email'");
    $html = "Your OTP verification code for Agriculture Portal is  " . $otp;

    if (smtp_mailer($email, 'OTP Verification', $html)) {
        echo "yes";
    } else {
        echo "Error sending OTP email";
    }
} else {
    echo "User does not exist";
}

function smtp_mailer($to, $subject, $msg)
{
	require 'C:\xampp\htdocs\agriculture-portal-main\vendor\autoload.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->Username = 'bandidinesh503@gmail.com';
        $mail->Password = 'aurd fmwh hwpj dhzq';
        $mail->setFrom('bandidinesh503@gmail.com' , "Agriculture Portal");
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $subject;
        $mail->Body = $msg;

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}
?>
