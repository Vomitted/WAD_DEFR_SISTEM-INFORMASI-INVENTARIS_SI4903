@extends('layouts.app')

@section('title', 'Modul B - Vendor & Supplier')

@section('content')
    <div class="page-header">
        <div>
            <h2 class="page-title">Daftar Vendor / Supplier</h2>
            <p class="page-subtitle">Kelola data pemasok, legalitas usaha, dan kontak PIC gudang</p>
        </div>
        <a href="{{ route('vendors.create') }}" class="btn btn-success">
            + Tambahkan Vendor / Supplier Baru
        </a>
    </div>

    <div class="table-card">
        <table class="data-table">
            <thead>
                <tr>
                    <th class="text-center">Kode</th>
                    <th>Nama &amp; Alamat Kantor</th>
                    <th>Kontak Kantor</th>
                    <th>Legalitas (NPWP / NIB)</th>
                    <th>Kontak PIC</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($vendors as $vendor)
                    @php
                        $badgeClass = match ($vendor->status) {
                            'active' => 'badge-active',
                            'suspend' => 'badge-suspend',
                            default => 'badge-inactive',
                        };
                    @endphp
                    <tr>
                        <td class="text-center">
                            <span class="code-pill">{{ $vendor->code }}</span>
                        </td>
                        <td>
                            <strong>{{ $vendor->name }}</strong><br>
                            <span class="text-muted">{{ $vendor->office_address }}</span>
                        </td>
                        <td>
                            {{ $vendor->phone }}<br>
                            <span class="text-muted">{{ $vendor->email }}</span>
                        </td>
                        <td>
                            <div>NPWP: {{ $vendor->tax_id }}</div>
                            <div class="text-muted">NIB: {{ $vendor->business_license_number }}</div>
                        </td>
                        <td>
                            {{ $vendor->pic_name }} ({{ $vendor->pic_position }})<br>
                            <span class="text-muted">{{ $vendor->pic_phone }} | {{ $vendor->pic_email }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge {{ $badgeClass }}">
                                {{ $vendor->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="table-actions">
                                <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-edit btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('vendors.destroy', $vendor->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus vendor ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-state">
                            Belum ada data vendor. Silakan klik tombol "+ Tambahkan Vendor / Supplier Baru" di atas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
