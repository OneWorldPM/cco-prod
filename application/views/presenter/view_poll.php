<style>
    #example_wrapper .dt-buttons .buttons-csv{
        background-color: #1fbba6;
        padding: 5px 15px 5px 15px;

    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Poll</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center" id="user">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Question</th>
											 <th>Slide Number</th>
                                            <th>Poll Type</th>
                                            <th>Options</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($poll_data) && !empty($poll_data)) {
                                            foreach ($poll_data as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= $val->question ?></td>
													 <td><?= $val->slide_number ?></td>
                                                    <td><?= $val->poll_type ?></td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->option) && !empty($val->option)) {
                                                            foreach ($val->option as $value) {
                                                                ?>
                                                                <?= $value->option ?>,
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td> 
                                                        <a class="btn btn-primary btn-sm" href="<?= base_url() . 'presenter/sessions/editPollQuestion/' . $val->sessions_poll_question_id ?>">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="<?= base_url() . 'presenter/sessions/deletePollQuestion/' . $val->sessions_poll_question_id ?>">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="<?= base_url() . 'presenter/sessions/poll_redo/' . $val->sessions_poll_question_id ?>">
                                                            <i class="fa fa-check"></i> Redo
                                                        </a>
                                                        <?php if ($val->status == 0) { ?>
                                                            <a href="<?= base_url() ?>presenter/sessions/open_poll/<?= $val->sessions_poll_question_id ?>" class="btn btn-success btn-sm">Open Poll</a>
                                                        <?php } else if ($val->status == 1) { ?>
                                                            <a href="<?= base_url() ?>presenter/sessions/close_poll/<?= $val->sessions_poll_question_id ?>" class="btn btn-warning btn-sm">Close Poll</a>
                                                            <a href="<?= base_url() ?>presenter/sessions/show_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-primary btn-sm">Show Results</a>
                                                           <a href="<?= base_url() ?>presenter/sessions/start_timer/<?= $val->sessions_poll_question_id ?>" class="btn btn-blue btn-sm">Start Timer</a>
                                                        <?php } else if ($val->status == 2) { ?>
                                                            <a href="<?= base_url() ?>presenter/sessions/close_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-warning btn-sm">Close Results</a>
                                                        <?php } else if ($val->status == 4) { ?>    
                                                            <a href="<?= base_url() ?>presenter/sessions/show_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-primary btn-sm">Show Results</a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url() ?>presenter/sessions/show_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-primary btn-sm">Show Results Again</a>
                                                            <a href="<?= base_url() ?>presenter/sessions/view_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-beige btn-sm">View</a>
                                                        <?php } ?>    
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
        $m = "Poll Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Poll Updated Successfully...!!!";
        $t = "success";
        break;
    case "A":
        $m = "Already opened other poll..!";
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
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $("#user").dataTable({
            "ordering": false,
        });

    });
</script>








