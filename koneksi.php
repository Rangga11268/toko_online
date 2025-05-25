<?php
// Pengaturan koneksi database
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'toko_online';

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Memulai session
session_start();
