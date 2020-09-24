<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of ePosters</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">ePosters</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <h5 class="over-title margin-bottom-15">
                            <a href="<?= base_url() ?>admin/eposters/add_eposters" class="btn btn-green add-row">
                                Add ePosters  &nbsp;<i class="fa fa-plus"></i>
                            </a>
                        </h5>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="sessions_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Date</th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Presenter</th>
                                            <th>Assigned ID</th>
                                            <th>JPEG Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($eposters) && !empty($eposters)) {
                                            foreach ($eposters as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= date("Y-m-d", strtotime($val->reg_date)) ?></td>
                                                    <td>
                                                        <?php if ($val->eposters_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/eposters/<?= $val->eposters_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>    
                                                    </td>
                                                    <td><?= $val->eposters_title ?></td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->presenter_name . " <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $val->assigned_id ?></td>
                                                    <td>
                                                        <?php if ($val->eposters_area_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/eposters/<?= $val->eposters_area_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>    
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/eposters/view_eposters/<?= $val->eposters_id ?>" class="btn btn-info btn-sm">View</a>
                                                        <a href="<?= base_url() ?>admin/eposters/edit_eposters/<?= $val->eposters_id ?>" class="btn btn-green btn-sm">Edit</a>
                                                        <a href="<?= base_url() ?>admin/eposters/delete_eposters/<?= $val->eposters_id ?>" class="btn btn-danger btn-sm">Delete</a>
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
    </div>
</div>
</div>
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "S":
        $m = "Successfully Cleared";
        $t = "success";
        break;
    case "U":
        $m = "Successfully Update";
        $t = "success";
        break;
    case "D":
        $m = "Record Successfully Delete";
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#sessions_table").dataTable({
            "ordering": false,
        });

<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
    });
</script>