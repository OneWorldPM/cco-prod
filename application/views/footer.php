</div>
<!-- END: WRAPPER -->
<!-- GO TOP BUTTON -->
<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

<!-- Theme Base, Components and Settings -->
<script src="<?= base_url() ?>front_assets/js/theme-functions.js"></script>

<!-- Custom js file -->
<script src="<?= base_url() ?>front_assets/js/custom.js"></script>
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

    $.get( "<?=base_url()?>socket_config.php", function( data ) {
        var config = JSON.parse(data);
        extract(config);
    });

    $(function() {

        var socketServer = "https://socket.yourconference.live:443";
        let socket = io(socketServer);
        socket.on('serverStatus', function (data) {
            socket.emit('addMeToActiveListPerApp', {'user_id':user_id, 'app': socket_app_name, 'room': socket_active_user_list});
        });

        // Active again
        function resetActive(){
            socket.emit('userActiveChangeInApp', {"app":socket_active_user_list, "name":user_name, "userId":user_id, "status":true});
        }
        // No activity let everyone know
        function inActive(){
            socket.emit('userActiveChangeInApp', {"app":socket_active_user_list, "name":user_name, "userId":user_id, "status":false});
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

</body>
</html>
