<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" href="<?= base_url() ?>front_assets/images/favicon.png">
    <title>Virtual Conference & Trade Show</title>

    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- LOAD GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

    <!--VENDOR SCRIPT-->
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="<?= base_url() ?>assets/alertify/alertify.core.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/alertify/alertify.default.css" rel="stylesheet" type="text/css" />
    <script src="<?= base_url() ?>assets/alertify/alertify.js"></script>

    <!--****** PubNub Stuff *****-->
    <!-- DO NOT use production keys on localhost-->
    <?=pubnub_keys()?>
    <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.14.0.min.js"></script>
</head>
<body>
    <header>
        <div style="height: 4px;background-color: #004290;"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="col-9 col-md-8"><a class="navbar-brand" href="#"><img src="https://yourconference.live/CCO/front_assets/images/CCO_CORP_Logo_310wide.png" alt="CCO Logo"   style="height:70px"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-5" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <?php if($this->session->userdata('cid')):?>
                    <li class="nav-item active">
                        <button id="live_support-btn"  onclick="openLiveSupportChat()"  class="nav-link btn btn-sm text-white shadow-none" href="#"  style="display: <?=(liveSupportChatStatus())?'block':'none'?>;background-color: #004290; width: 100%; font-size: 20px">Live Technical Support <i class="far fa-life-ring"></i><span class="sr-only">(current)</span></button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=isset($url_link)?$url_link:'';?>" target="_blank" style="font-size: 20px"><?=isset($link_text)?$link_text:'';?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="header-resource-btn" style="font-size: 20px">Resources</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-size: 20px">Toolbox</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?=base_url().'mobile/login/logout'?>" class="nav-link btn btn-sm text-white shadow-none" href="#" style="background-color: #004290; font-size: 20px">Log Out</a>
                    </li>

<!--                        <li class="nav-item">
                            <a href="<?/*=base_url().'mobile/login/index/'.$this->session->userdata('sess_id')*/?>" class="nav-link btn btn-sm text-white shadow-none" href="#" style="background-color: #004290">Log In</a>
                        </li>-->
                    <?php endif;?>
                </ul>
                <span class="navbar-text">

    </span>
            </div>
        </nav>
    </header>

<script>
    $('#header-resource-btn').on('click', function(){

        $('.stickyQuestionbox').css('display', 'none');
        // $('.stickyNotesbox').css('display','none');
        $('.resourcesStickybox').css('display','block');
    });
</script>
