<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Katalog Barang - Inventaris</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #4a6572;
            color: #334155;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 100%;
            max-width: 900px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        h1 { font-size: 24px; color: #1e293b; margin-bottom: 5px; }
        h2 { font-size: 16px; color: #64748b; margin-top: 0; font-weight: 500; }
        .btn-tambah {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .btn-tambah:hover { background-color: #1d4ed8; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            text-align: left;
            padding: 12px;
            font-size: 13px;
            border-bottom: 2px solid #cbd5e1;
        }
        td {
            padding: 12px;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
        }
        tr:hover td { background-color: #f8fafc; }
        .btn-edit { color: #0284c7; text-decoration: none; font-weight: 600; }
        .btn-hapus { color: #e11d48; text-decoration: none; font-weight: 600; }
        .btn-edit:hover, .btn-hapus:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Informasi Inventaris Gudang</h1>
        <h2>Modul Katalog Barang</h2>
        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">

        <a href="tambah.php" class="btn-tambah">[ Tambah Barang Baru + ]</a>

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
                                <a href='edit.php?id={$row['kode_barang']}' class='btn-edit'>Edit</a> |
                                <a href='hapus.php?id={$row['kode_barang']}' class='btn-hapus'
                                onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center; padding:20px;'>
                    Belum ada data barang di database.</td></tr>";
                }
                ?>
            </tbody>

        </table>
    </div>
</body>
</html>