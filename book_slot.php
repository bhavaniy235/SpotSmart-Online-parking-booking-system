<?php
include("connection.php"); 
session_start();
// Assuming this file contains your database connection details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bookingDate = isset($_POST['bookingDate']) ? $_POST['bookingDate'] : '';
    $startTime = isset($_POST['startTime']) ? $_POST['startTime'] : '';
    $endTime = isset($_POST['endTime']) ? $_POST['endTime'] : '';
    $block = isset($_POST['block']) ? $_POST['block'] : '';
    $slot = isset($_POST['slot']) ? $_POST['slot'] : '';
    $totalPrice = isset($_POST['totalPrice']) ? $_POST['totalPrice'] : '';
    // Now you have the form data in PHP variables
    // You can perform any desired operations with these variables
    // For example, you can store them in a file, session, or perform additional processing.
    // Store data in a file (for example, data.txt)
    $_SESSION['bookingDate'] = $bookingDate;
    $_SESSION['startTime'] = $startTime;
    $_SESSION['endTime'] = $endTime;
    $_SESSION['block'] = $block;
    $_SESSION['slot'] = $slot;
    $_SESSION['totalPrice'] = $totalPrice;
    // Now you can access these session variables on other pages
    // For example, echo $_SESSION['bookingDate']; to display the booking date
    // You can also redirect to another page if needed
    header("Location: user2.php");
    exit();
} else {
    echo "Invalid request";
}
?>

