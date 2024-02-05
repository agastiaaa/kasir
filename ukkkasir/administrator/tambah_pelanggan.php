<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Pelanggan Baru</title>
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
    width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

label {
    display: flex;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"], button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
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

<h2>Tambah Pelanggan Baru</h2>

<form action="proses_tambah_pelanggan.php" method="POST">
  <label for="id_pelanggan">ID Pelanggan:</label><br>
  <input type="text" id="id_pelanggan" name="id_pelanggan"><br><br>
  
  <label for="nama_pelanggan">Nama Pelanggan:</label><br>
  <input type="text" id="nama_pelanggan" name="nama_pelanggan"><br><br>
  
  <label for="alamat">Alamat:</label><br>
  <input type="text" id="alamat" name="alamat"><br><br>
  
  <label for="nomor_telepon">Nomor Telepon:</label><br>
  <input type="text" id="nomor_telepon" name="nomor_telepon"><br><br>
  
  <button type="submit">Tambah Pelanggan</button>
</form>

</body>
</html>
