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
                        <iframe style="width: 100%; margin-left: 20px; height: 70vh; border: none;" src="../CALENDARIO/index.php"></iframe>
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