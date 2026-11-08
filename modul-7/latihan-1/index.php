<?php
session_start();

// logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// cek session, kalau belum login balik ke login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <h1>Hallo <?php echo htmlspecialchars($_SESSION['username']); ?> 👋,</h1>
    <h3>Selamat Datang Di Halaman Latihan Belajar Session dan User Authentication!</h3>
    <a href="index.php?logout=1">Logout</a>
</body>
</html>
