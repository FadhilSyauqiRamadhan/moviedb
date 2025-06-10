{{-- filepath: resources/views/movies/login.blade.php --}}
@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4" style="width: 400px;">
        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 3rem; color: #0d6efd;"></i>
            <h3 class="mt-2 mb-0">Login Akun</h3>
            <p class="text-muted">Silakan masuk untuk melanjutkan</p>
        </div>

        {{-- Tampilkan pesan error jika login gagal --}}
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" placeholder="Masukkan email" required autofocus value="{{ old('email') }}">
                </div>
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" name="password" placeholder="Masukkan password" required>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
        <div class="mt-3 text-center">
            <small class="text-muted">Belum punya akun? <a href="#">Daftar</a></small>
        </div>
    </div>
</div>
@endsection
