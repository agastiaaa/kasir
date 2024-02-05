<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Register</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2F4F4F;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #fff;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 0 auto;
            text-align: center;
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
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
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
    </style>
</head>
<body>
     <h2>Data Register</h2>
    <div class="container">
        <button onclick="location.href='index.php'">kembali ke halaman utama</button>
        <button onclick="location.href='../register.php'">Form Register</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $koneksi = new mysqli("localhost", "root", "", "kasir");

                if ($koneksi->connect_error) {
                    die("Koneksi Gagal: " . $koneksi->connect_error);
                }

                // Query untuk mengambil data dari tabel users
                $sql = "SELECT * FROM users";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['UserID'] . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td>" . $row['Role'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data registrasi.</td></tr>";
                }

                $koneksi->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
