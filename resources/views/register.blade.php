
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Armada Operasional</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: white;
            padding: 20px;
            margin: 0;
        }

        header {
            text-align: center;
            border-bottom: 1px solid #444;
            padding-bottom: 15px;
        }

        .container {
            max-width: 480px;
            margin: 40px auto;
            background-color: #262626;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 25px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #222;
            color: white;
            border: 1px solid #444;
            border-radius: 4px;
            margin-bottom: 18px;
        }

        button {
            width: 100%;
            padding: 11px;
            background-color: #0288d1;
            color: white;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #0277bd;
        }

        .link {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #4da6ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: #ff6b6b;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <header>
        <h2>ARMADA OPERASIONAL</h2>
    </header>

    <div class="container">

        <h2>Register</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <label>Nama Lengkap</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama lengkap"
                required
            >

            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >

            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >

            <label>Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >

            <button type="submit">Register</button>
        </form>

        <div class="link">
            Sudah punya akun?
            <a href="{{ url('/login') }}">Login di sini</a>
        </div>

    </div>

</body>
</html>
