<style>
    .jumbotron{
        width: 900px;
        margin: 50px auto;
        text-align: center;
        max-width: 100%;
    }
    .jumbotron p{
     width: 100%;
    }
    .jumbotron h2{
               font-size: 45px;
    }

    .jumbotron .lounge{
        color: black;
        font-weight: 500;
    }.jumbotron .lounge a{
             font-weight: bold;
             text-decoration: underline !important;
    }

</style>
<section class="parallax fullscreen" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
<div class="container container-fullscreen">
    <div class="jumbotron">
        <?= (isset($sessions[0]->session_end_image) && !empty($sessions[0]->session_end_image))? '<img style="width:'.$sessions[0]->end_image_width.'px; height:'.$sessions[0]->end_image_height.'px" src="'.base_url().'uploads/session_end/'.$sessions[0]->session_end_image .'">' : ''?>
        <h2><?= (isset($sessions[0]->session_end_message) && !empty($sessions[0]->session_end_message))?$sessions[0]->session_end_message : 'This session is now closed.'?></h2>
    </div>
</div>
</section>