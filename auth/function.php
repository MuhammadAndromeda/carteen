<?php
require('../connect.php');

function register($request) {
    global $conn;
    $username = strtolower(trim($request['username'])); 

    $resultCheckUserName = mysqli_query($conn, "SELECT username FROM akun WHERE username = '$username'");
    if (mysqli_num_rows($resultCheckUserName) > 0) { 
        echo "<script>
            alert('User sudah dipakai! Ganti dengan Username lain!');
        </script>";
        return;
    }

    $pw = mysqli_real_escape_string($conn, $request['pw']);
    $pw2 = mysqli_real_escape_string($conn, $request['pw2']);

    if ($pw !== $pw2) {
        echo "<script>
            alert('Password tidak sama!');
        </script>";
        return;
    }

    $pw = password_hash($pw, PASSWORD_DEFAULT);
    $pw2 = password_hash($pw2, PASSWORD_DEFAULT);

    $isAdmin = $_GET['seller'];

    if (isset($_POST['role'])) {
        $role = $_POST['role'];
    
        if ($role === '1') {
            $isAdmin = true; 
        } elseif ($role === '0') {
            $isAdmin = false;
        }
    }

    $result = mysqli_query($conn, "INSERT INTO akun(username, pw, seller) VALUES('$username', '$pw', '$isAdmin')");
    if ($result) {
        echo "<script>
                alert('Berhasil membuat akun! Silakan login ulang');
                window.location.replace('login.php');
            </script>";
    }

}

function login($request) {
    global $conn;

    // Ambil username & password dari input
    $username = trim($request['username']);
    $pw = $request['pw'];

    // Query untuk mendapatkan data user berdasarkan username
    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1) {
        // Ambil data user
        $dataFetch = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($pw, $dataFetch['pw'])) {
            // Set sesi login
            session_start();
            $_SESSION['login'] = true;
            
            if ($dataFetch['seller'] == 1) {
                header('location: ../adminmarket.php');
                exit;
            } elseif ($dataFetch['seller'] == 0) {
                header('location: ../usermarket.php');
                exit;
            } else{
                echo "<script>
                alert('Data Tidak Ditemukan!');
            </script>";
            }
            
        } else {
            // Password tidak sesuai
            echo "<script>
                alert('Password salah!');
            </script>";
            return;
        }
    } else {
        // Username tidak ditemukan
        echo "<script>
            alert('Username tidak sesuai!');
        </script>";
        return;
    }
}
