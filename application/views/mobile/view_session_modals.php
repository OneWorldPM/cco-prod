<style>
    .admin-messages{
        padding: 5px 3px;
        max-height: 400px;
        min-height: 310px;
        overflow: auto;

    }
    .admin-to-user-text {
        color: white;
        background-color: #df941f;
        text-align: left;
        display: list-item;
        list-style: none;
        margin-top: 7px;
        margin-bottom: 7px;
        padding-left: 12px;
        border-radius: 15px;
        margin-right: 40px;
    }
    .user-to-admin-text {
        color: white;
        background-color: #1f8edf;
        text-align: left;
        display: list-item;
        list-style: none;
        margin-top: 7px;
        margin-bottom: 7px;
        padding-left: 12px;
        border-radius: 15px;
        margin-left: 40px;
    }
    .live-support-text-attendee{
        margin-bottom: 20px !important;
    }
    .live-support-text-admin{
        margin-bottom: 20px !important;
    }
    .progress_bar_new{
        padding-top: 10px;
    }
    .poll-modal-close{
        padding-top: 0 !important;
    }
    .admin-messages{
        max-height: 275px;
    }
</style>
<div class="row stickyQuestionbox" style="display: none">
    <div class="col d-flex" >
        <div  class="fixed-bottom " >
            <div class="card " style="height: 400px; width: 65%; left:35%; ">
                <div class="card-header text-white" style="background-color: #EF5D21">Question <button id="stickyQuestionboxHide" class="btn fa fa-minus float-right text-white shadow-none"></button></div>
                <div class="content">
                    <div class="questionElement" style="max-height: 300px; !important;">
                    </div>
                    <div id="ask_questions_section" style="border-radius: 5px; position: absolute; bottom: 0; width: 100%;">
                        <div style="padding:5px;">
                            <div style="text-align: center; display: flex; " id="questions_section">

                                <div class="col-md-12 input-group">
                                    <span class="input-group-addon" style="padding: 5px 6px"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png" id="questions_emjis_section_show" title="Check to Show Emoji" data-questions_emjis_section_show_status="0" style="width: 20px; height: 20px;" alt=""/></span>
                                    <input type="text" id="questions" class="form-control" placeholder="Enter Question" value="">
                                    <a class="button color btn btn-sm text-white" style="background-color: #EF5D21" id="ask_questions_send"><span>Send</span></a>
                                </div>

                            </div>
                            <div style="text-align: left; padding-left: 10px; display: flex;" id="questions_emojis_section">
                                <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy" id="questions_happy" data-title_name="&#128578;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad" id="questions_sad" data-title_name="&#128543" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png" title="Laughing" id="questions_laughing" data-title_name="😁" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png" title="Thumbs Up" id="questions_thumbs_up" data-title_name="&#128077;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png" title="Thumbs Down" id="questions_thumbs_down" data-title_name="&#128078" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png" title="Clapping" id="questions_clapping" data-title_name="&#128079;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                            </div>
                            <span id='error_questions' style='color:red;'></span>
                            <span id='success_questions' style='color:green;'></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row stickyNotesbox" style="display: none">
    <div class="col d-flex" >
        <div  class="fixed-bottom " >
            <div class="card " style="height: 300px; width: 65%; left:35%; ">
                <div class="card-header text-white" style="background-color: #EF5D21">Add Notes <button id="stickyNotesboxHide" class="btn fa fa-minus float-right text-white shadow-none"></button></div>
                <div class="content" style="">
                    <div id="briefcase_section">
                        <div id="briefcase_section">
                            <div class="col-md-12 input-group">
                                <textarea type="text" id="briefcase" class="form-control" placeholder="Enter Note" value="" style="background-color: #FFFFFF"><?= isset($sessions_notes_download) ? $sessions_notes_download : "" ?></textarea>
                            </div>
                            <a class="button btn btn-success"  id="briefcase_send"><span>Save</span></a>
                            <a class="button btn btn-info" id="downloadbriefcase"><span>Download</span></a>
                        </div>
                        <span id='error_briefcase' style='color:red;'></span>
                        <span id='success_briefcase' style='color:green;'></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--
<div class="row resourcesStickybox" style="display: none">
    <div class="col d-flex" >
        <div  class="fixed-bottom " >
            <div class="card " style="height: 300px; width: 65%; left:35%; ">
                <div class="card-header" style="background-color: #EF5D21">Resources</div>
                <div class="content">
                    <div class="contentHeader">
                        Resources
                    </div>
                    <div id="resource_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
                        <div style="padding: 0px 15px 15px 15px; overflow-y: auto; height: 240px;" id="resource_display_status">
                            <?php
/*                            if (!empty($session_resource)) {
                                foreach ($session_resource as $val) {
                                    */?>
                                    <div class="row" style="margin-bottom: 10px; padding-bottom: 5px">
                                        <?php /*if ($val->resource_link != "") { */?>
                                            <div class="col-md-12"><a class="resources-link-text" href="<?/*= $val->resource_link */?>" target="_blank"><?/*= $val->link_published_name */?></a></div>
                                        <?php /*} */?>
                                        <?php
