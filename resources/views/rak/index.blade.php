<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lorong dan Rak</title>
    <link rel="stylesheet" href="{{ asset('css/info-rak.css') }}">
</head>
<body>
    <div class="userbar">
        <span>Login sebagai <b>{{ auth()->user()->name }}</b> <span class="badge">{{ auth()->user()->role }}</span></span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="tombol-logout">Logout</button>
        </form>
    </div>

    <h1>Daftar Lorong Rak</h1>
    <p class="inpo">Lorong Utama A, B, dan C</p>

    @if (auth()->user()->hasRole('admin', 'staff'))
        <a class="klik" href="{{ route('rak.create') }}">+ Tambah Rak</a>
    @endif

    <table>
        <tr>
            <th>Kode Rak</th>
            <th>Lorong</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Barang</th>
            <th>Aksi</th>
        </tr>

        @foreach ($raks as $rak)
            @php
                if ($rak->terisi >= $rak->kapasitas) {
                    $status = 'Penuh';
                    $kelas = 'sayangnyapenuh';
                } elseif ($rak->terisi >= 0.8 * $rak->kapasitas) {
                    $status = 'Hampir Penuh';
                    $kelas = 'hampirbanget';
                } else {
                    $status = 'Tersedia';
                    $kelas = 'adakok';
                }
            @endphp
            <tr>
                <td>{{ $rak->kode }}</td>
                <td>{{ $rak->lorong }}</td>
                <td>{{ $rak->terisi }} / {{ $rak->kapasitas }} kg</td>
                <td class="{{ $kelas }}">{{ $status }}</td>
                <td>{{ $rak->tipe }}</td>
                <td class="aksi">
                    @if (auth()->user()->hasRole('admin', 'staff'))
                        <a class="tombol-edit" href="{{ route('rak.edit', $rak->kode) }}">✏️ Edit</a>
                    @endif

                    @if (auth()->user()->hasRole('admin'))
                        <form action="{{ route('rak.destroy', $rak->kode) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin mau hapus rak ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol-hapus" style="border:none; cursor:pointer;">🗑️ Hapus</button>
                        </form>
                    @endif

                    @if (auth()->user()->hasRole('viewer'))
                        <span class="hanya-lihat">hanya lihat</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>