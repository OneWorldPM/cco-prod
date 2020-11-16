<!-- Please add styles only in this CSS file, NOT directly on this HTML file -->
<link href="<?= base_url() ?>front_assets/presenter/view_session.css?v=1" rel="stylesheet">

<?php
if (isset($_GET['testing']) && $_GET['testing'] == 1) {
    echo date('yy-m-d h:m:i');
    echo "<pre>";
    print_r($sessions);
    exit("</pre>");
}
?>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw" style="padding: 6px;">
            <div class="panel panel-primary" id="panel5">
                <div class="panel-heading" style="padding-bottom: 8px;">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="panel-title text-white"><?= $sessions->session_title ?></h4>
                        </div>
                        <div class="col-md-4" style="text-align: center;">
                            <!--                            <a id="btn_timer_start" style="background-color:#7b7b7c; border-color:#7b7b7c;" class="btn btn-grey btn-sm">START</a>-->
                            <!--                            <a id="btn_timer_stop" style="background-color:#7b7b7c; border-color:#7b7b7c;" class="btn btn-grey btn-sm">STOP</a>-->
                            <p id="id_day_time_clock" style="float: right; color: #1f860b; font-weight: 700; font-size:24px; margin:0;"></p>
                        </div>
                    </div>
                </div>
                <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important; padding: 10px;padding-bottom: 0">
                    <div class="row" id="orderContainer">
                        <div class="col-lg-2 col-md-3" style="padding-right: 0; padding-left: 8px;" id="leftOrder">
                            <?php
                            if (isset($music_setting)) {
                                if ($music_setting->music_setting != "") {
                                    ?>
                                    <audio allow="autoplay" id="audio" src="<?= base_url() ?>uploads/music/<?= $music_setting->music_setting ?>"></audio>
                                    <?php
                                }
                            }
                            ?>
                            <input type="hidden" id="time_second" value="3600">
                            <input type="hidden" id="poll_vot_section_id_status" value="0">
                            <input type="hidden" id="poll_vot_section_is_ended" value="0">
                            <input type="hidden" id="poll_vot_section_last_status" value="0">
                            <div class="col-md-12" id="poll_vot_section" style="padding: 0px 0px 0px 0px; margin-top: 0px; background-color: #fff; border-radius: 5px;">
                            </div>
                            <div class="col-md-12" id="timer_sectiom" style="padding-top: 20px; padding-bottom: 20px; display: none;">
                                <span id="id_day_time" style="border:1px solid #000; border-radius: 100px; font-size: 76px; font-weight: 700; color: green; padding: 10px 30px 10px 30px;"></span>
                            </div>
                            <div class="col-md-12" id="resource_section" style="margin-top: 10px; background-color: #fff; border-radius: 5px;padding: 0">
                                <div>
                                    <h2 style='margin-bottom: 0px; color: #ffffff; font-weight: 700; font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'><i class="fa fa-paperclip" style="font-size: 18px; color: #ee5d26;"></i> Resources <i class="fa fa-caret-right" id="resource_show" data-resource_show_status="1" style="float: right; font-size: 16px;"></i></h2>
                                </div>
                                <div style="padding: 15px 15px 15px 15px; overflow-y: auto; height: 150px;" id="resource_display_status">
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
                            </div>

                        </div>
                        <div class="col-lg-8 col-md-6" id="embed_html_code_section" style="text-align: center; padding-right: 0; padding-left: 0;margin-bottom: 14px">
                            <?= isset($sessions) ? $sessions->embed_html_code_presenter : "" ?>
                        </div>
                        <div class="col-lg-2 col-md-3" style="padding-left: 0;padding-right: 6px;" id="rightOrder">
                            <fieldset style="margin: 0px 0px 0px 0px; padding: 0px;min-height:180px">
                                <div>
                                    <h2 style='margin-bottom: 5px; color: #ffffff; font-weight: 700; font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'>Host Chat</h2>
                                </div>
                                <div class="col-md-12" id="group_chat_section">
                                    <input type="hidden" id="sessions_group_chat_id" value="">
                                    <div class="wrap-messages">
                                        <div id="inbox" class="inbox">
                                            <!-- start: EMAIL LIST -->
                                            <div class="col email-list" style="width: 100% !important">
                                                <div class="wrap-list" style="width: 100% !important">
                                                    <ul class="messages-list perfect-scrollbar allmessage" style="top: 0px;max-height: 280px;">

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end: EMAIL LIST -->
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-75px">
                                        <hr style="border-top:1px solid #b2b7bb;">
                                        <div class="col-md-11 col-xs-9" style="padding-right: 0px; padding-left: 0px">
                                            <div class="input-group">
                                                <span class="input-group-addon" style="padding: 5px 6px; background-color:gray; border-color: gray;"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png" id="emjis_section_show" title="Check to Show Emoji" data-emjis_section_show_status="0" style="width: 20px; height: 20px;" alt=""/></span>
                                                <input type="text" placeholder="Message..." id="message" name="message" class="form-control">
                                                <!--<textarea  rows="2" class="form-control" style="color: #000;" placeholder="Message..."></textarea>-->
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-xs-3" style="padding-left: 0px;">
                                            <button class="btn btn-primary" id="send" style="height: 35px; padding-right: 5px; background-color:gray; border-color: gray; padding-left: 5px; "><i class="fa fa-send"></i></button>
                                        </div>
                                    </div>
                                    <div style="text-align: left; padding-left: 0px; margin-left: -20px; display: flex;" id="emojis_section">
                                        <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy" id="happy" data-title_name="&#128578;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad" id="sad" data-title_name="&#128543" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png" title="Laughing" id="laughing" data-title_name="😁" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png" title="Thumbs Up" id="thumbs_up" data-title_name="&#128077;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png" title="Thumbs Down" id="thumbs_down" data-title_name="&#128078" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png" title="Clapping" id="clapping" data-title_name="&#128079;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                    </div>
                                </div>
                            </fieldset>

                            <ul id="myTab1" class="nav nav-tabs" style="background-color: #b2b7bb;margin-top: 10px">
                                <li class="active">
                                    <a href="#attendee_questions" data-toggle="tab" style="padding: 9px 4px; text-transform: uppercase; font-size: 12px; color: #fff;">
                                        Attendee Questions
                                    </a>
                                </li>
                                <li>
                                    <a href="#favorites" data-toggle="tab" style="padding: 9px 4px; text-transform: uppercase; font-size: 12px; color: #fff;">
                                        Favorites <i class="fa fa-star-o"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" style="max-height: 420px; overflow-y: auto;">
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
		 <span style="margin-right: 25px;" class="pull-left"><?php if($sessions->zoom_link != ""){ ?> Zoom Meeting Link : <b><a href="<?= $sessions->zoom_link ?>" target="_blank"><?= $sessions->zoom_link ?></a></b><?php } ?></span>
        <span style="margin-right: 25px;" class="pull-left"><?php if($sessions->zoom_password != ""){ ?> Password : <b><?= $sessions->zoom_password ?></b><?php } ?></span>
        <span style="margin-right: 25px;" class="pull-right text-red totalAttende totalAttende<?= getAppName($sessions->sessions_id) ?>">Total attendees: <b>0</b></span>

        <!-- end: DYNAMIC TABLE -->
    </div>
</div>
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
<script src="<?= base_url() ?>front_assets/presenter/view_session.js?v=2"></script>
