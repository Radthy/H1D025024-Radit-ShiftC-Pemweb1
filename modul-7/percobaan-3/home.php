<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Percobaan 3</title>
</head>

<body>
    <?php echo "<H1> Hallo " . $_SESSION["nama"] . ",</H1>"; ?>
    <H3> Selamat Datang Di Situs Kami </H3>

    <?php
    echo "Umur : " . $_SESSION["umur"] . " tahun <BR>";
    echo "Alamat email : " . $_SESSION["email"] . "<BR>"; ?> <BR>
</body>

</html>