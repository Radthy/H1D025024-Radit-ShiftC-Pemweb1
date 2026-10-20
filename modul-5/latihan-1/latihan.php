<!DOCTYPE html>
<html>
<head>
    <title>Latihan - Array Multidimensi</title>
</head>
<body>
<?php
$mahasiswa = array(
    array("Romi", "Bogor", 22),
    array("Anto", "Depok", 23),
    array("Putri", "Bangka", 21)
);

foreach ($mahasiswa as $data) {
    echo $data[0] . "<br>";
    echo "Asal : " . $data[1] . "<br>";
    echo "Umur : " . $data[2] . "<br><br>";
}
?>
</body>
</html>
