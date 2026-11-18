
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kendaraan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #222;
            color: #fff;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 1px solid #444;
            padding-bottom: 15px;
        }

        .card {
            max-width: 480px;
            margin: 25px auto;
            background: #262626;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 25px;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px;
            box-sizing: border-box;
        }

        input, select {
            background: #222;
            color: #fff;
            border: 1px solid #444;
            border-radius: 4px;
        }

        button {
            background: #0288d1;
            color: #fff;
            font-weight: bold;
            border: 0;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0277bd;
        }

        a {
            color: #4da6ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Sistem Informasi Inventaris Gudang</h2>
    </div>

    <div class="card">

        <h3>
            {{ isset($kendaraan) ? 'Edit' : 'Tambah' }} Kendaraan
        </h3>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:#ff6b6b">
                    {{ $error }}
                </p>
            @endforeach
        @endif

        <form method="POST"
            action="{{ isset($kendaraan)
                ? route('kendaraan.update', $kendaraan->id)
                : route('kendaraan.store') }}">

            @csrf

            @if (isset($kendaraan))
                @method('PUT')
            @endif

            <label>Jenis Kendaraan</label>

            <select name="jenis_kendaraan" required>
                @foreach (['Forklift', 'Troli', 'Pick-up'] as $jenis)
                    <option value="{{ $jenis }}"
                        {{ old('jenis_kendaraan', $kendaraan->jenis_kendaraan ?? '') == $jenis ? 'selected' : '' }}>
                        {{ $jenis }}
                    </option>
                @endforeach
            </select>

            <label>Nama Kendaraan</label>

            <input
                type="text"
                name="nama_kendaraan"
                value="{{ old('nama_kendaraan', $kendaraan->nama_kendaraan ?? '') }}"
                required
            >

            <label>Nomor Seri</label>

            <input
                type="text"
                name="nomor_seri"
                value="{{ old('nomor_seri', $kendaraan->nomor_seri ?? '') }}"
                required
            >

            <label>Kondisi</label>

            <select name="kondisi" required>
                @foreach (['Baik', 'Perlu Perbaikan', 'Rusak'] as $kondisi)
                    <option value="{{ $kondisi }}"
                        {{ old('kondisi', $kendaraan->kondisi ?? '') == $kondisi ? 'selected' : '' }}>
                        {{ $kondisi }}
                    </option>
                @endforeach
            </select>

            <label>Perawatan Terakhir</label>

            <input
                type="date"
                name="perawatan_terakhir"
                value="{{ old('perawatan_terakhir', $kendaraan->perawatan_terakhir ?? '') }}"
                required
            >

            <button type="submit">Simpan</button>

        </form>

        <center>
            <a href="{{ route('kendaraan.index') }}">Kembali</a>
        </center>

    </div>

</body>
</html>
