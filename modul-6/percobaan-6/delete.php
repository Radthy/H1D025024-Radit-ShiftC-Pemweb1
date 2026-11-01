<?php
session_start();
include('koneksi.php');
$id = (int) $_GET['id'];
$stmt = mysqli_query($koneksi, "delete from pengguna where id=$id");
header("Location:index.php");
?>
