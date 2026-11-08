<?php
session_start();
session_unset();
session_destroy();

if (isset($_GET['pesan']) && $_GET['pesan'] === "habis") {
    header("Location: login.php?pesan=habis");
} else {
    header("Location: login.php");
}
exit;
