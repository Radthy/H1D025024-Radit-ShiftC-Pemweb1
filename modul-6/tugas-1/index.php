<?php
include "koneksi.php";
$read = mysqli_query($koneksi, "SELECT barang.id, barang.nama AS barang, pembeli.nama AS pembeli, kurir.nama AS kurir FROM barang JOIN pembeli ON barang.id=pembeli.id JOIN kurir ON barang.id=kurir.id");
?>
<h1>Menampilkan data dari database!</h1>
<a href="barang.php">Barang</a> | <a href="pembeli.php">Pembeli</a> | <a href="kurir.php">Kurir</a>
<table border="1">
<tr><th>ID</th><th>Nama Barang</th><th>Nama Pembeli</th><th>Nama Kurir</th></tr>
<?php while ($d = mysqli_fetch_array($read)) { ?>
<tr>
  <td><?= $d['id'] ?></td>
  <td><?= $d['barang'] ?></td>
  <td><?= $d['pembeli'] ?></td>
  <td><?= $d['kurir'] ?></td>
</tr>
<?php } ?>
</table>
