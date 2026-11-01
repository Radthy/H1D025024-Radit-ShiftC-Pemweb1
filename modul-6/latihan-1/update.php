<?php
include("koneksi.php");
if (isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $konten = mysqli_real_escape_string($koneksi, $_POST['konten']);

    mysqli_query($koneksi, "UPDATE posts SET judul='$judul', konten='$konten' WHERE id=$id");

    header("Location: index.php");
}

$id = (int) $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM posts WHERE id=$id");
$post = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Edit Post Berita!</title></head>
<body>
    <h1>Edit Post Berita!</h1>
    <a href="index.php">Batal</a>
    <br/><br/>
    <form action="update.php" method="POST">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" maxlength="100" value="<?php echo htmlspecialchars($post['judul']); ?>" required></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" cols="40" rows="10" maxlength="1000" required><?php echo htmlspecialchars($post['konten']); ?></textarea></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $post['id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
