<link href="<?= base_url() ?>assets/css/attendee-session-view.css?v=<?= rand(1, 100) ?>" rel="stylesheet">
<style>
    .angle_vertical_center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<?php
if (true) {
    ?>
    <section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
        <div class="container container-fullscreen" style="padding: 0px;">
            <div class="text-middle">
                <div class="row">
                    <div class="col-md-12" style="">
                        <!-- CONTENT -->
                        <section class="content" style="padding: 10px 0">
                            <div class="container" style=" background: rgba(250, 250, 250, 0.8);"> 
                                <div class="row p-b-40">
                                    <div class="col-md-12" style="background-color: #B2B7BB; margin-bottom: 10px; ">
                                        <h3 style="margin-bottom: 5px; color: #fff; font-weight: 700; text-transform: uppercase;"><?= $eposters->eposters_title ?></h3>
                                    </div>
                                    <div class="col-md-12" style="padding-left: 0px; padding-right: 0px">
                                        <div class="col-md-1" style="text-align: center; padding-left: 0px; padding-right: 0px">
                                            <a href="<?= base_url() ?>eposters/previous/<?= isset($eposters) ? $eposters->eposters_id : "" ?>"><i class="fa fa-angle-left" style="font-size: 8pc; margin-top: 180px;"></i></a>
                                        </div>
                                        <div class="col-md-10" style="text-align: center; padding-left: 0px; padding-right: 0px">
                                            <img src="<?= base_url() ?>uploads/eposters/<?= isset($eposters) ? $eposters->eposters_area_photo : "" ?>" width="100%"/>
                                            <a href="<?= base_url() ?>eposters/view_full_screen/<?= isset($eposters) ? $eposters->eposters_id : "" ?>" class="button btn small" style="background-color: #c3c3c3; border-color: #c3c3c3; font-size: 20px; text-transform: unset;"><span>View Full Screen</span></a>
                                            <a href="<?= base_url() ?>eposters" class="button btn small" style="background-color: #c3c3c3; border-color: #c3c3c3; font-size: 20px; text-transform: unset;"><span>Return to ePoster Listing</span></a>
                                        </div>
                                        <div class="col-md-1" style="text-align: center; padding-left: 0px; padding-right: 0px">
                                            <a href="<?= base_url() ?>eposters/next/<?= isset($eposters) ? $eposters->eposters_id : "" ?>"><i class="fa fa-angle-right" style="font-size: 8pc; margin-top: 180px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END: SECTION --> 
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <?php
}
?>
<div class="rightSticky" data-screen="customer">
    <ul>
        <li data-type="notesSticky"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>TAKE NOTES</span></li>
        <li data-type="questionsSticky"><i class="fa fa-question" aria-hidden="true"></i> <span>QUESTIONS</span></li>
        <li data-type="resourcesSticky"><i class="fa fa-paperclip" aria-hidden="true"></i> <span>RESOURCES</span></li>
        <li data-type="messagesSticky"><i class="fa fa-comments" aria-hidden="true"></i> <span class="notify">1</span> <span>MESSAGES</span></li>
    </ul>
</div>

<div class="rightSticykPopup notesSticky" style="display: none">
    <div class="header"><span></span>
        <div class="rightTool">
            <i class="fa fa-minus" aria-hidden="true"></i>
            <div class="dropdown">
                <span class="glyphicon glyphicon-option-vertical" aria-hidden="true" data-toggle="dropdown"></span>
                <ul class="dropdown-menu">
                    <li data-type="questionsSticky"><a data-type2="off">Questions</a></li>
                    <li data-type="resourcesSticky"><a data-type2="off">Resources</a></li>
                    <li data-type="messagesSticky"><a data-type2="off">Messages</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="content">
            <div class="contentHeader">Take Notes</div>
            <div id="briefcase_section" style="background-color: #fff; border-radius: 5px; padding: 5px; position: absolute; top: 36px; width: 100%;">
                <div style="text-align: center; display: flex; " id="briefcase_section">
                    <div class="col-md-12 input-group">
                        <textarea type="text" id="briefcase" class="form-control" placeholder="Enter Note" value=""></textarea>
                    </div>
                    <a class="button color btn" style="margin: 0px; padding: 24px 7px;" id="briefcase_send"><span>Save</span></a>
                </div>
                <span id='error_briefcase' style='color:red;'></span>
                <span id='success_briefcase' style='color:green;'></span>
            </div>
        </div>

    </div>
    <div class="rightSticykPopup questionsSticky" style="display: none">
        <div class="header"><span></span>
            <div class="rightTool">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <div class="dropdown">
                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true" data-toggle="dropdown"></span>
                    <ul class="dropdown-menu">
                        <li data-type="notesSticky"><a data-type2="off">Take Notes</a></li>
                        <li data-type="resourcesSticky"><a data-type2="off">Resources</a></li>
                        <li data-type="messagesSticky"><a data-type2="off">Messages</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="contentHeader">
                Questions
            </div>
            <div class="questionElement" >

            </div>
            <div id="ask_questions_section" style="background-color: #fff; border-radius: 5px; position: absolute; bottom: 0; width: 100%;">

                <div style="padding:5px;">
                    <div style="text-align: center; display: flex; " id="questions_section">

                        <div class="col-md-12 input-group">
                            <span class="input-group-addon" style="padding: 5px 6px"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png" id="questions_emjis_section_show" title="Check to Show Emoji" data-questions_emjis_section_show_status="0" style="width: 20px; height: 20px;" alt=""/></span>
                            <input type="text" id="questions" class="form-control" placeholder="Enter Question" value="">
                        </div>
                        <a class="button color btn" style="margin: 0px; padding: 15px 7px;" id="ask_questions_send"><span>Send</span></a>
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
    <div class="rightSticykPopup resourcesSticky" style="display: none">
        <div class="header"><span></span>
            <div class="rightTool">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <div class="dropdown">
                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true" data-toggle="dropdown"></span>
                    <ul class="dropdown-menu">
                        <li data-type="notesSticky"><a data-type2="off">Take Notes</a></li>
                        <li data-type="questionsSticky"><a data-type2="off">Questions</a></li>
                        <li data-type="messagesSticky"><a data-type2="off">Messages</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="contentHeader">
                Resources
            </div>
            <div id="resource_section" style="padding: 0px 0px 0px 0px; margin-top: 10px; background-color: #fff; border-radius: 5px;">
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
    </div>
    <div class="rightSticykPopup messagesSticky" style="display: none">
        <div class="header"><span></span>
            <div class="rightTool">
                <i class="fa fa-minus" aria-hidden="true"></i>
                <div class="dropdown">
                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true" data-toggle="dropdown"></span>
                    <ul class="dropdown-menu">
                        <li data-type="notesSticky"><a data-type2="off">Take Notes</a></li>
                        <li data-type="resourcesSticky"><a data-type2="off">Resources</a></li>
                        <li data-type="questionsSticky"><a data-type2="off">Questions</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="contentHeader">
                Messages
            </div>
            <div class="messages">
                <div class="messageHe">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                <div class="messageMe">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
            </div>
            <input type="text" class="form-control" placeholder="Enter message">
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
    <script src="<?= base_url() ?>assets/js/attendee-session-view.js?v=<?= rand(1, 100) ?>"></script>
