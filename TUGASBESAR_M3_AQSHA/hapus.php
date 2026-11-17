
<?php
include 'koneksi.php';

$id = $_GET['id'] ?? '';

$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM katalog_barang WHERE kode_barang = ?"
);

mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);

header("Location: index.php");
exit;
?>
