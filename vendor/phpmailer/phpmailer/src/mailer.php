<?php
require 'C:\xampp\htdocs\agriculture-portal-main\vendor\autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Enable verbose debug output
$mail->SMTPDebug = 2;

// Set mailer to use SMTP
$mail->isSMTP();

// Specify SMTP host
$mail->Host = 'smtp.gmail.com';

// Enable SMTP authentication
$mail->SMTPAuth = true;

// SMTP username
$mail->Username = 'agricultureportal@gmail.com';

// SMTP password
$mail->Password = 'app password';

// Enable TLS encryption; `PHPMailer::ENCRYPTION_STARTTLS` encouraged
$mail->SMTPSecure = 'tls';

// TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above
$mail->Port = 587;

// Set sender and recipient
$mail->setFrom("agricultureportal@gmail.com", "Agriculture Portal");
$mail->addAddress('recievermail@gmail.com', 'reciver_name');

// Set email subject and body
$mail->Subject = 'Test Email via PHPMailer';
$mail->Body    = 'This is a test email sent using PHPMailer.';

// Send the email
if (!$mail->send()) {
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent successfully!';
}
?>
