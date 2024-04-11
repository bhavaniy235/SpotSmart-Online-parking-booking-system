<?php
include("connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $carnumber = isset($_POST['carnumber']) ? $_POST['carnumber'] : '';
    $_SESSION['username'] = $username;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['carnumber'] = $carnumber;
    header("Location: payment.php");
    exit();
} else {
    echo "Invalid request";
}
?>
