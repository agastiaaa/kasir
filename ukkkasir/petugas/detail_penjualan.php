<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Penjualan</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #2F4F4F;
    margin: 0;
    padding: 20px;
}

.container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 30px;
    width: 70%;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: white;
}

table {
    width: 80%;
    border-collapse: collapse;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    margin: 0 auto;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #3498db;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.button1 {
    text-align: center; 
}

.button {
    background-color: #3498db;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
}

.button:hover {
    background-color: #2980b9;
}

</style>
</head>
<body>

<h2>Detail Penjualan</h2>
<div class="container">
<table>
  <thead>
    <tr>
      <th>DetailID</th>
      <th>Tanggal</th>
      <th>JumlahProduk</th>
      <th>JumlahProduk</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <!-- Isi tabel dengan data dari database menggunakan PHP -->
    <?php
    include '../koneksi.php';
    $sql = "SELECT detailpenjualan.*,penjualan.TanggalPenjualan, produk.NamaProduk 
    FROM detailpenjualan 
    LEFT JOIN penjualan ON detailpenjualan.PenjualanID=penjualan.PenjualanID 
    LEFT JOIN produk ON detailpenjualan.ProdukID=produk.ProdukID
    GROUP BY detailpenjualan.DetailID";
    $result = mysqli_query($koneksi, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['DetailID'] . "</td>";
            echo "<td>" . $row['TanggalPenjualan'] . "</td>";
            echo "<td>" . $row['NamaProduk'] . "</td>";
            echo "<td>" . $row['JumlahProduk'] . "</td>";
            echo "<td>" . $row['Subtotal'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Tidak ada data detail penjualan.</td></tr>";
    }
    mysqli_close($koneksi);
    ?>
  </tbody>
</table>
</div>
<div class="button1">
<a href="index.php" class="button">Kembali ke Dashboard</a>
</div>
</body>
</html>
