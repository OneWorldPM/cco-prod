<div class="main-content" >
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Configurations</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                            <form name="frm_add_data" id="frm_add_data" method="POST" >
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <label class="text-large">Session Types:</label>
                                        <div class="row">
                                            <?php
                                            if (isset($session_types) && !empty($session_types)) {
                                                foreach ($session_types as $key => $value) {
                                                    $key++;
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <label class="text-large" style="margin-top: 5px;"><?= $key ?>.</label>
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <input type="text" name="session_types_<?= $key ?>" id="session_types_<?= $key ?>" value="<?= $value->sessions_type ?>" placeholder="Enter Types" class="form-control input_cust_class">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <label class="text-large">Session Tracks:</label>
                                        <div class="row">
                                            <?php
                                            if (isset($session_tracks) && !empty($session_tracks)) {
                                                foreach ($session_tracks as $key => $value) {
                                                    $key++;
                                                    ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-1">
                                                                    <label class="text-large" style="margin-top: 5px;"><?= $key ?>.</label>
                                                                </div>
                                                                <div class="col-md-11">
                                                                    <input type="text" name="session_tracks_<?= $key ?>" id="session_tracks_<?= $key ?>" value="<?= $value->sessions_tracks ?>" placeholder="Enter Tracks" class="form-control input_cust_class">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="text-align: center;">
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="btn_save" name="btn_save" class="btn btn-green add-row">
                                                Submit
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                        </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end: DYNAMIC TABLE -->
</div>
</div>
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "S":
        $m = "Update Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Delete Successfully...!!!";
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

        $('#btn_save').click(function () {
            $('#frm_add_data').attr('action', '<?= base_url() ?>admin/sessions_configurations/add_configurations');
            $('#frm_add_data').submit();
            return true;

        });
    });
</script>









