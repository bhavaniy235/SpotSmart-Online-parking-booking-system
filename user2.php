<?php
include("connection.php");
?>
<?php
session_start();
if (isset($_SESSION['user_email']) && isset($_SESSION['user_name'])) {
    $user_email = $_SESSION['user_email'];
    $user_name = $_SESSION['user_name'];
} else {
    // If the user is not logged in, handle it accordingly (e.g., redirect to the login page)
    echo "something went wrong";
    exit();
}
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style1.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <header class="header">
            &emsp; &emsp;&emsp; <a href="#" class="logo"><img src="IMG_20231001_062437.jpg"></a>
    </header>
    <center><h1>BOOK SLOT</h1></center>
        <table border=0 width="80%" cellpadding="30" cellspacing="40">
          <tr>
            <td class="forbg" width="30%" height="100"><div class="forborder"> <center><h2><?php echo "Welcome  $user_name";?></h2>
              <h5><?php echo "$user_email";?></h5><a href="ss2.html">LOGOUT</a></center></div></td>
            <td class="forbg" width="70%" rowspan="4">
    <div class="forborder">
        <h2 class="user2">Fill the below Details to proceed the payment</h2>
        <form action="process_booking.php" method="post">
            <label for="username">Customer Name<font color="red">*</font></label>
            <input type="text" id="username" name="username" required>
            <label for="mobile">Mobile Number(10 digits)<font color="red">*</font></label>
            <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
            <label for="carnumber">Vehicle Number<font color="red">*</font></label>
            <input type="text" id="carnumber" name="carnumber" required>
            <input type="submit" value="PROCEED THE PAYMENT">
        </form>
    </div>
          </td>
          </tr>
          <tr>
          </tr>
        <tr>
        </tr>
        <tr>
        </tr>
      </table>
</body>
</html>