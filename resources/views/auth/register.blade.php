@extends('layouts.app')

@section('title', 'Register - ScentPedia')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark fw-bold fs-5 py-2.5">
                    Registrasi Akun Baru
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 small">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-light small">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                                placeholder="Masukkan nama lengkap"
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light small">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                placeholder="nama@email.com"
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-light small">Kata Sandi</label>
                            <input type="password" name="password" required
                                placeholder="Minimal 8 karakter"
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light small">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" required
                                placeholder="Ulangi kata sandi"
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}" class="text-secondary text-decoration-none small">
                                Sudah punya akun? <span class="text-warning">Login</span>
                            </a>
                            <button type="submit" class="btn btn-warning fw-bold px-4">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection