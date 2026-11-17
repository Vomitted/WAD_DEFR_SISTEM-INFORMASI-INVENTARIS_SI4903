<?php
include 'auth.php';
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $kode   = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $kat    = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $spek   = mysqli_real_escape_string($koneksi, $_POST['spesifikasi']);
    $satuan = mysqli_real_escape_string($koneksi, $_POST['satuan_unit']);

    $query = "INSERT INTO katalog_barang 
    (kode_barang, nama_barang, kategori, spesifikasi, satuan_unit) 
    VALUES ('$kode', '$nama', '$kat', '$spek', '$satuan')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Katalog Barang</title>
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
        h1, form, p { width: 100%; max-width: 600px; }
        h1 { font-size: 24px; margin-bottom: 5px; color: #ffffff; }
        form {
            background-color: #242424;
            color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
            border: 1px solid #333333;
        }
        label { font-weight: 600; font-size: 14px; color: #cbd5e1; }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #444444;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #1e1e1e;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }
        input[type="text"]:focus, textarea:focus {
            border-color: #2563eb;
            outline: none;
        }
        .input-group { margin-bottom: 20px; }
        button[type="submit"] {
            background-color: #16a34a;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        button[type="submit"]:hover { background-color: #15803d; }
        button[type="reset"] {
            background-color: #334155;
            color: #cbd5e1;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            margin-left: 8px;
        }
        button[type="reset"]:hover { background-color: #475569; }
        a { color: #94a3b8; text-decoration: none; font-size: 14px; font-weight: 600; }
        a:hover { color: #ffffff; text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Form Input Katalog Barang Baru</h1>
    <p><a href="index.php">&laquo; Kembali ke Daftar Barang</a></p>
    <form action="" method="POST">
        <div class="input-group"><label>Kode Barang:</label><br><input type="text" name="kode_barang" required></div>
        <div class="input-group"><label>Nama Barang:</label><br><input type="text" name="nama_barang" required></div>
        <div class="input-group"><label>Kategori:</label><br><input type="text" name="kategori" required></div>
        <div class="input-group"><label>Spesifikasi Teknis:</label><br><textarea name="spesifikasi" rows="4" required></textarea></div>
        <div class="input-group"><label>Satuan Unit:</label><br><input type="text" name="satuan_unit" required></div>
        <div>
            <button type="submit" name="submit">Simpan Data Barang</button>
            <button type="reset">Reset Form</button>
        </div>
    </form>
</body>
</html>