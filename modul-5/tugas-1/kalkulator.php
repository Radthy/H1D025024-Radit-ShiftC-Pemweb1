<?php
$hasil = "";

if (isset($_POST['hitung'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];

    if ($operator == "+") {
        $hasil = $angka1 + $angka2;
    } elseif ($operator == "-") {
        $hasil = $angka1 - $angka2;
    } elseif ($operator == "*") {
        $hasil = $angka1 * $angka2;
    } elseif ($operator == "/") {
        if ($angka2 == 0) {
            $hasil = "Tidak bisa dibagi dengan nol";
        } else {
            $hasil = $angka1 / $angka2;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>
    <form method="post" action="">
        <input type="number" name="angka1" step="any" placeholder="Angka 1" required>
        <select name="operator">
            <option value="+">+ (Tambah)</option>
            <option value="-">- (Kurang)</option>
            <option value="*">* (Kali)</option>
            <option value="/">/ (Bagi)</option>
        </select>
        <input type="number" name="angka2" step="any" placeholder="Angka 2" required>
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php if ($hasil !== "") { ?>
        <h3>Hasil: <?php echo $hasil; ?></h3>
    <?php } ?>
</body>
</html>