<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    // Include the connection.php file to establish a database connection
    include("connection.php");

    // Retrieve user input from the form
    $name = $_POST["names"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["id_password"];

    // You should validate and sanitize the input data here before inserting it into the database.

    // Example: Sanitizing email and password
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    $password = password_hash($password,PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $password);

    if ($stmt->execute()) {
        // Registration successful
        
        echo "<script>alert('Registration successful. You can now log in!')</script>";
        echo"<script>window.open('Login.php','_self')</script>";
       
    } else {
        // Registration failed
        echo "Registration failed. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle cases when the form is not submitted via POST
    echo "Form submission error.";
}
?>
