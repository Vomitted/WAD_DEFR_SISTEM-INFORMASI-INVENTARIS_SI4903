<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Modul B - Vendor & Supplier')</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #242323;
            color: #e0e0e0;
            line-height: 1.5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .header-section {
            text-align: center;
            margin-bottom: 16px;
        }

        .header-logo {
            display: block;
            margin: 8px auto;
            width: 90px;
            border-radius: 10px;
        }

        .header-title {
            color: #ffffff;
            margin-top: 8px;
            font-size: 24px;
        }

        .header-subtitle {
            color: #aaaaaa;
            margin-top: 2px;
            font-weight: normal;
            font-size: 14px;
        }

        .auth-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding: 10px 14px;
            background-color: #292828;
            border: 1px solid #3a3a3a;
            border-radius: 6px;
            font-size: 14px;
        }

        .divider {
            border: 0;
            border-top: 1px solid #444;
            margin: 18px 0;
        }

        .alert-success {
            background-color: #1b5e20;
            color: #c8e6c9;
            padding: 12px 16px;
            border-radius: 5px;
            margin-bottom: 18px;
            border: 1px solid #2e7d32;
            font-weight: bold;
        }

        .alert-danger {
            background-color: #7f1d1d;
            color: #ffcdd2;
            padding: 12px 16px;
            border-radius: 5px;
            margin-bottom: 18px;
            border: 1px solid #b71c1c;
        }

        .alert-danger ul {
            margin-left: 20px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 9px 16px;
            font-size: 14px;
            font-family: inherit;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 13px;
        }

        .btn-success {
            background-color: rgb(86, 134, 14);
            color: #ffffff;
        }

        .btn-cancel {
            background-color: rgb(231, 9, 9);
            color: #ffffff;
        }

        .btn-primary {
            background-color: #0288d1;
            color: #ffffff;
        }

        .btn-save {
            background-color: #07ad3f;
            color: #ffffff;
        }

        .form-container {
            background-color: #292828;
            padding: 25px;
            border-radius: 8px;
            max-width: 650px;
            margin: 0 auto;
            border: 1px solid #3a3a3a;
        }

        .form-container h2 {
            color: #ffffff;
            margin-bottom: 18px;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #e0e0e0;
            font-weight: bold;
            font-size: 14px;
        }

        .form-control {
            background-color: #242424;
            border: 1px solid #444;
            color: #ffffff;
            padding: 8px 10px;
            width: 100%;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #64b5f6;
        }

        .field-error {
            color: #ff6b6b;
            font-size: 12px;
            margin-top: 4px;
        }

        .form-footer-link {
            margin-top: 16px;
            font-size: 14px;
            text-align: center;
        }

        .form-footer-link a {
            color: #64b5f6;
            text-decoration: none;
        }

        .form-footer-link a:hover {
            text-decoration: underline;
        }

        .vendor-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #3a3a3a;
            font-size: 14px;
        }

        .vendor-table thead th {
            background-color: #1f1f1f;
            color: #fffafa;
            padding: 10px;
            border: 1px solid #3a3a3a;
            text-align: left;
        }

        .vendor-table tbody tr {
            background-color: #2b2b2b;
        }

        .vendor-table tbody tr:hover {
            background-color: #333;
        }

        .vendor-table tbody td {
            padding: 10px;
            border: 1px solid #3a3a3a;
            vertical-align: top;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <a href="{{ Auth::check() ? route(config('alur.halaman_utama')) : route(config('alur.jika_belum_login')) }}">
                <img src="{{ asset('placeholderLogo.png') }}" alt="Logo Sistem Inventaris" class="header-logo">
            </a>
            <h1 class="header-title">Sistem Informasi Inventaris Gudang</h1>
            <h4 class="header-subtitle">(Placeholder)</h4>
        </div>

        @auth
            <div class="auth-bar">
                <span>Login sebagai: <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-cancel btn-sm">Logout</button>
                </form>
            </div>
        @endauth

        <hr class="divider">

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-danger">
                <strong>Terjadi kesalahan input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
