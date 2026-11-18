<?php
session_start();

include 'koneksi.php'; 

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM middleware WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['status_login'] = true;
        $_SESSION['username'] = $username;

        header("Location: index.php");
        exit;
    } else {

        header("Location: login.php?pesan=gagal");
        exit;
    }
}
?>