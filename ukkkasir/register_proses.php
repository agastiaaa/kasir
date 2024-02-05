<?php
// $koneksi = new mysqli("localhost", "root", "", "kasirrr");
session_start();
include 'koneksi.php';

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password']; 
$role = $_POST['role'];

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
$result = $koneksi->query($sql);

if ($result) {
    header("Location: administrator/pengguna.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
