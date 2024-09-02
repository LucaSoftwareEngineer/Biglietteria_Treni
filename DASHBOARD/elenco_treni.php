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
                            <h4 class="card-title">Corse Disponibili</h4>
                            <p class="card-description">
                            Elenco delle corse disponibili ora.
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th colspan="5" align="center">ELENCO TRENI ESISTENTI</th>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="color: darkorange">
                                                <b>PER APRIRE UN TRENO CLICCA SUL NOME DEL TRENO</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Opzioni</th>
                                            <th>Codice</th>
                                            <th>Nome del Treno</th>
                                            <th>Posti</th>
                                            <th>Locomotiva</th>
                                            <th>Carrozze</th>
                                            <th>Velocita' massima</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $sql = " SELECT trn_id, trn_nome, trn_velocita FROM treni ";

                                            $result_get_treni = $conn->query($sql);

                                            if ($result_get_treni->num_rows > 0) {
                                                while ($row = $result_get_treni->fetch_assoc()) {
                                                    $trn_id = $row["trn_id"];
                                                    $trn_nome = $row["trn_nome"];
                                                    $trn_velocita = $row["trn_velocita"];
                                        ?>

                                        <tr>
                                            <td>
                                                <a class="btn btn-warning" href="treno_open.php?id=<?php echo $trn_id; ?>">MODIFICA</a>
                                            </td>
                                            <td><?php echo $trn_id; ?></td>
                                            <td><a href="treno_open.php?id=<?php echo $trn_id; ?>"><?php echo $trn_nome; ?></a></td>
                                            <td>
                                                <?php
                                                        $sql = " ";
                                                        $sql .= " SELECT sum(mat_posti) as n_posti FROM materiale_rotabile ";
                                                        $sql .= " INNER JOIN composizione ON com_mat_id = mat_id ";
                                                        $sql .= " WHERE com_trn_id = " . $trn_id;

                                                        $result_get_n_posti = $conn->query($sql);

                                                        if ($result_get_n_posti->num_rows > 0) {
                                                            while ($row = $result_get_n_posti->fetch_assoc()) {
                                                                $n_posti = $row["n_posti"];
                                                                echo $n_posti;
                                                            }
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                <ul class="lista_componenti_treni">
                                                    <?php
                                                        $sql = " ";
                                                        $sql .= " SELECT mat_nome FROM materiale_rotabile ";
                                                        $sql .= " INNER JOIN composizione ON mat_id = com_mat_id ";
                                                        $sql .= " WHERE com_trn_id = " . $trn_id;
                                                        $sql .= " AND mat_tip_id = 1 ";

                                                        $result_get_locomotiva = $conn->query($sql);

                                                        if ($result_get_locomotiva->num_rows > 0) {
                                                            while ($row = $result_get_locomotiva->fetch_assoc()) {
                                                                $mat_nome = $row["mat_nome"];
                                                    ?>
                                                    <li>
                                                        <?php echo $mat_nome; ?>
                                                    </li>
                                                    <?php
                                                                }
                                                            }
                                                    ?>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="lista_componenti_treni">
                                                    <?php
                                                        $sql = " ";
                                                        $sql .= " SELECT mat_nome FROM materiale_rotabile ";
                                                        $sql .= " INNER JOIN composizione ON mat_id = com_mat_id ";
                                                        $sql .= " WHERE com_trn_id = " . $trn_id;
                                                        $sql .= " AND mat_tip_id = 2 ";

                                                        $result_get_locomotiva = $conn->query($sql);

                                                        if ($result_get_locomotiva->num_rows > 0) {
                                                            while ($row = $result_get_locomotiva->fetch_assoc()) {
                                                                $mat_nome = $row["mat_nome"];
                                                    ?>
                                                    <li>
                                                        <?php echo $mat_nome; ?>
                                                    </li>
                                                    <?php
                                                            }
                                                        } else {
                                                            echo "<li style='color: black; background-color: yellow;'>carrozze non associate al treno</li>";
                                                        }
                                                    ?>
                                                </ul>
                                            </td>
                                            <td><?php echo $trn_velocita; ?></td>
                                        </tr>

                                        <?php
                                                }
                                            } else {
                                        ?>
                                        <tr>
                                            <td colspan="5">
                                                <b style="color: red;">Nessun treno disponibile...</b>
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
    <?php include '../config/core_js.php' ?>
</body>
</html>
<?php include '../config/db_close.php' ?>