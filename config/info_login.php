<?php
include '../FIREWALL/index.php';

    $sql_info_login = " ";
    $sql_info_login .= " SELECT ute_nome, ute_cognome, ute_email, ute_psw FROM utenti ";
    $sql_info_login .= " WHERE ute_id = " . $_SESSION['user'];

    $result = $conn->query($sql_info_login);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $ute_nome = $row["ute_nome"];
            $ute_cognome = $row["ute_cognome"];
            $ute_email = $row["ute_email"];
            $ute_psw = $row["ute_psw"];
        }
    }
?>