<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php
$trn_id = $_GET["trn_id"];
$sta_id_partenza = $_GET["sta_id_partenza"];
$sta_id_arrivo = $_GET["sta_id_arrivo"];
$ora_partenza = $_GET["ora_partenza"];
$tra_data_inizio = $_GET["tra_data_inizio"];
$tra_data_fine = $_GET["tra_data_fine"];

$trn_velocita = 1;

//recupero la velocità del treno
$sql = " SELECT trn_velocita FROM treni WHERE trn_id = " . $trn_id;
$result_get_velocita = $conn->query($sql);

if ($result_get_velocita->num_rows > 0) {
    while ($row = $result_get_velocita->fetch_assoc()) {
        $trn_velocita = $row["trn_velocita"];
    }
}

$ora_arrivo = $_GET["ora_partenza"]; //NOTA QUESTO VALORE E' PROVVISORIO E VIENE AGGIORNATO NELLA QUERY SOTTOSTANTE

//calcolo ora_arrivo
$sql = " ";
$sql .= " SELECT sta_id, sta_km FROM stazioni ";
$sql .= " WHERE (sta_id >= " . $sta_id_partenza . " AND sta_id <= " . $sta_id_arrivo . ") ";

$result_get_stazioni = $conn->query($sql);

if ($result_get_stazioni->num_rows > 0) {
    while ($row = $result_get_stazioni->fetch_assoc()) {

        $numeroFloat = floatval($row["sta_km"]) / floatval($trn_velocita);+
        $minuti = $numeroFloat * 60;
        $ore = floor($minuti / 60);
        $minutiRimasti = $minuti % 60;

        $ora_arrivo = " ADDTIME('". $ora_partenza ."', '". $ore .":". $minutiRimasti ."') ";

    }
}

//verifico se la tratta è disponibile
$sql = " ";
$sql .= " SELECT tra_id FROM tratte ";
$sql .= " WHERE tra_trn_id = " . $trn_id;
$sql .= " AND tra_data_inizio = '" . $tra_data_inizio . "'";
$sql .= " AND tra_data_fine = '" . $tra_data_fine . "'";
$sql .= " AND tra_ora_partenza = '" . $ora_partenza . "' ";
$sql .= " AND tra_ora_arrivo = (" . $ora_arrivo . ")";
$sql .= " AND tra_sta_id_partenza = " . $sta_id_partenza;
$sql .= " AND tra_sta_id_arrivo = " . $sta_id_arrivo;

$result_get_disponibile = $conn->query($sql);

if ($result_get_disponibile->num_rows > 0) {
    echo "KO_1";
} else {

    //verifico se il treno nel ora di partenza e' presente nella stazione
    $sql = " ";
    $sql .= " SELECT tra_id FROM tratte ";
    $sql .= " WHERE tra_trn_id = " . $trn_id;
    $sql .= " AND tra_data_inizio = '" . $tra_data_inizio . "'";
    $sql .= " AND tra_data_fine = '" . $tra_data_fine . "'";
    $sql .= " AND tra_ora_arrivo <= ('" . $ora_partenza . "')";
    $sql .= " AND tra_sta_id_arrivo = " . $sta_id_partenza;
    $sql .= " ORDER BY tra_ora_arrivo DESC LIMIT 1 ";

    $result_get_treno_in_stazione = $conn->query($sql);
    if ($result_get_treno_in_stazione->num_rows > 0) {
        //inserisco la tratta nel database
        $sql = " ";
        $sql .= " INSERT INTO tratte ";
        $sql .= " (tra_trn_id, tra_sta_id_partenza, tra_sta_id_arrivo, ";
        $sql .= " tra_ora_partenza, tra_ora_arrivo, tra_data_inizio, tra_data_fine) ";
        $sql .= " VALUES ";
        $sql .= " (" . $trn_id . ", " . $sta_id_partenza . ", " . $sta_id_arrivo . ", ";
        $sql .= " '" . $ora_partenza . "', (" . $ora_arrivo . "), '" . $tra_data_inizio . "', '" . $tra_data_fine . "') ";

        $result_ins_tratta = $conn->query($sql);

        echo "OK";
    }else{
        if ($sta_id_partenza == "1") {
            //inserisco la tratta nel database
            $sql = " ";
            $sql .= " INSERT INTO tratte ";
            $sql .= " (tra_trn_id, tra_sta_id_partenza, tra_sta_id_arrivo, ";
            $sql .= " tra_ora_partenza, tra_ora_arrivo, tra_data_inizio, tra_data_fine) ";
            $sql .= " VALUES ";
            $sql .= " (" . $trn_id . ", " . $sta_id_partenza . ", " . $sta_id_arrivo . ", ";
            $sql .= " '" . $ora_partenza . "', (" . $ora_arrivo . "), '" . $tra_data_inizio . "', '" . $tra_data_fine . "') ";

            $result_ins_tratta = $conn->query($sql);

            echo "OK";
        } else {
            echo "KO_2";
        }
    }


}


?>

<?php include '../config/db_close.php' ?>