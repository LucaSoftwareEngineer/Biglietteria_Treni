<!DOCTYPE html>
<html lang="en">

<head>
    <title>Progetto 1 - Luca Santoro</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    
    
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- color .css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/color/color-1.css" id="color"/>
    <!--toastr-->
    <link rel="stylesheet" type="text/css" href="../assets/plugin/toastr/toastr.css" />
</head>

<body class="fix-menu dark-layout">
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">
                        <form class="md-float-material">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Benvenuto!</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="text" id="reg_nome" class="form-control" placeholder="Inserisci Nome">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="reg_cognome" class="form-control" placeholder="Inserisci Cognome">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" id="reg_email" class="form-control" placeholder="Inserisci Indirizzo Email">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="reg_psw" class="form-control" placeholder="Inserisci Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="reg_psw_ck" class="form-control" placeholder="Conferma Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="button" style="background-color: #477CBE; border: none !important;" onclick="register()" class="btn btn-warning btn-md btn-block waves-effect text-center m-b-20">Registrati</button>
                                    </div>
                                    <div class="col-md-10" style="color: black !important;">
                                        Ti sei già registrato? <a href="./index.php">Accedi ora</a>
                                    </div>
                                </div> 
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Buon divertimento con Progetto 1 </p>
                                        <p class="text-inverse text-left"><b>Realizzato da Luca Santoro </b></p>
                                    </div>
                                    <div class="col-md-2">
                                        <img src="../assets/images/logo_si_bg.png" alt="small-logo.png" style="width: 40px">
                                    </div>
                                </div>

                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>

    <?php include '../COOKIE/cookie.php' ?>

    <!-- Required Jquery -->
    <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../bower_components/tether/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="../bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="../bower_components/i18next/i18next.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
    <script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
    <script type="text/javascript" src="../bower_components/jquery-i18next/jquery-i18next.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <!--Color Script Common-->
    <script type="text/javascript" src="../assets/js/common-pages.js"></script>

    <script>
        $(".color-picker").hide();
    </script>

    <script src="./../assets/plugin/toastr/toastr.js"></script>
    <script src="./../assets/json/login.js"></script>
</body>
</html>
