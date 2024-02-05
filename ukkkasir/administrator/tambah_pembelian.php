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
    background-color: #2f4f4f;
  }
  h2 {
    text-align: center;
    color: #fff;
  }
  form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }

  select[class="produk"] {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="text"], input[type="date"], input[type="number"], button {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
  }
  button {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
  }
  button:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<h2>Formulir Pembelian</h2>

<form action="proses_tambah_pembelian.php" method="POST" id="formPembelian">
  <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan_id; ?>">
  
  <label>Tanggal Transaksi:</label>
  <input type="date" name="tanggal_transaksi" required>
  
  <div id="barang-container">
    <div class="barang">
      <label>Pilih Nama Produk:</label>
      <select class="produk" name="produk[]">
        <?php
        include '../koneksi.php';
        $sql_produk = "SELECT ProdukID, NamaProduk, Harga FROM produk";
        $result_produk = mysqli_query($koneksi, $sql_produk);
        if (mysqli_num_rows($result_produk) > 0) {
            while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                echo "<option value='" . $row_produk['ProdukID'] . "' data-harga='" . $row_produk['Harga'] . "'>" . $row_produk['NamaProduk'] . "</option>";
            }
        } else {
            echo "<option value=''>Tidak ada produk</option>";
        }
        ?>
      </select>
      
      <label for="jumlah">Jumlah:</label>
      <input type="number" class="jumlah" name="jumlah[]" min="1" oninput="hitungTotal()">
      
      <label for="harga">Harga:</label>
      <input type="text" class="harga" name="harga[]" readonly>
      
      <label for="total">Total Harga:</label>
      <input type="text" class="total" name="total[]" readonly>
      
      <button type="button" onclick="hapusBarang(this)">Hapus</button>
    </div>
  </div>
  
  <button type="button" onclick="tambahBarang()">Tambah Barang</button>
  <button type="submit">Submit</button>
</form>

<script>
function tambahBarang() {
    var container = document.getElementById("barang-container");
    var barangBaru = document.createElement("div");
    barangBaru.classList.add("barang");
    barangBaru.innerHTML = `
        <label>Pilih Nama Produk:</label>
        <select class="produk" name="produk[]">
            <?php
            mysqli_data_seek($result_produk, 0);
            while ($row_produk = mysqli_fetch_assoc($result_produk)) {
                echo "<option value='" . $row_produk['ProdukID'] . "' data-harga='" . $row_produk['Harga'] . "'>" . $row_produk['NamaProduk'] . "</option>";
            }
            ?>
        </select>
        
        <label for="jumlah">Jumlah:</label>
        <input type="number" class="jumlah" name="jumlah[]" min="1" oninput="hitungTotal()">
        
        <label for="harga">Harga:</label>
        <input type="text" class="harga" name="harga[]" readonly>
        
        <label for="total">Total Harga:</label>
        <input type="text" class="total" name="total[]" readonly>
        
        <button type="button" onclick="hapusBarang(this)">Hapus</button>
    `;
    container.appendChild(barangBaru);
}

function hapusBarang(btn) {
    btn.parentNode.remove();
}

function hitungTotal() {
    var barang = document.getElementsByClassName("barang");
    for (var i = 0; i < barang.length; i++) {
        var harga = barang[i].getElementsByClassName("produk")[0].options[barang[i].getElementsByClassName("produk")[0].selectedIndex].getAttribute("data-harga");
        var jumlah = barang[i].getElementsByClassName("jumlah")[0].value;
        var total = parseInt(harga) * parseInt(jumlah);
        barang[i].getElementsByClassName("harga")[0].value = harga;
        barang[i].getElementsByClassName("total")[0].value = total;
    }
}
</script>

<?php
// Tutup koneksi
mysqli_close($koneksi);
?>

</body>
</html>
