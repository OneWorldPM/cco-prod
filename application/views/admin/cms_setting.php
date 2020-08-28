<div class="main-content" >
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="main-login col-xs-12 col-xs-offset-2 col-sm-8 col-sm-offset-5 col-md-8 col-md-offset-2">
                    <div class="box-register">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white"><?= isset($editCms) ? 'Edit' : 'Add' ?> Cms</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                                <form name="add_cms" id="add_cms" action="<?= base_url() ?>admin/cms_setting/<?= isset($editCms) ? 'updateCms' : 'addData'; ?>" method="POST" >

                                    <?php if (isset($editCms)) { ?>
                                        <input type="hidden" name="cms_id" value="<?= $editCms->cms_id; ?>">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="text-large">Title:</label>
                                        <input type="text" name="title" value="<?= isset($editCms) ? $editCms->title : ''; ?>" id="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Description:</label>
                                        <textarea name="description" id="description" rows="3" class="form-control" style="color: #5b5b60"><?= isset($editCms) ? $editCms->description : ''; ?></textarea>
                                    </div>
                                    <h5 class="over-title margin-bottom-15">
                                        <button type="submit" id="btnsavecms" name="<?= isset($editCms) ? 'update_cms' : 'btnsavecms'; ?>" class="btn btn-green add-row"><?= isset($editCms) ? 'Update' : 'Save'; ?></button>
                                    </h5>
                                </form>                 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="panel panel-primary" id="panel5">
                <div class="panel-heading">
                    <h4 class="panel-title text-white">Cms</h4>
                </div>
                <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered table-striped text-center" id="samples">
                                <thead class="th_center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>                             
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($cms) && !empty($cms)) {
                                        foreach ($cms as $val) {
                                            ?>
                                            <tr>
                                                <td><?= $val->cms_id ?></td>
                                                <td><?= $val->title ?></td>
                                                <td><?= $val->description ?></td>
                                                <td> <a href="<?= base_url() ?>admin/cms_setting/edit_cms_setting/<?= $val->cms_id ?>" class="btn btn-green btn-sm">Edit</a>
<!--                                                    <a href="<?= base_url() ?>admin/cms_setting/delete_cms_setting/<?= $val->cms_id ?>" class="btn btn-danger btn-sm">Delete</a></td>-->
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
</div>
</div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case 'S':
        $m = "Successfully Insert Record";
        $t = "success";
        break;
    case 'D':
        $m = "Successfully Delete Record";
        $t = "success";
        break;
    case 'E':
        $m = "Something went wrong,Please trying again";
        $t = "error";
    case "U":
        $m = "Update Successfully...!!!";
        $t = "success";
        break;

    case "M":
        $m = "Email Send Successfully...!!!";
        $t = "success";
        break;
    case "A":
        $m = "Email or Phone alredy exist!!!";
        $t = "error";
        break;

    default:
        $m = 0;
        break;
}
?>


<script type="text/javascript">
    $(document).ready(function ()
    {
        $('#samples').dataTable({
            "aaSorting": []
        });

<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
        $("#btnsavecms").on("click", function ()
        {
            if ($("#title").val() == "")
            {
                alertify.error("Enter Title");
                return false;
            } else if ($("#description").val() == "") {
                alertify.error("Enter  Description");
                return false;
            } else {
                return true;
            }
            return false;
        });
    });

</script>







