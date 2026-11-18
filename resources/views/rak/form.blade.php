@php
    $edit = $rak !== null;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $edit ? 'Edit' : 'Tambah' }} Lorong dan Rak</title>
    <link rel="stylesheet" href="{{ asset('css/form-rak.css') }}">
</head>
<body>
    <a class="balik" href="{{ route('rak.index') }}">Kembali ke Daftar</a>

    <form action="{{ $edit ? route('rak.update', $rak->kode) : route('rak.store') }}" method="POST">
        @if ($edit)
        <h1>Edit Rak</h1>
        <p>Ubah Data Rak {{ $rak->kode }}</p>
    @else
        <h1>Tambah Rak Baru</h1>
        <p>Isi Lokasi Lorong dan Kapasitas Rak</p>
    @endif
        @csrf
        @if ($edit)
            @method('PUT')
        @endif

        <label for="kode">Kode Rak</label>
        <input type="text" id="kode" name="kode" placeholder="cth: A104"
               value="{{ old('kode', $rak->kode ?? '') }}" {{ $edit ? 'readonly' : '' }}>
        <span style="color: red;">{{ $errors->first('kode') }}</span>

        <label for="lorong">Lorong</label>
        <select id="lorong" name="lorong">
            <option value="">-- Pilih --</option>
            @foreach (['Lorong A', 'Lorong B', 'Lorong C'] as $l)
                <option value="{{ $l }}" {{ old('lorong', $rak->lorong ?? '') == $l ? 'selected' : '' }}>{{ $l }}</option>
            @endforeach
        </select>
        <span style="color: red;">{{ $errors->first('lorong') }}</span>

        <label for="kapasitas">Kapasitas (Kg)</label>
        <input type="number" id="kapasitas" name="kapasitas" placeholder="1000" min="0"
               value="{{ old('kapasitas', $rak->kapasitas ?? '') }}">
        <span style="color: red;">{{ $errors->first('kapasitas') }}</span>

        <label for="terisi">Terisi Saat Ini (Kg)</label>
        <input type="number" id="terisi" name="terisi" placeholder="0" min="0"
               value="{{ old('terisi', $rak->terisi ?? '') }}">
        <span style="color: red;">{{ $errors->first('terisi') }}</span>

        <label for="tipe">Tipe Rak</label>
        <select id="tipe" name="tipe">
            <option value="">-- Pilih --</option>
            @foreach (['Pallet Rack', 'Shelving', 'Cold Storage'] as $t)
                <option value="{{ $t }}" {{ old('tipe', $rak->tipe ?? '') == $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        <span style="color: red;">{{ $errors->first('tipe') }}</span>

        <button type="button" class="batal" onclick="window.location.href='{{ route('rak.index') }}'">Batal</button>
        <button type="submit" class="simpan">Simpan</button>
    </form>
</body>
</html>