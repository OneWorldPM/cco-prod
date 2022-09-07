<link href="<?= base_url() ?>assets/css/attendee-session-view.css?v=201" rel="stylesheet">

<!-- Please add styles only in this CSS file, NOT directly on this HTML file -->
<link href="<?= base_url() ?>front_assets/css/view_sessions.css?v=19" rel="stylesheet">

<section class="parallax" style="background-color: #FFFFFF; overflow: scroll" >
    <!--<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/Sessions_BG_screened.jpg); top: 0; padding-top: 0px;">-->
    <div class="container-fluid">
        <!-- CONTENT -->
        <section class="content">
            <div>
                <div class="videContent">

                        <div class="row justify-content-center">
                            <div class="col-12" style="margin-top: 30px; margin-left: 20px; margin-right: 20px;">
                                <div class="card m-auto text-center">
                                    <div class="row">
                                        <div class="col-sm-12 " style="margin: 30px 0px" >
                                            <h6 style="color:#EF5D21; font-size: 18px">Welcome to the</h6>
                                            <h4  style="color:#EF5D21"><b>CCO Learner Resource App</b></h4>
                                            <div style="height: 1px;background-color: #EF5D21;" class="my-3"></div>

                                            <?php if(isset($sess_data) && !empty($sess_data)): ?>

                                                <b><p class="mx-3" id="sessionTitle" style="font-size: 25px; line-height: 1.2"><?=$sess_data[0]->session_title?></b>
                                                <?php if(isset ($sess_data[0]->presenter) && !empty($sess_data[0]->presenter)): ?>
                                                    <?php foreach ($sess_data[0]->presenter as $presenter):?>
                                                        <div id="moderators" style="font-size: 18px;">
                                                            <?=$presenter->first_name.' '.$presenter->last_name.', '.$presenter->degree?>
                                                        </div>
                                                    <?php endforeach;?>
                                                <?php endif ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-12" style=" margin-left: 20px; margin-right: 20px;">
                                <div class="card text-center align-items-center justify-content-center align-content-center mx-auto mt-2" style="background-image: url(https://yourconference.live/CCO/front_assets/images/bg_login.png); top: 0; padding-top: 0px; height: 100%; background-size: cover">
                                    <?php if(sessionRightBarControl($sessions->right_bar, "resources")):?>
                                    <button id="resource-btn" type="button"  class="btn btn-sm text-white" style="width: 95%; height: 70px; margin-top: 30px; background-color: #EF5D21; font-size: 20px; font-weight: 700">Resources <i class="fas fa-paperclip"></i></button>
                                    <?php endif; ?>
