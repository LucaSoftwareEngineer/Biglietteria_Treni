<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $sql = " UPDATE biglietti SET bigl_data = '".$_GET["edt_bigl_data"]."' WHERE bigl_id = ".$_GET["bigl_id"];

    $result = $conn->query($sql);

echo "OK";
?>

<?php include '../config/db_close.php' ?>