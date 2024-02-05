<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Stock Barang</title>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #2F4F4F;
            margin: 0;
            color: #fff;
            height: 100vh;
    }

     .container {
            background-color: #fff;
            margin: 20px;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


    h2 {
        text-align: center;
        color: #FFF;
    }

    button {
        padding: 10px;
        margin: 5px;
        background-color: #3498db;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
        color: black;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    a {
        text-decoration: none;
        color: #3498db;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<h2>Stok Barang</h2>
<div class="container">
        <button onclick="location.href='index.php'">kembali ke halaman utama</button>
        <button onclick="location.href='tambah_produk.php'">Tambah Produk Baru</button>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>aksi</th>
            </tr>

            <?php
            session_start();
            include '../koneksi.php';
            $sql = "SELECT ProdukID, NamaProduk, Harga, Stok FROM produk";
            $result = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["ProdukID"] . "</td>";
                    echo "<td>" . $row["NamaProduk"] . "</td>";
                    echo "<td>" . $row["Harga"] . "</td>";
                    echo "<td>" . $row["Stok"] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_barang.php?id=" . $row["ProdukID"] . "'>Edit</a> | ";
                    echo "<a href='hapus_produk.php?id=" . $row["ProdukID"] . "'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }

            mysqli_close($koneksi);
            ?>
        </table>

    </div>
 </table>