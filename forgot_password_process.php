<?php
include("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    try {
        // Load PHPMailer autoloader and instantiate PHPMailer object
        require 'mail/src/Exception.php';
        require 'mail/src/PHPMailer.php';
        require 'mail/src/SMTP.php';
        $code = substr(str_shuffle('123456789QWERTYUIOPASDFGHIJKLZCV'), 0, 10);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'spotsmartweb@gmail.com';
        $mail->Password   = 'dind fqfu wiwj erpa'; // Use the app password you generated
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->setFrom('spotsmartweb@gmail.com', 'SPOTSMART');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password, click 
        <a href="http://localhost:80/PROJECT/resetpas.php?code=' . $code . '">here</a>.<br>Reset Your Password in a day.';
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address');
        }
        $email = $conn->real_escape_string($email);
        // Check if the email exists in the user table
        $verifyQuery = $conn->query("SELECT * FROM users WHERE email='$email'");
        if (!$verifyQuery) {
            throw new Exception('Error executing database query: ' . $conn->error);
        }
        if ($verifyQuery->num_rows > 0) {
            // Email exists, proceed with sending the password reset email
            $codeQuery = $conn->query("UPDATE users SET code='$code', updated_time=NOW() WHERE email='$email'");
            if (!$codeQuery) {
                    throw new Exception('Error updating code and time in the database: ' . $conn->error);
            }

       // Continue with sending the email
        } else {
            // Email not found in the database
            echo 'Email not found in the database';
            $conn->close(); // Close the database connection
            exit(); // Exit the script
        }
     // Send the email
        $success = $mail->send();
         if ($success) {
            echo 'Password reset email sent. Check your email for instructions.';
        } else {
            throw new Exception('Error sending email: ' . $mail->ErrorInfo);
        }
// Close the database connection
        $conn->close();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        error_log($e->getTraceAsString());
    }
} else {
    exit();
    
}
?>
