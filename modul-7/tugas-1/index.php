<?php
session_start();

// belum login -> balik ke login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// cek sisa waktu (10 detik sejak login)
$batas = 10;
$sisa = $batas - (time() - $_SESSION['waktu_login']);

if ($sisa <= 0) {
    header("Location: logout.php?pesan=habis");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <!-- setelah $sisa detik, browser otomatis pindah ke logout.php -->
    <meta http-equiv="refresh" content="<?php echo $sisa; ?>;url=logout.php?pesan=habis">
</head>
<body>
    <h1>Hallo <?php echo htmlspecialchars($_SESSION['username']); ?> 👋,</h1>
    <h3>Selamat Datang! Kamu akan otomatis logout dalam 10 detik.</h3>
    <a href="logout.php">Logout</a>
</body>
</html>