<!--                                    <button id="notes-btn" class="btn btn-sm mt-2 text-white" style="width: 80%; height: 30px; background-color: #EF5D21;">Take Notes <i class="far fa-edit"></i></button>-->
                                    <?php if(sessionRightBarControl($sessions->right_bar, "questions")):?>
                                        <button id="question-btn" class="btn btn-sm mt-3 text-white" style="width: 95%; height: 70px; background-color: #EF5D21;font-size: 20px; font-weight: 700">Ask a Question <i class="fas fa-question"></i></button>
                                    <?php endif; ?>
                                    <?php if (isset($attendee_view_links_status) && isset($attendee_view_links_status)) {
                                    if ($attendee_view_links_status == "1") {
                                    ?>
                                    <button onclick="window.open('<?=isset($url_link)?$url_link:''?>', '_blank')" class="btn btn-sm mt-3 text-white" style="width: 95%; height: 70px; background-color: #EF5D21;font-size: 20px; font-weight: 700" >Claim Credit</button>
                                    <?php }} ?>

                                    <?php if(isset($isSessionWithPoll) && !empty($isSessionWithPoll)) : ?>
                                        <button id="polling-guide-btn" style="width: 95%; height: 70px; background-color: #EF5D21;font-size: 20px; font-weight: 700" class="btn btn-sm mt-3 text-white" >Polling Guide <i class="fa fa-book"></i></button>
                                    <?php endif ?>

                                    <button id="live_support-btn" onclick="openLiveSupportChat()" style="display: <?=(liveSupportChatStatus())?'block':'none'?>;width: 95%; height: 70px; margin-bottom: 30px; background-color: #EF5D21;font-size: 20px; font-weight: 700" class="btn btn-sm mt-3 text-white" >Live Technical Support <i class="far fa-life-ring"></i></button>
                                    <div class="mb-3"></div>
                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none; text-align: left; margin-top: 50px !important;" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog" style="overflow-y: initial !important">
                                <div class="modal-content" style="padding: 0px; border: 0px solid #999; border-radius: 15px;">
                                    <div class="modal-header" style="height: 0">
                                        <button type="button" class="poll-modal-close close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!--                                                <div class="modal-header" style="padding: 0px;">
                                                                                                    <img class="kent_logo" src="<?= base_url() ?>assets/images/logo.png" alt="MLG">
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                                </div>-->
                                    <div class="modal-body" style="padding: 0px; max-height: 80vh; overflow-y: auto; overflow-x:hidden">
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
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <p class="currentTime">
                        CURRENT TIME : <span id="show_time"></span> EDT <a class="button color currentTimeButton" id="close_session"><span>Close the Session</span></a>

                    </p>

                        <span class="borderFooter">test</span>
                    </p>-->

                    <div class="col-md-12">
                        <?php
                        if (isset($music_setting)) {
                            if ($music_setting->music_setting != "") {
                                ?>
                                <audio allow="autoplay" id="audio" src=""></audio>
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


                    </div>

                </div>

            </div>

        </section>
        <!-- END: SECTION -->


<script>
    var base_url = "<?=base_url()?>";
    var site_url = "<?= site_url() ?>";
    var user_id = "<?=$this->session->userdata('cid')?>";
    var user_fullname = "<?=$this->session->userdata('fullname')?>";
    var app_name = "<?=getAppName($sessions->sessions_id) ?>";
    var session_id = "<?=$sessions->sessions_id?>";
    var session_start_datetime =  new Date("<?= date('M d, Y', strtotime($sessions->sessions_date)) . ' ' . $sessions->time_slot ?>");
    var session_end_datetime =  new Date("<?= date('M d, Y', strtotime($sessions->sessions_date)) . ' ' . $sessions->end_time ?>");

    var socket_session_name = "<?=getAppName('_admin-to-attendee-chat')?>";
</script>
<?= getSocketScript()?>
<!--<script src="--><?//= base_url() ?><!--front_assets/js/custom-fullscreen.js"></script>-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

<!--****** PubNub Stuff *****-->
<!-- DO NOT use production keys on the localhost-->
<script> var pubnub_channel = "CCO_Session_<?=$sessions->sessions_id?>"; </script>
<script src="<?= base_url() ?>front_assets/js/pubnub/pubnub_live_users.js?v=2"></script>

<!-- Please add scripts only in this JS file, NOT directly on this HTML file -->
<script src="<?= base_url() ?>front_assets/mobile/view_sessions.js?v=23"></script>
<script src="<?= base_url() ?>front_assets/mobile/admin-to-attendee-chat.js?v=203"></script>

<script>
    $(function(){
        $('#question-btn').on('click', function(){

            $('.stickyQuestionbox').css('display', 'block');
            // $('.stickyNotesbox').css('display','none');
            $('.resourcesStickybox').css('display','none');
        });
        // $('#notes-btn').on('click', function(){
        //
        //     $('.stickyQuestionbox').css('display', 'none');
        //     $('.stickyNotesbox').css('display','block');
        //     $('.resourcesStickybox').css('display','none');
        // });


        $('#resource-btn').on('click', function(){

            $('.stickyQuestionbox').css('display', 'none');
            // $('.stickyNotesbox').css('display','none');
            $('.resourcesStickybox').css('display','block');
        });

        $('#question-btn').on('click', function(){

            $('.stickyQuestionbox').css('display', 'block');
            // $('.stickyNotesbox').css('display','none');
            $('.resourcesStickybox').css('display','none');
            $('.resourcesStickybox').css('display','none');
        });

        $('#polling-guide-btn').on('click', function(){
            $('#pollGuideModal').modal('show');
        })

    })

</script>