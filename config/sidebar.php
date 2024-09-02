<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">


            <!-- Begin Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <img src="../images/icons/icons8-dashboard-60.png" class="sidebar-menu-icon" alt="icon">
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard -->

            <?php if ($_SESSION["admin_esercizio"] == "N" && $_SESSION["admin_backoffice"] == "N") { ?>

            <!-- Begin Tratte e Biglietti -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#customers" aria-expanded="false" aria-controls="ui-basic">
                    <img src="../images/icons/icons8-train-48.png" class="sidebar-menu-icon" alt="icon">
                    <span class="menu-title">Prenotazioni</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="customers">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="tratte_logged.php">Tratte Disponibili</a></li>
                        <li class="nav-item"> <a class="nav-link" href="tuoi_biglietti.php">Le tue Prenotazioni</a></li>
                    </ul>
                </div>
            </li>
            <!-- End Tratte e Biglietti -->
          

            <!-- Begin Impostazioni -->
            <li class="nav-item">
                <a class="nav-link" href="../DASHBOARD/calendario_logged.php">
                    <img src="../images/icons/icons8-calendario-48.png" class="sidebar-menu-icon" alt="icon">
                    <span class="menu-title">Calendario</span>
                </a>
            </li>
            <!-- End Impostazioni -->


            <!-- Begin Impostazioni -->
            <li class="nav-item">
                <a class="nav-link" href="../DASHBOARD/impostazioni.php">
                    <img src="../images/icons/icons8-settings-94.png" class="sidebar-menu-icon" alt="icon">
                    <span class="menu-title">Impostazioni</span>
                </a>
            </li>
            <!-- End Impostazioni -->

            <?php } ?>
          
            <?php if ($_SESSION["admin_esercizio"] == "S" && $_SESSION["admin_backoffice"] == "N") { ?>

            <!-- Begin Admin Esercizio -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#customers" aria-expanded="false" aria-controls="ui-basic">
                    <img src="../images/icons/icons8-logistics-64.png" class="sidebar-menu-icon" alt="icon" />
                    <span class="menu-title">Admin Esercizio</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="customers">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="treno_maker.php">Costruisci Convoglio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="elenco_treni.php">Convogli Esistenti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tratte_logged.php">Gestione Tratte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aggiungi_tratta.php">Aggiungi Tratta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="comunicazioni.php">Comunicazioni</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- End Admin Esercizio -->

            <!-- Begin Impostazioni -->
            <li class="nav-item">
                <a class="nav-link" href="../DASHBOARD/impostazioni.php">
                    <img src="../images/icons/icons8-settings-94.png" class="sidebar-menu-icon" alt="icon" />
                    <span class="menu-title">Impostazioni</span>
                </a>
            </li>
            <!-- End Impostazioni -->

            <?php } ?>

            <?php if ($_SESSION["admin_esercizio"] == "N" && $_SESSION["admin_backoffice"] == "S") { ?>
            <li class="nav-item">
                <a class="nav-link" href="../DASHBOARD/comunicazioni.php">
                    <img src="../images/icons/icons8-logistics-64.png" class="sidebar-menu-icon" alt="icon" />
                    <span class="menu-title">Comunicazioni</span>
                </a>
            </li>
            <?php } ?>

        </ul>
</nav>