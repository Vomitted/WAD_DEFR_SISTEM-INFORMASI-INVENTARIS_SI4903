@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="auth-card">
        <h2 class="card-title">Daftar Akun Baru</h2>
        <p class="card-subtitle">Lengkapi data berikut untuk membuat akun staf</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama lengkap" required autofocus class="form-control">
                @error('name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required class="form-control">
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Minimal 6 karakter" required class="form-control">
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required class="form-control">
            </div>

            <button type="submit" class="btn btn-save btn-full">
                Daftar
            </button>
        </form>

        <p class="auth-footer">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login di sini</a>
        </p>
    </div>
@endsection
