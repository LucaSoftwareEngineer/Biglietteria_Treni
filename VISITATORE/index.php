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
                  <div class="row">
                     <div class="col-lg-12">
                     <div class="alert alert-warning" role="alert" style="margin-left: 10px;">
                        ATTENZIONE: Per acquistare i biglietti devi essere un utente registrato.
                     </div>
                     <br>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="card">
                            <a class="btn btn-success btn-xs" href="tratte.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                <br>
                                <br>
                                <img src="../images/icons/icons8-train-48.png">
                                <br>
                                <br>
                                <h4 style="font-weight: bold;">TRATTE DISPONIBILI</h4>
                            </a>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="card">
                            <a class="btn btn-info btn-xs" href="calendario.php" style="height: 150px; margin-left: 10px; margin-bottom: 10px;">
                                <br>
                                <br>
                                <img src="../images/icons/icons8-calendario-48.png" style="width: 48px;">
                                <br>
                                <br>
                                <h4 style="font-weight: bold;">CALENDARIO</h4>
                            </a>
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
      </div>
      <?php include '../config/core_js.php' ?>
   </body>
</html>
<?php include '../config/db_close.php' ?>