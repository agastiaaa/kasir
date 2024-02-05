<?php
include '../koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat = $_POST["alamat"];
    $nomor_telepon = $_POST["nomor_telepon"];

    $sql = "INSERT INTO pelanggan (PelangganID, NamaPelanggan, alamat, NomorTelepon) VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$nomor_telepon')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: pembelian.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    header("Location: tambah_pelanggan.php");
}
?>
