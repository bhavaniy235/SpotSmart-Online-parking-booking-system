<?php
include("connection.php");

// Assuming you have a POST request with JSON data
$requestData = json_decode(file_get_contents('php://input'), true);

// Move data from the booking table to the accepted table
$bookingID = $requestData['BookingID']; // Assuming BookingID is a unique identifier
$query = "INSERT INTO rejected_table SELECT * FROM bookings WHERE BookingID = '$bookingID'";
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
include("mailing/test2.php");
sendEmail($userEmail, "Booking Rejected", "Your slot has been rejected. Please provide accurate details or your opted slot is currently unavailable .Thank you!");
// Return success (if needed)
header('Content-Type: application/json');
echo json_encode(['message' => 'Data moved to accepted table']);
mysqli_close($conn);
?>
