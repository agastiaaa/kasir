<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-gn8cHtUGuVJdZ3C8iK6NtHjL5x99NhN28Lv/KyviHZfVklvQDQTXTQpYjgVi/v+71b00NUarDT8F8z1mGBJj3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #2F4F4F;
    margin: 0;
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
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"], button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
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

    <h2>Edit Produk</h2>

    <?php
    session_start();
    include '../koneksi.php';
    // Pastikan parameter id produk dikirimkan melalui URL
    if(isset($_GET["id"])) {
        $produk_id = $_GET["id"];

        // Query untuk mendapatkan informasi produk berdasarkan ID
        $sql = "SELECT * FROM produk WHERE ProdukID = $produk_id";
        $result = mysqli_query($koneksi, $sql);

        // Tampilkan formulir untuk edit produk
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <form action="process_edit_produk.php" method="POST">
                <input type="hidden" name="produk_id" value="<?php echo $row['ProdukID']; ?>">
                <label for="nama_produk">Nama Produk:</label><br>
                <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $row['NamaProduk']; ?>"><br><br>
                <label for="harga">Harga:</label><br>
                <input type="text" id="harga" name="harga" value="<?php echo $row['Harga']; ?>"><br><br>
                <label for="stok">Stok:</label><br>
                <input type="text" id="stok" name="stok" value="<?php echo $row['Stok']; ?>"><br><br>
                <button type="submit"><i class="fas fa-save"></i> Simpan</button>
            </form>
            <?php
        } else {
            echo "Produk tidak ditemukan.";
        }

        // Tutup koneksi
        mysqli_close($koneksi);
    } else {
        echo "ID Produk tidak ditemukan.";
    }
    ?>

    </body>
    </html>