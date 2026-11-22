@extends('layouts.app')

@section('title', 'Kelola Profil - ScentPedia')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Notifikasi Sukses (Alert Success Bootstrap persis seperti Gambar 2.1) --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Card 1: Pembaruan Profil & Avatar --}}
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-warning text-dark fw-bold d-flex justify-content-between align-items-center">
                    <span>Kelola Profil Pengguna</span>
                    <span class="badge bg-dark text-warning text-uppercase">Role: {{ $user->role }}</span>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="d-flex align-items-center gap-3 mb-4">
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle object-fit-cover border border-2 border-warning" width="68" height="68">
                            @else
                                <div class="rounded-circle bg-warning text-dark fw-bold fs-3 d-flex align-items-center justify-content-center" style="width: 68px; height: 68px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <label class="form-label text-light small mb-1">Foto / Avatar Profil</label>
                                <input type="file" name="avatar" accept="image/*" class="form-control bg-dark text-white border-secondary">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light small">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light small">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-warning fw-bold px-4">
                                Simpan Perubahan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Card 2: Ubah Kata Sandi --}}
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark fw-bold">
                    Ubah Kata Sandi
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label text-light small">Kata Sandi Lama</label>
                            <input type="password" name="current_password" required
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-light small">Kata Sandi Baru</label>
                                <input type="password" name="password" required
                                    class="form-control bg-dark text-white border-secondary">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-light small">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" name="password_confirmation" required
                                    class="form-control bg-dark text-white border-secondary">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-warning fw-bold px-4">
                                Perbarui Kata Sandi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection