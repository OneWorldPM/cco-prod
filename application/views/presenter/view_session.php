<!-- Please add styles only in this CSS file, NOT directly on this HTML file -->
<link href="<?= base_url() ?>front_assets/presenter/view_session.css?v=2" rel="stylesheet">

<?php
if (isset($_GET['testing']) && $_GET['testing'] == 1) {
    echo date('yy-m-d h:m:i');
    echo "<pre>";
    print_r($sessions);
    exit("</pre>");
}
?>

<div class="container-fluid presenterContainer">
    <div class="row">
        <div class="col-lg-12 col-md-12 leftSide">
<!--            <iframe class="col-md-12 embed-responsive-item" src="https://meet.yourconference.live/conference/share-presentation.html?confId=CCO_AMP_Final_Deck_V3&amp;totalSlides=95&amp;fileExtension=JPG" style="height: inherit;" scrolling="no"></iframe>-->
            <?= isset($sessions) ? $sessions->embed_html_code_presenter : "" ?>

        </div>
        <div class="col-lg-3 col-md-4 rightSide">

            <div class="rightSticykPopup hostChat presenterRightSticykPopup" style="display: none">
                <div class="header"><span>Charla de Invitado</span>
                    <div class="rightTool">
                        <i class="fa fa-minus" aria-hidden="true" data-right-id="1"></i>
                        <div class="dropdown">
<!--                            <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>-->
                            <ul class="dropdown-menu">
                                <li data-type="questionFavorites"><a data-type2="off">Preguntas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <input type="hidden" id="sessions_group_chat_id" value="">
                    <div class="wrap-messages">
                        <div id="inbox" class="inbox">
                            <div class="col email-list">
                                <div class="wrap-list">
                                    <ul class="messages-list perfect-scrollbar allmessage" id="allmessage">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="width: 100%;">

                        <div id="emojis_section" style="width:inherit;position: absolute;z-index: 99;margin-top: -42px;">
                            <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy" id="happy" data-title_name="&#128578;"/>
                            <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad" id="sad" data-title_name="&#128543"/>
                            <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png" title="Laughing" id="laughing" data-title_name="😁"/>
                            <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png" title="Thumbs Up" id="thumbs_up" data-title_name="&#128077;"/>
                            <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png" title="Thumbs Down" id="thumbs_down" data-title_name="&#128078"/>
                            <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png" title="Clapping" id="clapping" data-title_name="&#128079;"/>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png" id="emjis_section_show" title="Check to Show Emoji" data-emjis_section_show_status="0"/></span>
                            <input type="text" placeholder="Entrar Mensaje..." id="message" name="message" class="form-control">
                            <span class="btn btn-primary input-group-addon" id="send" ><i class="fa fa-send"></i></span>

                        </div>

                    </div>
                    <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions->sessions_id ?>">
                </div>
            </div>
            <div class="rightSticykPopup questionFavorites presenterRightSticykPopup" style="display: none">
                <div class="header" style="text-transform: uppercase;"><span><a href="#attendee_questions" data-toggle="tab">Preguntas</a> | <a href="#favorites" data-toggle="tab">Favoritos</a></span>
                    <div class="rightTool">
                        <i class="fa fa-minus" aria-hidden="true" data-right-id="2"></i>
                        <div class="dropdown">
<!--                            <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>-->
                            <ul class="dropdown-menu">
                                <li data-type="hostChat"><a data-type2="off">Charla de Invitado</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="attendee_questions">
                            <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions->sessions_id ?>">
                            <input type="hidden" name="last_sessions_cust_question_id" id="last_sessions_cust_question_id" value="0">
                            <div id="question_list"></div>

                        </div>
                        <div class="tab-pane fade" id="favorites">
                            <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions->sessions_id ?>">
                            <input type="hidden" name="favorite_last_sessions_cust_question_id" id="favorite_last_sessions_cust_question_id" value="0">
                            <div id="favorite_question_list"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none; text-align: left;" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 0px; border: 0px solid #999; border-radius: 15px;">
            <div class="modal-body" style="padding: 0px;">
                <div class="row" style="padding-top: 0px; padding-bottom: 20px;">
                    <div class="col-sm-12">
                        <div class="" id="timer_sectiom" style="padding-top: 0px; padding-bottom: 0px; display: none; border-top-right-radius: 15px; border-top-left-radius: 15px; background-color: #ebeaea; ">
                            <div class=""  style="text-align: right; font-size: 20px; font-weight: 700; border-top-right-radius: 15px; border-top-left-radius: 15px;  ">
                                Tiempo Restante : <span id="id_day_time" style=" font-size: 20px; font-weight: 700; color: #ef5e25; padding: 0px 10px 0px 0px;"></span>
                            </div>
                        </div>
                        <div id="poll_vot_section" style="padding: 0px 0px 0px 0px; margin-top: 0px; background-color: #fff; border-radius: 15px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Esconder</button>
            </div>
        </div>
    </div>
</div>





<div class="stickyTimer">
    <?php if (1==2){ ?>
        <div class="viewUser">
            <span>live</span><i class="fa fa-eye" aria-hidden="true"></i><span class="userCount userCount<?=getAppName($sessions->sessions_id)?>">0</span>
        </div>
    <?php } ?>

    <div id="id_day_time_clock" class="timer"></div>
</div>

<div class="rightSticky presenterRightSticky" data-screen="presenter">
    <ul>
        <li data-type="hostChat" class="1"><i class="fa fa-comments-o" aria-hidden="true"></i> <span class="notify hostChatNotify displayNone">Nuevo</span> <span>Charla de Invitado</span></li>
        <li data-type="questionFavorites" class="2"><i class="fa fa-question" aria-hidden="true"></i> <span class="notify questionNotify displayNone">Nuevo</span> <span>Preguntas</span></li>
    </ul>
</div>


<script>
    var base_url = "<?=base_url()?>";
    var site_url = "<?= site_url() ?>";
    var user_id = "<?=$this->session->userdata('cid')?>";
    var app_name = "<?=getAppName($sessions->sessions_id) ?>";
    var session_id = "<?=$sessions->sessions_id?>";
    var session_start_datetime = "<?= date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->time_slot . ' UTC-5' ?>";
    var session_end_datetime = "<?= date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->end_time . ' UTC-5' ?>";
</script>

<!-- Please add scripts only in this JS file, NOT directly on this HTML file -->
<script src="<?= base_url() ?>front_assets/presenter/view_session.js?v=4"></script>
