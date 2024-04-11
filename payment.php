<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    #main-container {
    display: flex;
    position: relative;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
     background-image:url("Smp.jpg");
     background-size:cover;
}
#form-container {
    width: 350px;
    display: flex;
    position: relative;
}
input:focus {
    outline: none;
}
#content {
    font-size: 2rem;
    border: 1px solid #626262c2;
    padding: 1.5rem;
    width: 100%;
    border-radius: 15px;
    background:#62626212;
    backdrop-filter: blur(30px);
    font-family: calibri;
}

.title-text {
    display: block;
    text-align: center;
    color: white;
}
#login {
    padding: 6px 18px;
    border-radius: 30px;
    font-weight: bold;
    width: 100%;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    background:#ffffff;
    transition: .3s;
}
</style>
</head>
<body>
<div id="main-container">
    <div id="form-container">
        <div id="content">
            <span class="title-text">Scan and Pay</span>
            <form id="login-form" action="final2.php" method="post">
              <div> <img width="300px" height="500" src="qr.jpg"></div>
                <button id="login">done</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>