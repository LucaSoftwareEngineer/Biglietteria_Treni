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
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- LAYOUT QUI -->

                    <?php if ($_SESSION["admin_backoffice"] == "S") { ?>
                    <div class="row" style="margin-left: 20px;">
                        <div class="col-lg-5">

                            
                            <table style="background-color: white; border-radius: 14px;">
                                <tr>
                                    <td style="padding: 20px;" colspan="2">
                                        <b style="color: darkorange">*Questa comunicazione viene inviata al admin di esercizio</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px;">
                                        <b>Oggetto</b>
                                    </td>
                                    <td style="padding: 20px;">
                                        <input type="text" id="com_oggetto" class="form-control" placeholder="Inserisci oggetto..." />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px;">
                                        <b>Messaggio</b>
                                    </td>
                                    <td style="padding: 20px;">
                                        <input type="text" id="com_messaggio" class="form-control" placeholder="Inserisci messaggio..." />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px;">
                                        <button class="btn btn-primary" onclick="inviaComunicazione()">INVIA</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="row" style="margin-left: 20px; margin-top: 20px;">
                        <div class="col-lg-12">
                            <table style="background-color: white; border-radius: 14px;">
                                <thead>
                                    <tr>
                                        <th colspan="2" style="padding: 20px;">ELENCO COMUNICAZIONI INVIATE DAL AMMINISTRATORE DI BACKOFFICE</th>
                                    </tr>
                                    <tr>
                                        <th style="padding: 20px;">Oggetto</th>
                                        <th style="padding: 20px;">Messaggio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = " select com_oggetto, com_messaggio FROM comunicazioni ";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $com_oggetto = $row["com_oggetto"];
                                                $com_messaggio = $row["com_messaggio"];
                                    ?>
                                    <tr>
                                        <td style="padding: 20px;">
                                            <?php echo $com_oggetto; ?>
                                        </td>
                                        <td style="padding: 20px;">
                                            <?php echo $com_messaggio; ?>
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
        </div>
    </div>
    <?php include '../config/core_js.php' ?>
</body>
</html>
<?php include '../config/db_close.php' ?>