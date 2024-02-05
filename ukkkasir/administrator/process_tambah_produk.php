<?php
include '../koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    
    $sql = "INSERT INTO produk (NamaProduk, Harga, Stok) VALUES ('$nama_produk', '$harga', '$stok')";

     if (mysqli_query($koneksi, $sql)) {
        header("Location: stok_barang.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    header("Location: tambah_produk.php");
}
?>