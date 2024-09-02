<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php 

    $sql_adm = " ";
    $sql_adm .= " UPDATE utenti SET ute_nome = '".$_GET["ute_nome"]."', ";
    $sql_adm .= " ute_cognome = '".$_GET["ute_cognome"]."', ";
    $sql_adm .= " ute_email = '".$_GET["ute_email"]."', ";
    $sql_adm .= " ute_psw = '".$_GET["ute_psw"]."' ";
    $sql_adm .= " WHERE ute_id = ".$_SESSION['user'];

    $result = $conn->query($sql_adm);

    echo "OK";
?>

<?php include '../config/db_close.php' ?>