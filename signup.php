<?php
include("connection.php");
?>
<html>
<head>
<link rel="stylesheet" href="signup.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
<div id="main-container">
    <div id="form-container">
        <div id="content">
            <span class="title-text">SIGNUP</span>
            <form id="signup-form" action="signsup.php" method="post">
            <div class="field">
                    <input required="" type="text" name="names" id="name">
                    <label>Name</label>
                </div>
                <div class="field">
                    <input required="" type="email" name="email" id="email" >
                    <label>Email</label>
                </div>
                <div class="field">
                    <input required="" type="text" name="phone"  pattern="[1-9]{1}[0-9]{9}">
                    <label>Mobile Number</label>
                </div>
                  
                <div class="field">
                    <input required="" type="password" id="id_password" name="id_password">
                    <label>Password </label>
                </div>
                
                <button id="signup">CONFIRM</button>
               </div>
               
            </form>
        </div>
    </div>
</div>
</body>
</html>
