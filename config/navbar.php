<?php include 'info_login.php' ?>

<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="../DASHBOARD/"><img src="../images/logo.png" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="../DASHBOARD/"><img src="../images/logo-mini.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu menu-active"></span>
      </button>
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                        <i class="icon-search" onclick="$('#SearchClick').click();"></i>
                    </span>
                </div>
                <form method="get" action="tratte_logged.php">
                    <input type="text" class="form-control" name="s" id="navbar-search-input" placeholder="Cerca tratte disponibili..." aria-label="search" aria-describedby="search" />
                    <button type="submit" style="display: none" id="SearchClick"></button>
                </form>
            </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-bell mx-0"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifiche</p>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-info">
                  <img src="../images/icons/icons8-group-users-man-woman-94.png" class="notification-icon" alt="icon">
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Ti sei loggato!</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Ora
                </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="../images/faces/face28.jpg" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="impostazioni.php">
              <i class="ti-settings text-primary"></i>
              Impostazioni
            </a>
            <a class="dropdown-item" href="../LOGOUT/">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a>
          </div>
        </li>
        <li class="nav-item nav-settings d-none d-lg-flex">
          
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
