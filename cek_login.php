<?php
session_start();

// Contoh sederhana validasi (nanti bisa dihubungkan ke database)
$user_admin = "admin";
$pass_admin = "12345";

if (isset($_POST['login'])) {
    if ($_POST['username'] == $user_admin && $_POST['password'] == $pass_admin) {
        // Jika benar, set session jadi true (tanda sudah login)
        $_SESSION['status_login'] = true;
        $_SESSION['username'] = $_POST['username'];

        // Alihkan ke halaman daftar barang (index.php)
        header("Location: index.php");
        exit;
    } else {
        // Kalau salah, balik ke login
        header("Location: login.php?pesan=gagal");
        exit;
    }
}
?>