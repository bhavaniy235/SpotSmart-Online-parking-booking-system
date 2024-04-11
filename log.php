<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include("connection.php");
    // Retrieve user input from the login form
    $email = $_POST["email"];
    $password = $_POST["password"];
    // Query the database to check if the user exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        $stored_password_hash = $row['password'];
        if (password_verify($password, $stored_password_hash)) {
        // Password is correct, log in the user
        session_start();
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_name'] = $row['name']; 
        header("Location: user1.php"); // Redirect to the dashboard or another page
        exit();
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid password. Please try again.');</script>";
            echo"<script>window.open('Login.php','_self')</script>";
        }
    } else {
        // User not found
        echo "<script>alert('User not found. Please check your email and try again.');</script>";
        echo"<script>window.open('Login.php','_self')</script>";
    }
    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
