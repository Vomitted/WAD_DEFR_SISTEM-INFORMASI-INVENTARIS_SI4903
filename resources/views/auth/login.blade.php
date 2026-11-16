@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="auth-card">
        <h2 class="card-title">Login</h2>
        <p class="card-subtitle">Masuk untuk mengelola data vendor</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus class="form-control">
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required class="form-control">
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary btn-full">
                Masuk
            </button>
        </form>

        <p class="auth-footer">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar di sini</a>
        </p>
    </div>
@endsection
