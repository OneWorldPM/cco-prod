<!DOCTYPE html>
<?php
$uri_segment = $this->uri->segment(2);
$uri_segment1 = $this->uri->segment(3);
$presenter_details = $this->common->get_presenter_data($this->session->userdata("pid"));
?>
<html lang="en">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <meta charset="UTF-8">
    <title>Presenter</title>
    <!-- start: META -->
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/png">
    <!-- start: GOOGLE FONTS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/googlefonts.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />-->
    <!-- end: GOOGLE FONTS -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/themify-icons/themify-icons.min.css">
    <link href="<?= base_url() ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">

    <!-- end: MAIN CSS -->
    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/plugins.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/themes/theme-1.css" id="skin_color" />
    <!-- end: CLIP-TWO CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>front_assets/css/custom.css" media="screen" />

    <link href="<?= base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/vendor/DataTables/css/DT_bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">

    <link href="<?= base_url() ?>assets/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/iCheck/all.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/iCheck/minimal/blue.css"  />

    <link href="<?= base_url() ?>assets/alertify/alertify.core.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/alertify/alertify.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url() ?>assets/css/myset.css" rel="stylesheet" type="text/css"/>
    <!-- <link rel="stylesheet" type="text/css" href="assets/toggel/css/on-off-switch.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" src="assets/toggel/js/on-off-switch.js"></script> -->
    <!-- <script type="text/javascript" src="assets/toggel/js/on-off-switch-onload.js"></script> -->
    <script src="<?= base_url() ?>front_assets/js/custom.js?v=3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>
    <script>
        // let socket = io("https://socket.yourconference.live:443");
        let socket = io("<?=getSocketUrl()?>");


        socket.on("newViewUsers",function(resp){
            if(resp){
                var totalUsers=resp.users?resp.users.length:0;
                var sessionId=resp.sessionId;
                $(".totalAttende"+sessionId+" b").html(totalUsers);
            }
        })
        // var socketServer = "https://socket.yourconference.live:443";

    </script>

    <style type="text/css">
        .action-row{
            margin: 10px 0;
        }
        table thead tr th,
        table tbody tr td{
            text-align: center
        }
    </style>

</head>

<body>
<div id="app">
    <!-- sidebar -->
    <div class="sidebar app-aside" id="sidebar">
        <div class="sidebar-container">
            <nav>
                <ul class="main-navigation-menu">
                    <li class="<?= ($uri_segment == 'dashboard') ? 'active' : ''; ?>" id="dashboard-active">
                        <a href="<?= base_url() ?>presenter/dashboard" id="dash">
                            <div class="item-content">
                                <div class="item-media">
                                    <i class="fa fa-desktop"></i>
                                </div>
                                <div class="item-inner">
                                    <span class="title">Tablero de Control</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="<?= ($uri_segment == 'sessions') ? 'active' : ''; ?>">
                        <a href="<?= site_url() ?>presenter/sessions" id="dash">
                            <div class="item-content">
                                <div class="item-media">
                                    <i class="fa fa-tv"></i>
                                </div>
                                <div class="item-inner">
                                    <span class="title">Sesiones</span>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
    <!-- / sidebar -->
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <header class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">

                <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="navbar-brand" href="<?= base_url() ?>presenter/dashboard">
                    <img class="kent_logo" src="<?= base_url() ?>front_assets/images/CCO_CORP_Logo_310wide.png" width="100%" alt="CCO Logo" />
                </a>
                <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                    <i class="ti-align-justify"></i>
                </a>
                <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="ti-view-grid"></i>
                </a>

            </div>

            <!-- end: NAVBAR HEADER -->
            <!-- start: NAVBAR COLLAPSE -->
            <div class="navbar-collapse collapse text-center">
                <ul class="nav navbar-right">
                    <li class="dropdown current-user">
                        <a href class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if($presenter_details->presenter_photo != ""){
                                ?>
                                <img src="<?= site_url() ?>uploads/presenter_photo/<?= $presenter_details->presenter_photo ?>" height="40" alt="Fanscoin"> <span class="username"><?= $this->session->userdata('pname') ?> <i class="ti-angle-down"></i></i></span>
                            <?php }else{ ?>
                                <img src="<?= site_url() ?>assets/images/Avatar.png" height="40" alt="Fanscoin"> <span class="username"><?= $this->session->userdata('pname') ?> <i class="ti-angle-down"></i></i></span>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu dropdown-dark">
                            <li>
                                <a href="<?= base_url() ?>presenter/login/logout">
                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <label class="wallet-balance"  style="font-size: 22px; margin-top: 20px; font-weight: 700; margin-right: 20px; color: red;">Presentador </label>
            </div>
        </header>
