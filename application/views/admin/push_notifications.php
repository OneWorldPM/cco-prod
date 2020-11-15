<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" action="">
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Push Notifications</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="form-group">
                                            <label class="text-large">Message :</label>
                                            <textarea name="message" id="message" rows="3" class="form-control" placeholder="Enter Message..." style="color: #5b5b60"></textarea>
                                        </div>
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_btn" name="save_btn" class="btn btn-green add-row">
                                                Save
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                     
                    <div class="col-md-12">
                        <div class="panel panel-light-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Push Notifications</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Push Notifications<span class="text-bold"></span></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="plan_table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Message</th>
                                                <th>Action</th>                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($push_notifications)) {
                                                foreach ($push_notifications as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><?= date("Y-m-d", strtotime($val->notification_date)) ?></td>
                                                        <td><?= $val->message ?></td>
<!--                                                        <td>
                                                            <?php if ($val->status == 1) { ?>
                                                                <label class="label label-primary">Sent</label>
                                                            <?php } ?>
                                                        </td>-->
                                                        <td> 
                                                            <?php if ($val->status == 0) { ?>
                                                                <a class="btn btn-success btn-sm send_notification" data-id="<?= $val->push_notification_id ?>" href="#">
                                                                    <i class="fa fa-send"></i> Send Notification
                                                                </a>
                                                            <?php } ?>
                                                            <a class="btn btn-danger btn-sm delete_promo_code" href="<?= base_url() . 'admin/push_notifications/delete_push_notifications/' . $val->push_notification_id ?>">
                                                                <i class="fa fa-trash-o"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>

</div>

<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "S":
        $m = "Message Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Message Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Message Delete Successfully...!!!";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>

<script>
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $('#plan_table').dataTable({
            "aaSorting": []
        });

        $('#save_btn').click(function () {
            if ($('#message').val() == '') {
                alertify.error('Please Enter Message');
                return false;
            } else {
                $('#frm_credit').attr('action', '<?= base_url() ?>admin/push_notifications/add_push_notifications');
                $('#frm_credit').submit();
                return true;
            }
        });

        var app_name_main = "<?=getAppName("") ?>";

        $(document).on("click", ".send_notification", function () {
            var send_notification_id = $(this).attr('data-id');
            $(this).hide();
            $(".send_notification").prop('disabled', true);
            $this = $(this);
            if (send_notification_id != '') {
                $.ajax({
                    url: "<?= base_url() ?>admin/push_notifications/send_notification/" + send_notification_id,
                    type: "post",
                    dataType: "json",
                    success: function (response) {
                        cr_data = response;
                        console.log(cr_data);
                        if (cr_data.status == "success")
                        {
                            if (socket){
                                socket.emit('send_push_notification', app_name_main);
                            }else{
                                alertify.error('Socket config not found, notification might not have been sent!');
                            }

                            var delayInMilliseconds = 30000; //1 second
                            setTimeout(function () {
                                socket.emit('close_push_notification', app_name_main);
                                $.ajax({
                                    url: "<?= base_url() ?>admin/push_notifications/close_notification/" + send_notification_id,
                                    type: "post",
                                    dataType: "json",
                                    success: function (response) {
                                        cr_data = response;
                                        console.log(cr_data);
                                        if (cr_data.status == "success")
                                        {
                                            $this.show();
                                            $(".send_notification").prop('disabled', false);
                                        }
                                        $(".send_notification").prop('disabled', false);
                                    }
                                });
                            }, delayInMilliseconds);
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again!');
            }
        });

    });
</script>






