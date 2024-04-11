<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include the PHPMailer autoloader

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        require 'mail/src/Exception.php';
        require 'mail/src/PHPMailer.php';
        require 'mail/src/SMTP.php';

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'spotsmartweb@gmail.com'; // SMTP username
        $mail->Password = 'dind fqfu wiwj erpa'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('spotsmartweb@gmail.com', 'SPOTSMART'); // Replace with your email address and name
        $mail->addAddress($to); // Add a recipient

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Example usage
$to = 'recipient@example.com';
$subject = 'Test Email';
$message = '<p>This is a test email.</p>';
sendEmail($to, $subject, $message);
?>
