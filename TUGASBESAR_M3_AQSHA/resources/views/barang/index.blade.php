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
        .btn-hapus { color: #e11d48; text-decoration: none; font-weight: 600; background: none; border: none; cursor: pointer; padding: 0; font-size: 14px; font-weight: 600; }
        .btn-edit:hover, .btn-hapus:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistem Informasi Inventaris Gudang</h1>
        <h2>Modul Katalog Barang</h2>
        <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;">

        <a href="{{ route('barangs.create') }}" class="btn-tambah">[ Tambah Barang Baru + ]</a>

        <h3>Tabel Daftar Katalog Barang</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody> 
                @forelse($barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->jumlah }}</td>
                    <td>{{ $barang->harga }}</td>
                    <td>
                        <a href="{{ route('barangs.edit', $barang->kode_barang) }}" class="btn-edit">Edit</a> |
                        <form action="{{ route('barangs.destroy', $barang->kode_barang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:20px;">Belum ada data barang di database.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>