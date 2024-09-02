<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $tra_id = $_GET["tra_id"];

    if ($tra_id != "") {
        $sql = " DELETE FROM tratte WHERE tra_id = " . $tra_id;
        $result = $conn->query($sql);
        echo "OK";
    } else {
        echo "KO";
    }

?>

<?php include '../config/db_close.php' ?>