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
                        <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card" style="margin-left: 20px;">
                            <div class="card-body">
                                <h4 class="card-title">Aggiungi tratta</h4>
                                <p class="card-description">
                                    Aggiungi una nuova tratta associata ad un treno.
                                </p>
                                <div>
                                    <table cellpadding="10" cellspacing="10" style="font-size: 14px;">
                                        <tr>
                                            <td>Seleziona Treno</td>
                                            <td>
                                                <select id="trn_id" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                                    <option value="0">Seleziona un treno</option>
                                                    <?php 
                                                        $sql = " SELECT trn_id, trn_nome FROM treni ";

                                                        $result_treno = $conn->query($sql);

                                                        if ($result_treno->num_rows > 0) {
                                                            while ($row = $result_treno->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row["trn_id"]; ?>"><?php echo $row["trn_nome"]; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Seleziona Stazione di Partenza</td>
                                            <td>
                                                <select id="sta_id_partenza" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                                    <option value="0">Seleziona una stazione di partenza</option>
                                                    <?php 
                                                        $sql = " SELECT sta_id, sta_nome FROM stazioni ";

                                                        $result_stazione_partenza = $conn->query($sql);

                                                        if ($result_stazione_partenza->num_rows > 0) {
                                                            while ($row = $result_stazione_partenza->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row["sta_id"]; ?>"><?php echo $row["sta_nome"]; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Seleziona Stazione di Arrivo</td>
                                            <td>
                                                <select id="sta_id_arrivo" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                                    <option value="0">Seleziona una stazione di arrivo</option>
                                                    <?php 
                                                        $sql = " SELECT sta_id, sta_nome FROM stazioni ";

                                                        $result_stazione_arrivo = $conn->query($sql);

                                                        if ($result_stazione_arrivo->num_rows > 0) {
                                                            while ($row = $result_stazione_arrivo->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row["sta_id"]; ?>"><?php echo $row["sta_nome"]; ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Inserisci ora partenza</td>
                                            <td>
                                                <input type="time" id="ora_partenza" class="form-control" style="color: black; height: 30px; font-size: 12px !important;" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b style="color: green">PERIODO IN CUI DEVE RIPETERSI LA DISPONIBILITA' DELLA TRATTA</b></td>
                                        </tr>
                                        <tr>
                                            <td>Data Inizio</td>
                                            <td><input type="date" id="tra_data_inizio" class="form-control" style="color: black; height: 30px; font-size: 12px !important;" /></td>
                                        </tr>
                                        <tr>
                                            <td>Data Fine</td>
                                            <td><input type="date" id="tra_data_fine" class="form-control" style="color: black; height: 30px; font-size: 12px !important;" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button class="btn btn-primary" onclick="addTratta()">Inserisci Tratta</button>
                                            </td>
                                        </tr>
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
    <?php include '../config/core_js.php' ?>
</body>
</html>
<?php include '../config/db_close.php' ?>