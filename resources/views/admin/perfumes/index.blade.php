@extends('layouts.app')

@section('title', 'Admin - Kelola Data Parfum')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-warning">Kelola Data Parfum</h2>
        <a href="{{ route('admin.perfumes.create') }}" class="btn btn-warning fw-bold">+ Tambah Parfum Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Parfum</th>
                        <th>Brand</th>
                        <th>Estimasi Harga</th>
                        <th>Situasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($perfumes as $item)
                        <tr>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset($item->image) }}" width="50" class="rounded">
                                @else
                                    <span class="badge bg-secondary">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $item->name }}</td>
                            <td>{{ $item->brand->name ?? '-' }}</td>
                            <td>{{ $item->price_range }}</td>
                            <td><span class="badge bg-warning text-dark">{{ $item->occasion }}</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data parfum. Klik tombol tambah untuk menginput data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection