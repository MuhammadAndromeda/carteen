<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteen MarketPlace</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        nav form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        nav form button{
            width: 15vw;
            padding: 10px 0;
            color: white;
            background-color: transparent;
            border: 2px solid white;
            border-radius: 30px;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        nav form button:hover, .navbar form button:focus{
            color: #1b5f1b;
            background-color: white;
            box-shadow: 0px 0px 10px 1px white;
        }
    </style>
</head>
<body>
    <nav>
        <a href="usermarket.php">All Products</a>
        <h1>CARTEEN MARKETPLACE</h1>
        <form action="auth/logout.php" method="post">
            <button type="submit">Log Out</button>
        </form>
    </nav>
    <section class="home">
        <div class="container">
            <h1>Welcome To CARTEEN MarketPlace</h1>
            <div class="tombols">
                <a href="usermarket.php">See All Product</a>
                <a href="adminmarket.php">Carteen Store</a>
            </div>
        </div>
    </section>
</body>
</html>