<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

// Redirect user yang sudah login ke index.php
include('function.php');

if(isset($_SESSION['login'])) {
}

if(isset($_POST['login'])) {
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        form ul .teksbox div input{
            width: 20vw;
            height: 6vh;
            padding: 0 10px;
            color: black;
            font-weight: 500;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <form action="" method="post" class="login">
        <div class="container">
            <h1>WELCOME TO CARTEEN</h1>
            <h3>Please Have A Login</h3>
            <form action="" method="post">
                <ul>
                    <div class="teksbox">
                        <div>
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Enter your username" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="pw" id="pw" placeholder="Enter your password" required>
                        </div>
                    </div>
                    <button type="submit" name="login">Log In</button>
                    <p>Don't Have Account? <a href="register.php">Sign In</a></p>
                </ul>
            </form>
        </div>
    </form>
</body>
</html>