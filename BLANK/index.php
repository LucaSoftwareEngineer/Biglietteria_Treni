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
               </div>   
            </div>
         </div>
      </div>
      <?php include '../config/core_js.php' ?>
   </body>
</html>
<?php include '../config/db_close.php' ?>