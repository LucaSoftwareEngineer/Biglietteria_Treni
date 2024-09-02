<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $tra_id = $_GET["tra_id"];
    $bigl_data = $_GET["bigl_data"];

    $sql = " INSERT INTO biglietti ";
    $sql .= " (bigl_tra_id, bigl_ute_id, bigl_data) ";
    $sql .= " VALUES ";
    $sql .= " (".$tra_id.", ". $_SESSION['user'].", '". $bigl_data."') ";

    $result_ins_biglietto = $conn->query($sql);

    echo "OK";

?>

<?php include '../config/db_close.php' ?>