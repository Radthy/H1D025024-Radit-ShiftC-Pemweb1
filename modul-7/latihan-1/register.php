<?php
include "koneksi.php";
$pesan = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if ($password !== $konfirmasi) {
        $pesan = "Konfirmasi password tidak sama!";
    } else {
        // cek username sudah ada atau belum
        $stmt = mysqli_prepare($conn, "SELECT id FROM user WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $pesan = "Username sudah dipakai, coba yang lain!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = mysqli_prepare($conn, "INSERT INTO user (username, password) VALUES (?, ?)");
            mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
            mysqli_stmt_execute($stmt);
            header("Location: login.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <h1>Halaman Registrasi Akun Mahasiswa</h1>
    <?php if ($pesan) echo "<p style='color:red'>$pesan</p>"; ?>
    <form method="POST">
        <ul>
            <li>Username<br><input type="text" name="username" required></li>
            <li>Password<br><input type="password" name="password" required></li>
            <li>Konfirmasi Password<br><input type="password" name="konfirmasi" required></li>
            <li><input type="submit" name="register" value="Register!"></li>
        </ul>
    </form>
    <a href="login.php">Sudah memiliki akun?</a>
</body>
</html>
