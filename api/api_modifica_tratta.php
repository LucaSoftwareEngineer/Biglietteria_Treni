<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php
    $tra_id = $_GET["tra_id"];
    $tra_ora_partenza = $_GET["edt_tra_ora_partenza"];
    $tra_trn_id = $_GET["edt_trn_id"];
    $distanza = $_GET["distanza"];

    $numeroFloat = floatval($distanza) / floatval("50");+
    $minuti = $numeroFloat * 60;
    $ore = floor($minuti / 60);
    $minutiRimasti = $minuti % 60;

    $ora_arrivo = " ADDTIME('". $tra_ora_partenza ."', '". $ore .":". $minutiRimasti ."') ";

    $sql = " UPDATE tratte SET tra_ora_partenza = '". $tra_ora_partenza."', ";
    $sql .= " tra_ora_arrivo = " . $ora_arrivo . ", tra_trn_id = " . $tra_trn_id;
    $sql .= " WHERE tra_id = ".$tra_id;

    $result = $conn->query($sql);

    echo "OK";
?>

<?php include '../config/db_close.php' ?>