<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $com_trn_id = $_GET["com_trn_id"];
    $com_mat_id = $_GET["com_mat_id"];

    $sql = " INSERT INTO composizione (com_trn_id, com_mat_id) VALUES (".$com_trn_id.",".$com_mat_id.") ";

    $result = $conn->query($sql);

    echo "OK";
?>

<?php include '../config/db_close.php' ?>