<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $com_id = $_GET["com_id"];
    $com_mat_id = $_GET["com_mat_id_"];

    $sql = " UPDATE composizione SET com_mat_id = " . $com_mat_id . " WHERE com_id = " . $com_id;

echo $sql;

    $result = $conn->query($sql);

    echo "OK";

?>

<?php include '../config/db_close.php' ?>