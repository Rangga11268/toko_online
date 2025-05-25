<?php
require 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Enkripsi password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data ke tabel users
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Registrasi gagal, coba lagi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrasi Akun</title>
</head>

<body>
    <h2>Formulir Registrasi</h2>
    <form action="register.php" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" name="register">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>

</html>