<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

include('connect.php');
    
if(isset($_GET['submit'])) {
    $id = '';
    $title = $_GET['title'];
    $price = $_GET['price'];
    $description = $_GET['descript'];
    $sellerName = $_GET['nama'];

    $query = mysqli_query($conn, "INSERT INTO products(id, title, price, descript, nama) VALUES ('$id', '$title', '$price', '$description', '$sellerName')");

    if($query) {
        header('location: adminmarket.php');
    };
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Product</title>
    <link rel="stylesheet" href="css/create.css">
    <style>
        nav a{
            width: 15vw;
            padding: 10px 0;
            color: white;
            text-decoration: none;
            text-align: center;
            font-size: 1rem;
            font-weight: 500;
            border: 3px solid white;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover, nav a:focus{
            color: #1b5f1b;
            background-color: white;
            border: 3px solid white;
            box-shadow: 0px 0px 10px 1px white;
        }

        nav form{
            width: max-content;
            height: max-content;
            padding: 10px;
            box-shadow: none;
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
        <a href="adminmarket.php">Home</a>
        <h1>CARTEEN MARKETPLACE</h1>
        <form action="auth/logout.php" method="post">
            <button type="submit">Log Out</button>
        </form>
    </nav>
    <section class="create">
        <form action="create.php" method="get">
            <div class="inp">
                <label for="">Title :</label>
                <input type="text" name="title" id="title">
            </div>

            <div class="inp">
                <label for="">Price :</label>
                <input type="number" name="price" id="price">
            </div>

            <div class="inp">
                <label for="">Description :</label>
                <input type="text" name="descript" id="descript">
            </div>    
            
            <div class="inp">
                <label for="">Seller Name :</label>
                <input type="text" name="nama" id="nama">
            </div>
            <button type="submit" name="submit">Add Product</button>
        </form>
    </section>
</body>
</html>