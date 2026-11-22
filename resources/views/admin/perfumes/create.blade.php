@extends('layouts.app')

@section('title', 'Admin - Tambah Data Parfum')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">Tambah Data Parfum Baru</div>
                <div class="card-body">
                    <form action="{{ route('admin.perfumes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Pilih Brand</label>
                            <select name="brand_id" class="form-select bg-dark text-white border-secondary" required>
                                <option value="">-- Pilih Brand --</option>
                                @foreach($brands as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Parfum & Konsentrasi</label>
                            <input type="text" name="name" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: YSL Myself EDP" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Singkat</label>
                            <textarea name="description" class="form-control bg-dark text-white border-secondary" rows="3" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Top Notes</label>
                                <input type="text" name="top_notes" class="form-control bg-dark text-white border-secondary" placeholder="Bergamot, Orange" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Middle Notes</label>
                                <input type="text" name="middle_notes" class="form-control bg-dark text-white border-secondary" placeholder="Orange Blossom" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Base Notes</label>
                                <input type="text" name="base_notes" class="form-control bg-dark text-white border-secondary" placeholder="Patchouli, Ambroxan" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Rekomendasi Situasi Pemakaian</label>
                                <input type="text" name="occasion" class="form-control bg-dark text-white border-secondary" placeholder="Formal / Kasual Malam" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Estimasi Harga Pasar</label>
                                <input type="text" name="price_range" class="form-control bg-dark text-white border-secondary" placeholder="Rp 1.800.000 - Rp 2.100.000" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Foto Botol Produk</label>
                            <input type="file" name="image" class="form-control bg-dark text-white border-secondary">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.perfumes.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning fw-bold">Simpan Data Parfum</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection