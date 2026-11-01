<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
  $id = $_POST['id']; $nama = $_POST['nama']; $harga = $_POST['harga'];
  if ($id == "")
    mysqli_query($koneksi, "INSERT INTO barang(nama,harga) VALUES('$nama','$harga')");
  else
    mysqli_query($koneksi, "UPDATE barang SET nama='$nama', harga='$harga' WHERE id=$id");
  header("Location: barang.php");
}
if (isset($_GET['hapus'])) {
  mysqli_query($koneksi, "DELETE FROM barang WHERE id=" . (int) $_GET['hapus']);
  header("Location: barang.php");
}
$edit = ["id"=>"", "nama"=>"", "harga"=>""];
if (isset($_GET['edit']))
  $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM barang WHERE id=" . (int) $_GET['edit']));
$read = mysqli_query($koneksi, "SELECT * FROM barang");
?>
<h1>Data Barang</h1>
<a href="index.php">Kembali</a>
<form method="post">
  <input type="hidden" name="id" value="<?= $edit['id'] ?>">
  Nama <input type="text" name="nama" value="<?= $edit['nama'] ?>">
  Harga <input type="number" name="harga" value="<?= $edit['harga'] ?>">
  <input type="submit" name="simpan" value="Simpan">
</form>
<table border="1">
<tr><th>ID</th><th>Nama</th><th>Harga</th><th>Operasi</th></tr>
<?php while ($d = mysqli_fetch_array($read)) { ?>
<tr>
  <td><?= $d['id'] ?></td>
  <td><?= $d['nama'] ?></td>
  <td><?= $d['harga'] ?></td>
  <td><a href="?edit=<?= $d['id'] ?>">Edit</a> | <a href="?hapus=<?= $d['id'] ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
