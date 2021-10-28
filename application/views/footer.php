<div class="modal fade" id="push_notification" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none; text-align: left; right: unset;top: unset">
    <input type="hidden" id="push_notification_id" value="">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 1px solid #679B41;">
            <div class="modal-body">
                <div class="row" style="padding-top: 10px; padding-bottom: 20px;">
                    <div class="col-sm-12">
                        <div style="color:#000000; font-size: 16px; font-weight: 800; " id="push_notification_message"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close push_notification_close" style="padding: 10px; color: #fff; background-color: #EF5D21; opacity: 1; font-size: 18px; font-weight: 400;" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END: WRAPPER -->
<!-- GO TOP BUTTON -->
<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url() ?>front_assets/js/theme-functions.js"></script>

<!-- Custom js file -->
<script src="<?= base_url() ?>front_assets/js/custom.js?v=4"></script>
<script src="<?= base_url() ?>assets/alertify/alertify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/fd91b3535c.js" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>

<!-- Live Support Chat -->
<script>
    var base_url = "<?=base_url()?>";
    let support_app_name = "<?=getAppName("") ?>";
    let attendee_id = "<?=$this->session->userdata('cid')?>";
    let attendee_name = "<?=$this->session->userdata('fullname')?>";
</script>



<!--****** PubNub Stuff *****-->
<!-- DO NOT use production keys on the localhost-->
<script>let pubnub_channel_total = "CCO_Total";</script>
<script src="<?= base_url() ?>front_assets/js/pubnub/pubnub_total_live_users.js?v=2"></script>


<script src="https://athulak.com/socket.io/socket.io.js"></script>
<link rel="stylesheet" href="<?=base_url()?>front_assets/support_chat/style.css?v=3">
<script src="<?= base_url() ?>front_assets/support_chat/live-support-chat.js?v=3"></script>
<div class="live-support-chat-popup" id="liveSupportChatForm">
    <span class="live-support-chat-title"><i class="far fa-life-ring"></i> Live Technical Support</span>
    <div class="live-support-chat-body">

        <div id="live-support-chat-texts" class="live-support-chat-texts">
            <!-- Will be filled by fillAllPreviousChats() function on pageReady -->
        </div>

        <div class="input-group text-center" style="width: 100%;position: absolute;bottom: 90px;">
            <span id="adminTypingHint" style="display: none;">Admin is typing...</span>
        </div>
        <div class="input-group" style="position: absolute;bottom: 45px;">
            <input id="liveSupportText" type="text" class="form-control" placeholder="Enter your message here...">
            <span class="input-group-btn">
                <button id="sendLiveSupportText" class="btn btn-default" type="button"><i class="far fa-paper-plane"></i> Send</button>
            </span>
        </div>

    </div>
    <button type="button" class="btn btn-sm end-chat-btn" onclick="endLiveSupportChat()">End Chat <i class="fas fa-times-circle"></i></button>
</div>
<!-- End of Live Support Chat -->


<script>
    var user_id = <?= $this->session->userdata("cid") ?>;
    var user_name = "<?= $this->session->userdata('fullname') ?>";
    function extract(variable) {
        for (var key in variable) {
            window[key] = variable[key];
        }
    }



    $(function() {

        $.get( "<?=base_url()?>socket_config.php", function( data ) {
            var config = JSON.parse(data);
            extract(config);

            var socketServer = "https://socket.yourconference.live:443";
            let socket = io(socketServer);
            socket.on('serverStatus', function (data) {
                socket.emit('addMeToActiveListPerApp', {'user_id':user_id, 'app': socket_app_name, 'room': socket_active_user_list});
            });

            $(window).on("blur focus", function(e) {
                var prevType = $(this).data("prevType");

                if (prevType != e.type) {   //  reduce double fire issues
                    switch (e.type) {
                        case "blur":
                            inActive();
                            break;
                        case "focus":
                            resetActive();
                            break;
                    }
                }

                $(this).data("prevType", e.type);
            });

        });

        // Active again
        function resetActive(){
            socket.emit('userActiveChangeInApp', {"app":socket_app_name, "room":socket_active_user_list, "name":user_name, "userId":user_id, "status":true});
        }
        // No activity let everyone know
        function inActive(){
            socket.emit('userActiveChangeInApp', {"app":socket_app_name, "room":socket_active_user_list, "name":user_name, "userId":user_id, "status":false});
        }


    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var app_name_main = "<?=getAppName("") ?>";
        push_notification_admin();
        //setInterval(push_notification_admin, 2000);
        socket.on('push_notification_change', (socket_app_name) => {
            if (socket_app_name == app_name_main)
                push_notification_admin();
        });
        function push_notification_admin()
        {
            var push_notification_id = $("#push_notification_id").val();

            $.ajax({
                url: "<?= base_url() ?>push_notification/get_push_notification_admin",
                type: "post",
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        if (push_notification_id == "0") {
                            $("#push_notification_id").val(data.result.push_notification_id);
                        }
                        if (push_notification_id != data.result.push_notification_id && data.result.session_id == null) {
                                if (data.result.receiver=="attendee" || data.result.receiver=="both" || data.result.receiver==null){
                            $("#push_notification_id").val(data.result.push_notification_id);
                            $('#push_notification').modal('show');
                            $("#push_notification_message").text(data.result.message);
                            }
                        }

                        if (push_notification_id != data.result.push_notification_id && data.result.session_id != null)
                        {
                            if (data.result.receiver=="attendee" || data.result.receiver=="both" || data.result.receiver==null){
                            if (typeof session_id !== 'undefined' && session_id == data.result.session_id)
                            {
                                $("#push_notification_id").val(data.result.push_notification_id);
                                $('#push_notification').modal('show');
                                $("#push_notification_message").text(data.result.message);
                            }}
                        }
                    } else {
                        $('#push_notification').modal('hide');
                    }
                }
            });
        }
    });
</script>

</body>
</html>
