<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
</head>
<body style="background: #1a1a1a; color: #fff; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form action="cek_login.php" method="POST" style="background: #242424; padding: 30px; border-radius: 8px;">
        <h3>Silakan Login</h3>
        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'belum_login'): ?>
            <p style="color: #f87171; font-size: 13px;">Anda harus login dulu untuk mengakses halaman tersebut!</p>
        <?php endif; ?>
        <div style="margin-bottom: 15px;">
            <label>Username:</label><br>
            <input type="text" name="username" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Password:</label><br>
            <input type="password" name="password" required style="width: 100%; padding: 8px; margin-top: 5px;">
        </div>
        <button type="submit" name="login" style="background: #16a34a; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer;">Login</button>
    </form>
</body>
</html>