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
</head>
<body>
    <nav>
        <a href="adminmarket.php">All Products</a>
        <h1>CARTEEN MARKETPLACE</h1>
        <a href="edit.php">Edit Product</a>
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