<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2F4F4F;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        header {
            background-color: #3498db;
            padding: 50px;
            text-align: center;
            width: 100%;
            color: white;
            font-size: 24px;
        }

        h2 {
            margin-bottom: 20px; 
            color: white;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: auto;
        }

        .container a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .container a:hover {
            background-color: #00BFFF;
        }

        .container a.logout {
            background-color: #FF0000;
        }

        .container a.logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <header>
        APLIKASI KASIR
    </header>
    <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>👋</h2>
    <div class="container">
        <a href="pengguna.php">Data Pengguna</a>
        <a href="detail_penjualan.php">Detail Penjualan</a>
        <a href="stok_barang.php">Stok Barang</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
