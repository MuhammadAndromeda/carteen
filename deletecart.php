<?php
include('connect.php');

if(isset($_POST['id']) && !empty($_POST['id'])) {
    // Tangkap id lalu taruh di variable
    $id = $_POST['id'];

    // Hapus data berdasarkan id
    $result = mysqli_query($conn, "DELETE FROM cart WHERE id = $id");

    if($result) {
        echo "<script>
            alert ('Data Berhasil Di Hapus');
            window.location.replace('cart.php');
        </script>";
    } else {
        echo "<script>
            alert ('Data Gagal Di Hapus');
            window.location.replace('cart.php');
        </script>";
    }
}
?>