<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $sql = " INSERT INTO comunicazioni (com_oggetto, com_messaggio) VALUES ( '".$_GET["com_oggetto"]."', '".$_GET["com_messaggio"]."' ) ";

    $result = $conn->query($sql);

    echo "OK";
?>

<?php include '../config/db_close.php' ?>