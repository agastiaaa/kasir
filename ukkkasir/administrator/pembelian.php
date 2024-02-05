<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulir Pembelian</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #2F4F4F;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    flex-direction: column;
}

h2 {
    text-align: center;
    color: #fff;
}

form {
    max-width: 400px;
    width: 100%;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

select, button {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"%3E%3Cpath d="M7 10l5 5 5-5z" /%3E%3C/svg%3E');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
}

a {
    /* display: block; */
    text-align: center;
    text-decoration: none;
    color: #fff;
    margin-top: 10px;
}

button {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    border: none;
}

button:hover {
    background-color: #2980b9;
}

</style>
</head>
<body>

<h2>Formulir Pembelian</h2>

<form action="tambah_pembelian.php" method="POST">
  <label for="pelanggan">Pilih Pelanggan:</label><br>
  <select id="pelanggan" name="pelanggan">
    <?php
    include '../koneksi.php';
    // Query untuk mendapatkan semua nama pelanggan dari tabel pelanggan
    $sql = "SELECT PelangganID, NamaPelanggan FROM pelanggan";
    $result = mysqli_query($koneksi, $sql);

    // Tampilkan nama pelanggan sebagai pilihan dropdown
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['PelangganID'] . "'>" . $row['NamaPelanggan'] . "</option>";
        }
    } else {
        echo "<option value=''>Tidak ada pelanggan</option>";
    }

    // Tutup koneksi
    mysqli_close($koneksi);
    ?>
  </select>
  <button><a href="tambah_pelanggan.php">Tambah Pelanggan Baru</a></button>
  <button type="submit">Submit</button>
</form>
</body>
</html>
