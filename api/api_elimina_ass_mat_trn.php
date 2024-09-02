<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $com_id = $_GET["com_id"];
    $sql = " DELETE FROM composizione WHERE com_id = " . $com_id;

    if ($com_id != "") {
        $result = $conn->query($sql);
        echo "OK";
    } else {
        echo "KO";
    }
?>

<?php include '../config/db_close.php' ?>