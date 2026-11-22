@extends('layouts.app')

@section('title', 'Login - ScentPedia')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark fw-bold fs-5 py-2.5">
                    Masuk ke Akun ScentPedia
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 small">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-light small">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="nama@email.com"
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-light small">Kata Sandi</label>
                            <input type="password" name="password" required
                                placeholder="Masukkan kata sandi"
                                class="form-control bg-dark text-white border-secondary">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('register') }}" class="text-secondary text-decoration-none small">
                                Belum punya akun? <span class="text-warning">Register</span>
                            </a>
                            <button type="submit" class="btn btn-warning fw-bold px-4">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection