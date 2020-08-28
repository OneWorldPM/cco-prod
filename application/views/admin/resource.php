<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" enctype="multipart/form-data">
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Add Session Resources</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row">
                                    <div class="col-md-12"><label class="text-large">Note : URL must start with http:// or https:// for example https://google.com</label></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-large">Link published name:</label>
                                            <input type="text" name="link_published_name" id="link_published_name" placeholder="Enter Link Published Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-large">Link:</label>
                                            <input type="text" name="resource_link" id="resource_link" placeholder="Enter Link" class="form-control">
                                            
                                            <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions_id ?>">
                                            <input type="hidden" name="cr_type" id="cr_type" value="save">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-large">Upload published name:</label>
                                            <input type="text" name="upload_published_name" id="upload_published_name" placeholder="Enter Upload Published Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-large">Select File:</label>
                                            <input type="file" name="resource_file" id="resource_file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_resource" name="save_resource" class="btn btn-green add-row">
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
                                <h4 class="panel-title text-white">Session Resources</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Session Resources<span class="text-bold"></span></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="plan_table">
                                        <thead>
                                            <tr>
                                                <th>Resources Link</th>
                                                <th>Resources File</th>
                                                <th>Action</th>                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($resource)) {
                                                foreach ($resource as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><a href="<?= $val->resource_link ?>" target="_blank"><?= $val->link_published_name ?></a></td>
                                                        <td><a href="<?= base_url() ?>uploads/resource_sessions/<?= $val->resource_file ?>" download> <?= $val->upload_published_name ?></a></a></td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm delete_promo_code" href="<?= base_url() . 'admin/sessions/delete_resource/' . $val->session_resource_id . '?sessions_id=' . $val->sessions_id ?>">
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
        $m = "Session Resources Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Session Resources Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Session Resources Delete Successfully...!!!";
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

        $('#save_resource').click(function () {
            $('#frm_credit').attr('action', '<?= base_url() ?>admin/sessions/add_resource');
            $('#frm_credit').submit();
            return true;
        });


    });

</script>






