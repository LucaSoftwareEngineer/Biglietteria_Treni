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
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card" style="margin-left: 10px;">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">IMPOSTAZIONI</h4>

                                <table cellpadding="10" cellspacing="10" style="font-size: 14px;">
                                    <tr>
                                        <td>Tipologia di utente:</td>
                                        <td><b>Utente registrato</b></td>
                                    </tr>
                                    <tr>
                                        <td>Nome:</td>
                                        <td><b><?php echo $ute_nome; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Cognome:</td>
                                        <td><b><?php echo $ute_cognome; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><b><?php echo $ute_email; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><b><?php echo $ute_psw; ?></b></td>
                                    </tr>
                                </table>
                                <p class="card-description">
                                    <br />
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#ModEditAnagrafica">MODIFICA ANAGRAFICA</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
         </div>
      </div>

    <!-- Modale per modificare anagrafica -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="ModEditAnagrafica" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifica Anagrafica</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background-color: white; border: none;">
                <img style="width: 20px; height: auto;" src="../images/icons/icons8-close-48.png" alt="icona chiusura modulo" />
            </button>
        </div>
        <div class="modal-body">
            <table width="100%" class="tbl_anagrafica">
                <tr>
                    <td><b>Nome</b></td>
                    <td>
                        <input value="<?php echo $ute_nome; ?>" style="color: black; height: 30px; font-size: 12px !important;" type="text" class="form-control" placeholder="Nome" id="edt_nome" />
                    </td>
                </tr>
                <tr>
                    <td><b>Cognome</b></td>
                    <td>
                        <input value="<?php echo $ute_cognome; ?>" style="color: black; height: 30px; font-size: 12px !important;" type="text" class="form-control" placeholder="Cognome" id="edt_cognome" />
                    </td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>
                        <input value="<?php echo $ute_email; ?>" style="color: black; height: 30px; font-size: 12px !important;" type="text" class="form-control" placeholder="Email" id="edt_email" />
                    </td>
                </tr>
                <tr>
                    <td><b>Password</b></td>
                    <td>
                        <input value="<?php echo $ute_psw; ?>" style="color: black; height: 30px; font-size: 12px !important;" type="text" class="form-control" placeholder="Password" id="edt_psw" />
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
            <button type="button" class="btn btn-primary" onclick="edtProfile()">Salva Modifiche</button>
        </div>
        </div>
    </div>
    </div>

      <?php include '../config/core_js.php' ?>
   </body>
</html>
<?php include '../config/db_close.php' ?>