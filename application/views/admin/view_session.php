<style>
    fieldset {
        background: #ffffff;
        border-radius: 0px;
        border-radius: 5px;
        margin: 0px 0 0px 0;
        padding: 10px;
        position: relative;
    }

    .contentIn {
        height: 901px
    }

    #app {
        background: url('<?= base_url() ?>front_assets/images/pres_bg.jpg') no-repeat;
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

    .embed-responsive-item {
        height: 100% !important;
        width: 100%;
    }

    .embed-responsive {
        position: unset !important;
        padding-bottom: 0 !important;
    }

    #embededVideo {
        height: 959px;
        margin-top: -2px;
        position: relative;
    }


    #embed_html_code_section {
        height: 910px;

    }


    .open > .dropdown-menu {
        left: -125px !important;
    }

    .rightSticky {
        bottom: 390px;
    }

    .rightSticykPopup {
        bottom: 410px;
    }


    /*@media only screen and (min-width: 300px) and (max-width: 568px)  {*/
    /*#embed_html_code_section{*/
    /*height: 400px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 568px) and (max-width: 768px)  {*/
    /*#embed_html_code_section{*/
    /*height: 400px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 768px) and (max-width: 992px)  {*/
    /*#embed_html_code_section{*/
    /*height: 400px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 992px) and (max-width: 1200px)  {*/
    /*#embed_html_code_section{*/
    /*height: 500px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 1200px) and (max-width: 1400px)  {*/
    /*#embed_html_code_section{*/
    /*height: 500px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 1400px) and (max-width: 1600px)  {*/
    /*#embed_html_code_section{*/
    /*height: 580px*/
    /*}*/
    /*}*/
    /*@media only screen and (min-width: 1600px) and (max-width: 1800px)  {*/
    /*#embed_html_code_section{*/
    /*height: 620px*/
    /*}*/
    /*}*/
    /*@media only screen and (min-width: 1800px) and (max-width: 2000px)  {*/
    /*#embed_html_code_section{*/
    /*height: 680px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 2000px) and (max-width: 2200px)  {*/
    /*#embed_html_code_section{*/
    /*height: 720px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 2200px) and (max-width: 2400px)  {*/
    /*#embed_html_code_section{*/
    /*height: 800px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 2400px) and (max-width: 2800px)  {*/
    /*#embed_html_code_section{*/
    /*height: 900px*/
    /*}*/
    /*}*/

    /*@media only screen and (min-width: 2800px) {*/
    /*#embed_html_code_section{*/
    /*height: 1000px*/
    /*}*/
    /*}*/

    @media only screen and (min-width: 991px) and (max-width: 1539px) {
        .nav-tabs > li {
            width: 100%;
        }
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
            height: 395px !important;
        }

    }

    .messages-item-time {
        display: block !important;
        position: unset !important;
        padding-left: 48px;
    }

    .main-content > .container {
        padding-bottom: 0;
    }



    #briefcase_section {
        height: 73% !important;
    }



    #briefcase {
        height: 160px;
    }

    .button.color, .btn.btn-primary {
        background-color: #f05d1f;
        border-color: #f05d1f;
        color: #fff;
    }
    @media only screen and (max-width: 600px) {


        .rightSticykPopup {
            width: 100%;
            right: 0px;
            position: fixed;
            margin: auto;
            top: 0px;
            bottom: 0px !important;
            height: 100%;
            z-index: 12412421412;
        }

        .rightSticykPopup .content > #briefcase_section textarea {
            width: 100%;
            height: 80vh;

        }
        .rightSticykPopup .content > #briefcase_section .button{
            position: unset !important;
        }
    }
    .rightSticykPopup .content > #briefcase_section .button{
        bottom: 0;
        width: 130px;
        height: 50px;
        line-height: 37px;
        display: inline-block;
        margin-top: 25px;
    }
    .rightSticykPopup .content > #briefcase_section .button:nth-of-type(2){
       margin-left: 5px;
    }

