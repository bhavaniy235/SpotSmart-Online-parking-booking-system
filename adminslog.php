<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection script
    include("connection.php");
    // Get the submitted email and password
    $emailaddress = $_POST['email'];
    $password = $_POST['pass'];
    // Perform basic validation (you should improve this)
    if (empty($emailaddress) || empty($password)) {
    // Handle validation errors here (e.g., display an error message)
        echo "Please enter both email and password.";
    } else {
        // Perform a more secure query using prepared statements
        $sql = "SELECT * FROM admin WHERE EMAIL=? AND PASSWORD=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $emailaddress, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
         if (mysqli_num_rows($result) == 1) {
            // Login successful
            header("Location: adminFinal.html");
        } else {
            // Login failed // header("Location: adminLogin.php");
            echo "Invalid email or password. Please try again.";
        }// Close the prepared statement
        mysqli_stmt_close($stmt);
    }// Close the database connection
    mysqli_close($conn);
}
?>
