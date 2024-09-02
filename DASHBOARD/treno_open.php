<!DOCTYPE html>
<html lang="it">
<?php session_start() ?>
<?php include '../config/db_open.php' ?>
<?php include '../config/head.php' ?>

<?php include '../FIREWALL/adm_esercizio.php' ?>

<body>
    <div class="container-scroller">
        <?php include '../config/navbar.php' ?>
        <div class="container-fluid page-body-wrapper">
            <?php include '../config/sidebar.php' ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- LAYOUT QUI -->
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Materiale Rotabile del Convoglio</h4>
                                    <p class="card-description">
                                        Elenco del materiale rotabile di cui è composto il convoglio
                                        <br />
                                        <br />
                                        <button class="btn btn-success" data-toggle="modal" data-target="#modalAddTrain">Aggiungi Carrozza</button>
                                        <br />
                                        <br />
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="5" align="center">MATERIALE ROTABILE DEL CONVOGLIO</th>
                                                </tr>
                                                <tr>
                                                    <th>Codice</th>
                                                    <th>Nome del Materiale</th>
                                                    <th>Tipo del Materiale</th>
                                                    <th>Posti per passeggeri</th>
                                                    <th>Opzioni</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "";
                                                $sql .= " SELECT c.com_id, a.mat_id, a.mat_nome, b.mat_tip_id, b.mat_tip_testo, a.mat_posti ";
                                                $sql .= " FROM materiale_rotabile as a  ";
                                                $sql .= " INNER JOIN materiale_rotabile_tipologia as b ON a.mat_tip_id = b.mat_tip_id ";
                                                $sql .= " INNER JOIN composizione as c ON c.com_mat_id = a.mat_id ";
                                                $sql .= " WHERE c.com_trn_id = " . $_GET["id"];

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $com_id = $row["com_id"];
                                                        $mat_id = $row["mat_id"];
                                                        $mat_nome = $row["mat_nome"];
                                                        $mat_tip_id = $row["mat_tip_id"];
                                                        $mat_tip_testo = $row["mat_tip_testo"];
                                                        $mat_posti = $row["mat_posti"];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $com_id; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat_nome; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat_tip_testo; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $mat_posti; ?>
                                                    </td>
                                                    <td>

                                                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditMatAss<?php echo $com_id ?>">Modifica</button>

                                                        <!-- Begin Modal Modifica Materiale Associato -->
                                                        <div class="modal fade" id="modalEditMatAss<?php echo $com_id ?>" tabindex="-1" aria-labelledby="modalEditMatAss<?php echo $com_id ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modulo Modifica Meteriale</h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background-color: white; border: none;">
                                                                            <img style="width: 20px; height: auto;" src="../images/icons/icons8-close-48.png" alt="icona chiusura modulo" />
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table width="100%">
                                                                            <tr>
                                                                                <td>
                                                                                    <select id="materiale_modificare<?php echo $com_id ?>" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                                                                        <option value="0">Seleziona materiale da aggiungere</option>
                                                                                        <?php 
                                                                                            $sql = " SELECT mat_id, mat_nome FROM materiale_rotabile WHERE mat_tip_id = ".$mat_tip_id;

                                                                                            $result_locomotiva = $conn->query($sql);

                                                                                            if ($result_locomotiva->num_rows > 0) {
                                                                                                while ($row_1 = $result_locomotiva->fetch_assoc()) {
                                                                                                    $sub_mat_id = $row_1["mat_id"];
                                                                                        ?>


                                                                                                <?php if ($mat_id == $sub_mat_id) { ?>
                                                                                                <option value="<?php echo $sub_mat_id; ?>" selected><?php echo $row_1["mat_nome"]; ?></option>
                                                                                                <?php } else { ?>
                                                                                                <option value="<?php echo $sub_mat_id; ?>"><?php echo $row_1["mat_nome"]; ?></option>
                                                                                                <?php } ?>
                                                                                        
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
                                                                        <button type="button" class="btn btn-primary" onclick="EditAssComponentTreno(<?php echo $com_id; ?>)">Modifica</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal Modifica Materiale Associato -->

                                                        <?php
                                                                $blocca_delete = "";
                                                                if ($mat_tip_id == "1") {
                                                                    $blocca_delete = "disabled";
                                                                } else {
                                                                    $blocca_delete = "";
                                                                }
                                                        ?>
                                                        <button <?php echo $blocca_delete; ?> class="btn btn-danger" onclick="eliminaAssociazioneTrenoMateriale(<?php echo $com_id; ?>)">ELIMINA</button>
                                                    </td>
                                                </tr>
                                                <?php
                                                    }
                                                } else {
                                                ?>

                                                <tr>
                                                    <td colspan="5">
                                                        <b style="color: red;">Nessun materiale associato...</b>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Begin Modal Inserisci Materiale Rotabile -->
    <div class="modal fade" id="modalAddTrain" tabindex="-1" aria-labelledby="modalAddTrain" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modulo Aggiunta Carrozza</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background-color: white; border: none;">
                        <img style="width: 20px; height: auto;" src="../images/icons/icons8-close-48.png" alt="icona chiusura modulo" />
                    </button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td>
                                <select id="materiale_aggiungere" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                    <option value="0">Seleziona carrozza da aggiungere</option>
                                    <?php 
                                        $sql = " SELECT mat_id, mat_nome FROM materiale_rotabile WHERE mat_tip_id = 2 ";

                                        $result_locomotiva = $conn->query($sql);

                                        if ($result_locomotiva->num_rows > 0) {
                                            while ($row = $result_locomotiva->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row["mat_id"]; ?>"><?php echo $row["mat_nome"]; ?></option>
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
                    <button type="button" class="btn btn-primary" onclick="addCarrozzaAlTreno(<?php echo $_GET["id"]; ?>)">Aggiungi Carrozza</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Inserisci Materiale Rotabile -->


    <?php include '../config/core_js.php' ?>
</body>
</html>
<?php include '../config/db_close.php' ?>