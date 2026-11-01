<?php
// Buka file ini SEKALI di browser untuk membuat database + tabel + data contoh
$k = mysqli_connect("localhost", "root", "") or die("MySQL belum jalan");
mysqli_multi_query($k, file_get_contents("database.sql"));
while (mysqli_next_result($k)) {}
echo "Database berhasil dibuat. <a href='index.php'>Buka index</a>";
?>
