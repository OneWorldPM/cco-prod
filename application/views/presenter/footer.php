<!-- start: FOOTER -->
<footer>
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
</body>
</html>
