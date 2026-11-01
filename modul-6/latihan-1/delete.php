<?php
include("koneksi.php");
$id = (int) $_GET['id'];
mysqli_query($koneksi, "DELETE FROM posts WHERE id=$id");
header("Location: index.php");
?>
