<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

require('connect.php');

$cart = mysqli_query($conn, "SELECT * FROM cart");
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="css/cart.css">
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
            width: 100%;
            height: auto;
            padding: 30px 30px;
            background-color: #1b5f1b;
        }

        table thead tr th{
            width: 15vw;
            height: 10vh;
            padding: 5px 0;
            color: white;
            border: none;
            text-align: center;
            font-size: 20px;
            background-color: rgba(0,0,0,0.5);
            border-radius: 5px;
        }

        tbody tr td{
            width: 15vw;
            padding: 20px 10px;
            color: white;
            border: none;
            text-align: center;
            font-size: 15px;
            background-color: rgba(0,0,0,0.5);
            border-radius: 5px;
        }

        tbody td a, tbody td button{
            width: 10vw;
            padding: 5px 0;
            margin-right: 10px;
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
        <a href="usermarket.php">Home</a>
        <h1>CARTEEN MARKETPLACE</h1>
        <form action="auth/logout.php" method="post">
            <button type="submit">Log Out</button>
        </form>
    </nav>
    <section class="cart">
        <table border="1" cellpadding="3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Seller Name</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($lined = mysqli_fetch_assoc($cart)) { ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $lined['title']; ?></td>
                    <td><?php echo $lined['price']; ?></td>
                    <td><?php echo $lined['descript']; ?></td>
                    <td><?php echo $lined['nama']; ?></td>
                    <td>
                        <form action="deletecart.php" method="post">
                            <input type="hidden" name="id" value="<?= $lined['id']; ?>">
                            <button type="submit" name="cart">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </section>
</body>
</html>