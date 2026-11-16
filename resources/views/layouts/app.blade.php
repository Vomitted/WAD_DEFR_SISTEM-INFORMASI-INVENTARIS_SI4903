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
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #1d1e20;
            color: #e2e4e8;
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background-color: #242528;
            border-bottom: 1px solid #383a3f;
        }

        .navbar-inner {
            max-width: 1150px;
            margin: 0 auto;
            padding: 12px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #ffffff;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #383a3f;
            background-color: #1d1e20;
        }

        .brand-text {
            display: flex;
            flex-direction: column;
        }

        .brand-title {
            font-size: 16px;
            font-weight: 600;
            color: #f3f4f6;
            line-height: 1.25;
        }

        .brand-subtitle {
            font-size: 12px;
            color: #9aa0a6;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 13px;
            color: #b8bcc4;
        }

        .nav-user strong {
            color: #f3f4f6;
        }

        /* Main Container */
        .container {
            width: 100%;
            max-width: 1150px;
            margin: 24px auto;
            padding: 0 20px;
            flex: 1;
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background-color: #1b3a24;
            color: #b7ebc6;
            border: 1px solid #2e6b3e;
            font-weight: 600;
        }

        .alert-danger {
            background-color: #3d1c1e;
            color: #f8bcbc;
            border: 1px solid #7a2e32;
        }

        .alert-danger ul {
            margin-left: 20px;
            margin-top: 6px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 9px 16px;
            font-size: 14px;
            font-family: inherit;
            border: 1px solid transparent;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            line-height: 1.4;
            transition: background-color 0.15s ease, border-color 0.15s ease, opacity 0.15s ease;
        }

        .btn:hover {
            opacity: 0.92;
        }

        .btn-sm {
            padding: 5px 11px;
            font-size: 12px;
        }

        .btn-full {
            width: 100%;
            text-align: center;
        }

        .btn-primary {
            background-color: #1976d2;
            color: #ffffff;
        }

        .btn-success,
        .btn-save {
            background-color: #2e7d32;
            color: #ffffff;
        }

        .btn-cancel {
            background-color: #383a3f;
            color: #e2e4e8;
            border-color: #4b4e54;
        }

        .btn-danger {
            background-color: #c62828;
            color: #ffffff;
        }

        .btn-edit {
            background-color: #23384d;
            color: #64b5f6;
            border-color: #2f4f6e;
        }

        .btn-delete {
            background-color: #3e2224;
            color: #ef9a9a;
            border-color: #643236;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .page-title {
            color: #ffffff;
            font-size: 22px;
            font-weight: 600;
        }

        .page-subtitle {
            color: #9aa0a6;
            font-size: 13px;
            margin-top: 2px;
        }

        /* Cards & Forms */
        .form-container {
            background-color: #2a2b2e;
            padding: 26px;
            border-radius: 8px;
            max-width: 780px;
            margin: 0 auto;
            border: 1px solid #383a3f;
        }

        .auth-card {
            background-color: #2a2b2e;
            padding: 28px;
            border-radius: 8px;
            max-width: 420px;
            margin: 36px auto;
            border: 1px solid #383a3f;
        }

        .card-title {
            color: #f3f4f6;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .card-subtitle {
            color: #9aa0a6;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .auth-card .card-title,
        .auth-card .card-subtitle {
            text-align: center;
        }

        .form-section-title {
            color: #64b5f6;
            font-size: 14px;
            font-weight: 600;
            margin-top: 22px;
            margin-bottom: 14px;
            padding-top: 16px;
            border-top: 1px solid #383a3f;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #d6d9df;
            font-weight: 600;
            font-size: 13px;
        }

        .form-control {
            background-color: #1d1e20;
            border: 1px solid #383a3f;
            color: #f3f4f6;
            padding: 9px 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-control::placeholder {
            color: #6f757e;
        }

        .form-control:focus {
            outline: none;
            border-color: #64b5f6;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            font-size: 13px;
            color: #c4c7cc;
            cursor: pointer;
        }

        .field-error {
            color: #ff8a80;
            font-size: 12px;
            margin-top: 4px;
        }

        .form-actions {
            margin-top: 22px;
            padding-top: 16px;
            border-top: 1px solid #383a3f;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .auth-footer {
            margin-top: 18px;
            padding-top: 14px;
            border-top: 1px solid #383a3f;
            text-align: center;
            font-size: 13px;
            color: #9aa0a6;
        }

        .auth-footer a {
            color: #64b5f6;
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        /* Table Card */
        .table-card {
            background-color: #2a2b2e;
            border: 1px solid #383a3f;
            border-radius: 8px;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .data-table thead th {
            background-color: #222326;
            color: #d6d9df;
            font-weight: 600;
            text-align: left;
            padding: 12px 14px;
            border-bottom: 1px solid #383a3f;
            white-space: nowrap;
        }

        .data-table tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid #33353a;
            vertical-align: top;
            color: #e2e4e8;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr:nth-child(even) {
            background-color: #26272a;
        }

        .data-table tbody tr:hover {
            background-color: #303236;
        }

        .text-center {
            text-align: center !important;
        }

        .text-muted {
            color: #9aa0a6;
            font-size: 12px;
        }

        .code-pill {
            display: inline-block;
            background-color: #1d1e20;
            border: 1px solid #383a3f;
            color: #64b5f6;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 12px;
            white-space: nowrap;
        }

        /* Status Badges */
        .badge {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-active {
            background-color: #1b3a24;
            color: #81c784;
            border: 1px solid #2e6b3e;
        }

        .badge-inactive {
            background-color: #3d1c1e;
            color: #ef9a9a;
            border: 1px solid #7a2e32;
        }

        .badge-suspend {
            background-color: #3d2e14;
            color: #ffd54f;
            border: 1px solid #7a5c22;
        }

        .table-actions {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 32px 16px !important;
            color: #9aa0a6 !important;
        }

        /* Footer */
        .footer {
            margin-top: auto;
            background-color: #242528;
            border-top: 1px solid #383a3f;
            color: #8c929a;
            text-align: center;
            font-size: 12px;
            padding: 14px 20px;
        }

        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .navbar-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="navbar-inner">
            <a href="{{ Auth::check() ? route('vendors.index') : route('login') }}" class="brand">
                <img src="{{ asset('placeholderLogo.png') }}" alt="Logo Sistem Inventaris" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-title">Sistem Informasi Inventaris Gudang</span>
                    <span class="brand-subtitle">Modul B &mdash; Vendor &amp; Supplier</span>
                </div>
            </a>

            @auth
                <div class="nav-user">
                    <span>Halo, <strong>{{ Auth::user()->name }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        Sistem Informasi Inventaris Gudang &bull; Modul B (Manajemen Vendor &amp; Supplier)
    </footer>

</body>
</html>
