<?php
session_start();

// data user diambil dari array (bukan database)
$users = [
    "andi"  => "andi123",
    "bunga" => "bunga321"
];

$pesan = "";

// kalau sudah login, langsung ke index
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// pesan kalau dilempar balik karena waktu habis
if (isset($_GET['pesan']) && $_GET['pesan'] === "habis") {
    $pesan = "Waktu 10 detik habis, kamu otomatis logout.";
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['waktu_login'] = time();
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
    <h1>Halaman Login</h1>
    <?php if ($pesan) echo "<p style='color:red'>$pesan</p>"; ?>
    <form method="POST">
        <ul>
            <li>Username <input type="text" name="username" required></li>
            <li>Password <input type="password" name="password" required></li>
            <li><input type="submit" name="login" value="Login!"></li>
        </ul>
    </form>
</body>
</html>
