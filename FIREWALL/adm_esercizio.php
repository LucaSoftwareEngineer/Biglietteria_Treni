<?php
    if ($_SESSION["admin_esercizio"] == "N") {
        header('location: ./index.php');
    }

    if (!isset($_SESSION['admin_esercizio'])) {
        header('location: ./index.php');
    }
?>