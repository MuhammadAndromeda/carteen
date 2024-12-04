<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

require('connect.php');
$query = mysqli_query($conn, 'SELECT * FROM products');
$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    <link rel="stylesheet" href="css/adminmarket.css">
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

        table{
            width: 100vw;
            height: auto;
            border-radius: 30px;
            padding: 30px 30px;
            background-color: #1b5f1b;
        }

        table thead tr th{
            width: 20vw;
            height: auto;
            padding: 10px 20px;
            color: white;
            border: none;
            text-align: center;
            font-size: 20px;
            background-color: rgba(0,0,0,0.5);
            border-radius: 5px;
        }

        tbody tr td{
            width: 15vw;
            padding: 10px 10px;
            color: white;
            border: none;
            text-align: center;
            font-size: 15px;
            background-color: rgba(0,0,0,0.5);
            border-radius: 5px;
        }

        tbody td a{
            width: 10vw;
            padding: 5px 0;
            border: 2px solid white;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            color: white;
            background-color: transparent;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        tbody td button{
            width: 10vw;
            padding: 5px 0;
            border: 2px solid white;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            text-align: center;
            color: white;
            background-color: transparent;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        tbody td a:hover, tbody td button:hover{
            border: 2px solid white;
            color: #1b5f1b;
            background-color: white;
        }
    </style>
</head>
<body>
    <nav>
        <form action="auth/logout.php" method="post">
            <button type="submit">Log Out</button>
        </form>
        <h1>CARTEEN MARKETPLACE</h1>
        <a href="create.php">Add Product</a>
    </nav>
    <section class="admin">
        <table border="1" cellpadding="3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Seller Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($baris = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $baris['title']; ?></td>
                    <td><?php echo $baris['price']; ?></td>
                    <td><?php echo $baris['descript']; ?></td>
                    <td><?php echo $baris['nama']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $baris['id']; ?>">Edit</a>
                    </td>
                    <td>
                        <form action="delete.php" method="post">
                            <!-- Input tidak telihat dan tidak bisa diubah, hanya untuk mengirim ID -->
                            <input readonly type="hidden" name="id" value="<?= $baris['id']; ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </section>
</body>
</html>