<?php 
include("connection.php");
?>
<html>
<head>
<link rel="stylesheet" href="login.css">
</head>
<body>
<div id="main-container">
    <div id="form-container">
        <div id="content">
            <span class="title-text">Login</span>
            <form id="login-form" action="log.php" method="post">
                <div class="field">
                    <input required="" type="text" name="email" id="email">
                    <label>Email</label>
                </div>
                <div class="field">
                    <input required="" type="password" name="password" id="password">
                    <label>Password</label>
                </div>
                <div id="action">
                    <label><input type="checkbox">Remember me</label>
                    <a id="forget" href="forgot_password.html">Forgot password?</a>
                </div>
                <button id="login">Login</button>
                <div id="signup">Don't have an Account?
                    <a href="signup.php">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
