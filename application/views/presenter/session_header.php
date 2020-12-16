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
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>-->

    <?=getSocketScript()?>

    <script>
        // let socket = io("https://socket.yourconference.live:443");
        //let socket = io("<?//=getSocketUrl()?>//");


        socket.on("newViewUsers",function(resp){
            if(resp){
                var totalUsers=resp.users?resp.users.length:0;
                var sessionId=resp.sessionId;
                $(".totalAttende"+sessionId+" b").html(totalUsers);
                $(".userCount" + sessionId).html(totalUsers);

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

<nav class="navbar presenterNavbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="https://yourconference.live/CCO/front_assets/images/CCO_CORP_Logo_310wide.png" width="175">
        </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= base_url() ?>presenter/sessions">Mis Sesiones</a></li>

            <li class="active"><a data-toggle="modal" data-target="#zoomModal">Zoom</a></li>
            <li><a href="<?= base_url() ?>presenter/sessions/view_poll/<?= $sessions->sessions_id ?>" target="_blank">Encuesta</a></li>
            <?php
            if(sessionRightBarControl($sessions->right_bar, "resources")){
                ?>
                <li><a data-toggle="modal" data-target="#reourcesModal">Recursos</a></li>
                <?php
            }
            ?>
            <li><a href="https://yourconference.live/support/submit_ticket" target="_blank">Assistance</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->session->userdata('pname') ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url() ?>presenter/login/logout">
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal zoom -->
<div class="modal fade presenterModal" id="zoomModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ZOOM</h4>
            </div>
            <div class="modal-body">
                <?php
                $zoom_link=isset($sessions->zoom_link)?$sessions->zoom_link:"";
                $zoom_pass=isset($sessions->zoom_password)?$sessions->zoom_password:"";

                if($zoom_link){
                    ?>
                    <p>Zoom Meeting Link : <a href="<?=$zoom_link?>" target="_blank"><?=$zoom_link?></a></p>
                    <p>Password : <?=$zoom_pass?></p>
                <?php
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!--modal resources-->
<div class="modal fade presenterModal" id="reourcesModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">RESOURCES</h4>
            </div>
            <div class="modal-body">
                <?php
                if (!empty($session_resource)) {
                    foreach ($session_resource as $val) {
                        ?>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-12"><a href="<?= $val->resource_link ?>" target="_blank"><?= $val->link_published_name ?></a></div>
                            <div class="col-md-12"><a href="<?= base_url() ?>uploads/resource_sessions/<?= $val->resource_file ?>" download> <?= $val->upload_published_name ?> </a></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
