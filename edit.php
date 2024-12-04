<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

include('connect.php');

$id = $_GET['id'];

$queryData = "SELECT * FROM products WHERE id = '$id'";

$result = mysqli_query($conn, $queryData);

while($loop = mysqli_fetch_assoc($result)) {
    $data = $loop;
}

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['descript'];
    $sellerName = $_POST['nama'];

    $result = mysqli_query($conn, "UPDATE products SET title='$title', price='$price', descript='$description', nama='$sellerName' WHERE id=$id");

    if($result) {
        echo "<script>
            alert ('Data Berhasil Di Update')
            document.location.href='adminmarket.php'
        </script>";
    } else {
    echo "<script>
            alert('Data Gagal Di Update')
        </script>";
    }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit your Product</title>
    <link rel="stylesheet" href="css/edit.css">
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

        nav a:hover{
            color: #1b5f1b;
            background-color: white;
            border: 3px solid white;
        }
    </style>
</head>
<body>
    <nav>
        <a href="adminmarket.php">Home</a>
        <h1>CARTEEN MARKETPLACE</h1>
        <a href="create.php">Add Product</a>
    </nav>
    <section class="edit">
        <form action="" method="post">
            <div class="inp">
                <label for="">Title :</label>
                <input type="text" name="title" id="title" value=<?= $data['title']?>>
            </div>

            <div class="inp">
                <label for="">Price :</label>
                <input type="number" name="price" id="price" value=<?= $data['price']?>>
            </div>

            <div class="inp">
                <label for="">Description :</label>
                <input type="text" name="descript" id="descript" value=<?= $data['descript']?>>
            </div>    
            
            <div class="inp">
                <label for="">Seller Name :</label>
                <input type="text" name="nama" id="nama" value=<?= $data['nama']?>>
            </div>
            <button type="submit" name="submit">Edit Product</button>
        </form>
    </section>
</body>
</html>