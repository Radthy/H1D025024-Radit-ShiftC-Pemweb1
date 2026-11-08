<?php
$conn = mysqli_connect("localhost", "root", "", "db_session");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
