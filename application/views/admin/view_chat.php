<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title" style="padding: 10px">
            <div class="row">
                <div class="col-sm-3" style="padding: 40px">
                    <h1 class="mainTitle">Group Chat</h1>
                </div>
                <div class="col-sm-8">
                    <h1 class="mainTitle" style="color: red">Admin</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->

        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <input type="hidden" id="sessions_id" value="<?= $sessions_id ?>">
                <input type="hidden" id="sessions_group_chat_id" value="<?= $sessions_group_chat_id ?>">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-light-primary" id="panel5">  
                        <div class="panel-heading">
                            <h4 class="panel-title text-white text-uppercase"><?= $sessions_group_chat->group_chat_title ?></h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb">
                            <div class="wrap-messages">
                                <div id="inbox" class="inbox">                
                                    <!-- start: EMAIL LIST -->
                                    <div class="col email-list" style="width: 100% !important">
                                        <div class="wrap-list" style="width: 100% !important">                            
                                            <ul class="messages-list perfect-scrollbar allmessage" style="top: 0px;">

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end: EMAIL LIST -->                    
                                </div>
                            </div>
                            <div class="row">
                                <hr style="border-top:1px solid #b2b7bb">
                                <div class="col-md-11 col-xs-9" style="padding-right: 0px;">
                                    <div class="input-group">
                                        <span class="input-group-addon" style="padding: 5px 6px"><img src="<?= base_url() ?>front_assets/images/emoji/happy.png"  id="emjis_section_show" title="Check to Show Emoji" data-emjis_section_show_status="0" style="width: 20px; height: 20px;" alt=""/></span>
                                        <textarea id="message" name="message" rows="2" class="form-control" style="color: #000;" placeholder="Message..."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1 col-xs-3" style="padding-left: 8px;">
                                    <button class="btn btn-primary" id="send" style="height: 50px;"><i class="fa fa-send"></i></button>
                                </div>
                            </div>
                            <div style="text-align: left; padding-left: 10px; display: flex;"  id="emojis_section">
                                <img src="<?= base_url() ?>front_assets/images/emoji/happy.png" title="Happy" id="happy" data-title_name="&#128578;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/sad.png" title="Sad" id="sad" data-title_name="&#128543" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/laughing.png" title="Laughing" id="laughing"  data-title_name="😁" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_up.png" title="Thumbs Up" id="thumbs_up" data-title_name="&#128077;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/thumbs_down.png" title="Thumbs Down" id="thumbs_down" data-title_name="&#128078" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                                <img src="<?= base_url() ?>front_assets/images/emoji/clapping.png" title="Clapping" id="clapping" data-title_name="&#128079;" style="width: 40px; height: 40px; padding: 5px;" alt=""/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", "#clapping", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            } else {
                $("#message").val(value);
            }
        });

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

        getMessage();
        setInterval(getMessage, 1000);
        setTimeout(function () {
            $(".wrap-messages").css('max-height', '300px');
        }, 300);

        function getMessage() {
            $.ajax({
                url: "<?= site_url() ?>admin/groupchat/message",
                type: "post",
                data: {'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    $('.allmessage').html(data);
                }
            });
        }

        $('#send').click(function () {
            if ($('#message').val() != "") {
                $.ajax({
                    url: "<?= site_url() ?>admin/groupchat/send",
                    type: "post",
                    data: {'message': $('#message').val(), 'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                    success: function (data, textStatus, jqXHR) {
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
                        data: {'message': $('#message').val(), 'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                        success: function (data, textStatus, jqXHR) {
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
</script>