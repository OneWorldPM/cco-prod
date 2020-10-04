<style>
    fieldset {
        background: #ffffff;
        border-radius: 0px;
        border-radius: 5px;
        margin: 0px 0 0px 0;
        padding: 10px;
        position: relative;
    }
</style>
<style>
    .progress-bar_1 {
        height: 100%;
        padding: 3px;
        background: rgb(108, 108, 108);
        box-shadow: none;
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

    .progress-bar {
        height: 100%;
        padding: 3px;
        background: rgb(200, 201, 202);
        box-shadow: none;
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

    .option_section_css {
        background-color: #f1f1f1;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }

    .option_section_css_selected {
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
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
    }

    .progress_1 {
        height: 26px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #55c4534f;
        border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        background-color: #A9A9A9;
    }

    #embed_html_code_section {
        border-right: 2px solid #9a9a9a;
    }

    @media only screen and (max-width: 991px) {
        #orderContainer {
            display: flex;
            flex-wrap: wrap;
        }

        #leftOrder {
            order: 1;
            width: 100%;
        }

        #embed_html_code_section {
            order: 0;
            width: 100%;
        }

        #rightOrder {
            order: 2;
            width: 100%;
        }

        #embed_html_code_section {
            height: 356px !important;
        }

    }

    @media only screen and (min-width: 300px) and (max-width: 568px) {
        #embed_html_code_section {
            height: 495px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 200px;
        }
    }

    @media only screen and (min-width: 568px) and (max-width: 768px) {
        #embed_html_code_section {
            height: 496px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 200px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        #embed_html_code_section {
            height: 497px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 200px;
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1200px) {
        #embed_html_code_section {
            height: 595px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 200px;
        }
    }

    @media only screen and (min-width: 1200px) and (max-width: 1400px) {
        #embed_html_code_section {
            height: 596px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 250px;
        }
    }

    @media only screen and (min-width: 1400px) and (max-width: 1600px) {
        #embed_html_code_section {
            height: 675px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 300px;
        }
    }

    @media only screen and (min-width: 1600px) and (max-width: 1800px) {
        #embed_html_code_section {
            height: 715px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 300px;
        }
    }

    @media only screen and (min-width: 1800px) and (max-width: 2000px) {
        #embed_html_code_section {
            height: 830px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 350px;
        }
    }

    @media only screen and (min-width: 2000px) and (max-width: 2200px) {
        #embed_html_code_section {
            height: 815px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 400px;
        }
    }

    @media only screen and (min-width: 2200px) and (max-width: 2400px) {
        #embed_html_code_section {
            height: 895px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 450px;
        }
    }

    @media only screen and (min-width: 2400px) and (max-width: 2800px) {
        #embed_html_code_section {
            height: 995px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 450px;
        }
    }

    
    @media only screen and (min-width: 991px) and (max-width: 1539px) {
        .nav-tabs > li{
            width: 100%;
        }
    }


    @media only screen and (min-width: 2800px) {
        #embed_html_code_section {
            height: 1095px
        }

        #favorite_question_list {
            overflow-y: auto;
            height: 450px;
        }
    }


    #favorite_question_list {
        height: 310px;
    }

    .nav-tabs > li > a {
        font-family: sans-serif;
    }

    .nav-tabs > li.active > a {
        background-color: #5f5f5f !important;
    }

    .inbox .email-list,.inbox .wrap-list{
        height: 280px;
    }


</style>

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
                <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important; padding: 10px;">
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
                            <div class="tab-content" style="max-height: 347px; overflow-y: auto;">
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
        <span style="margin-right: 25px;" class="pull-right text-red totalAttende totalAttende<?= getAppName($sessions->sessions_id) ?>">Total attendees: <b>0</b></span>

        <!-- end: DYNAMIC TABLE -->
    </div>
</div>
</div>


