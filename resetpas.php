<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection parameters
    $host = "localhost"; // replace with your database host
    $user = "root"; // replace with your database username
    $password = ""; // replace with your database password
    $database = "spotsmart"; // replace with your database name

    // Establish a connection to the database
    $conn = mysqli_connect($host, $user, $password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    // Process the password reset
    $emailInput = mysqli_real_escape_string($conn, $_POST["email"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["new_password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    // Check if all fields are filled in
    if (!empty($emailInput) && !empty($newPassword) && !empty($confirmPassword)) {
        // Validate the new password and confirm password
        if ($newPassword == $confirmPassword) {
            // Check if the code is provided in the URL
            if (isset($_REQUEST['code'])) {
                $code = $_REQUEST['code']; // Use $_REQUEST instead of $_GET

                // Assuming you have a valid database connection here
                $code = mysqli_real_escape_string($conn, $code);
                $verifyQuery = mysqli_query($conn, "SELECT * FROM users WHERE code='$code' AND email='$emailInput' AND updated_time >= DATE_SUB(NOW(), INTERVAL 1 DAY)");

                if ($verifyQuery !== false) {
                    $row = mysqli_fetch_assoc($verifyQuery);
                    if ($row) {
                        // The code is valid, proceed with password change
                        $hashedPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
                        
                        // Update the user's password and update_time in the database
                        $updateQuery = "UPDATE `users` SET password = '$hashedPassword', updated_time = NOW() WHERE email='$emailInput'";
                        $result = mysqli_query($conn, $updateQuery);

                        if ($result) {
                            // Redirect to the index page after password reset
                            header('Location: Login.php');
                            exit;
                        } else {
                            // Handle the error
                            echo "Error updating password: " . mysqli_error($conn);
                        }
                    } else {
                        // Invalid or expired code
                        echo "Invalid or expired code";
                    }
                } else {
                    // Handle the database query error
                    echo "Error querying database: " . mysqli_error($conn);
                }
            } else {
                // Code not provided in the URL
                echo "Code not provided";
            }
        } else {
            $error = "Passwords do not match.";
        }
    } else {
        $error = "Please fill in all fields.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <style>
         body {
            background-image: url('Smp.jpg');
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #fff;
        }

        h1 {
            color: #fff;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ccc;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if (isset($result) && $result) : ?>
            <p class="success">Password reset and updated in the database.</p>
        <?php else : ?>
            <p>Password not updated in the database.</p>
        <?php endif; ?>
        <form action="resetpas.php?code=<?php echo urlencode($_GET['code']); ?>" method="post">
            <input type="hidden" name="code" value="<?php echo urlencode($_GET['code']); ?>">
            
            <label for="email">Email:</label>
            <input type="text" name="email" required>
            
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required>
            
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>
            
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
