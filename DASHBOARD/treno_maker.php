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
                                <h4 class="card-title">Costruisci Convoglio</h4>
                                <p class="card-description">
                                    Seleziona il materiale rotabile del convoglio.
                                </p>
                                <div>
                                    <table cellpadding="10" cellspacing="10" style="font-size: 14px;">
                                        <tr>
                                            <td>Nome del convoglio</td>
                                            <td>
                                                <input class="form-control" id="tm_nome" style="color: black !important; height: 30px; font-size: 12px !important;" placeholder="Dai un nome al convoglio..." />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Locomotiva</td>
                                            <td>
                                                <select id="tm_locomotiva" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                                    <option value="0">Seleziona una locomotiva</option>
                                                    <?php 
                                                        $sql = " SELECT mat_id, mat_nome FROM materiale_rotabile WHERE mat_tip_id = 1 ";

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
                                        <tr>
                                            <td>Carrozza 1</td>
                                            <td>
                                                <select id="tm_carrozza" class="form-control" style="color: black; height: 30px; font-size: 12px !important;">
                                                    <option value="0">Seleziona una carrozza</option>
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
                                        <tr>
                                            <td>Posti disponibili</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    <input type="text" disabled="disabled" value="0" id="tm_posti" style="width: 80px;" class="form-control" />
                                                </div>
                                                <div class="col-lg-9">
                                                    <b style="color: red; font-size: 10px;">*Questo campo si compila automaticamente</b>
                                                    <br />
                                                    <b style="color: red; font-size: 10px;">*Potrai creare il treno quando il n. dei posti risulta > 0</b>
                                                </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <b style="color: green">*POTRAI AGGIUNGERE ALTRE CARROZZE NELLA PROSSIMA PAGINA</b>
                                                <br />
                                                <br />
                                                <button class="btn btn-primary" onclick="addTreno()">Procedi</button>
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