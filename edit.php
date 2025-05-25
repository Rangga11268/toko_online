<?php
require 'koneksi.php';

// Cek jika pengguna belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$query_data = "SELECT * FROM produk WHERE id=$id";
$result_data = mysqli_query($koneksi, $query_data);
$data = mysqli_fetch_assoc($result_data);

// Proses update data
if (isset($_POST['update'])) {
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $query_update = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok' WHERE id=$id";
    $result_update = mysqli_query($koneksi, $query_update);

    if ($result_update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Produk</title>
</head>

<body>
    <h2>Formulir Edit Produk</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($data['nama_produk']); ?>" required><br><br>
        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required><br><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $data['stok']; ?>" required><br><br>
        <button type="submit" name="update">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>