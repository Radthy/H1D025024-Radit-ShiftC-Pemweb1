<?php
include "koneksi.php";
if (isset($_POST['simpan'])) {
  $id = $_POST['id']; $nama = $_POST['nama']; $nomor_hp = $_POST['nomor_hp']; $alamat = $_POST['alamat'];
  if ($id == "")
    mysqli_query($koneksi, "INSERT INTO pembeli(nama,nomor_hp,alamat) VALUES('$nama','$nomor_hp','$alamat')");
  else
    mysqli_query($koneksi, "UPDATE pembeli SET nama='$nama', nomor_hp='$nomor_hp', alamat='$alamat' WHERE id=$id");
  header("Location: pembeli.php");
}
if (isset($_GET['hapus'])) {
  mysqli_query($koneksi, "DELETE FROM pembeli WHERE id=" . (int) $_GET['hapus']);
  header("Location: pembeli.php");
}
$edit = ["id"=>"", "nama"=>"", "nomor_hp"=>"", "alamat"=>""];
if (isset($_GET['edit']))
  $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pembeli WHERE id=" . (int) $_GET['edit']));
$read = mysqli_query($koneksi, "SELECT * FROM pembeli");
?>
<h1>Data Pembeli</h1>
<a href="index.php">Kembali</a>
<form method="post">
  <input type="hidden" name="id" value="<?= $edit['id'] ?>">
  Nama <input type="text" name="nama" value="<?= $edit['nama'] ?>">
  Nomor HP <input type="text" name="nomor_hp" value="<?= $edit['nomor_hp'] ?>">
  Alamat <input type="text" name="alamat" value="<?= $edit['alamat'] ?>">
  <input type="submit" name="simpan" value="Simpan">
</form>
<table border="1">
<tr><th>ID</th><th>Nama</th><th>Nomor HP</th><th>Alamat</th><th>Operasi</th></tr>
<?php while ($d = mysqli_fetch_array($read)) { ?>
<tr>
  <td><?= $d['id'] ?></td>
  <td><?= $d['nama'] ?></td>
  <td><?= $d['nomor_hp'] ?></td>
  <td><?= $d['alamat'] ?></td>
  <td><a href="?edit=<?= $d['id'] ?>">Edit</a> | <a href="?hapus=<?= $d['id'] ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
