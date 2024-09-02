<!DOCTYPE html>
<html lang="it">
<?php session_start() ?>
<?php include '../config/db_open.php' ?>
<?php include '../config/head_no_firewall.php' ?>
    <body>
        <div class="container-scroller">
            <?php include '../config/navbar_no_firewall.php' ?>
            <div class="container-fluid page-body-wrapper">

            <?php include '../config/sidebar_no_firewall.php' ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="alert alert-warning" role="alert" style="margin-left: 10px;">
                        ATTENZIONE: Per acquistare i biglietti devi essere un utente registrato.
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Corse Disponibili</h4>
                            <p class="card-description">
                            Elenco delle corse disponibili ora.
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="7" align="center">ELENCO CORSE DISPONIBILI</th>
                                            <?php
                                            if (!empty($_GET["s"])) {
                                            ?>
                                                <a href="tratte.php" class="btn btn-danger">RIMUOVI FILTRO</a>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <th>Codice</th>
                                            <th>Nome del Treno</th>
                                            <th>Stazione di Partenza</th>
                                            <th>Ora di Partenza</th>
                                            <th>Stazione di Arrivo</th>
                                            <th>Ora di Arrivo</th>
                                            <th>Costo</th>
                                            <th>Percorso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = " ";
                                        $sql .=  " SELECT T.tra_id, M.trn_id, M.trn_nome, M.trn_velocita, T.tra_sta_id_partenza, T.tra_sta_id_arrivo, T.tra_ora_partenza, T.tra_ora_arrivo ";
                                        $sql .=  " FROM tratte AS T ";
                                        $sql .=  " INNER JOIN treni AS M ON M.trn_id = T.tra_trn_id ";
                                        $sql .= " WHERE ";
                                        $sql .= " CURRENT_DATE() BETWEEN T.tra_data_inizio AND T.tra_data_fine; ";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $tra_id = $row["tra_id"];
                                                $trn_id = $row["trn_id"];
                                                $trn_nome = $row["trn_nome"];
                                                $trn_velocita = $row["trn_velocita"];
                                                $tra_sta_id_partenza = $row["tra_sta_id_partenza"];
                                                $tra_sta_id_arrivo = $row["tra_sta_id_arrivo"];
                                                $tra_ora_partenza = $row["tra_ora_partenza"];
                                                $tra_ora_arrivo = $row["tra_ora_arrivo"];
                                                $sta_km_partenza;
                                                $sta_km_arrivo;
                                        ?>

                                        <tr>
                                            <td><?php echo $tra_id; ?></td>
                                            <td><?php echo $trn_nome; ?></td>
                                            <td>
                                                <!-- Begin Stazione Partenza -->
                                                <?php
                                                    $sql = " SELECT sta_nome, sta_km FROM stazioni WHERE sta_id = " . $tra_sta_id_partenza;

                                                    $result_get_sta_partenza = $conn->query($sql);

                                                    if ($result_get_sta_partenza->num_rows > 0) {
                                                        while ($row = $result_get_sta_partenza->fetch_assoc()) {
                                                            $stazione_partenza = $row["sta_nome"];
                                                            $sta_km_partenza = $row["sta_km"];
                                                            echo $stazione_partenza;
                                                        }
                                                    }
                                                ?>
                                                <!-- End Stazione Partenza -->
                                            </td>
                                            <td>
                                                <!-- Begin Ora Partenza -->
                                                <?php echo $tra_ora_partenza; ?>
                                                <!-- End Ora Partenza -->
                                            </td>
                                            <td>
                                                <!-- Begin Stazione Arrivo -->
                                                <?php
                                                    $sql = " SELECT sta_nome, sta_km FROM stazioni WHERE sta_id = " . $tra_sta_id_arrivo;

                                                    $result_get_sta_arrivo = $conn->query($sql);

                                                    if ($result_get_sta_arrivo->num_rows > 0) {
                                                        while ($row = $result_get_sta_arrivo->fetch_assoc()) {
                                                            $stazione_arrivo = $row["sta_nome"];
                                                            $sta_km_arrivo = $row["sta_km"];
                                                            echo $stazione_arrivo;
                                                        }
                                                    }
                                                ?>
                                                <!-- End Stazione Arrivo -->
                                            </td>
                                            <td>
                                                <!-- Begin Ora Arrivo -->
                                                <?php echo $tra_ora_arrivo; ?>
                                                <!-- End Ora Arrivo -->
                                            </td>
                                            <td>
                                                <!-- Begin Costo al KM -->
                                                <?php
                                                    $sta_distanza;
                                                    if ($sta_km_partenza <= $sta_km_arrivo) {
                                                        $sta_distanza = $sta_km_arrivo - $sta_km_partenza;
                                                    } else {
                                                        $sta_distanza = $sta_km_partenza - $sta_km_arrivo;
                                                    }

                                                    $costo_percorso = $sta_distanza * 0.20;

                                                    echo $costo_percorso;
                                                ?>
                                                <!-- End Costo al KM -->
                                            </td>
                                            <td>
                                                <button class="btn btn-info" data-toggle="modal" data-target="#mostraPercorso<?php echo $tra_id; ?>">PERCORSO</button>
                                                <!-- begin modal -->
                                                <div class="modal fade" id="mostraPercorso<?php echo $tra_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Percorso del treno</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background-color: white; border: none;">
                                                                    <img style="width: 20px; height: auto;" src="../images/icons/icons8-close-48.png" alt="icona chiusura modulo" />
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table width="100%" class="tbl_anagrafica">
                                                                    <tr>
                                                                        <th>Stazione</th>
                                                                        <th>Km</th>
                                                                    </tr>
                                                                    <?php
                                                                    $sql = " SELECT sta_nome, sta_km FROM stazioni ";
                                                                    if (intval($tra_sta_id_partenza) > ($tra_sta_id_arrivo)) {
                                                                        $sql .= " WHERE (sta_id >= " . $tra_sta_id_arrivo . " AND sta_id <= " . $tra_sta_id_partenza . ") ";
                                                                    } else {
                                                                        $sql .= " WHERE (sta_id >= " . $tra_sta_id_partenza . " AND sta_id <= " . $tra_sta_id_arrivo . ") ";
                                                                    }

                                                                    $result_get_sta_percorso = $conn->query($sql);

                                                                    if ($result_get_sta_percorso->num_rows > 0) {
                                                                        while ($row = $result_get_sta_percorso->fetch_assoc()) {
                                                                            $sta_nome = $row["sta_nome"];
                                                                            $sta_km = $row["sta_km"];


                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $sta_nome; ?></td>
                                                                        <td><?php echo $sta_km; ?></td>
                                                                    </tr>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end modal -->
                                            </td>
                                        </tr>

                                        <?php
                                            }
                                        } else {
                                        ?>
                                        <tr>
                                            <td colspan="7">
                                                <b style="color: red">Nessuna tratta disponibile al momento...</b>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->
               <footer class="footer">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                     <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024. Luca Santoro - Studente del Università Guglielmo Marconi</span>
                  </div>
               </footer>
               <!-- partial -->
            </div>
        </div>
        <?php include '../config/core_js.php' ?>
    </body>
</html>
<?php include '../config/db_close.php' ?>