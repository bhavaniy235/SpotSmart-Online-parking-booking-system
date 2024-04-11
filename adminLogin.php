<?php 
    include("connection.php");
?>
<html>
<head>
<link rel="stylesheet" href="adminLogin.css">
</head>
<body >
<div id="main-container">
    <div id="form-container">
        <div id="content">
            <span class="title-text">Admin Login</span>
            <form name="form" id="form" action="adminslog.php" method="POST">
                <div class="field">
                   <input type="email" id="email" name="email">
                   <label for="email">Email</label>
                </div>
                <div class="field">
                <input type="password" id="pass" name="pass">
                    <label for="pass">Password</label>
                   </div><br>
                <button id="login">Login</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
