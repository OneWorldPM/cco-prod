<?php
if (isset($_GET['testing']))
{
    echo"<pre>"; print_r(themeColour(79)); exit('</pre>');
}


if(isset($session_id))
    $themeColour = themeColour($session_id);
else
    $themeColour = 'EF5D21';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="shortcut icon" href="<?= base_url() ?>front_assets/images/favicon.png">
        <title>Virtual Conference & Trade Show</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>front_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>front_assets/vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <link href="<?= base_url() ?>front_assets/vendor/animateit/animate.min.css" rel="stylesheet">

        <!-- Vendor css -->
        <link href="<?= base_url() ?>front_assets/vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
        <link href="<?= base_url() ?>front_assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Template base -->
        <link href="<?= base_url() ?>front_assets/css/theme-base.css?v=5" rel="stylesheet">

        <!-- Template elements -->
        <link href="<?= base_url() ?>front_assets/css/theme-elements.css" rel="stylesheet">

        <!-- Responsive classes -->
        <link href="<?= base_url() ?>front_assets/css/responsive.css" rel="stylesheet">

        <!-- [if lt IE 9]>
        <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif] -->

        <!-- Template color -->
        <link href="<?= base_url() ?>front_assets/css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">

        <!-- LOAD GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

        <!-- CSS CUSTOM STYLE -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>front_assets/css/custom.css" media="screen" />
        <!--VENDOR SCRIPT-->
        <script src="<?= base_url() ?>front_assets/vendor/jquery/jquery-1.11.2.min.js"></script>
        <script src="<?= base_url() ?>front_assets/vendor/plugins-compressed.js"></script>

        <link href="<?= base_url() ?>assets/alertify/alertify.core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/alertify/alertify.default.css" rel="stylesheet" type="text/css" />


        <!--****** PubNub Stuff *****-->
        <!-- DO NOT use production keys on localhost-->
        <?=pubnub_keys()?>
        <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.14.0.min.js"></script>

        <style>
            @media (min-width: 1200px){
                .container {
                    width: 1300px;
                }
            }
            @media (min-width: 1400px){
                .container {
                    width: 1450px;
                }
            }
            @media (min-width: 1600px){
                .container {
                    width: 1600px;
                }
            }
            @media (min-width: 1800px){
                .container {
                    width: 1700px;
                }
            }

            @media (min-width: 1900px){
                .container {
                    width: 1850px;
                }
            }
            @media (min-width: 2200px){
                .container {
                    width: 2400px;
                }
            }

            .button.black-light {
                border-color: #f05d1f;
            }

            .logo2 {
                float: left;
                padding-left: 15px;
            }

            .logo0 {
                float: left;
                margin-top: 11px;
                margin-right: 11px;
            }

            .logo2 img {

            }

            .logo0 img {
                object-fit: contain;
                width: 134px;
                height: 56px;
            }

            .logo2 span {
                position: absolute;
                top: 0;
                margin-top: -30px;
                font-family: sans-serif;
                font-size: 11px;
                float:left;
            }

            #mainMenu2 {
                margin-right: 100px;
                margin-top: 20px !important;
            }

            #mainMenu2 .nav {
                height: max-content;
            }

            #mainMenu2 ul li a {
                line-height: 0 !important;
                height: max-content !important;
                font-weight: 600;
                font-size: 13px;
                color: #000;
            }

            #mainMenu2 ul li {
                margin-right: 0px;
            }

            #mainMenu2 ul li a:hover {
                background-color: transparent;
                color: #ff5e00;
                cursor: pointer;
            }

            #mainMenu2 ul li:hover ul {
                display: block !important;
            }

            .toolboxCustomDrop {

                display: none;
                background-color: white;
                position: absolute;
                width: 180px;
                box-shadow: 0 0 12px -6px black;
                padding: 11px !important;
                position: absolute;
                z-index: 124214214;
            }

            .toolboxCustomDrop li {
                margin-right: 0 !important;

                font-weight: bold;
            }

            .toolboxCustomDrop li a {
                color: #7a7a7a !important;
                cursor: pointer;
            }

            .toolboxCustomDrop li a:hover {
                /*color: #ff5e00 !important;*/

            }

            .toolboxCustomDrop li i {
                font-size: 19px !important;
            }

            .toolboxCustomDrop li:nth-of-type(1n+2) {
                margin-top: 12px;
            }

            @media screen and (max-width: 1290px) {
                #header-wrap {
                    padding: 16px 30px;
                }
            }

            @media screen and (max-width: 1200px) {
                #header-wrap {
                    /*padding: 16px 10px;*/
                }

                #header .container {
                    width: 100% !important;
                }

                #mainMenu2 {
                    margin-right: 0;
                }

                #mainMenu2 ul li {
                    margin-right: 10px;
                }
            }

            @media screen and (max-width: 992px) {
                .parallax {
                    margin-top: 0;
                }

                #mainMenu2 .nav {
                    background-color: white;
                    height: 200px;
                    width: 200px;
                    float: right;
                }

                .nav-main-menu-responsive {
                    height: max-content;
                    line-height: 0;
                }

            }

            @media screen and (max-width: 493px) {
                .logo2 {
                    margin-left: 5px;
                }

                .logo2 img {
                    width: 115px;
                }
            }

            #briefcase, #resource_display_status {
                color: white !important;
            }

            /****** Theme based colours ****/
            .hoverThemeColour:hover{
                color: #<?=$themeColour?> !important;
            }
            .rightSticky ul li{
                background-color: #<?=$themeColour?> !important;
            }
            .rightSticykPopup .header{
                background-color: #<?=$themeColour?> !important;
            }
            .rightSticykPopup .contentHeader{
                color: #<?=$themeColour?> !important;
            }
            .button.color, .btn.btn-primary {
                background-color: #<?=$themeColour?> !important;
                border-color: #<?=$themeColour?> !important;
                color: #fff;
            }
            ::-moz-selection { /* Code for Firefox */
                color: white;
                background: #<?=$themeColour?> !important;
            }

            ::selection {
                color: white;
                background: #<?=$themeColour?> !important;
            }
            #mainMenu2 ul li a:hover {
                color: #<?=$themeColour?> !important;
            }
            /****** Theme based colours ****/

        </style>

    </head>
    <body class="wide">
        <!-- WRAPPER -->
        <div class="wrapper">
            <!-- HEADER -->
            <header id="header" class="header-transparent header-sticky">
                <div id="header-wrap" style="<?=((isset($sesions_logo_height) && !empty($sesions_logo_height)) && isset($sesions_logo) && !empty($sesions_logo))?($sesions_logo_height > 70)? $sesions_logo_height.'px; padding-bottom:3px !important':'':'';?>; height: auto; ">
                    <div style="height: 4px;background-color: #<?=$themeColour?>;"></div>
                    <div class="container">
                        <!--LOGO-->
                        <?php
                        if (isset($sessions_addnl_logo) && $sessions_addnl_logo != '') {
                            ?>
                            <div class="logo0">
                                <img src="<?= base_url() . "uploads/sessions_logo/" . $sessions_addnl_logo ?>" onerror="$(this).parent().remove()">
                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        if ($this->session->userdata('cid') != "") {
                            $profile_data = $this->common->get_user_details($this->session->userdata('cid'));
                            ?>
                            <div id="logo" style="margin-right: 7px;">
                                <a href="#" class="logo" data-dark-logo="<?= base_url() ?>front_assets/images/logo_new.png" style="<?=(isset($sponsor_type) && $sponsor_type)?'margin-top: 30px; ':'margin-top: 12px; '?>cursor: auto">
                                    <img src="<?= base_url() ?>front_assets/images/CCO_CORP_Logo_310wide.png" alt="CCO Logo">
                                </a>
                            </div>
                        <?php } else { ?>
                            <div id="logo">
                                <a href="#" class="logo" data-dark-logo="<?= base_url() ?>front_assets/images/logo_new.png">
                                    <img src="<?= base_url() ?>front_assets/images/CCO_CORP_Logo_310wide.png" alt="CCO Logo">
                                </a>
                            </div>
                        <?php } ?>

                        <?php
                        if (isset($sesions_logo)) {
                            ?>
                            <div class="logo2  col-lg-2 col-md-4 col-sm-12" style="margin-left:10px !important; <?=(isset($sponsor_type) && $sponsor_type!='')?'margin-top: 28px;':'margin-top: 12px;'?> width: <?=$sesions_logo_width?>px; height: <?=$sesions_logo_height?>px">
                            <?php if($sponsor_type!=''):?>
                                <span  style="white-space: nowrap"><?= $sponsor_type ?></span>
                            <?php endif;?>
                                <img src="<?= base_url() . "uploads/sessions_logo/" . $sesions_logo ?>" onerror="$(this).parent().remove()"  style="width: 100%; height:100%;">
                            </div>
                            <?php
                        }
                        ?>
                        <!--END: LOGO-->
                        <!--MOBILE MENU -->
                        <div class="nav-main-menu-responsive">
                            <button class="lines-button x" type="button" data-toggle="collapse" data-target=".main-menu-collapse">
                                <span class="lines"></span>
                            </button>
                        </div>
                        <!--END: MOBILE MENU -->
                        <!--SHOPPING CART -->

                        <!--END: SHOPPING CART -->

                        <!--NAVIGATION-->
                        <div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
                            <div class="container" style="text-transform: uppercase;">
                                <nav id="mainMenu2" class="main-menu mega-menu" style="margin-top: 10px;">
                                    <?php
                                    if ($this->session->userdata('cid') != "") {
                                        $profile_data = $this->common->get_user_details($this->session->userdata('cid'));
                                        ?>

                                        <button class="live-support-open-button nav navbar-nav navbar-right" onclick="openLiveSupportChat()" style="background-color: #<?=$themeColour?>; display: <?=(liveSupportChatStatus())?'block':'none'?>;"><i class="far fa-life-ring"></i> Live Technical Support</button>

                                        <ul class="main-menu nav navbar-nav navbar-right">
                                            <?php if (1 == 2) { ?>
                                                <li class="dropdown" style="margin-top: -9px;">
                                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <?php if ($profile_data->profile != "") { ?>
                                                            <span class="glyphicon glyphicon-user"></span> Profile

                                                                                                                                                                       <!-- <img src="<?/*= base_url() */?>uploads/customer_profile/<?/*= $profile_data->profile */?>"style="height: 50px; width: 50px;;">-->

                                                        <?php } else { ?>
                                                            <span class="glyphicon glyphicon-user"></span> Profile
                                                        <?php } ?>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <b style="padding: 10px 20px 10px 18px; color:#A9A9A9;"><?= $profile_data->first_name . ' ' . $profile_data->last_name ?></b>
                                                        </li>
                                                        <li>
                                                            <b style="padding: 10px 20px 10px 18px; color:#A9A9A9;"><?= $profile_data->email ?></b>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url() ?>register/user_profile/<?= $profile_data->cust_id ?>">
                                                                EDIT PROFILE
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url() ?>home/notes">
                                                                My Briefcase
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url() ?>login/logout">
                                                                Log Out
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <ul class="main-menu nav navbar-nav navbar-right">
                                            <li><a href="https://yourconference.live/support" target="_blank" class="hoverThemeColour" id="helpdesk_link" style=" display: <?=(liveSupportChatStatus())?'none':'block'?>">HELP DESK</a></li>
                                        </ul>
                                        <ul class="main-menu nav navbar-nav navbar-right">
                                            <?php
                                            if (isset($attendee_view_links_status) && isset($attendee_view_links_status)) {
                                                if ($attendee_view_links_status == "1") {
                                                    ?>
                                                    <li><a target="_blank" href="<?= $url_link ?>"><?= $link_text ?></a></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <?php
                                            if (isset($right_bar) && isset($tool_box_status)) {
                                            if ($tool_box_status == "1" && sessionRightBarControl($right_bar, "resources")) {
                                            ?>
                                                <li class="sticky_resources_open" data-type="resourcesSticky"><a data-type2="off" class="hoverThemeColour">RESOURCES</a></li>
                                            <?php
                                               }}
                                            ?>

                                            <li>
                                                <a target="_blank" class="hoverThemeColour" id="toolbox" >TOOLBOX</a>
                                                <ul class="toolboxCustomDrop">
                                                    <?php
                                                    if (isset($right_bar) && isset($tool_box_status)) {
                                                        if ($tool_box_status == "1") {
                                                            if (sessionRightBarControl($right_bar, "questions")) {
                                                                ?>
                                                                <li data-type="questionsSticky"><a data-type2="off" class="hoverThemeColour"><i class="fa fa-question" aria-hidden="true"></i> ASK QUESTIONS</a></li>
                                                                <?php
                                                            }
                                                            if (sessionRightBarControl($right_bar, "notes")) {
                                                                ?>
                                                                <li data-type="notesSticky"><a data-type2="off" class="hoverThemeColour"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> TAKE NOTES</a></li>
                                                                <?php
                                                            }
                                                            if (sessionRightBarControl($right_bar, "chat")) {
                                                                ?>
                                                                <li data-type="messagesSticky"><a data-type2="off" class="hoverThemeColour"><i class="fa fa-comments" aria-hidden="true"></i> CHAT</a></li>
                                                                <?php
                                                            }
                                                            if (sessionRightBarControl($right_bar, "resources")) {
                                                                ?>
                                                                <li data-type="resourcesSticky"><a data-type2="off" class="hoverThemeColour"><i class="fa fa-paperclip" aria-hidden="true"></i> RESOURCES</a></li>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    <?php } else { ?>
                                        <ul class="main-menu nav navbar-nav navbar-right">
                                            <li><a href="https://yourconference.live/support" target="_blank" class="hoverThemeColour" id="helpdesk_link" style=" display: <?=(liveSupportChatStatus())?'none':'block'?>">HELP DESK</a></li>
                                        </ul>
                                    <?php } ?>
                                </nav>
                            </div>
                        </div>

                        <!--END: NAVIGATION-->
                    </div>
                </div>
            </header>
            <!-- END: HEADER -->
