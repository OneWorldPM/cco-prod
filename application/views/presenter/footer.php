<!-- start: FOOTER -->
<footer>
<div class="modal fade" id="push_notification" tabindex="-1" role="modal" aria-labelledby="modal-label" aria-hidden="true" style="display: none; text-align: left; right: unset;top: unset;">
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
                <button type="button" class="close push_notification_close" style="padding: 10px; color: #fff; background-color: #f58113; opacity: 1; font-size: 18px; font-weight: 400;" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

    <div class="footer-inner">
        <div class="pull-left">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> </span>. <span>All rights reserved</span>
        </div>
        <div class="pull-right">
            <span class="go-top"><i class="ti-angle-up"></i></span>
        </div>
    </div>
</footer>
<!-- end: FOOTER -->
</div>
<script type="text/javascript">
    $(function () {
        $('.mycheck').prop('disabled', true);
        $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal'
        });
        checkbox();
        function checkbox() {
            $('table thead :checkbox').on('ifChecked ifUnchecked', function (event) {
                if (event.type == 'ifChecked') {
                    $('.icheckbox_minimal').iCheck('check');
                    $('.mycheck').removeAttr('disabled');
                } else {
                    $('.icheckbox_minimal').iCheck('uncheck');
                    $('.mycheck').prop('disabled', true);
                }
            });
            $('table tbody :checkbox').on('ifChanged', function (event) {
                var len = parseInt($('table tbody :checkbox').filter(':checked').length);
                if ($('table tbody :checkbox').filter(':checked').length == $('table tbody :checkbox').length) {
                    $('table thead :checkbox').prop('checked', true);
                } else {
                    $('table thead :checkbox').prop('checked', false);
                    $('.mycheck').removeAttr('disabled');
                }
                if (len > 0) {
                    $('.mycheck').removeAttr('disabled');
                } else {
                    $('.mycheck').prop('disabled', true);
                }
                $('table thead :checkbox').iCheck('update');
            });
        }
        //-----------------------------iCheck All-----------------------------//

        $('ul.pagination').on('click', function () {
            $('.icheckbox_minimal').iCheck('uncheck');
            $('.mycheck').prop('disabled', true);
            $("input[type='checkbox']:not(.simple), input[type='radio']:not(.simple)").iCheck({
                checkboxClass: 'icheckbox_minimal',
                radioClass: 'iradio_minimal'
            });
            checkbox();
        });
    });
</script>
<!-- start: MAIN JAVASCRIPTS -->

<script src="<?= base_url() ?>assets/vendor/modernizr/modernizr.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->




<script src="<?= base_url() ?>assets/vendor/iCheck/icheck.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/alertify/alertify.min.js" type="text/javascript"></script>

<script src="<?= base_url() ?>assets/vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/autosize/autosize.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/selectFx/classie.js"></script>
<script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/selectFx/selectFx.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>


<script src="<?= base_url() ?>assets/vendor/DataTables/jquery.dataTables.min.js"></script>

<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="<?= base_url() ?>assets/js/main.js?1"></script>
<!-- start: JavaScript Event Handlers for this page -->


<script src="<?= base_url() ?>assets/js/table-data.js"></script>
<script src="<?= base_url() ?>assets/js/form-elements.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-smart-wizard/jquery.smartWizard.js"></script>
<script src="<?= base_url() ?>assets/js/form-wizard.js"></script>
<script src="<?= base_url() ?>assets/js/pages-messages.js"></script>


<!--  -->
<script src="<?= base_url() ?>front_assets/js/custom.js?v=3"></script>
<script src="<?= base_url() ?>assets/alertify/alertify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>
<!--  -->
<script>
    jQuery(document).ready(function () {
        Main.init();
        FormWizard.init();
        FormElements.init();
        Messages.init();
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->

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
                url: "<?= base_url() ?>presenter/push_notification/get_push_notification_admin",
                type: "post",
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        if (push_notification_id == "0") {
                            $("#push_notification_id").val(data.result.push_notification_id);
                        }
                        if (push_notification_id != data.result.push_notification_id && data.result.session_id == null) {
                            if (data.result.receiver=="presenter" || data.result.receiver=="both" || data.result.receiver==null){
                            $("#push_notification_id").val(data.result.push_notification_id);
                            $('#push_notification').modal('show');
                            $("#push_notification_message").text(data.result.message);
                            }
                        }

                        if (push_notification_id != data.result.push_notification_id && data.result.session_id != null)
                        {
                            if (data.result.receiver=="presenter" || data.result.receiver=="both" || data.result.receiver==null){
                            if (typeof session_id !== 'undefined' && session_id == data.result.session_id)
                            {
                                $("#push_notification_id").val(data.result.push_notification_id);
                                $('#push_notification').modal('show');
                                $("#push_notification_message").text(data.result.message);
                            }
                        }
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