</style>

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
                            <p id="id_day_time_clock"
                               style="float: right; color: #1f860b; font-weight: 700; font-size:24px; margin:0;"></p>
                        </div>
                    </div>
                </div>
                <div class="panel-body bg-white"
                     style="border: 1px solid #b2b7bb!important; padding: 10px;padding-bottom: 0">
                    <div class="row" id="orderContainer">
                        <div class="col-lg-10 col-md-9" id="embed_html_code_section"
                             style="text-align: center; padding-right: 0; padding-left: 0;margin-bottom: 14px">
                            <?= isset($sessions) ? $sessions->embed_html_code_presenter : "" ?>
                        </div>
                        <div class="col-lg-2 col-md-3" style="padding-left: 0;padding-right: 6px;" id="rightOrder">
                            <fieldset style="margin: 0px 0px 0px 0px; padding: 0px;min-height:180px">
                                <div>
                                    <h2 style='margin-bottom: 5px; color: #ffffff; font-weight: 700; font-size: 15px; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase;'>
                                        Host Chat</h2>
                                </div>
                                <div class="col-md-12" id="group_chat_section">
                                    <input type="hidden" id="sessions_group_chat_id" value="">
                                    <div class="wrap-messages">
                                        <div id="inbox" class="inbox">
                                            <!-- start: EMAIL LIST -->
                                            <div class="col email-list" style="width: 100% !important">
                                                <div class="wrap-list" style="width: 100% !important">
                                                    <ul class="messages-list perfect-scrollbar allmessage"
                                                        style="top: 0px;max-height: 280px;">

                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end: EMAIL LIST -->
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:-75px">
                                        <hr style="border-top:1px solid #b2b7bb;">
                                        <div class="col-md-11 col-xs-11" style="padding-right: 0px; padding-left: 0px">
                                            <div class="input-group">
                                                <span class="input-group-addon"
                                                      style="padding: 5px 6px; background-color:gray; border-color: gray;"><img
                                                            src="<?= base_url() ?>front_assets/images/emoji/happy.png"
                                                            id="emjis_section_show" title="Check to Show Emoji"
                                                            data-emjis_section_show_status="0"
                                                            style="width: 20px; height: 20px;" alt=""/></span>
                                                <input type="text" placeholder="Message..." id="message" name="message"
                                                       class="form-control">
                                                <!--<textarea  rows="2" class="form-control" style="color: #000;" placeholder="Message..."></textarea>-->
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-xs-1" style="padding-left: 0px;">
                                            <button class="btn btn-primary" id="send"
                                                    style="height: 35px; padding-right: 5px; background-color:gray; border-color: gray; padding-left: 5px; ">
                                                <i class="fa fa-send"></i></button>
                                        </div>
                                    </div>
                                    <div style="text-align: left; padding-left: 0px; margin-left: -20px; display: flex;"
                                         id="emojis_section">
                                        <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy"
                                             id="happy" data-title_name="&#128578;"
                                             style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad"
                                             id="sad" data-title_name="&#128543"
                                             style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png"
                                             title="Laughing" id="laughing" data-title_name="😁"
                                             style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png"
                                             title="Thumbs Up" id="thumbs_up" data-title_name="&#128077;"
                                             style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png"
                                             title="Thumbs Down" id="thumbs_down" data-title_name="&#128078"
                                             style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                        <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png"
                                             title="Clapping" id="clapping" data-title_name="&#128079;"
                                             style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                    </div>
                                </div>
                            </fieldset>

                            <ul id="myTab1" class="nav nav-tabs" style="background-color: #b2b7bb;margin-top: 10px">
                                <li class="active">
                                    <a href="#attendee_questions" data-toggle="tab"
                                       style="padding: 9px 4px; text-transform: uppercase; font-size: 12px; color: #fff;">
                                        Attendee Questions
                                    </a>
                                </li>
                                <li>
                                    <a href="#favorites" data-toggle="tab"
                                       style="padding: 9px 4px; text-transform: uppercase; font-size: 12px; color: #fff;">
                                        Favorites <i class="fa fa-star-o"></i>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" style="max-height: 420px; overflow-y: auto;">
                                <div class="tab-pane fade in active" id="attendee_questions">
                                    <input type="hidden" name="sessions_id" id="sessions_id"
                                           value="<?= $sessions->sessions_id ?>">
                                    <input type="hidden" name="last_sessions_cust_question_id"
                                           id="last_sessions_cust_question_id" value="0">
                                    <div id="question_list"></div>

                                </div>
                                <div class="tab-pane fade" id="favorites">
                                    <input type="hidden" name="sessions_id" id="sessions_id"
                                           value="<?= $sessions->sessions_id ?>">
                                    <input type="hidden" name="favorite_last_sessions_cust_question_id"
                                           id="favorite_last_sessions_cust_question_id" value="0">
                                    <div id="favorite_question_list"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <span style="margin-right: 25px;"
                  class="pull-right text-red totalAttende totalAttende<?= getAppName($sessions->sessions_id) ?>">Total attendees: <b>0</b></span>

        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
    <div class="col-md-12" style="padding-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?= base_url() ?>admin/sessions/view_question_answer/<?= $sessions->sessions_id ?>"
                           class="btn btn-grey btn-sm">View Q&A</a>
                        <a href="<?= base_url() ?>admin/sessions/create_poll/<?= $sessions->sessions_id ?>"
                           class="btn btn-grey btn-sm">Create Poll</a>
                        <a class="btn btn-grey btn-sm" id="btn_view_poll">View Poll</a>
                        <p></p>
                    </div>
                    <div class="col-md-12 table-responsive" id="view_poll_table" style="display: none;">
                        <table class="table table-bordered table-striped text-center" id="user">
                            <thead class="th_center">
                            <tr>
                                <th>Question</th>
                                <th>Option</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($poll_data) && !empty($poll_data)) {
                                foreach ($poll_data as $val) {
                                    ?>
                                    <tr>
                                        <td><?= $val->question ?></td>
                                        <td>
                                            <?php
                                            if (isset($val->option) && !empty($val->option)) {
                                                foreach ($val->option as $value) {
                                                    ?>
                                                    <?= $value->option ?>,
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($val->status == 0) { ?>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-success btn-sm open_poll">Open Poll</a>
                                            <?php } else if ($val->status == 1) { ?>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-warning btn-sm close_poll">Close Poll</a>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-primary btn-sm show_results">Show Results</a>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-blue btn-sm start_timer">Start Timer</a>
                                            <?php } else if ($val->status == 2) { ?>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-warning btn-sm close_results">Close Results</a>
                                            <?php } else if ($val->status == 4) { ?>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-primary btn-sm show_results">Show Results</a>
                                            <?php } else { ?>
                                                <a data-sessions_poll_question_id="<?= $val->sessions_poll_question_id ?>"
                                                   class="btn btn-primary btn-sm show_results">Show Results</a>
                                                <label class="label label-danger">Close Result</label>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>


<div class="rightSticky" data-screen="admin">
    <ul>
        <li data-type="notesSticky"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>TAKE NOTES</span>
        </li>
        <li data-type="messagesSticky"><i class="fa fa-comments" aria-hidden="true"></i> <span
                    class="notify notify<?= getAppName($sessions->sessions_id) ?> displayNone"></span>
            <span>MESSAGES</span></li>

    </ul>
</div>


<div class="rightSticykPopup notesSticky" style="display: none">
    <div class="header"><span></span>
        <div class="rightTool">
            <i class="fa fa-minus" aria-hidden="true"></i>
            <div class="dropdown">
                <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>
                <ul class="dropdown-menu">
                    <li data-type="messagesSticky"><a data-type2="off">Messages</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="contentHeader">Take Notes</div>
        <div id="briefcase_section"
             style="background-color: #fff; border-radius: 5px; padding: 5px; position: absolute; top: 36px; width: 100%;text-align: center">
            <div id="briefcase_section">
                <div class="col-md-12 input-group" style="width: 100%;">
                    <textarea type="text" id="briefcase" class="form-control" placeholder="Enter Note"
                              value=""></textarea>
                </div>
                <a class="button color btn" id="briefcase_send"><span>Save</span></a>
                <a class="button color btn" href="<?= base_url() ?>sessions/downloadbriefcase/<?= isset($sessions) ? $sessions->sessions_id : "" ?>"><span>Download</span></a>
            </div>
            <span id='error_briefcase' style='color:red;'></span>
            <span id='success_briefcase' style='color:green;'></span>
        </div>
    </div>

</div>
<div class="rightSticykPopup messagesSticky messagesSticky<?= getAppName($sessions->sessions_id) ?>"
     style="display: none">
    <div class="header"><span></span>
        <div class="rightTool">
            <i class="fa fa-minus" aria-hidden="true"></i>
            <div class="dropdown">
                <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>
                <ul class="dropdown-menu">
                    <li data-type="notesSticky"><a data-type2="off">Notes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="contentHeader">
            Messages
        </div>
        <div class="messages">

        </div>
        <input type="text" class="form-control" placeholder="Enter message"  style="border-radius: 50px !important;" id='sendGroupChat'>

    </div>

</div>


<script>
    var app_name = "<?=getAppName($sessions->sessions_id) ?>";
    socket.emit("getSessionViewUsers", "<?=getAppName($sessions->sessions_id) ?>", function (resp) {
        if (resp) {
            var totalUsers = resp.users ? resp.users.length : 0;
            var sessionId = resp.sessionId;
            $(".totalAttende" + sessionId + " b").html(totalUsers);
        }
    })

    function addMessageGroupChat(data, type = "") {
        var messageType = '';
        var userName = data.userName ? data.userName : data.user_name;
        var userId = data.userId ? data.userId : data.user_id;
        var sessionId = data.sessionId ? data.sessionId : data.session_id;
        var message = data.message ? data.message : data.message;

        if (userId == "<?=$this->session->userdata('aid')?$this->session->userdata('aid'):$this->session->userdata('cid')?>") {
            messageType = `<div class="messageMe"><p>${message}</p></div>`;
        } else {
            messageType = `<div class="messageHe"><span>${userName}</span><p>${message}</p></div>`;

            if (type != "load") {
                if ($('.messagesSticky' + sessionId).css('display') == 'none') {
                    if ($(".notify" + sessionId).hasClass("displayNone")) $(".notify" + sessionId).removeClass("displayNone");
                }
            }

        }

        $(".messagesSticky" + sessionId + " .messages").append(messageType)
    }
    $('#sendGroupChat').keypress(function (e) {
        var $questions = $("#sendGroupChat");
        var key = e.which;
        if (key == 13) // the enter key code
        {
            if ($questions.val() == "") {
                $questions.addClass("border borderRed");
            } else {
                $questions.removeClass("border borderRed");
                var $questionsVal=$questions.val();
                $questions.val("");
                $.post("<?=base_url()?>"+"SessionGroupChat/newText",
                    {
                        "sessionId":"<?=getAppName($sessions->sessions_id) ?>",
                        "message":$questionsVal
                    },
                    function(resp){
                        if(resp){
                            resp=JSON.parse(resp);
                            socket.emit("sessionViewGroupChat",{
                                "sessionId":resp.session_id,
                                "message":resp.message,
                                "userId":resp.user_id,
                                "userName":resp.user_name
                            })

                        }
                    })

            }
        }
    });

    $.post("<?=base_url()?>" + "SessionGroupChat/getTexts", {
            "sessionId": "<?=getAppName($sessions->sessions_id) ?>",
        },
        function (resp) {
            if (resp) {
                resp = JSON.parse(resp);

                resp.forEach(function (par) {
                    addMessageGroupChat(par, "load")
                })

            }
        })

    socket.on("sessionViewGroupMessages", function (data) {
        addMessageGroupChat(data)

        var sessionId = data.sessionId;
        var $messagesContent = $('.messagesSticky' + sessionId + ' .content .messages');
        $($messagesContent).scrollTop($($messagesContent)[0].scrollHeight);
    })

    $(document).on("click", "#briefcase_send", function () {
        if ($("#briefcase").val() == "") {
            $("#error_briefcase").text("Enter Notes").fadeIn('slow').fadeOut(5000);
        } else {
            var briefcase = $("#briefcase").val();
            var sessions_id = $("#sessions_id").val();
            $.ajax({
                url: "<?= base_url() ?>admin/sessions/addBriefcase",
                type: "post",
                data: {'sessions_id': sessions_id, 'briefcase': briefcase},
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        $("#briefcase").val("");
                        $("#success_briefcase").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                    }
                    // $(location).attr('href', '<?= base_url() ?>sessions/downloadNote/'+briefcase);
                }
            });
        }
    });


</script>

<script type="text/javascript">
    $(document).ready(function () {

        $("iframe").addClass("embed-responsive-item");


        var session_start_datetime = "<?=date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->time_slot . ' UTC-4'?>";
        var session_end_datetime = "<?=date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->end_time . ' UTC-4'?>";

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
        } else {
            timeleft();
        }


        $(document).on("click", "#btn_view_poll", function () {
            $("#view_poll_table").show();
        });
        $(".visible-md").click();

        get_question_list();
        //setInterval(get_question_list, 4000);

        get_favorite_question_list();
        //setInterval(get_favorite_question_list, 5000);

        get_poll_vot_section();
        //setInterval(get_poll_vot_section, 1000);

        $(document).on("click", "#thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#message").val();
            if (questions != "") {
                $("#message").val(questions + ' ' + value);
            } else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#message").val();
            if (questions != "") {
                $("#message").val(questions + ' ' + value);
            } else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#clapping", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            } else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#happy", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            } else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#laughing", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            } else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            } else {
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
            } else {
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
            } else {
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
                url: "<?= base_url() ?>admin/sessions/likeQuestion",
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
                url: "<?= base_url() ?>admin/sessions/likeQuestion",
                type: "post",
                data: {'sessions_id': sessions_id, 'sessions_cust_question_id': sessions_cust_question_id},
                dataType: "json",
                success: function (data) {

                }
            });
        });

        $(document).on("click", ".open_poll", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>admin/sessions/open_poll_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        } else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".close_poll", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>admin/sessions/close_poll_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();

                        } else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".show_results", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>admin/sessions/show_result_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        } else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".close_results", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>admin/sessions/close_result_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        } else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".start_timer", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: "<?= base_url() ?>admin/sessions/start_timer_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        } else {
                            alertify.error('Something went wrong, Please try again');
                        }
                    }
                });
            } else {
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
            url: "<?= base_url() ?>admin/sessions/get_question_list",
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
                        } else {
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
            url: "<?= base_url() ?>admin/sessions/hide_question",
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
            url: "<?= base_url() ?>admin/sessions/favorite_hide_question",
            type: "POST",
            data: {'tbl_favorite_question_admin_id': qid},
            dataType: "json",
            success: function (data, textStatus, jqXHR) {
                //   location.reload();
                $("#" + data_listkey_id).hide();
            }
        });
    });

    function questionFavoriteElement(key,val){
        return '<div id="fav_question_list_key_' + val.tbl_favorite_question_id + '" style="padding-bottom: 15px;"><h5 style="font-weight: 800; font-size: 15px; "><span style="font-size: 12px;">(' + val.first_name + ' ' + val.last_name + ') </span>' + val.question + ' <a href="javascript:void(0)" class="favorite_hide_question" data-q-id="' + val.tbl_favorite_question_admin_id + '" data-listkey-id="fav_question_list_key_' + key + '" title="Hide" ><span class="fa fa-eye-slash" ></span></a></h5><div style="display: flex;"></h5> <input type="hidden" class="favorite_input_class" data-last_id="' + val.tbl_favorite_question_admin_id + '"></div>';
    }
    function get_favorite_question_list() {
        var sessions_id = $("#sessions_id").val();
        var favorite_last_sessions_cust_question_id = $("#favorite_last_sessions_cust_question_id").val();
        var list_last_id = 0;
        $('.favorite_input_class').each(function () {
            list_last_id = $(this).attr("data-last_id");
            return false;
        });
        $.ajax({
            url: "<?= base_url() ?>admin/sessions/get_favorite_question_list",
            type: "POST",
            data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
                    $.each(resultdata.question_list, function (key, val) {
                        console.log(val);
                        key++;
                        $("#favorite_last_sessions_cust_question_id").val(val.tbl_favorite_question_admin_id);
                        $('#favorite_question_list').prepend(questionFavoriteElement(key,val));
                    });
                }
            }
        });
    }
    socket.on("presenter_like_questions",function (data){
        if(data){
            var question_app_name=data["app_name"];
            var question_type=data["type"];
            var question=data["question"];

            if(question_app_name==app_name){
                if(question_type=="like"){
                    $('#favorite_question_list').prepend(questionFavoriteElement(question.tbl_favorite_question_id,question));

                }else{
                    var tbl_favorite_question_id=question["tbl_favorite_question_id"];
                    $("#fav_question_list_key_"+tbl_favorite_question_id).remove();
                }
            }
        }

    })

    function get_poll_vot_section() {
        var poll_vot_section_id_status = $("#poll_vot_section_id_status").val();
        var poll_vot_section_last_status = $("#poll_vot_section_last_status").val();
        var sessions_id = $("#sessions_id").val();
        $.ajax({
            url: "<?= base_url() ?>admin/sessions/get_poll_vot_section",
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
                            $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Live Poll</h2>\n\
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
                                $('#fa_fa_check').show();
                            }
                        } else {
                            $("#poll_vot_section").html("<div class='row'><div class='col-md-12'><h2 style='margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Live Poll Results</h2></div><div class='col-md-12'><div class='col-md-12'><h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5>\n\
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
                    $("#timer_sectiom").hide();
                    $.ajax({
                        url: "<?= base_url() ?>admin/sessions/get_poll_vot_section_close_poll",
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
                                    } else {
                                        $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                    }
                                });

                                $(':radio:not(:checked)').attr('disabled', true);
                                $('#fa_fa_check').show();
                            } else {
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

    function getMessage() {
        $.ajax({
            url: "<?= site_url() ?>admin/groupchat/message",
            type: "post",
            data: {
                'sessions_group_chat_id': $('#sessions_group_chat_id').val(),
                'sessions_id': $('#sessions_id').val()
            },
            success: function (data, textStatus, jqXHR) {
                $('.allmessage').html(data);
            }
        });
    }

    function get_group_chat_section_status() {
        var sessions_id = $("#sessions_id").val();
        $.ajax({
            url: "<?= base_url() ?>admin/groupchat/get_group_chat_section_status",
            type: "POST",
            data: {'sessions_id': sessions_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
                    $("#group_chat_section").show();
                    $("#sessions_group_chat_id").val(resultdata.result.sessions_group_chat_id);
                    getMessage();
                } else {
                    $("#group_chat_section").hide();
                }
            }
        });
    }

    $(document).ready(function () {
        getMessage();
        //setInterval(getMessage, 1000);
        setTimeout(function () {
            $(".wrap-messages").css('max-height', '340px');
        }, 300);

        get_group_chat_section_status();
        //setInterval(get_group_chat_section_status, 10000);

        function get_group_chat_section_status() {
            var sessions_id = $("#sessions_id").val();
            $.ajax({
                url: "<?= base_url() ?>admin/groupchat/get_group_chat_section_status",
                type: "POST",
                data: {'sessions_id': sessions_id},
                dataType: "json",
                success: function (resultdata, textStatus, jqXHR) {
                    if (resultdata.status == 'success') {
                        $("#group_chat_section").show();
                        $("#sessions_group_chat_id").val(resultdata.result.sessions_group_chat_id);
                        getMessage();
                    } else {
                        $("#group_chat_section").hide();
                    }
                }
            });
        }

        $('#send').click(function () {
            if ($('#message').val() != "") {
                $.ajax({
                    url: "<?= site_url() ?>admin/groupchat/send",
                    type: "post",
                    data: {
                        'message': $('#message').val(),
                        'sessions_group_chat_id': $('#sessions_group_chat_id').val(),
                        'sessions_id': $('#sessions_id').val()
                    },
                    success: function (data, textStatus, jqXHR) {
                        socket.emit('session_new_message', app_name);
                        $('#message').val('');
                        $('.allmessage').html(data);
                        alertify.success('Message Send');
                    }
                });
            } else {
                alertify.error('Write Message');
            }
        });

        $('#message').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($('#message').val() != "") {
                    $.ajax({
                        url: "<?= site_url() ?>admin/groupchat/send",
                        type: "post",
                        data: {
                            'message': $('#message').val(),
                            'sessions_group_chat_id': $('#sessions_group_chat_id').val(),
                            'sessions_id': $('#sessions_id').val()
                        },
                        success: function (data, textStatus, jqXHR) {
                            socket.emit('session_new_message', app_name);
                            $('#message').val('');
                            $('.allmessage').html(data);
                            alertify.success('Message Send');
                        }
                    });
                } else {
                    alertify.error('Write Message');
                }
            }
        });
    });

    $(function () {
        if (sessionStorage.reloadAfterPageLoad == "1") {
            $("#view_poll_table").show();
            sessionStorage.reloadAfterPageLoad = "0";
        }
    });

    function play_music() {
        var audio = document.getElementById("audio");
        //audio.play();
    }

    function stop_music() {
        var audio = document.getElementById("audio");
        //audio.pause();
    }

    var upgradeTime = 15;
    var seconds = upgradeTime;

    function timer(status) {
        if (status == 0) {
            seconds = 15;
        }
        var remainingSeconds = seconds % 60;

        function pad(n) {
            return (n < 10 ? "0" + n : n);
        }

        document.getElementById('id_day_time').innerHTML = pad(remainingSeconds);
        if (seconds <= 0) {
            $("#btn_vote").hide();
            $("#id_day_time").css("color", "red");
            stop_music();
        } else {
            play_music();
            seconds--;
        }
    }


    /*************** Socket IO codes by Athul *****************/
    /************ DO NOT MODIFY WITHOUT CONSENT ***************/
    // Written separate listeners for flexibility in the future
    socket.on('poll_open_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_poll_vot_section();
    });

    socket.on('poll_close_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_poll_vot_section();
    });

    socket.on('show_poll_results_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_poll_vot_section();
    });

    socket.on('close_poll_results_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_poll_vot_section();
    });

    socket.on('start_poll_timer_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_poll_vot_section();
    });

    socket.on('new_question_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_question_list();
    });

    socket.on('like_question_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_favorite_question_list();
    });

    socket.on('session_new_message_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            getMessage();
    });

    socket.on('session_chat_opened_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_group_chat_section_status();
    });

    socket.on('session_chat_closed_notification', (poll_app_name) => {
        if (poll_app_name == app_name)
            get_group_chat_section_status();
    });
    /********* End of socket IO codes by Athul **********/
</script>
