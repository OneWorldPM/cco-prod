<!-- Please add styles only in this CSS file, NOT directly on this HTML file -->

<link href="<?= base_url() ?>front_assets/presenter/view_session.css?v=15" rel="stylesheet">

<?php
if (isset($_GET['testing']) && $_GET['testing'] == 1) {
    echo date('yy-m-d h:m:i');
    echo "<pre>";
    print_r($sessions);
    exit("</pre>");
}

?>
<?php
if (isset($sessions->presenter) && !empty($sessions->presenter)){
    foreach ($sessions->presenter as $presenters) {
        if ($this->session->userdata('pid') == $presenters->presenter_id) {
            $c_name = $presenters->presenter_name;
        }
    }
}
if(isset($sessions->moderator) && !empty($sessions->moderator)){
    foreach ($sessions->moderator as $moderators){
        if ($this->session->userdata('pid') == $moderators->presenter_id) {
            $c_name = $moderators->presenter_name;
        }
    }
}
else{
    $c_name="";
}

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/fd91b3535c.js" crossorigin="anonymous"></script>

<!-- Direct attendee chat modal -->
<div class="modal fade" id="attendeeChatModal" tabindex="-1" role="dialog" aria-labelledby="attendeeChatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="attendeeChatModalLabel">Chat with <span id="chatAttendeeName"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
                <div class="user-question">Question: <span id="chattAttendeeQuestion" ></span><br></div>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div id="chatBody" class="panel-body">

                    </div>

                    <div class="col-md-12">
                        <div class="input-group">
                            <input id="chatToAttendeeText" type="text" class="form-control" placeholder="Enter your message">
                            <span class="input-group-btn">
                                <button id="sendMessagetoAttendee" class="btn btn-success" type="button"><i class="fas fa-paper-plane"></i> Send</button>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="endChatBtn" type="button" class="btn btn-danger" userId=""><i class="fas fa-times-circle"></i> End Chat</button>
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-folder-minus"></i> Minimize</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid presenterContainer">
    <div class="row">
        <div class="col-lg-12 col-md-12 leftSide">
            <!--            <iframe class="col-md-12 embed-responsive-item" src="https://meet.yourconference.live/conference/share-presentation.html?confId=CCO_AMP_Final_Deck_V3&amp;totalSlides=95&amp;fileExtension=JPG" style="height: inherit;" scrolling="no"></iframe>-->
            <?= isset($sessions) ? $sessions->embed_html_code_presenter : "" ?>

            <?php if (isset($sessions) && $sessions->sessions_type_id != 16): ?>
                <div class="viewUser" style="float:right;color: white">
                    <span class="badge badge-danger">live </span> <i class="fa fa-eye" aria-hidden="true"></i> <span id="userCount" class="userCount userCount<?=getAppName($sessions->sessions_id)?>"> 0</span>
                </div>
            <?php endif; ?>

        </div>
        <div class="col-lg-3 col-md-4 rightSide">

            <div class="rightSticykPopup hostChat presenterRightSticykPopup" style="display: none">
                <div class="header"><span>HOST CHAT</span>
                    <div class="rightTool">
                        <i class="fa fa-minus" aria-hidden="true" data-right-id="1"></i>
                        <div class="dropdown">
                            <!--                            <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>-->
                            <ul class="dropdown-menu">
                                <li data-type="questionFavorites"><a data-type2="off">Questions</a></li>
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
                            <input type="text" placeholder="Message..." id="message" name="message" class="form-control">
                            <span class="btn btn-primary input-group-addon" id="send" ><i class="fa fa-send"></i></span>

                        </div>

                    </div>
                    <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions->sessions_id ?>">
                </div>
            </div>
            <div class="rightSticykPopup questionFavorites presenterRightSticykPopup" style="display: none">
                <div class="header"><span><a href="#attendee_questions" data-toggle="tab">QUESTIONS</a> | <a href="#favorites" data-toggle="tab">FAVORITES</a></span>
                    <div class="rightTool">
                        <i class="fa fa-minus" aria-hidden="true" data-right-id="2"></i>
                        <div class="dropdown">
                            <!--                            <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>-->
                            <ul class="dropdown-menu">
                                <li data-type="hostChat"><a data-type2="off">Host Chat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">

                    <div class="tab-content" id="questionsContainer">
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
            <div class="modal-header" style="height: 0">
                <button type="button" class="poll-modal-close close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 0px;">
                <div class="row" style="padding-top: 0px; padding-bottom: 20px;">
                    <div class="col-sm-12">
                        <div class="" id="timer_sectiom" style="padding-top: 0px; padding-bottom: 0px; display: none; border-top-right-radius: 15px; border-top-left-radius: 15px; background-color: #ebeaea; ">
                            <div class=""  style="text-align: right; font-size: 20px; font-weight: 700; border-top-right-radius: 15px; border-top-left-radius: 15px;  ">
                                TIME LEFT : <span id="id_day_time" style=" font-size: 20px; font-weight: 700; color: #ef5e25; padding: 0px 10px 0px 0px;"></span>
                            </div>
                        </div>
                        <div id="poll_vot_section" style="padding: 0px 0px 0px 0px; margin-top: 0px; background-color: #fff; border-radius: 15px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">HIDE</button>
            </div>
        </div>
    </div>
