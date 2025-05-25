<?php
require 'koneksi.php';

// Cek apakah pengguna sudah login, jika belum, redirect ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil username dari session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Data Produk</title>
</head>

<body>
    <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Ini adalah halaman utama untuk mengelola data produk.</p>
    <a href="tambah.php">Tambah Produk Baru</a> |
    <a href="logout.php">Logout</a>
    <hr>

    <h2>Daftar Produk</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $query = "SELECT * FROM produk";
        $result = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($data['nama_produk']); ?></td>
                <td>Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                    <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>