<script>
    socket.emit("getSessionViewUsers", "<?=getAppName($sessions->sessions_id) ?>", function (resp) {
        if (resp) {
            var totalUsers = resp.users ? resp.users.length : 0;
            var sessionId = resp.sessionId;
            $(".totalAttende" + sessionId + " b").html(totalUsers);
        }
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var $iframe = $("#embed_html_code_section iframe");

        $iframe.css("height", "100%")


        if ($iframe.attr("width") == "1280") {
            $iframe.css("width", "100%")
            if (window.innerWidth <= 991) {
                $("#rightOrder").css("margin-top", "185px");
            }
        }
    
        $(document).on("click", "#btn_view_poll", function () {
            $("#view_poll_table").show();
        });

        $(".visible-md").click();
        get_question_list();
        setInterval(get_question_list, 4000);

        get_favorite_question_list();
        setInterval(get_favorite_question_list, 5000);

        get_poll_vot_section();
        setInterval(get_poll_vot_section, 1000);

        $(document).on("click", "#thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#message").val();
            if (questions != "") {
                $("#message").val(questions + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#message").val();
            if (questions != "") {
                $("#message").val(questions + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#clapping", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#happy", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#laughing", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $("#resource_display_status").show();
        $(document).on("click", "#resource_show", function () {
            var resource_show_status = $("#resource_show").attr("data-resource_show_status");
            if (resource_show_status == 0) {
                $("#resource_display_status").show();
                $("#resource_show").removeClass('fa-caret-right');
                $("#resource_show").addClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 1);
            }
            else {
                $("#resource_display_status").hide();
                $("#resource_show").addClass('fa-caret-right');
                $("#resource_show").removeClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 0);
            }
        });

        $("#emojis_section").hide();
        $(document).on("click", "#emjis_section_show", function () {
            var emjis_section_show_status = $("#emjis_section_show").attr("data-emjis_section_show_status");
            if (emjis_section_show_status == 0) {
                $("#emojis_section").show();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 1);
            }
            else {
                $("#emojis_section").hide();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 0);
            }
        });

        $(document).on("click", ".cust_class_star", function () {
            var sessions_cust_question_id = $(this).attr("data-sessions_cust_question_id");
            var sessions_id = $("#sessions_id").val();
            $(this).removeClass("cust_class_star fa fa-star-o");
            $(this).addClass("cust_class_star_remove fa fa-star");
            $.ajax({
                url: "<?= base_url() ?>presenter/sessions/likeQuestion",
                type: "post",
                data: {'sessions_id': sessions_id, 'sessions_cust_question_id': sessions_cust_question_id},
                dataType: "json",
                success: function (data) {

                }
            });
        });

        $(document).on("click", ".cust_class_star_remove", function () {
            var sessions_cust_question_id = $(this).attr("data-sessions_cust_question_id");
            var sessions_id = $("#sessions_id").val();
            $(this).removeClass("cust_class_star_remove fa fa-star");
            $(this).addClass("cust_class_star fa fa-star-o");
            $.ajax({
                url: "<?= base_url() ?>presenter/sessions/likeQuestion",
                type: "post",
                data: {'sessions_id': sessions_id, 'sessions_cust_question_id': sessions_cust_question_id},
                dataType: "json",
                success: function (data) {

                }
            });
        });


        $(document).on("click", ".btn_publish", function () {
            $(this).prop('disabled', true);
            var answer_btn_id = $(this).attr("data-answer_btn");
            var q_answer = $("#" + answer_btn_id).val();
            var sessions_cust_question_id = $("#" + answer_btn_id).attr("data-last_id");
            if (q_answer != "") {
                $.ajax({
                    url: "<?= base_url() ?>presenter/sessions/addQuestionAnswer",
                    type: "post",
                    data: {'q_answer': q_answer, 'sessions_cust_question_id': sessions_cust_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#" + answer_btn_id).attr('readonly', true);
                            alertify.success('Answer Successfully Added');
                        }
                    }
                });
            }
            else {
                alertify.error('Please enter answer');
            }
        });

        $(document).on("click", ".open_poll", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>presenter/sessions/open_poll_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".close_poll", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>presenter/sessions/close_poll_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".show_results", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>presenter/sessions/show_result_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".close_results", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>presenter/sessions/close_result_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".start_timer", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>presenter/sessions/start_timer_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Something went wrong, Please try again');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        setTimeout(function () {
            $('.app-navbar-fixed').addClass('app-sidebar-closed')
        }, 3000);

    });

    function get_question_list() {
        var sessions_id = $("#sessions_id").val();
        var last_sessions_cust_question_id = $("#last_sessions_cust_question_id").val();
        var list_last_id = 0;
        $('.input_class').each(function () {
            list_last_id = $(this).attr("data-last_id");
            return false;
        });
        $.ajax({
            url: "<?= base_url() ?>presenter/sessions/get_question_list",
            type: "POST",
            data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
                    $.each(resultdata.question_list, function (key, val) {

                        key++;
                        var readonly_value = "";
                        var disabled_value = "";
                        var answer_value = "";
                        if (val.answer_status == 1) {
                            readonly_value = "readonly";
                            disabled_value = "disabled";
                            answer_value = val.answer;
                        }

                        if (val.favorite_status == 0) {
                            var add_star_class = 'fa fa-star-o cust_class_star';
                        }
                        else {
                            var add_star_class = 'fa fa-star cust_class_star_remove';
                        }
                        $("#last_sessions_cust_question_id").val(val.sessions_cust_question_id);
                        $('#question_list').prepend('<div id="question_list_key_' + key + '" style="padding-bottom: 15px;"><h5 style="font-weight: 800; font-size: 15px; "><span style="font-size: 12px;">(' + val.first_name + ' ' + val.last_name + ') </span>' + val.question + ' <span class="' + add_star_class + ' " data-sessions_cust_question_id=' + val.sessions_cust_question_id + '></span> <a href="javascript:void(0)" class="hide_question" data-q-id="' + val.sessions_cust_question_id + '" data-listkey-id="question_list_key_' + key + '" title="Hide" ><span class="fa fa-eye-slash" ></span></a></h5><div style="display: flex;"><input type="hidden" ' + readonly_value + ' id="answer_' + key + '" data-key_id="' + key + '" class="form-control input_class" placeholder="Enter Answer"  data-cust_id="' + val.cust_id + '" data-last_id="' + val.sessions_cust_question_id + '" value="' + answer_value + '"><a  class="btn btn-success btn_publish" id="btn_publish" data-answer_btn="answer_' + key + '" ' + disabled_value + ' style="border-radius: 0px; display:none">Send</a></div></div>');
                    });
                }
            }
        });
    }

    $(document).on('click', '.hide_question', function () {
        var qid = $(this).attr('data-q-id');
        var data_listkey_id = $(this).attr('data-listkey-id');
        $.ajax({
            url: "<?= base_url() ?>presenter/sessions/hide_question",
            type: "POST",
            data: {'sessions_question_id': qid},
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                //location.reload();
                $("#" + data_listkey_id).hide();
            }
        });
    });


    $(document).on('click', '.favorite_hide_question', function () {
        var qid = $(this).attr('data-q-id');
        var data_listkey_id = $(this).attr('data-listkey-id');

        $.ajax({
            url: "<?= base_url() ?>presenter/sessions/favorite_hide_question",
            type: "POST",
            data: {'tbl_favorite_question_id': qid},
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                //   location.reload();
                $("#" + data_listkey_id).hide();
            }
        });
    });

    function get_favorite_question_list() {
        var sessions_id = $("#sessions_id").val();
        var favorite_last_sessions_cust_question_id = $("#favorite_last_sessions_cust_question_id").val();
        var list_last_id = 0;
        $('.favorite_input_class').each(function () {
            list_last_id = $(this).attr("data-last_id");
            return false;
        });
        $.ajax({
            url: "<?= base_url() ?>presenter/sessions/get_favorite_question_list",
            type: "POST",
            data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
                    $.each(resultdata.question_list, function (key, val) {
                        console.log(val);
                        key++;
                        $("#favorite_last_sessions_cust_question_id").val(val.tbl_favorite_question_id);
                        $('#favorite_question_list').prepend('<div id="fav_question_list_key_' + key + '" style="padding-bottom: 15px;"><h5 style="font-weight: 800; font-size: 15px; "><span style="font-size: 12px;">(' + val.first_name + ' ' + val.last_name + ') </span>' + val.question + ' <a href="javascript:void(0)" class="favorite_hide_question" data-q-id="' + val.tbl_favorite_question_id + '" data-listkey-id="fav_question_list_key_' + key + '" title="Hide" ><span class="fa fa-eye-slash" ></span></a></h5><div style="display: flex;"></h5> <input type="hidden" class="favorite_input_class" data-last_id="' + val.tbl_favorite_question_id + '"></div>');
                    });
                }
            }
        });
    }

    function get_poll_vot_section() {
        var poll_vot_section_id_status = $("#poll_vot_section_id_status").val();
        var poll_vot_section_last_status = $("#poll_vot_section_last_status").val();
        var sessions_id = $("#sessions_id").val();
        $.ajax({
            url: "<?= base_url() ?>presenter/sessions/get_poll_vot_section",
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
                        }
                        else {
                            $("#timer_sectiom").show();
                            timer(1);
                        }
                    }
                    else {
                        $("#timer_sectiom").hide();
                    }

                    if (poll_vot_section_id_status != data.result.sessions_poll_question_id || poll_vot_section_last_status != data.result.status) {
                        $("#poll_vot_section_id_status").val(data.result.sessions_poll_question_id);
                        $("#poll_vot_section_last_status").val(data.result.status);
                        if (data.result.poll_status == 1) {
                            $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='border:1px solid #b79700;margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Live Poll</h2>\n\
<div class='col-md-12'>\n\
\n\<h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
\n\
</form>");
                            if (data.result.exist_status == 1) {
                                $.each(data.result.option, function (key, val) {
                                    key++;
                                    if (data.result.select_option_id == val.poll_question_option_id) {
                                        $("#option_section").append("<div class='option_section_css_selected'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                    else {
                                        $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                });
                            }
                            else {
                                $.each(data.result.option, function (key, val) {
                                    key++;
                                    $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                });
                            }
                            if (data.result.exist_status == 1) {
                                $(':radio:not(:checked)').attr('disabled', true);
                                $('#fa_fa_check').show();
                            }
                        }
                        else {
                            $("#poll_vot_section").html("<div class='row'><div class='col-md-12'><h2 style='border: 1px solid #b79700;margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Live Poll Results</h2></div><div class='col-md-12'><div class='col-md-12'><h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5>\n\
                                                        \n\<div id='result_section' style='padding-bottom: 10px;'></div></div></div></div>\n\
");
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
                                }
                                else {
                                    var result_calculate = (val.total_vot * 100) / total_vote;
                                }
                                if (data.result.max_value == val.total_vot) {
                                    $("#result_section").append("<label>" + val.option + "</label><div class='progress'><div class='progress_bar_new' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                                }
                                else {
                                    $("#result_section").append("<label>" + val.option + "</label><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                                }

                                if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {
                                    if (total_vote_compere_option == 0) {
                                        var result_calculate_compere = 0;
                                    }
                                    else {
                                        var result_calculate_compere = (val.compere_option * 100) / total_vote_compere_option;
                                    }
                                    if (data.result.compere_max_value == val.compere_option) {
                                        $("#result_section").append("<div class='progress_1'><div class='progress_bar_new_1' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                    }
                                    else {
                                        $("#result_section").append("<div class='progress_1'><div class='progress-bar_1' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                    }
                                }
                            });
                        }
                    }
                }
                else {
                    $("#timer_sectiom").hide();
                    $('#poll_vot_section_is_ended').val(1);
                    $.ajax({
                        url: "<?= base_url() ?>presenter/sessions/get_poll_vot_section_close_poll",
                        type: "post",
                        data: {'sessions_id': sessions_id},
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "success") {
                                $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Live Poll</h2>\n\
<div class='col-md-12'>\n\
\n\<h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
<div style='text-align: center;'><p style='color:red; font-weight: 700;'>Poll Now Closed</p></div>\n\
</form>");

                                $.each(data.result.option, function (key, val) {
                                    key++;
                                    if (data.result.select_option_id == val.poll_question_option_id) {
                                        $("#option_section").append("<div class='option_section_css_selected'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                    else {
                                        $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                });

                                $(':radio:not(:checked)').attr('disabled', true);
                                $('#fa_fa_check').show();
                            }
                            else {
                                $("#poll_vot_section").html("");
                            }
                        }
                    });
                }
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        getMessage();
        setInterval(getMessage, 1000);
        setTimeout(function () {
            $(".wrap-messages").css('max-height', '340px');
        }, 300);

        get_group_chat_section_status();
        setInterval(get_group_chat_section_status, 10000);

        function getMessage() {
            $.ajax({
                url: "<?= site_url() ?>presenter/groupchat/message",
                type: "post",
                data: {'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                success: function (data, textStatus, jqXHR) {
                    $('.allmessage').html(data);
                }
            });
        }

        function get_group_chat_section_status() {
            var sessions_id = $("#sessions_id").val();
            $.ajax({
                url: "<?= base_url() ?>presenter/groupchat/get_group_chat_section_status",
                type: "POST",
                data: {'sessions_id': sessions_id},
                dataType: "json",
                success: function (resultdata, textStatus, jqXHR) {
                    if (resultdata.status == 'success') {
                        $("#group_chat_section").show();
                        $("#sessions_group_chat_id").val(resultdata.result.sessions_group_chat_id);
                    }
                    else {
                        $("#group_chat_section").hide();
                    }
                }
            });
        }

        $('#send').click(function () {
            if ($('#message').val() != "") {
                $.ajax({
                    url: "<?= site_url() ?>presenter/groupchat/send",
                    type: "post",
                    data: {'message': $('#message').val(), 'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                    success: function (data, textStatus, jqXHR) {
                        $('#message').val('');
                        $('.allmessage').html(data);
                        alertify.success('Message Send');
                    }
                });
            }
            else {
                alertify.error('Write Message');
            }
        });

        $('#message').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($('#message').val() != "") {
                    $.ajax({
                        url: "<?= site_url() ?>presenter/groupchat/send",
                        type: "post",
                        data: {'message': $('#message').val(), 'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                        success: function (data, textStatus, jqXHR) {
                            $('#message').val('');
                            $('.allmessage').html(data);
                            alertify.success('Message Send');
                        }
                    });
                }
                else {
                    alertify.error('Write Message');
                }
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
        }
        else {
            $('#poll_vot_section_is_ended').val(0);
            $("#id_day_time").css("color", "green");
            seconds--;
            play_music();
        }
    }

    $(function () {
        if (sessionStorage.reloadAfterPageLoad == "1") {
            $("#view_poll_table").show();
            sessionStorage.reloadAfterPageLoad = "0";
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {

        var session_start_datetime = "<?= date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->time_slot . ' UTC-4' ?>";
        var session_end_datetime = "<?= date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->end_time . ' UTC-4' ?>";

        function timeleft() {
            // Set the date we're counting down to
            var countDownDate = new Date(session_end_datetime).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                //$('#quiz-time-left').html('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                //console.log('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                $('#id_day_time_clock').text('Time Left: ' + hours + "h " + minutes + "m " + seconds + "s ");

                // If the count down is finished,
                if (distance < 0) {
                    clearInterval(x);
                    $('#id_day_time_clock').text('Time Left: ' + 0 + "h " + 0 + "m " + 0 + "s ");
                    $('#id_day_time_clock').css('color', '#d30e0e')
                }
            }, 1000);
        }

        function timeToStart() {
            // Set the date we're counting down to 
            var countDownDate = new Date(session_start_datetime).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                //$('#quiz-time-left').html('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                //console.log('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                $('#id_day_time_clock').text('Session starts in: ' + days + "d " + hours + "h " + minutes + "m " + seconds + "s ");

                // If the count down is finished,
                if (distance < 0) {
                    clearInterval(x);
                    timeleft();
                }
            }, 1000);
        }

        var now = new Date().getTime();
        var sessionStartDateTime = new Date(session_start_datetime).getTime();
        if (now < sessionStartDateTime) {
            timeToStart();
        }
        else {
            timeleft();
        }

        document.getElementById('id_day_time_clock').innerHTML = 00 + " : " + 00;
        $(document).on("click", "#btn_timer_start", function () {
            $('#btn_timer_start').prop('disabled', true);
            //setInterval('timer()', 1000);
            timeleft();
        });
        $(document).on("click", "#btn_timer_stop", function () {
            document.getElementById('id_day_time_clock').innerHTML = 00 + " : " + 00;
            location.reload();
        });
    });

    // console.log($("#time_second").val())
    // var upgradeTime = $("#time_second").val();
    // var seconds = upgradeTime;
    // function timer() {
    //     var days = Math.floor(seconds / 24 / 60 / 60);
    //     var hoursLeft = Math.floor((seconds) - (days * 86400));
    //     var hours = Math.floor(hoursLeft / 3600);
    //     var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
    //     var minutes = Math.floor(minutesLeft / 60);
    //     var remainingSeconds = seconds % 60;
    //     function pad(n) {
    //         return (n < 10 ? "0" + n : n);
    //     }
    //     //console.log(pad(minutes));
    //     //console.log(pad(remainingSeconds));
    //     document.getElementById('id_day_time_clock').innerHTML = pad(minutes) + " : " + pad(remainingSeconds);
    //     if (seconds <= 0) {
    //
    //     } else {
    //         seconds--;
    //     }
    // }
</script>
