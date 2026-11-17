<?php
session_start();
// Cek apakah variabel session login sudah ada atau belum
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    // Jika belum login, tendang kembali ke halaman login
    header("Location: login.php?pesan=belum_login");
    exit;
}
?>