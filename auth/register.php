<?php
include('function.php');

if(isset($_POST['register'])) {
    register($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/register.css">
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
            <h3>Please Register Your Account</h3>
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
                        <div>
                            <label for="password"> Confirm Password</label>
                            <input type="password" name="pw2" id="pw2" placeholder="Confirm your password" required>
                        </div>
                        <div>
                            <label for="role">What is Your Role?</label>
                            <select name="role" id="role">
                                <option value="" disabled selected>-- Select Role</option>
                                <option value="1" name="seller" id="seller">Seller</option>
                                <option value="0" name="customer" id="customer">Customer</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="register">Sign In</button>
                    <p>Already Have Account? <a href="login.php">Log In</a></p>
                </ul>
            </form>
        </div>
    </form>
</body>
</html>