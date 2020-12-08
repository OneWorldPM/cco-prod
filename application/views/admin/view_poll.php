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
                                            <th>Poll Name</th>
                                            <th>Poll Type</th>
                                            <th>Slide Number</th>
                                            <th>Modify</th>
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
                                                    <td><?= $val->poll_name ?></td>
                                                    <td><?= $val->poll_type ?></td>
                                                    <td><?= $val->slide_number ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="<?= base_url() . 'admin/sessions/editPollQuestion/' . $val->sessions_poll_question_id ?>">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                        <button class="delete-poll btn btn-danger btn-sm" session-id="<?=$session_id?>" href="<?= base_url() . 'admin/sessions/deletePollQuestion/' . $val->sessions_poll_question_id ?>">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                        </button>
                                                        <a class="btn btn-warning btn-sm" href="<?= base_url() . 'admin/sessions/poll_redo/' . $val->sessions_poll_question_id ?>">
                                                            <i class="fa fa-check"></i> Redo
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php if ($val->status == 0) { ?>
                                                            <a href="<?= base_url() ?>admin/sessions/open_poll/<?= $val->sessions_poll_question_id ?>" class="btn btn-success btn-sm">Open Poll</a>
                                                        <?php } else if ($val->status == 1) { ?>
                                                            <a href="<?= base_url() ?>admin/sessions/start_timer/<?= $val->sessions_poll_question_id ?>" class="btn btn-blue btn-sm">Start Timer</a>
                                                            <a href="<?= base_url() ?>admin/sessions/close_poll/<?= $val->sessions_poll_question_id ?>" class="btn btn-danger btn-sm">Close Poll</a>
                                                            <a href="<?= base_url() ?>admin/sessions/show_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-primary btn-sm">Show Results</a>
                                                        <?php } else if ($val->status == 2) { ?>
                                                            <a href="<?= base_url() ?>admin/sessions/close_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-warning btn-sm">Close Results</a>
                                                        <?php } else if ($val->status == 4) { ?>    
                                                            <a href="<?= base_url() ?>admin/sessions/show_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-primary btn-sm">Show Results</a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url() ?>admin/sessions/show_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-info btn-sm">Show Results Again</a>
                                                            <a href="<?= base_url() ?>admin/sessions/view_result/<?= $val->sessions_poll_question_id ?>" class="btn btn-beige btn-sm">View</a>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $("#user").dataTable({
            "ordering": false,
            "pageLength": 25,
            "columnDefs": [
                { "width": "40%", "targets": 0 }
            ]
        });

    });

    $('.delete-poll').on('click', function () {
        var session_id = $(this).attr('session-id');
        var url = $(this).attr('href')+'/'+session_id;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    });

</script>


<!-- ************* codes by Athul- DO NOT MODIFY WITHOUT CONSENT *************-->
<script>

    var app_name = "<?=getAppName($session_id) ?>";


    if (getParameters().pollAction && getParameters().pollAction == 'opened')
    {
        if (!socket){
            alertify.error('Unable to load socket config, poll might not have been opened!');
        }else{
            socket.emit('poll_opened', app_name);
        }
    }

    if (getParameters().pollAction && getParameters().pollAction == 'closed')
    {
        if (!socket){
            alertify.error('Unable to load socket config, poll might not have been closed!');
        }else{
            socket.emit('poll_closed', app_name);
        }
    }

    if (getParameters().pollAction && getParameters().pollAction == 'show_results')
    {
        if (!socket){
            alertify.error('Unable to load socket config, results might not have been shown!');
        }else{
            socket.emit('show_poll_results', app_name);
        }
    }

    if (getParameters().pollAction && getParameters().pollAction == 'close_results')
    {
        if (!socket){
            alertify.error('Unable to load socket config, results might not have been closed!');
        }else{
            socket.emit('close_poll_results', app_name);
        }
    }

    if (getParameters().pollAction && getParameters().pollAction == 'start_timer')
    {
        if (!socket){
            alertify.error('Unable to load socket config, timer might not have been started!');
        }else{
            socket.emit('start_poll_timer', app_name);
        }
    }


    function getParameters() {
        var searchString = window.location.search.substring(1),
            params = searchString.split("&"),
            hash = {};

        if (searchString == "") return {};
        for (var i = 0; i < params.length; i++) {
            var val = params[i].split("=");
            hash[unescape(val[0])] = unescape(val[1]);
        }

        return hash;
    }
</script>








