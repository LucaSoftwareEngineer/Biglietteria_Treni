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
                            <h4 class="card-title">Le tue prenotazioni</h4>
                            <p class="card-description">
                            Elenco delle prenotazioni che hai fatto.
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="8" align="center">I prenotazioni si attivano in automatico</th>
                                        </tr>
                                        <tr>
                                            <th colspan="8" align="center" style="color: orange">
                                                *PUOI MODIFICARE LA PRENOTAZIONI FINO AL GIORNO PRIMA DEL INIZIO DELLA TRATTA
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Nome del Treno</th>
                                            <th>Stazione di Partenza</th>
                                            <th>Ora di Partenza</th>
                                            <th>Stazione di Arrivo</th>
                                            <th>Ora di Arrivo</th>
                                            <th>Prenotato per il giorno</th>
                                            <th>Modifica Prenotazione</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = " ";
                                        $sql .= " SELECT bigl_id, ";
                                        $sql .= " (SELECT sta_nome FROM stazioni WHERE sta_id = tra_sta_id_partenza) as sta_nome_partenza, ";
                                        $sql .= " (SELECT sta_nome FROM stazioni WHERE sta_id = tra_sta_id_arrivo) as sta_nome_arrivo, ";
                                        $sql .= " tra_ora_partenza, tra_ora_arrivo, trn_nome, ";
                                        $sql .= " CURRENT_DATE() as data_oggi, tra_data_inizio, tra_data_fine, ";
                                        $sql .= " CURRENT_TIMESTAMP() AS ora_attuale, bigl_data ";
                                        $sql .= " FROM biglietti ";
                                        $sql .= " INNER JOIN tratte ON tra_id = bigl_tra_id ";
                                        $sql .= " INNER JOIN treni ON tra_trn_id = trn_id ";
                                        $sql .= " WHERE bigl_ute_id = " . $_SESSION["user"];

                                        $result_biglietti = $conn->query($sql);

                                        if ($result_biglietti->num_rows > 0) {
                                            while ($row = $result_biglietti->fetch_assoc()) {
                                                $bigl_id = $row["bigl_id"];
                                                $sta_nome_partenza = $row["sta_nome_partenza"];
                                                $sta_nome_arrivo = $row["sta_nome_arrivo"];
                                                $tra_ora_partenza = $row["tra_ora_partenza"];
                                                $tra_ora_arrivo = $row["tra_ora_arrivo"];
                                                $trn_nome = $row["trn_nome"];
                                                $data_oggi = $row["data_oggi"];
                                                $tra_data_inizio = $row["tra_data_inizio"];
                                                $tra_data_fine = $row["tra_data_fine"];
                                                $ora_attuale = $row["ora_attuale"];
                                                $bigl_data = $row["bigl_data"];
                                        ?>
                                        <tr>
                                            <td><?php echo $trn_nome; ?></td>
                                            <td><?php echo $sta_nome_partenza; ?></td>
                                            <td><?php echo $tra_ora_partenza; ?></td>
                                            <td><?php echo $sta_nome_arrivo; ?></td> 
                                            <td><?php echo $tra_ora_arrivo; ?></td>
                                            <td><?php echo $bigl_data; ?></td>
                                            <td>
                                                <button class="btn btn-warning" data-toggle="modal" data-target="#ModalEditPrenotazione<?php echo $bigl_id; ?>">MODIFICA</button>
                                                <!-- Begin Modal -->
                                                <div class="modal fade" id="ModalEditPrenotazione<?php echo $bigl_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modifica Prenotazione</h5>
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
                                                                            <input type="date" value="<?php echo $bigl_data; ?>" min="<?php echo $tra_data_inizio; ?>" max="<?php echo $tra_data_fine; ?>" style="color: black; height: 30px; font-size: 12px !important;" class="form-control" id="edt_bigl_data_<?php echo $bigl_id; ?>" />
                                                                        </td>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                                <button type="button" class="btn btn-primary" onclick="modificaBiglietto(<?php echo $bigl_id; ?>)">Modifica</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            </td>
                                        </tr>
                                        <?php
                                                }
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