/*                                        if ($val->upload_published_name) {
                                            if ($val->resource_file != "") {
                                                */?>
                                                <div class="col-md-12"><a class="resources-link-text" href="<?/*= base_url() */?>uploads/resource_sessions/<?/*= $val->resource_file */?>" download="<?/*= $val->file_name */?>"> <?/*= $val->upload_published_name */?> </a></div>
                                                <?php
/*                                            }
                                        }
                                        */?>
                                    </div>
                                    <?php
/*                                }
                            }
                            */?>
                            <span id='success_resource' style='color:green;'></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
-->

<div class="row adminChatStickybox" style="display: none">
    <div class="col d-flex" >
        <div  class="fixed-bottom " >
            <div class="card " style="height: 400px; width: 65%; left:35%; ">
                <div class="card-header text-white" style="background-color: #EF5D21">Chat with Admin <button id="adminChatStickyboxHide" class="btn fa fa-minus float-right text-white shadow-none"></button></div>
                <div class="content">
                    <div class="admin-messages">
                    </div>

                    <div class="input-group">
                        <input type="text" class="form-control shadow-none" placeholder="Enter message" id='sendAdminChat'>
                        <button class="btn" id="sendAdminChatBtn">Send <i class="fas fa-paper-plane-o"></i></button>
                    </div>



                </div>
            </div>
        </div>

    </div>
</div>


<!-- Live Support Chat -->
<script>
    var base_url = "<?=base_url()?>";
    let support_app_name = "<?=getAppName("") ?>";
    let attendee_id = "<?=$this->session->userdata('cid')?>";
    let attendee_name = "<?=$this->session->userdata('fullname')?>";
</script>



<!--****** PubNub Stuff *****-->
<!-- DO NOT use production keys on the localhost-->

<script src="https://athulak.com/socket.io/socket.io.js"></script>
<link rel="stylesheet" href="<?=base_url()?>front_assets/support_chat/style.css?v=3">
<script src="<?= base_url() ?>front_assets/support_chat/live-support-chat.js?v=2"></script>

<div class="row " id="liveSupportChatForm" style="display: none">
    <div class="col d-flex" >
        <div  class="fixed-bottom " >
            <div class="card " style="height: 400px; width: 65%; left:35%; ">
                <div class="card-header text-white" style="background-color: #EF5D21">Live Technical Support <button id="liveSupportChatFormHide" class="btn fa fa-minus float-right text-white shadow-none"></button></div>
                <div class="live-support-chat-body" style="height: 250px">

                    <div id="live-support-chat-texts" class="live-support-chat-texts" style="">
                        <!-- Will be filled by fillAllPreviousChats() function on pageReady -->
                    </div>

                    <div class="input-group text-center" style="width: 100%;position: absolute;bottom: 90px;">
                        <span id="adminTypingHint" style="display: none;">Admin is typing...</span>
                    </div>
                    <div class="input-group" style="position: absolute;bottom: 32px;">
                        <input id="liveSupportText" type="text" class="form-control shadow-none" placeholder="Message here...">
                        <span class="input-group-btn">
                          <button id="sendLiveSupportText" class="btn btn-success" type="button"><i class="far fa-paper-plane"></i> Send</button>
                        </span>
                    </div>

                </div>
                <button type="button" class="btn btn-sm end-chat-btn" onclick="endLiveSupportChat()">End Chat <i class="fas fa-times-circle"></i></button>
            </div>
        </div>

    </div>
</div>

<div class="row resourcesStickybox" style="display: none">
    <div class="col d-flex" >
        <div  class="fixed-bottom " >
            <div class="card " style="height: 400px; width: 65%; left:35%; ">
                <div class="card-header text-white" style="background-color: #EF5D21">Resource <button id="resourcesStickyboxHide" class="btn fa fa-minus float-right text-white shadow-none"></button></div>
                        <?php
                        if (!empty($session_resource)) {
                            foreach ($session_resource as $val) {
                                ?>
                                <div class="row" style="margin-bottom: 10px; padding-bottom: 5px">
                                    <?php if ($val->resource_link != "") { ?>
                                        <div class="col-md-12"><a class="resources-link-text" href="<?= $val->resource_link ?>" target="_blank" style="color: #EF5D21 !important;"><?= $val->link_published_name ?></a></div>
                                    <?php } ?>
                                    <?php
                                    if ($val->upload_published_name) {
                                        if ($val->resource_file != "") {
                                            ?>
                                            <div class="col-md-12"><a class="resources-link-text" href="<?= base_url() ?>uploads/resource_sessions/<?= $val->resource_file ?>" download="<?= $val->file_name ?>" style="color: #EF5D21 !important"> <?= $val->upload_published_name ?> </a></div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
            </div>
        </div>

    </div>
</div>
<!-- End of Live Support Chat -->
<script>
    $(function(){
        $('#stickyQuestionboxHide').on('click', function(){
            $('.stickyQuestionbox').css('display', 'none');
        })

        $('#stickyNotesboxHide').on('click', function(){
            $('.stickyNotesbox').css('display', 'none');
        })

        $('#adminChatStickyboxHide').on('click', function(){
            $('.adminChatStickybox').css('display', 'none');
        })

        $('#liveSupportChatFormHide').on('click', function(){
            $('#liveSupportChatForm').css('display', 'none');
        })

        $('#resourcesStickyboxHide').on('click', function(){
            $('.resourcesStickybox').css('display', 'none');
        })

    })

</script>
