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

             <?php if($_SESSION["admin_esercizio"] == "N" && $_SESSION["admin_backoffice"] == "N") {  ?>
            <div class="main-panel">
               <div class="content-wrapper">
                  <!-- LAYOUT QUI -->
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="card">
                           <a class="btn btn-warning btn-xs" href="tratte_logged.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                 <br>
                                 <br>
                                 <img src="../images/icons/icons8-train-48.png">
                                 <br>
                                 <br>
                                 <h4 style="font-weight: bold;">TRATTE DISPONIBILI</h4>
                              </a>
                        </div>
                     </div>
                      <div class="col-lg-3">
                          <div class="card">
                              <a class="btn btn-success btn-xs" href="tuoi_biglietti.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                  <br />
                                  <br />
                                  <img src="../images/icons/icons8-biglietto-48.png" />
                                  <br />
                                  <br />
                                  <h4 style="font-weight: bold;">LE TUE PRENOTAZIONI</h4>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-3">
                          <div class="card">
                              <a class="btn btn-info btn-xs" href="calendario_logged.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                  <br />
                                  <br />
                                  <img src="../images/icons/icons8-calendario-48.png" />
                                  <br />
                                  <br />
                                  <h4 style="font-weight: bold;">CALENDARIO</h4>
                              </a>
                          </div>
                      </div>

                      <div class="col-lg-3">
                          <div class="card">
                              <a class="btn btn-secondary btn-xs" href="impostazioni.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                  <br />
                                  <br />
                                  <img src="../images/icons/icons8-settings-94.png" style="width: 48px; height: auto;" />
                                  <br />
                                  <br />
                                  <h4 style="font-weight: bold;">IMPOSTAZIONI</h4>
                              </a>
                          </div>
                      </div>

                  </div>

                   <div class="row" style="margin-top: 25px;">
                       <?php include 'include/inc_tratte.php' ?>
                   </div>

               </div>   
            </div>
            <?php } ?>

             <?php if($_SESSION["admin_esercizio"] == "S" && $_SESSION["admin_backoffice"] == "N") {  ?>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                             <div class="col-lg-3">
                                <div class="card">
                                   <a class="btn btn-primary btn-xs" href="treno_maker.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                         <br>
                                         <br>
                                         <img src="../images/icons/icons8-logistics-64.png">
                                         <br>
                                         <br>
                                         <h4 style="font-weight: bold;">COSTRUISCI CONVOGLIO</h4>
                                      </a>
                                </div>
                             </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <a class="btn btn-primary btn-xs" href="elenco_treni.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                        <br />
                                        <br />
                                        <img src="../images/icons/icons8-logistics-64.png" />
                                        <br />
                                        <br />
                                        <h4 style="font-weight: bold;">CONVOGLI ESISTENTI</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <a class="btn btn-primary btn-xs" href="tratte_logged.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                        <br />
                                        <br />
                                        <img src="../images/icons/icons8-logistics-64.png" />
                                        <br />
                                        <br />
                                        <h4 style="font-weight: bold;">GESTIONE TRATTE</h4>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <a class="btn btn-primary btn-xs" href="aggiungi_tratta.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                        <br />
                                        <br />
                                        <img src="../images/icons/icons8-logistics-64.png" />
                                        <br />
                                        <br />
                                        <h4 style="font-weight: bold;">AGGIUNGI TRATTA</h4>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <?php include 'include/inc_adm_tratte.php' ?>

                    </div>
                </div>

            <?php } ?>

             <?php if($_SESSION["admin_esercizio"] == "N" && $_SESSION["admin_backoffice"] == "S") {  ?>
             <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                             <div class="col-lg-3">
                                <div class="card">
                                   <a class="btn btn-primary btn-xs" href="comunicazioni.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                         <br>
                                         <br>
                                         <img src="../images/icons/icons8-logistics-64.png">
                                         <br>
                                         <br>
                                         <h4 style="font-weight: bold;">COMUNICAZIONI</h4>
                                      </a>
                                </div>
                             </div>
                        </div>
                    </div>
            </div>
             <?php } ?>
         </div>
      </div>
      <?php include '../config/core_js.php' ?>
   </body>
</html>
<?php include '../config/db_close.php' ?>