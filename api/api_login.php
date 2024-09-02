<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $sql_adm = " ";
    $sql_adm .= " SELECT ute_id, ute_adm_esercizio, ute_adm_amministrativo FROM utenti ";
    $sql_adm .= " WHERE ute_email = '" . $_GET["adm_usr"] . "' ";
    $sql_adm .= " AND ute_psw = '" . $_GET["adm_psw"] . "' ";

    $result = $conn->query($sql_adm);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $_SESSION['user'] = $row["ute_id"];
            $ute_adm_esercizio = $row["ute_adm_esercizio"];
            $ute_adm_amministrativo = $row["ute_adm_amministrativo"];

            if ($ute_adm_esercizio == "S") {
                $_SESSION['admin_esercizio'] = "S";
            } else {
                $_SESSION['admin_esercizio'] = "N";
            }

            if ($ute_adm_amministrativo == "S") {
                $_SESSION['admin_backoffice'] = "S";
            } else {
                $_SESSION['admin_backoffice'] = "N";
            }

            echo "OK";
        }
    } else {
        echo "KO";
    }
?>

<?php include '../config/db_close.php' ?>