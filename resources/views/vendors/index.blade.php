@extends('layouts.app')

@section('title', 'Modul B - Vendor & Supplier')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
        <h2 style="color: #ffffff; margin: 0;">Daftar Vendor / Supplier</h2>
        <a href="{{ route('vendors.create') }}" class="btn btn-success">
            + Tambahkan Vendor / Supplier Baru
        </a>
    </div>

    <div style="overflow-x: auto;">
        <table class="vendor-table">
            <thead>
                <tr>
                    <th style="text-align: center;">Kode</th>
                    <th>Nama &amp; Alamat Kantor</th>
                    <th>Kontak Kantor</th>
                    <th>Legalitas (NPWP / NIB)</th>
                    <th>Kontak PIC</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendors as $vendor)
                    @php
                        $statusColor = match ($vendor->status) {
                            'active' => '#4caf50',
                            'suspend' => '#ffb74d',
                            default => '#ff5252',
                        };
                    @endphp
                    <tr>
                        <td style="text-align: center;"><strong>{{ $vendor->code }}</strong></td>
                        <td>
                            <strong>{{ $vendor->name }}</strong><br>
                            <small style="color: #bbb;">{{ $vendor->office_address }}</small>
                        </td>
                        <td>
                            {{ $vendor->phone }}<br>
                            <small style="color: #bbb;">{{ $vendor->email }}</small>
                        </td>
                        <td>
                            NPWP: {{ $vendor->tax_id }}<br>
                            NIB: {{ $vendor->business_license_number }}
                        </td>
                        <td>
                            {{ $vendor->pic_name }} ({{ $vendor->pic_position }})<br>
                            <small style="color: #bbb;">{{ $vendor->pic_phone }} | {{ $vendor->pic_email }}</small>
                        </td>
                        <td style="text-align: center;">
                            <span style="color: {{ $statusColor }}; font-weight: bold; text-transform: uppercase;">
                                {{ $vendor->status }}
                            </span>
                        </td>
                        <td style="text-align: center; white-space: nowrap;">
                            <a href="{{ route('vendors.edit', $vendor->id) }}" style="color: #64b5f6; text-decoration: none; font-weight: bold; margin-right: 10px;">
                                Edit
                            </a>
                            <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus vendor ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #e57373; cursor: pointer; font-weight: bold; font-size: 14px; font-family: inherit;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 20px; color: #aaa;">
                            Belum ada data vendor. Silakan klik tombol "+ Tambahkan Vendor / Supplier Baru" di atas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
