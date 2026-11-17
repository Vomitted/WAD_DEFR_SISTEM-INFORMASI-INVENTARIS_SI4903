
<?php
include 'koneksi.php';

$id = $_GET['id'] ?? '';

$stmt = mysqli_prepare($koneksi, "SELECT * FROM katalog_barang WHERE kode_barang = ?");
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data barang tidak ditemukan.");
}

if (isset($_POST['update'])) {
    $kode   = $_POST['kode_barang'];
    $nama   = $_POST['nama_barang'];
    $kat    = $_POST['kategori'];
    $spek   = $_POST['spesifikasi'];
    $satuan = $_POST['satuan_unit'];

    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE katalog_barang
         SET kode_barang = ?, nama_barang = ?, kategori = ?,
             spesifikasi = ?, satuan_unit = ?
         WHERE kode_barang = ?"
    );

    mysqli_stmt_bind_param(
        $stmt, "ssssss",
        $kode, $nama, $kat, $spek, $satuan, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Katalog Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #4a6572;
            color: #ffffff;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1, form, p { width: 100%; max-width: 600px; }
        h1 { font-size: 24px; margin-bottom: 5px; }
        form {
            background-color: #ffffff;
            color: #334155;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
        }
        label { font-weight: 600; font-size: 14px; color: #475569; }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            background-color: #f8fafc;
            font-family: 'Poppins', sans-serif;
        }
        .input-group { margin-bottom: 20px; }
        button[type="submit"] {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
        }
        button[type="submit"]:hover { background-color: #1d4ed8; }
        a { color: #e2e8f0; text-decoration: none; font-size: 14px; font-weight: 600; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Edit Data Katalog Barang</h1>
    <p><a href="index.php">&laquo; Kembali ke Daftar Barang</a></p>

    <form action="" method="POST">
        <div class="input-group">
            <label>Kode Barang:</label><br>
            <input type="text" name="kode_barang"
                   value="<?= htmlspecialchars($data['kode_barang']) ?>" required>
        </div>

        <div class="input-group">
            <label>Nama Barang:</label><br>
            <input type="text" name="nama_barang"
                   value="<?= htmlspecialchars($data['nama_barang'] ?? '') ?>" required>
        </div>

        <div class="input-group">
            <label>Kategori:</label><br>
            <input type="text" name="kategori"
                   value="<?= htmlspecialchars($data['kategori'] ?? '') ?>" required>
        </div>

        <div class="input-group">
            <label>Spesifikasi Teknis:</label><br>
            <textarea name="spesifikasi" rows="4" required><?= htmlspecialchars($data['spesifikasi'] ?? '') ?></textarea>
        </div>

        <div class="input-group">
            <label>Satuan Unit:</label><br>
            <input type="text" name="satuan_unit"
                   value="<?= htmlspecialchars($data['satuan_unit'] ?? '') ?>" required>
        </div>

        <button type="submit" name="update">Perbarui Data</button>
    </form>
</body>
</html>
