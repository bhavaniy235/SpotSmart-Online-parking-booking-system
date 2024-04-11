<?php
include("connection.php");
// Assuming you have a POST request with JSON data
$requestData = json_decode(file_get_contents('php://input'), true);
// Move data from the booking table to the accepted table
$bookingID = $requestData['BookingID']; // Assuming BookingID is a unique identifier
$query = "INSERT INTO accepted_table SELECT * FROM bookings WHERE BookingID = '$bookingID'";
$result = mysqli_query($conn, $query);
// Check for errors
if (!$result) {
    die("Error moving data to accepted table: " . mysqli_error($conn));
}
$emailQuery = "SELECT user_email FROM bookings WHERE BookingID = '$bookingID'";
$emailResult = mysqli_query($conn, $emailQuery);

if (!$emailResult) {
    die("Error fetching email address: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($emailResult);
$userEmail = $row['user_mail'];
// Delete the row from the booking table
$query = "DELETE FROM bookings WHERE BookingID = '$bookingID'";
$result = mysqli_query($conn, $query);
// Check for errors
if (!$result) {
    die("Error deleting data from booking table: " . mysqli_error($conn));
}
include('smtp/PHPMailerAutoload.php');
function sendEmail($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "spotsmartweb@gmail.com";
	$mail->Password = "dind fqfu wiwj erpa";
	$mail->SetFrom("spotsmartweb@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}
echo $userEmail;
sendEmail($userEmail, "Booking Accepted", "Your slot has been accepted. Thank you!");
// Close the connection
// Return success (if needed)
header('Content-Type: application/json');
echo json_encode(['message' => 'Data moved to accepted table']);
mysqli_close($conn);
?>
