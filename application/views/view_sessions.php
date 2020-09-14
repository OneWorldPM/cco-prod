<link href="<?= base_url() ?>assets/css/attendee-session-view.css?v=<?=rand(1, 100)?>" rel="stylesheet">
<style>
    .progress-bar {
        height: 100%;
        padding: 3px;
        background: rgb(200, 201, 202);
        box-shadow: none;
    }
    .progress-bar_1 {
        height: 100%;
        padding: 3px;
        background: rgb(108, 108, 108);
        box-shadow: none; 
        color: #fff;
        padding-top: 0px;
    }
    .progress_bar_new {
        height: 100%;
        padding: 3px;
        background: #99d9ea;
        box-shadow: none;
        text-align: center;
        color: #fff;
        padding-top: 0px;
    }

    .progress_bar_new_1 {
        height: 100%;
        padding: 3px;
        background: #5c915b;
        box-shadow: none;
        text-align: center;
        color: #fff;
        padding-top: 0px;
    }

    .option_section_css{
        background-color: #f1f1f1;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }
    .option_section_css_selected{
        background-color: #e1f6ff;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }
    .progress {
        height: 26px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #e6edf3;
        border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }

    .progress_1 {
        height: 26px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #55c4534f;
        border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }

    section{
        padding: 25px 0px;
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
<!--<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/Sessions_BG_screened.jpg); top: 0; padding-top: 0px;">-->
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12">
                    <!-- CONTENT -->
                    <section class="content">
                        <div class="container" style=" background: rgba(250, 250, 250, 0.8);"> 
                            <div class="row p-b-40">
                                <div class="col-md-12" style="background-color: #B2B7BB; margin-bottom: 10px;">
                                    <h3 style="margin-bottom: 5px; color: #fff; font-weight: 700; text-transform: uppercase;"><?= isset($sessions) ? $sessions->session_title : "" ?></h3>
                                </div>

                                <div id="embededVideo" class="col-md-12" style="text-align: center;">
                                    <div class="row"><i id="btnFS" class="fa fa-arrows-alt" aria-hidden="true"></i></div>
                                    <div id="iframeDiv" class="row" style="width: 102%;height: 97%;"><?= isset($sessions) ? $sessions->embed_html_code : "" ?></div>
                                    <div class="modal fade" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none; text-align: left;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="padding: 0px;">
                                                    <img class="kent_logo" src="<?= base_url() ?>assets/images/logo.png" alt="MLG">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" style="padding-top: 10px; padding-bottom: 20px;">
                                                        <div class="col-sm-12">
                                                            <div id="poll_vot_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="timer_sectiom" style="padding-top: 20px; padding-bottom: 20px; display: none;">
                                                        <div class="col-md-12" style="text-align: center;">
                                                            <span id="id_day_time" style="border:1px solid #000; border-radius: 100px; font-size: 76px; font-weight: 700; color: green; padding: 10px 30px 10px 30px;"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--                                <div class="col-md-3">
                                                                    <input type="hidden" name="last_sessions_cust_question_id" id="last_sessions_cust_question_id" value="0">
                                                                    <div id="question_answer_section" style="padding: 0px 12px 0px 12px; margin-top: 20px; background-color: #fff; border-radius: 5px; overflow-y: scroll; height: 400px;">
                                                                        <h2 style="margin-bottom: 0px; color: #f05d1f; font-weight: 700; font-size: 18px; text-align: center; border-bottom: 1px solid #696f6f;">Question & Answer</h2>
                                                                        <div id="question_answer_section_list" style="padding: 10px 0px 10px 0px;"></div>
                                                                    </div>
                                                                </div>-->
                                <div class="col-md-12">
                                    <?php
                                    if (isset($music_setting)) {
                                        if ($music_setting->music_setting != "") {
                                            ?>  <audio allow="autoplay" id="audio" src="<?= base_url() ?>uploads/music/<?= $music_setting->music_setting ?>"></audio>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <input type="hidden" id="view_sessions_history_id" value="">
                                    <input type="hidden" id="sessions_id" value=" <?= isset($sessions) ? $sessions->sessions_id : "" ?>">
                                    <input type="hidden" id="poll_vot_section_id_status" value="0">
                                    <input type="hidden" id="poll_vot_section_is_ended" value="0">
                                    <input type="hidden" id="poll_vot_section_last_status" value="0">
                                    <!--                                    <div class="col-md-3">
                                                                            <div id="poll_vot_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
                                                                            </div>
                                                                        </div>-->
                                    <div class="col-md-3">
                                        <div id="ask_questions_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
                                            <div>
                                                <h2 style='margin-bottom: 0px; color: #ffffff; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'><i class="fa fa-question-circle" style="font-size: 18px; color: #ee5d26;"></i> Questions</h2>
                                            </div>
                                            <div style="padding: 15px 15px 15px 15px;">
                                                <div style="text-align: center; display: flex; " id="questions_section">
                                                    <div class="col-md-12 input-group">
                                                        <span class="input-group-addon" style="padding: 5px 6px"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png"  id="questions_emjis_section_show" title="Check to Show Emoji" data-questions_emjis_section_show_status="0" style="width: 20px; height: 20px;" alt=""/></span>
                                                        <input type="text" id="questions" class="form-control" placeholder="Enter Question" value="">
                                                    </div>
                                                    <a class="button color" style="margin: 0px; padding: 15px 7px; background-color: #c3c3c3; border-color: #c3c3c3;" id="ask_questions_send"><span>Send</span></a>
                                                </div>
                                                <div style="text-align: left; padding-left: 10px; display: flex;" id="questions_emojis_section">
                                                    <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy" id="questions_happy" data-title_name="&#128578;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                    <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad" id="questions_sad" data-title_name="&#128543" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                    <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png" title="Laughing" id="questions_laughing"  data-title_name="😁" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                    <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png" title="Thumbs Up" id="questions_thumbs_up" data-title_name="&#128077;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                    <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png" title="Thumbs Down" id="questions_thumbs_down" data-title_name="&#128078" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                    <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png" title="Clapping" id="questions_clapping" data-title_name="&#128079;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                </div>
                                                <span id='error_questions' style='color:red;'></span>
                                                <span id='success_questions' style='color:green;'></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="briefcase_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
                                            <div>
                                                <h2 style='margin-bottom: 0px; color: #ffffff; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'><i class="fa fa-question-circle" style="font-size: 18px; color: #ee5d26;"></i> Notes</h2>
                                            </div>
                                            <div style="padding: 15px 15px 15px 15px;">
                                                <div style="text-align: center; display: flex; " id="briefcase_section">
                                                    <div class="col-md-12 input-group">
                                                        <textarea type="text" id="briefcase" class="form-control" placeholder="Enter Note" value=""></textarea>
                                                    </div>
                                                    <a class="button color" style="margin: 0px; padding: 24px 7px; background-color: #c3c3c3; border-color: #c3c3c3;" id="briefcase_send"><span>Save</span></a>
                                                </div>
                                                <span id='error_briefcase' style='color:red;'></span>
                                                <span id='success_briefcase' style='color:green;'></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="resource_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
                                            <div>
                                                <h2 style='margin-bottom: 0px; color: #ffffff; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'> <i class="fa fa-paperclip" style="font-size: 18px; color: #ee5d26;"></i> Resources <i class="fa fa-caret-down" id="resource_show" data-resource_show_status="1" style="float: right; font-size: 16px;"></i></h2>
                                            </div>
                                            <div style="padding: 15px 15px 15px 15px; overflow-y: auto; height: 150px;" id="resource_display_status">
                                                <?php
                                                if (!empty($session_resource)) {
                                                    foreach ($session_resource as $val) {
                                                        ?>
                                                        <div class="row" style="margin-bottom: 10px; padding-bottom: 5px; border-bottom: 1px solid;">
                                                            <div class="col-md-12"><a href="<?= $val->resource_link ?>" target="_blank"><?= $val->link_published_name ?></a></div>
                                                            <div class="col-md-12"><a href="<?= base_url() ?>uploads/resource_sessions/<?= $val->resource_file ?>" download> <?= $val->upload_published_name ?> </a></div>
                                                            <a class="button color small resource_save" style="margin: 0px; background-color: #c3c3c3; border-color: #c3c3c3; float: right;" data-session_resource_id="<?= $val->session_resource_id ?>" id="resource_send"><span>Save</span></a>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <span id='success_resource' style='color:green;'></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="col-md-3">
                                                                            <div id="group_chat_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px; display: none">
                                                                                <div>
                                                                                    <h2 style='margin-bottom: 0px; color: #fff; font-weight: 700; font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'><i class="fa fa-comment" style="font-size: 18px; color: #ee5d26;"></i> Group Chat</h2>
                                                                                </div>
                                                                                <div class="row" id="message_list" style="padding-top: 10px; padding-bottom: 10px; overflow-y: auto; height: 250px;">
                                                                                </div>
                                                                                <input type="hidden" id="sessions_group_chat_id" value="">
                                                                                <div style="text-align: center; display: flex;" id="send_message_section">
                                                                                    <div class="col-md-12 input-group">
                                                                                        <span class="input-group-addon" style="padding: 5px 6px"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png"  id="emjis_section_show" title="Check to Show Emoji" data-emjis_section_show_status="0" style="width: 20px; height: 20px;" alt=""/></span>
                                                                                        <input type="text" id="send_message" class="form-control" placeholder="Message..." value="">
                                                                                    </div>
                                                                                    <a class="button color" style="margin: 0px; padding: 15px 7px; background-color: #c3c3c3; border-color: #c3c3c3;" id="send_message_btn"><span>Send</span></a>
                                                                                </div>
                                                                                <div style="text-align: left; padding-left: 10px; display: flex;" id="emojis_section">
                                                                                    <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy" id="happy" data-title_name="&#128578;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                                                    <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad" id="sad" data-title_name="&#128543" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                                                    <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png" title="Laughing" id="laughing"  data-title_name="😁" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                                                    <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png" title="Thumbs Up" id="thumbs_up" data-title_name="&#128077;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                                                    <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png" title="Thumbs Down" id="thumbs_down" data-title_name="&#128078" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                                                    <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png" title="Clapping" id="clapping" data-title_name="&#128079;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                                                                </div>
                                                                                <span id='error_send_message' style='color:red;'></span>
                                                                                <span id='success_send_message' style='color:green;'></span>
                                                                            </div>
                                                                        </div>-->
                                </div>
                            </div>
                          <p style="font-weight: 600;">CURRENT TIME : <span id="show_time"></span> EDT   <a class="button color" style="margin: 0px; padding: 15px 7px; background-color: #c3c3c3; border-color: #c3c3c3; float: right; margin-bottom: 5px;" id="close_session"><span>Close the Session</span></a></p>
                        </div>
                    </section>
                    <!-- END: SECTION --> 
                </div>
            </div> 
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {

        var url = $(location).attr('href');
        var segments = url.split('/');
        var segments_id = segments[6];
        if (window.history && window.history.pushState) {
            window.history.pushState(segments_id, null, './' + segments_id);
            $(window).on('popstate', function () {
                $.ajax({
                    url: "<?= base_url() ?>sessions/update_viewsessions_history_open",
                    type: "post",
                    data: {'view_sessions_history_id': $("#view_sessions_history_id").val()},
                    dataType: "json",
                    success: function (data) {
                    }
                });

            });
        }

        var sessions_id = $("#sessions_id").val();
        var resolution = screen.width + "x " + screen.height + "y";
        $.ajax({
            url: "<?= base_url() ?>sessions/add_viewsessions_history_open",
            type: "post",
            data: {'sessions_id': sessions_id, 'resolution': resolution},
            dataType: "json",
            success: function (data) {
                $("#view_sessions_history_id").val(data.view_sessions_history_id);
            }
        });

    $(document).on("click", "#close_session", function () {
            $.ajax({
                url: "<?= base_url() ?>sessions/update_viewsessions_history_open",
                type: "post",
                data: {'view_sessions_history_id': $("#view_sessions_history_id").val()},
                dataType: "json",
                success: function (data) {
                    window.location.replace("<?= site_url() ?>home");
                }
            });
        });


        $("#questions_emojis_section").hide();
        $(document).on("click", "#questions_emjis_section_show", function () {
            var emjis_section_show_status = $("#questions_emjis_section_show").attr("data-questions_emjis_section_show_status");
            if (emjis_section_show_status == 0) {
                $("#questions_emojis_section").show();
                $("#questions_emjis_section_show").attr('data-questions_emjis_section_show_status', 1);
            } else {
                $("#questions_emojis_section").hide();
                $("#questions_emjis_section_show").attr('data-questions_emjis_section_show_status', 0);
            }
        });

        $("#emojis_section").hide();
        $(document).on("click", "#emjis_section_show", function () {
            var emjis_section_show_status = $("#emjis_section_show").attr("data-emjis_section_show_status");
            if (emjis_section_show_status == 0) {
                $("#emojis_section").show();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 1);
            } else {
                $("#emojis_section").hide();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 0);
            }
        });

        $(document).on("click", "#questions_clapping", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_happy", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_laughing", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#clapping", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#send_message").val();
            if (questions != "") {
                $("#send_message").val(questions + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#happy", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#laughing", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#send_message").val();
            if (questions != "") {
                $("#send_message").val(questions + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        //  get_question_answer_section();
        //  setInterval(get_question_answer_section, 5000);
        // $("#questions_section").hide();
//        $(document).on("click", "#ask_questions", function () {
//            $("#questions_section").show();
//        });
        $("#resource_display_status").show();
        getMessage;
        setInterval(getMessage, 1000);

        get_group_chat_section_status();
        setInterval(get_group_chat_section_status, 10000);

        $(document).on("click", "#resource_show", function () {
            var resource_show_status = $("#resource_show").attr("data-resource_show_status");
            if (resource_show_status == 0) {
                $("#resource_display_status").show();
                $("#resource_show").removeClass('fa-caret-right');
                $("#resource_show").addClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 1);
            } else {
                $("#resource_display_status").hide();
                $("#resource_show").addClass('fa-caret-right');
                $("#resource_show").removeClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 0);
            }
        });


        $(document).on("click", "#send_message_btn", function () {
            if ($("#send_message").val() == "") {
                $("#error_send_message").text("Enter Message").fadeIn('slow').fadeOut(5000);
            } else {
                var send_message = $("#send_message").val();
                var sessions_id = $("#sessions_id").val();
                var sessions_group_chat_id = $("#sessions_group_chat_id").val();
                $.ajax({
                    url: "<?= base_url() ?>sessions/send_message",
                    type: "post",
                    data: {'sessions_id': sessions_id, 'send_message': send_message, 'sessions_group_chat_id': sessions_group_chat_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#send_message").val("");
                            $("#success_send_message").text("Send Message Successfully").fadeIn('slow').fadeOut(5000);
                        }
                    }
                });
            }
        });

        $(document).on("click", "#ask_questions_send", function () {
            if ($("#questions").val() == "") {
                $("#error_questions").text("Enter Questions").fadeIn('slow').fadeOut(5000);
            } else {
                var questions = $("#questions").val();
                var sessions_id = $("#sessions_id").val();
                $.ajax({
                    url: "<?= base_url() ?>sessions/addQuestions",
                    type: "post",
                    data: {'sessions_id': sessions_id, 'questions': questions},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#questions").val("");
                            $("#success_questions").text("Question Added Successfully").fadeIn('slow').fadeOut(5000);
                        }
                    }
                });
            }
        });

        $('#questions').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($("#questions").val() == "") {
                    $("#error_questions").text("Enter Questions").fadeIn('slow').fadeOut(5000);
                } else {
                    var questions = $("#questions").val();
                    var sessions_id = $("#sessions_id").val();
                    $.ajax({
                        url: "<?= base_url() ?>sessions/addQuestions",
                        type: "post",
                        data: {'sessions_id': sessions_id, 'questions': questions},
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "success") {
                                $("#questions").val("");
                                $("#success_questions").text("Question Added Successfully").fadeIn('slow').fadeOut(5000);
                            }
                        }
                    });
                }
            }
        });

        $(document).on("click", ".resource_save", function () {
            console.log("click");
            var session_resource_id = $(this).attr("data-session_resource_id");
            var sessions_id = $("#sessions_id").val();
            $.ajax({
                url: "<?= base_url() ?>sessions/addresource",
                type: "post",
                data: {'sessions_id': sessions_id, 'session_resource_id': session_resource_id},
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        $("#success_resource").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                    }
                }
            });
        });



        $(document).on("click", "#briefcase_send", function () {
            if ($("#briefcase").val() == "") {
                $("#error_briefcase").text("Enter Notes").fadeIn('slow').fadeOut(5000);
            } else {
                var briefcase = $("#briefcase").val();
                var sessions_id = $("#sessions_id").val();
                $.ajax({
                    url: "<?= base_url() ?>sessions/addBriefcase",
                    type: "post",
                    data: {'sessions_id': sessions_id, 'briefcase': briefcase},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#briefcase").val("");
                            $("#success_briefcase").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                        }
                    }
                });
            }
        });

        $('#briefcase').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($("#briefcase").val() == "") {
                    $("#error_briefcase").text("Enter Notes").fadeIn('slow').fadeOut(5000);
                } else {
                    var briefcase = $("#briefcase").val();
                    var sessions_id = $("#sessions_id").val();
                    $.ajax({
                        url: "<?= base_url() ?>sessions/addBriefcase",
                        type: "post",
                        data: {'sessions_id': sessions_id, 'briefcase': briefcase},
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "success") {
                                $("#briefcase").val("");
                                $("#success_briefcase").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                            }
                        }
                    });
                }
            }
        });

        get_poll_vot_section();
        setInterval(get_poll_vot_section, 1000);
        $(document).on("click", "#btn_vote", function () {
            var option_value = $('input[name=option]:checked').val();
            if (typeof option_value != "undefined") {
                $(':radio:not(:checked)').attr('disabled', true);
                var sessions_poll_question_id = $("#sessions_poll_question_id").val();
                var sessions_id = $("#sessions_id").val();
                $.ajax({
                    url: "<?= base_url() ?>sessions/pollVoting",
                    type: "post",
                    data: {'poll_question_option_id': option_value, 'sessions_poll_question_id': sessions_poll_question_id, 'sessions_id': sessions_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $('#btn_vote_label').html('VOTED <i class="fa fa-check" id="fa_fa_check" style="font-size: 13px;"></i>');
                            $('#fa_fa_check').show();

                        }
                    }
                });
            } else {
                $("#error_vote").text("Please Select Voting Option").fadeIn('slow').fadeOut(5000);
            }
        });
    });

    function get_question_answer_section() {
        var sessions_id = $("#sessions_id").val();
        var last_sessions_cust_question_id = $("#last_sessions_cust_question_id").val();
        var list_last_id = 0;
        $('.input_class').each(function () {
            list_last_id = $(this).attr("data-last_id");
            return false;
        });

        $.ajax({
            url: "<?= base_url() ?>sessions/get_question_list",
            type: "POST",
            data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
                    $.each(resultdata.question_list, function (key, val) {
                        key++;
                        $("#last_sessions_cust_question_id").val(val.sessions_cust_question_id);
                        $('#question_answer_section_list').prepend('<div style="border: 1px solid #696f6f; padding-top: 5px; padding-left: 5px; border-radius: 5px; margin-top:5px;" class="input_class" data-last_id="' + val.sessions_cust_question_id + '"><h5 style="margin-bottom: 2px;"> <b>Q</b> : ' + val.question + '</h5><h6> <b>A</b> : ' + val.answer + '</h6></div>');
                    });
                }
            }
        });
    }

    function get_poll_vot_section()
    {
        var poll_vot_section_id_status = $("#poll_vot_section_id_status").val();
        var poll_vot_section_last_status = $("#poll_vot_section_last_status").val();
        var sessions_id = $("#sessions_id").val();
        $.ajax({
            url: "<?= base_url() ?>sessions/get_poll_vot_section",
            type: "post",
            data: {'sessions_id': sessions_id},
            dataType: "json",
            success: function (data) {

                if (data.status == "success") {

                    if (poll_vot_section_id_status == "0") {
                        $("#poll_vot_section_id_status").val(data.result.sessions_poll_question_id);
                    }
                    if (poll_vot_section_last_status == "0") {
                        $("#poll_vot_section_last_status").val(data.result.status);
                    }
                    if (data.result.poll_status == 1 && data.result.timer_status == 1) {
                        if (poll_vot_section_id_status != data.result.sessions_poll_question_id) {
                            $("#timer_sectiom").show();
                            timer(0);
                        } else {
                            $("#timer_sectiom").show();
                            timer(1);
                        }
                    } else {
                        $("#timer_sectiom").hide();
                    }
                    if (poll_vot_section_id_status != data.result.sessions_poll_question_id || poll_vot_section_last_status != data.result.status) {
                        $("#poll_vot_section_id_status").val(data.result.sessions_poll_question_id);
                        $("#poll_vot_section_last_status").val(data.result.status);
                        if (data.result.poll_status == 1) {
                            $('#modal').modal('show');
                            $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='margin-bottom: 0px; color: #ffffff; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'>Live Poll</h2>\n\
<div class='col-md-12'>\n\
\n\<h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
<div style='padding-right: 20px;text-align: right;'><a class='button small color rounded icon-left' id='btn_vote' style='background-color: #c3c3c3; border-color: #c3c3c3; font-size: 16px;'><span id='btn_vote_label'>VOTE <i class='fa fa-check' id='fa_fa_check' style='font-size: 13px; display:none'></i></span></a></div>\n\
</form>");
                            if (data.result.exist_status == 1) {
                                $.each(data.result.option, function (key, val) {
                                    key++;
                                    if (data.result.select_option_id == val.poll_question_option_id) {
                                        $("#option_section").append("<div class='option_section_css_selected'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    } else {
                                        $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                });
                            } else {

                                $.each(data.result.option, function (key, val) {
                                    key++;
                                    $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                });


                            }
                            if (data.result.exist_status == 1) {
                                $(':radio:not(:checked)').attr('disabled', true);
                                $('#btn_vote_label').html('VOTED <i class="fa fa-check" id="fa_fa_check" style="font-size: 13px;"></i>');

                            }
                        } else {
                            $('#modal').modal('show');
                            $("#poll_vot_section").html("<div class='row'><div class='col-md-12'><h2 style='margin-bottom: 0px; color: #fff; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'>Live Poll Results</h2></div><div class='col-md-12'><div class='col-md-12'><h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5>\n\
                                                        \n\<div id='result_section' style='padding-bottom: 10px;'></div></div></div></div>");
                            var total_vote = 0;
                            var total_vote_compere_option = 0;
                            $.each(data.result.option, function (key, val) {
                                key++;
                                total_vote = parseFloat(total_vote) + parseFloat(val.total_vot);
                                if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {
                                    total_vote_compere_option = parseFloat(total_vote_compere_option) + parseFloat(val.compere_option);
                                }
                            });
                            $.each(data.result.option, function (key, val) {
                                key++;
                                if (total_vote == 0) {
                                    var result_calculate = 0;
                                } else {
                                    var result_calculate = (val.total_vot * 100) / total_vote;
                                }
                                if (data.result.max_value == val.total_vot) {
                                    $("#result_section").append("<label>" + val.option + "</label><div class='progress'><div class='progress_bar_new' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                                } else {
                                    $("#result_section").append("<label>" + val.option + "</label><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                                }

                                if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {
                                    if (total_vote_compere_option == 0) {
                                        var result_calculate_compere = 0;
                                    } else {
                                        var result_calculate_compere = (val.compere_option * 100) / total_vote_compere_option;
                                    }
                                    if (data.result.compere_max_value == val.compere_option) {
                                        $("#result_section").append("<div class='progress_1'><div class='progress_bar_new_1' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                    } else {
                                        $("#result_section").append("<div class='progress_1'><div class='progress-bar_1' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                    }
                                }
                            });
                        }
                    }
                } else {
                    $('#modal').modal('hide');
                    $("#timer_sectiom").hide();
                    $('#poll_vot_section_is_ended').val(1);

                    $.ajax({
                        url: "<?= base_url() ?>sessions/get_poll_vot_section_close_poll",
                        type: "post",
                        data: {'sessions_id': sessions_id},
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "success") {
                                $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='margin-bottom: 0px; color: #fff; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'>Live Poll</h2>\n\
<div class='col-md-12'>\n\
\n\<h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
<div style='text-align: center;'><p style='color:red; font-weight: 700;'>Poll Now Closed</p></div><div style='padding-right: 20px;text-align: right;'><a class='button small color rounded icon-left' id='btn_vote' style='background-color: #c3c3c3; border-color: #c3c3c3; font-size: 16px;'><span>VOTE <i class='fa fa-check' id='fa_fa_check_close_poll' style='display:none'></i></span></a></div>\n\
</form>");

                                $.each(data.result.option, function (key, val) {
                                    key++;
                                    if (data.result.select_option_id == val.poll_question_option_id) {
                                        $("#option_section").append("<div class='option_section_css_selected'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    } else {
                                        $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                });

                                $(':radio:not(:checked)').attr('disabled', true);
                                $('#fa_fa_check_close_poll').show();
                            } else {
                                $("#poll_vot_section").html("");
                            }
                        }
                    });
                }
            }
        });

    }

    function get_group_chat_section_status() {
        var sessions_id = $("#sessions_id").val();
        $.ajax({
            url: "<?= base_url() ?>sessions/get_group_chat_section_status",
            type: "POST",
            data: {'sessions_id': sessions_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
                    $("#group_chat_section").show();
                    $("#sessions_group_chat_id").val(resultdata.result.sessions_group_chat_id);
                } else {
                    $("#group_chat_section").hide();
                }
            }
        });
    }

    function getMessage() {
        $.ajax({
            url: "<?= site_url() ?>sessions/message",
            type: "post",
            data: {'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
            success: function (data, textStatus, jqXHR) {
                $('#message_list').html(data);
            }
        });
    }

</script>

<script>
    $(document).ready(function () {
        setInterval(ajaxcall, 1000);
    });
    function ajaxcall()
    {
        $.ajax({
            url: '<?= base_url() ?>sessions/gettimenow',
            type: "POST",
            data: {},
            dataType: "json",
            success: function (data) {
                $('#show_time').text(data.current_time);
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var user_id = <?= $this->session->userdata("cid") ?>;
        var page_name = "Sessions View";
        $.ajax({
            url: "<?= base_url() ?>home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });
    });

    function play_music() {
        var audio = document.getElementById("audio");
        audio.play();
    }

    function stop_music() {
        var audio = document.getElementById("audio");
        audio.pause();
    }

    var upgradeTime = 15;
    var seconds = upgradeTime;
    function timer(status) {
        var is_poll_ended = $('#poll_vot_section_is_ended').val();
        if (status == 0 || is_poll_ended == 1) {
            seconds = 15;
        }
        var remainingSeconds = seconds % 60;
        function pad(n) {
            return (n < 10 ? "0" + n : n);
        }
        document.getElementById('id_day_time').innerHTML = pad(remainingSeconds);
        if (seconds <= 0) {
            stop_music();
            $("#btn_vote").hide();
            $("#id_day_time").css("color", "red");
        } else {
            $('#poll_vot_section_is_ended').val(0);
            $("#btn_vote").show();
            $("#id_day_time").css("color", "green");
            play_music();
            seconds--;
        }
    }
</script>
<script src="<?= base_url() ?>assets/js/attendee-session-view.js?v=<?=rand(1, 100)?>"></script>
