<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $sql = " INSERT INTO utenti (ute_nome, ute_cognome, ute_email, ute_psw, ute_adm_amministrativo, ute_adm_esercizio) ";
    $sql .= " VALUES (";
    $sql .= " '".$_GET["reg_nome"]."', '".$_GET["reg_cognome"]."', '".$_GET["reg_email"]."', '".$_GET["reg_psw"]."', 'N', 'N' ";
    $sql .= ")";

    $result = $conn->query($sql);

    echo "OK";
?>

<?php include '../config/db_close.php' ?>