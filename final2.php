<?php
include("connection.php");
session_start();

// Check if data is received from the previous page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the expected keys exist in the $_POST array
    $user_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : null;
    $user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : null;
    $bookingDate = isset($_SESSION["bookingDate"]) ? $_SESSION["bookingDate"] : '';
    $startTime = isset($_SESSION["startTime"]) ? $_SESSION["startTime"] : '';
    $endTime = isset($_SESSION["endTime"]) ? $_SESSION["endTime"] : '';
    $block = isset($_SESSION["block"]) ? $_SESSION["block"] : '';
    $slot = isset($_SESSION["slot"]) ? $_SESSION["slot"] :'';
    $totalPrice = isset($_SESSION["totalPrice"]) ? $_SESSION["totalPrice"] : '';
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : '';
    $mobile = isset($_SESSION["mobile"]) ? $_SESSION["mobile"] : '';
    $carnumber = isset($_SESSION["carnumber"]) ? $_SESSION["carnumber"] : '';

    // Insert data into the bookings table
    $sql = $conn->prepare("INSERT INTO bookings (user_email, user_name, booking_Date, start_Time, end_Time, block, selected_slot, total_Price, customer_name, mobile_number, vehicle_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
// Bind parameters
$sql->bind_param("sssssssssss", $user_email, $user_name, $bookingDate, $startTime, $endTime, $block, $slot, $totalPrice, $username, $mobile, $carnumber);

// Execute the statement
// Execute the statement
if ($sql->execute()) {
    echo "<script>alert('Booking successful check your email!');
    window.location.href = 'ss2.html';</script>";
   
} else {
    echo "Error: " . $sql->error;
}


} else {
    // If data is not received, handle it accordingly
    echo "No data received from the previous page.";
}

$conn->close();
?>
