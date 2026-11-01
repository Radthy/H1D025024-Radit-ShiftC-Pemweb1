<?php
include("koneksi.php");
if (isset($_POST['tambah'])) {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $konten = mysqli_real_escape_string($koneksi, $_POST['konten']);

    mysqli_query($koneksi, "INSERT INTO posts(judul, konten) VALUES('$judul','$konten')");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Tambah Post Berita!</title></head>
<body>
    <h1>Tambah Post Berita!</h1>
    <a href="index.php">Batal</a>
    <br/><br/>
    <form action="create.php" method="POST">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" maxlength="100" required></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" cols="40" rows="10" maxlength="1000" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
