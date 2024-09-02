<!DOCTYPE html>
<html lang="it">
<?php session_start() ?>
<?php include '../config/db_open.php' ?>
<?php include '../config/head.php' ?>
    <body>
        <div class="container-scroller">
            <?php include '../config/navbar.php' ?>
            <div class="container-fluid page-body-wrapper">

            <?php include '../config/sidebar.php' ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Tratte Disponibili</h4>
                            <p class="card-description">
                            Elenco delle tratte disponibili.
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="8" align="center">ELENCO CORSE DISPONIBILI</th>
                                            <?php
                                            if (!empty($_GET["s"])) {
                                            ?>
                                                <a href="tratte_logged.php" class="btn btn-danger">RIMUOVI FILTRO</a>
                                            <?php
                                            }
                                            ?>
                                            <?php 
                                            if ($_SESSION["admin_esercizio"] == "S") { 
                                            ?>
                                            <br />
                                            <button class="btn btn-success" onclick="location.href = 'aggiungi_tratta.php';">AGGIUNGI TRATTA</button>
                                            <br />
                                            <br />
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
                                            <th>Opzioni</th>
                                            <?php
                                            if ($_SESSION["admin_esercizio"] == "S") {
                                            ?>
                                            <th>Periodo</th>
                                            <?php
                                            }
                                            ?>
                                            <th>Percorso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = " ";
                                        $sql .= " SELECT T.tra_id, M.trn_id, M.trn_nome, M.trn_velocita, T.tra_sta_id_partenza, T.tra_sta_id_arrivo, T.tra_ora_partenza, T.tra_ora_arrivo ";

                                        if ($_SESSION["admin_esercizio"] == "S") {
                                            $sql .= " , T.tra_data_inizio, T.tra_data_fine ";
                                        }

                                        $sql .= " FROM tratte AS T ";
                                        $sql .= " INNER JOIN treni AS M ON M.trn_id = T.tra_trn_id ";

                                        if ($_SESSION["admin_esercizio"] == "N") {
                                            $sql .= " AND CURRENT_DATE() BETWEEN T.tra_data_inizio AND T.tra_data_fine; ";
                                        }

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
                                                if ($_SESSION["admin_esercizio"] == "S") {
                                                    $tra_data_inizio = $row["tra_data_inizio"];
                                                    $tra_data_fine = $row["tra_data_fine"];
                                                }
                                                $sta_km_partenza;
                                                $sta_km_arrivo;
                                        ?>

                                        <tr>
       
                                            <td>
                                                <?php echo $tra_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $trn_nome; ?>
                                            </td>
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

                                            <?php
                                            if ($_SESSION["admin_esercizio"] == "N") {
                                            ?>
                                            <td>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#modAcquistaBiglietto<?php echo $tra_id; ?>">
                                                    PRENOTA
                                                </button>

                                                <!-- Begin Modal -->
                                                <div class="modal fade" id="modAcquistaBiglietto<?php echo $tra_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modulo Acquisto Prenotazione</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background-color: white; border: none;">
                                                                    <img style="width: 20px; height: auto;" src="../images/icons/icons8-close-48.png" alt="icona chiusura modulo" />
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table width="100%" class="tbl_prenotazione">
                                                                    <tr>
                                                                        <td>
                                                                            <b>Data in cui prendi il treno</b>
                                                                        </td>
                                                                        <td>
                                                                            <input type="date" min="<?php echo $tra_data_inizio; ?>" max="<?php echo $tra_data_fine; ?>" style="color: black; height: 30px; font-size: 12px !important;" class="form-control" id="bigl_data_<?php echo $tra_id; ?>" />
                                                                        </td>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                                <button type="button" class="btn btn-primary" onclick="acquistaBiglietto(<?php echo $tra_id; ?>, <?php echo $costo_percorso; ?>)">Acquista</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->

                                            </td>
                                            <?php
                                            } else {
                                            ?>
                                            <td>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#modModificaTratta<?php echo $tra_id; ?>">
                                                    MODIFICA
                                                </button>

                                                <!-- Begin Modal -->
                                                <div class="modal fade" id="modModificaTratta<?php echo $tra_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modulo Modifica Tratta</h5>
                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background-color: white; border: none;">
                                                                    <img style="width: 20px; height: auto;" src="../images/icons/icons8-close-48.png" alt="icona chiusura modulo" />
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table width="100%" class="tbl_prenotazione">
                                                                    <tr>
                                                                        <td>
                                                                            <b>Ora Partenza</b>
                                                                        </td>
                                                                        <td>
                                                                            <input type="time" value="<?php echo $tra_ora_partenza; ?>" style="color: black; height: 30px; font-size: 12px !important;" class="form-control" id="edt_tra_ora_partenza_<?php echo $tra_id; ?>" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="display: none !important;">
                                                                        <td>
                                                                            <b>Convoglio</b>
                                                                        </td>
                                                                        <td>
                                                                            <select id="edt_trn_id_<?php echo $tra_id; ?>" style="color: black; height: 30px; font-size: 12px !important;" class="form-control">
                                                                            <?php
                                                                                $sql_ele_treni = " SELECT trn_id AS a, trn_nome AS b FROM treni ";

                                                                                $result_ele_treni = $conn->query($sql_ele_treni);
                                                                            ?>
                                                                            <option value="0">Seleziona un convoglio</option>
                                                                            <?php
                                                                                if ($result_ele_treni->num_rows > 0) {
                                                                                    while ($row = $result_ele_treni->fetch_assoc()) {
                                                                                        $trn_id_a = $row["a"];
                                                                                        $trn_nome_b = $row["b"];
                                                                                        $selezionato = "";

                                                                                        if ($trn_id == $trn_id_a) {
                                                                                            $selezionato = "selected";
                                                                                        }
                                                                            ?>
                                                                            <option value="<?php echo $trn_id_a; ?>" <?php echo $selezionato; ?> ><?php echo $trn_nome_b; ?></option>
                                                                            <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                                <button type="button" class="btn btn-primary" onclick="modificaTratta(<?php echo $tra_id; ?>, <?php echo $sta_distanza; ?>)">Modifica</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->

                                                <button class="btn btn-danger" onclick="eliminaTratta(<?php echo $tra_id; ?>)">
                                                    ELIMINA
                                                </button>
                                            </td>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($_SESSION["admin_esercizio"] == "S") {
                                            ?>
                                            <td>Tratta disponibile da <b><?php echo $tra_data_inizio; ?></b> a <b><?php echo $tra_data_fine; ?></b></td>
                                            <?php
                                            }
                                            ?>

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
                                            <td colspan="8">
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