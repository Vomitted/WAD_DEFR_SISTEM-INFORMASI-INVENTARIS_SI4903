<?php
session_start();
// cek variabel session login ada atau belum
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true) {
    // tendang ke halaman login
    header("Location: login.php?pesan=belum_login");
    exit;
}
?>