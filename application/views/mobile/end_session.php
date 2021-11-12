<style>
    .parallax{
        min-height: 800px;
    }
    .jumbotron .lounge{
        color: black;
        font-weight: 500;
    }.jumbotron .lounge a{
         font-weight: bold;
         text-decoration: underline !important;
     }
    .jumbotron p{
        width: 100%;
    }
    .jumbotron h2{
        font-size: 45px;
    }
    .jumbotron{


        text-align: center;
        max-width: 100%;
    }
</style>
<section class="parallax " style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
<div class="container">
    <div class="jumbotron my-5 card text-center" style="top:10px; padding-bottom: 10px; text-align: center">
        <div class="row text-center justify-content-center">
            <div <?=(isset($sessions[0]->session_end_image) && !empty($sessions[0]->session_end_image))? '<img style="width:'.$sessions[0]->end_image_width.'px; height:'.$sessions[0]->end_image_height.'px;"':''?>>
            <?= (isset($sessions[0]->session_end_image) && !empty($sessions[0]->session_end_image))? '<img style="width: 100%; height:100%; margin-left:0; margin-right:auto; display:block; " src="'.base_url().'uploads/session_end/'.$sessions[0]->session_end_image .'">' : ''?>
            </div>
        </div>
        <div class="row  text-center justify-content-center">
        <h2 class="text-center"><?= (isset($sessions[0]->session_end_message) && !empty($sessions[0]->session_end_message))?$sessions[0]->session_end_message : 'This session is now closed.'?></h2>
        </div>
    </div>
</div>
</section>