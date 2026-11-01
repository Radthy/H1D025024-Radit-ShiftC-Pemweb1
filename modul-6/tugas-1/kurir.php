<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
  $id = $_POST['id']; $nama = $_POST['nama']; $nomor_hp = $_POST['nomor_hp'];
  if ($id == "")
    mysqli_query($koneksi, "INSERT INTO kurir(nama,nomor_hp) VALUES('$nama','$nomor_hp')");
  else
    mysqli_query($koneksi, "UPDATE kurir SET nama='$nama', nomor_hp='$nomor_hp' WHERE id=$id");
  header("Location: kurir.php");
}
if (isset($_GET['hapus'])) {
  mysqli_query($koneksi, "DELETE FROM kurir WHERE id=" . (int) $_GET['hapus']);
  header("Location: kurir.php");
}
$edit = ["id"=>"", "nama"=>"", "nomor_hp"=>""];
if (isset($_GET['edit']))
  $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kurir WHERE id=" . (int) $_GET['edit']));
$read = mysqli_query($koneksi, "SELECT * FROM kurir");
?>
<h1>Data Kurir</h1>
<a href="index.php">Kembali</a>
<form method="post">
  <input type="hidden" name="id" value="<?= $edit['id'] ?>">
  Nama <input type="text" name="nama" value="<?= $edit['nama'] ?>">
  Nomor HP <input type="text" name="nomor_hp" value="<?= $edit['nomor_hp'] ?>">
  <input type="submit" name="simpan" value="Simpan">
</form>
<table border="1">
<tr><th>ID</th><th>Nama</th><th>Nomor HP</th><th>Operasi</th></tr>
<?php while ($d = mysqli_fetch_array($read)) { ?>
<tr>
  <td><?= $d['id'] ?></td>
  <td><?= $d['nama'] ?></td>
  <td><?= $d['nomor_hp'] ?></td>
  <td><a href="?edit=<?= $d['id'] ?>">Edit</a> | <a href="?hapus=<?= $d['id'] ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
