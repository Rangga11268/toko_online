<?php
require 'koneksi.php';

// Cek jika pengguna belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama_produk', '$harga', '$stok')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Produk</title>
</head>

<body>
    <h2>Formulir Tambah Produk</h2>
    <form action="tambah.php" method="POST">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required><br><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" required><br><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>
        <button type="submit" name="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>