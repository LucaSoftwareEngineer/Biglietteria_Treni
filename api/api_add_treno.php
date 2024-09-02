<?php include '../config/db_open.php' ?>
<?php include '../config/session.php' ?>

<?php

    $tm_nome = str_replace("'","''",$_GET["tm_nome"]);
    $tm_locomotiva = $_GET["tm_locomotiva"];
    $tm_carrozza = $_GET["tm_carrozza"];

    $msg = "0";

    $sql = " ";
    $sql .= " INSERT INTO treni ";
    $sql .= " (trn_nome, trn_velocita) ";
    $sql .= " VALUES ";
    $sql .= " ('".$tm_nome."', 50) ";

    $result_ins_treno = $conn->query($sql);

    $sql = " SELECT trn_id FROM treni ORDER BY trn_id DESC LIMIT 1 ";

    $result_get_treno = $conn->query($sql);

    if ($result_get_treno->num_rows > 0) {
        while ($row = $result_get_treno->fetch_assoc()) {
            $trn_id = $row["trn_id"];

            $msg = $trn_id;

            $sql = " ";
            $sql .= " INSERT INTO composizione ";
            $sql .= " (com_mat_id, com_trn_id) ";
            $sql .= " VALUES ";
            $sql .= " (" . $tm_locomotiva . ", " . $trn_id . ") ";

            $result_ins_locomotiva = $conn->query($sql);

            if ($tm_carrozza != "0") {
                $sql = " ";
                $sql .= " INSERT INTO composizione ";
                $sql .= " (com_mat_id, com_trn_id) ";
                $sql .= " VALUES ";
                $sql .= " (" . $tm_carrozza . ", " . $trn_id . ") ";

                $result_ins_carrozza = $conn->query($sql);
            }

        }

        echo $msg;

    } else {
        echo "0";
    }


?>

<?php include '../config/db_close.php' ?>