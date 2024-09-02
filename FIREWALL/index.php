<?php

    if (!isset($_SESSION['user'])) {
        header('location: ./index.php');
    }

    if ($_SESSION['user'] == '') {
        header('location: ../LOGIN/');
    }
?>