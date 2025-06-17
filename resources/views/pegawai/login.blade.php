<?php
session_start();

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db_pegawai");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$error = "";

// Proses logout jika parameter ?logout=1
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login_pegawai.php");
    exit;
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM pegawai WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['pegawai_id'] = $row['id'];
            $_SESSION['pegawai_nama'] = $row['nama'];
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Pegawai</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; margin: 0; padding: 0; }
        .container { display: flex; height: 100vh; justify-content: center; align-items: center; }
        .box { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc; width: 300px; }
        input[type=text], input[type=password] { width: 100%; padding: 8px; margin: 6px 0; border: 1px solid #ccc; border-radius: 4px; }
        input[type=submit] { background: blue; color: white; padding: 10px; border: none; width: 100%; border-radius: 4px; }
        .error { color: red; margin-top: 10px; }
        .logout { text-align: right; }
    </style>
</head>
<body>
<div class="container">
    <div class="box">
        <?php if (isset($_SESSION['pegawai_id'])): ?>
            <div class="logout">
                <a href="?logout=1" style="float:right;">Logout</a>
            </div>
            <h2>Selamat Datang</h2>
            <p>Halo, <strong><?= htmlspecialchars($_SESSION['pegawai_nama']) ?></strong>!</p>
            <p>Anda berhasil login sebagai pegawai.</p>
        <?php else: ?>
            <h2>Login Pegawai</h2>
            <form method="post" action="">
                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="password" name="password" required>

                <input type="submit" value="Login">
            </form>
            <?php if ($error): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
