<?php
session_start();
include "koneksi.php";
$pesan = "";

// kalau sudah login, langsung ke index
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT password FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $pesan = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Halaman Login User yang Terdaftar!</h1>
    <?php if ($pesan) echo "<p style='color:red'>$pesan</p>"; ?>
    <form method="POST">
        <ul>
            <li>Username <input type="text" name="username" required></li>
            <li>Password <input type="password" name="password" required></li>
            <li><input type="submit" name="login" value="Login!"></li>
        </ul>
    </form>
    <a href="register.php">Buat akun baru!</a>
</body>
</html>
