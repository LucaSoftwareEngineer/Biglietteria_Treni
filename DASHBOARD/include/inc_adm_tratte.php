<div class="row" style="margin-top: 25px;">
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
                                <th colspan="8" align="center">ELENCO TRATTE DISPONIBILI</th>
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
                                <th>Opzioni</th>
                                <th>Codice</th>
                                <th>Nome del Treno</th>
                                <th>Stazione di Partenza</th>
                                <th>Ora di Partenza</th>
                                <th>Stazione di Arrivo</th>
                                <th>Ora di Arrivo</th>
                                <?php
                                            if ($_SESSION["admin_esercizio"] == "S") {
                                ?>
                                <th>Periodo</th>
                                <?php
                                            }
                                ?>
                                <th>Costo</th>
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
                                <?php
                                            if ($_SESSION["admin_esercizio"] == "N") {
                                ?>
                                <td>
                                    <button class="btn btn-danger" onclick="acquistaBiglietto(<?php echo $tra_id; ?>)">
                                        PRENOTA
                                    </button>
                                </td>
                                <?php
                                            } else {
                                ?>
                                <td>
                                    <button class="btn btn-danger" onclick="eliminaTratta(<?php echo $tra_id; ?>)">
                                        ELIMINA
                                    </button>
                                </td>
                                <?php
                                            }
                                ?>
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
                                <?php
                                            if ($_SESSION["admin_esercizio"] == "S") {
                                ?>
                                <td>
                                    Tratta disponibile da <b>
                                        <?php echo $tra_data_inizio; ?>
                                    </b> a <b>
                                        <?php echo $tra_data_fine; ?>
                                    </b>
                                </td>
                                <?php
                                            }
                                ?>
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