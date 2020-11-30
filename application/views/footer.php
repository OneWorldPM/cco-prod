<div class="modal fade" id="push_notification" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none; text-align: left; right: unset;">
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
                <button type="button" class="close push_notification_close" style="padding: 10px; color: #fff; background-color: #363535; opacity: 1; font-size: 18px; font-weight: 400;" data-dismiss="modal" aria-hidden="true">Close</button>
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
<script src="<?= base_url() ?>front_assets/js/custom.js?v=3"></script>
<script src="<?= base_url() ?>assets/alertify/alertify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>

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
        });

        // Active again
        function resetActive(){
            socket.emit('userActiveChangeInApp', {"app":socket_app_name, "room":socket_active_user_list, "name":user_name, "userId":user_id, "status":true});
        }
        // No activity let everyone know
        function inActive(){
            socket.emit('userActiveChangeInApp', {"app":socket_app_name, "room":socket_active_user_list, "name":user_name, "userId":user_id, "status":false});
        }

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
                        if (push_notification_id != data.result.push_notification_id) {
                            $("#push_notification_id").val(data.result.push_notification_id);
                            $('#push_notification').modal('show');
                            $("#push_notification_message").text(data.result.message);
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
