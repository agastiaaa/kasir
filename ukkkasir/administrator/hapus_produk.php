<?php
session_start();
include '../koneksi.php';

if(isset($_GET["id"])) {
    $produk_id = $_GET["id"];

    $sql = "DELETE FROM produk WHERE ProdukID = $produk_id";

    if (mysqli_query($koneksi, $sql)) {
        echo "Data produk berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    echo "ID Produk tidak ditemukan.";
}
header("Location: stok_barang.php");
exit();
?>