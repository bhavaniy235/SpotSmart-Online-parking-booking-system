<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingID = $_POST["bookingID"];
    $email = $_POST["email"];
    $contactNumber = $_POST["contactNumber"];
    $message = $_POST["message"];

    // Perform necessary validation and sanitization

    // Insert the data into your database or perform any other backend operation
    // Example using MySQLi:
 
    $sql = "INSERT INTO compliants (bookingID, email, contactNumber, message) VALUES ('$bookingID', '$email', '$contactNumber', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
}
?>
