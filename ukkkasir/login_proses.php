<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['UserID'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['role'] = $row['Role'];

        if ($_SESSION['role'] == 'admin') {
            header("Location: administrator/index.php");
        } elseif ($_SESSION['role'] == 'petugas') {
            header("Location: petugas/index.php");
        }
        exit();
    } else {
        echo "Username atau Password salah";
    }
}
?>
