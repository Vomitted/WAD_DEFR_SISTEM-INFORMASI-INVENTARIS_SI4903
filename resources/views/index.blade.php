
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armada Operasional</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #222;
            color: #fff;
            padding: 20px;
        }

        .box {
            background: #262626;
            border: 1px solid #444;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .atas {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            color: #fff;
            padding: 8px 14px;
            border: 0;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #1a1a1a;
        }

        tr:nth-child(even) td {
            background: #2c2c2c;
        }

        .link {
            background: none;
            border: 0;
            padding: 0;
            margin: 0 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>


    <div style="text-align: center">
        <h2>Sistem Informasi Inventaris Gudang</h2>
    </div>

    <hr style="border-color: #333">

    @if (session('success'))
        <div class="box" style="background: #1e5e20; font-weight: bold">
            {{ session('success') }}
        </div>
    @endif
    
<div>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">Logout</button>
    </form>
</div>

    <div class="atas">
        <h2>Daftar Kendaraan</h2>

        <a class="btn"
           style="background: #558b0f"
           href="{{ route('kendaraan.create') }}">
            + Tambah Kendaraan
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th>
                <th>Nama</th>
                <th>Nomor Seri</th>
                <th>Kondisi</th>
                <th>Perawatan Terakhir</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $kendaraan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kendaraan->jenis_kendaraan }}</td>
                    <td>{{ $kendaraan->nama_kendaraan }}</td>
                    <td>{{ $kendaraan->nomor_seri }}</td>
                    <td>{{ $kendaraan->kondisi }}</td>
                    <td>{{ $kendaraan->perawatan_terakhir }}</td>

                    <td>
                        <a class="link"
                           style="color: #4da6ff"
                           href="{{ route('kendaraan.edit', $kendaraan->id) }}">
                            Edit
                        </a>
                        <form
                            action="{{ route('kendaraan.destroy', $kendaraan->id) }}"
                            method="POST"
                            style="display: inline"
                            onsubmit="return confirm('Yakin ingin menghapus?')">

                            @csrf
                            @method('DELETE')

                            <button class="link" style="color: #ff6b6b">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7">Belum ada data kendaraan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