</div>

<div class="stickyTimer">
    <?php if (1==2){ ?>
    <?php } ?>
    <div class="bg-dark sticky-top" id="stickTimer" style="right:20px;position:fixed;background:black; width:100%">
        <div id="id_day_time_clock" class="timer" style="right:20px;"></div>
    </div>
</div>

<div class="rightSticky presenterRightSticky" data-screen="presenter">
    <ul>
        <li data-type="hostChat" class="1"><i class="fa fa-comments-o" aria-hidden="true"></i> <span class="notify hostChatNotify displayNone">new</span> <span>HOST CHAT</span></li>
        <li data-type="questionFavorites" class="2"><i class="fa fa-question" aria-hidden="true"></i> <span class="notify questionNotify displayNone">new</span> <span>QUESTIONS</span></li>
    </ul>
</div>


<script>
    var base_url = "<?=base_url()?>";
    var site_url = "<?= site_url() ?>";
    var user_id = "<?=$this->session->userdata('pid')?>";
    var app_name = "<?=getAppName($sessions->sessions_id) ?>";
    var session_id = "<?=$sessions->sessions_id?>";
    var sessionId = "<?=$sessions->sessions_id?>";
    var cp_name = "<?= $c_name ?>";
    var session_start_datetime = "<?= date('M d, Y', strtotime($sessions->sessions_date)) . ' ' . $sessions->time_slot . ' UTC-5' ?>";
    var session_end_datetime = "<?=date('M d, Y', strtotime($sessions->sessions_date)) . ' ' . $sessions->end_time . ' UTC-5' ?>";
    var cp_id = "<?= $this->session->userdata('pid')?>";
</script>
<script>

    var socket_session_name = "<?=getAppName('_admin-to-attendee-chat')?>";
    socket.emit("getSessionViewUsers", "<?=getAppName($sessions->sessions_id) ?>", function (resp) {
        if (resp) {
            var totalUsers = resp.users ? resp.users.length : 0;
            var sessionId = resp.sessionId;
            $(".totalAttende" + sessionId + " b").html(totalUsers);
        }
    });
</script>
<!-- Please add scripts only in this JS file, NOT directly on this HTML file -->
<script src="<?= base_url() ?>front_assets/presenter/view_session.js?v=20"></script>

<script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("stickTimer");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>

<!--****** PubNub Stuff *****-->
<!-- DO NOT use production keys on the localhost-->
<?=pubnub_keys()?>
<script>let pubnub_channel = "CCO_Session_<?=$sessions->sessions_id?>";</script>
<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.14.0.min.js"></script>
<script src="<?= base_url() ?>front_assets/js/pubnub/pubnub_live_users_presenter.js?v=3"></script>
