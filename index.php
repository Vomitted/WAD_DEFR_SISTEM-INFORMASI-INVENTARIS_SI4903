<?php 
include 'auth.php';
include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Katalog Barang - Inventaris</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1a1a1a;
            color: #ffffff;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 900px;
            background-color: #242424;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border: 1px solid #333333;
            box-sizing: border-box;
        }
        h1 { font-size: 24px; color: #ffffff; margin-bottom: 5px; }
        h2 { font-size: 16px; color: #94a3b8; margin-top: 0; font-weight: 400; }
        h3 { font-size: 18px; color: #e2e8f0; margin-bottom: 12px; }
        hr { border: 0; border-top: 1px solid #333333; margin: 20px 0; }
        
        .btn-tambah {
            display: inline-block;
            background-color: #16a34a;
            color: #ffffff;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 20px;
            transition: background-color 0.2s;
        }
        .btn-tambah:hover { background-color: #15803d; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #1e1e1e;
            color: #cbd5e1;
            font-weight: 600;
            text-align: left;
            padding: 12px;
            font-size: 13px;
            border-bottom: 2px solid #333333;
        }
        td {
            padding: 12px;
            font-size: 14px;
            color: #e2e8f0;
            border-bottom: 1px solid #333333;
        }
        tr:hover td { background-color: #2c2c2c; }
        
        .btn-edit { color: #38bdf8; text-decoration: none; font-weight: 600; }
        .btn-hapus { color: #f87171; text-decoration: none; font-weight: 600; }
        .btn-edit:hover, .btn-hapus:hover { text-decoration: underline; }
        .separator { color: #475569; margin: 0 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Informasi Inventaris Gudang</h1>
        <h2>Modul Katalog Barang</h2>
        <hr>

        <a href="tambah.php" class="btn-tambah">+ Tambah Barang Baru</a>

        <h3>Tabel Daftar Katalog Barang</h3>
        <table>
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Spesifikasi Teknis</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody> 
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM katalog_barang ORDER BY kode_barang DESC");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>
                            <td>{$row['kode_barang']}</td>
                            <td>{$row['nama_barang']}</td>
                            <td>{$row['kategori']}</td>
                            <td>{$row['spesifikasi']}</td>
                            <td>{$row['satuan_unit']}</td>
                            <td>
                                <a href='edit.php?id={$row['kode_barang']}' class='btn-edit'>Edit</a>
                                <span class='separator'>|</span>
                                <a href='hapus.php?id={$row['kode_barang']}' class='btn-hapus'
                                onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center; padding:24px; color:#94a3b8;'>
                    Belum ada data barang di database.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>