<!DOCTYPE html>
<html lang="en">

<head>
    <title>Progetto 1 - Luca Santoro</title>
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
                                        <p style="color: red; text-align: left !important;">Nota: non servono credenziali per entrare come VISITATORE</p>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="text" id="usr" class="form-control" placeholder="Inserisci Indirizzo Email">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" id="psw" class="form-control" placeholder="Inserisci Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-25 text-left" style="display: none">
                                    <div class="col-sm-7 col-xs-12">
                                        
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="forgot-password.html" class="text-right f-w-600 text-inverse"> Password dimenticata?</a>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="button" style="background-color: #477CBE; border: none !important;" onclick="login()" class="btn btn-warning btn-md btn-block waves-effect text-center m-b-20">Accedi</button>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" style="background-color: #aeb8b1; border: none !important;" onclick="login_visitatore()" class="btn btn-warning btn-md btn-block waves-effect text-center m-b-20">Entra come Visitatore</button>
                                    </div>
                                    <div class="col-md-10" style="color: black !important">
                                        Non ti sei ancora registrato? <a href="./register.php">Registrati ora</a>
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

    <!-- Warning Section Ends -->
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


<!-- Mirrored from html.phoenixcoded.net/flatable/ltr/dark-layout/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Jul 2022 10:47:55 GMT -->
</html>
