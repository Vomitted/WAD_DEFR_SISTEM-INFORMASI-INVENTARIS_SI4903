<?php

return [
    // Nama route halaman utama aplikasi
    'halaman_utama' => 'vendors.index',

    // Nama route tujuan saat pengunjung belum login
    'jika_belum_login' => 'login',

    // Nama route tujuan saat user yang sudah login membuka halaman login/register
    'jika_sudah_login' => 'vendors.index',

    // Nama route tujuan setelah berhasil login
    'setelah_login' => 'vendors.index',

    // Jika true otomatis login setelah daftar, jika false diarahkan ke halaman login dulu
    'auto_login_setelah_register' => true,

    // Nama route tujuan setelah berhasil register (saat auto login aktif)
    'setelah_register' => 'vendors.index',

    // Nama route tujuan setelah berhasil logout
    'setelah_logout' => 'login',
];
