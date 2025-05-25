<?php
require 'koneksi.php';

// Cek jika pengguna belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID dari URL
$id = $_GET['id'];

// Query hapus data
$query = "DELETE FROM produk WHERE id=$id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='index.php';</script>";
}
