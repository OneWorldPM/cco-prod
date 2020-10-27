<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of Sessions</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
		    <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Filter Data</h4>
                        <div class="panel-tools">
                            <a data-original-title="Collapse" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-collapse" href="#"><i class="ti-minus collapse-off"></i><i class="ti-plus collapse-on"></i></a>
                        </div>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <form action="<?= base_url() ?>admin/sessions/filter" name="filter_frm" id="filter_frm" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Range:</label>
                                         <div class="input-group input-daterange datepicker">
                                            <input type="text" placeholder="Start Date" name="start_date" value="<?= ($this->session->userdata('start_date') != "") ? date("m/d/Y",strtotime($this->session->userdata('start_date'))) : ""  ?>" id="from_date" class="form-control">
                                            <span class="input-group-addon bg-primary">to</span>
                                            <input type="text" placeholder="End Date" name="end_date" value="<?= ($this->session->userdata('end_date') != "") ? date("m/d/Y",strtotime($this->session->userdata('end_date'))) : ""  ?>" id="to_date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Session Type:</label>
                                        <select name="session_type" id="session_type" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            if (!empty($session_types)) {
                                                foreach ($session_types as $type) {
                                                    if ($type->sessions_type != '') {
                                                        ?>
                                                        <option value="<?= $type->sessions_type_id ?>"><?= $type->sessions_type ?></option>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" name="filter_btn" class="btn btn-primary" style="margin-top: 22px;" id="filter_btn" value="Submit">
                                </div>
                                <div class="col-md-2">
                                    <a href="<?= base_url() ?>admin/sessions/filter_clear" class="btn btn-danger" style="margin-top: 22px;">Clear</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Sessions</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <h5 class="over-title margin-bottom-15">
                            <a href="<?= base_url() ?>admin/sessions/add_sessions" class="btn btn-green add-row">
                                Add Sessions  &nbsp;<i class="fa fa-plus"></i>
                            </a>
                        </h5>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="sessions_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Date</th>
                                            <th>Unique Identifier</th>
                                            <th>CCO Event ID</th>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Presenter</th>
                                            <th>Zoom Link</th>
                                            <th>Title</th>
                                            <th>Time Slot</th>
                                            <th style="border-right: 0px solid #ddd;">Action</th>
                                            <th style="border-left: 0px solid #ddd; border-right: 0px solid #ddd;"></th>
                                            <th style="border-left: 0px solid #ddd;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($sessions) && !empty($sessions)) {
                                            foreach ($sessions as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= date("Y-m-d", strtotime($val->sessions_date)) ?></td>
                                                    <td><?= $val->sessions_id ?></td>
                                                    <td><?= $val->cco_envent_id ?></td>
                                                    <td>
                                                        <?php if ($val->sessions_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>    
                                                    </td>
                                                    <td><?= $val->session_title ?></td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->presenter_name . " <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><a target="_blank" href="<?= $val->zoom_link ?>"><?= $val->zoom_link ?></a></td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->title . " <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= date("h:i A", strtotime($val->time_slot)) . ' - ' . date("h:i A", strtotime($val->end_time)) ?></td>
                                                    <td>
													  <a href="<?= base_url() ?>admin/sessions/view_session/<?= $val->sessions_id ?>" class="btn btn-info btn-sm" style="margin-bottom: 5px;">View Session</a>
                                                        <a href="<?= base_url() ?>admin/sessions/edit_sessions/<?= $val->sessions_id ?>" class="btn btn-green btn-sm">Edit</a>
														  
                                                        </td>
                                                        <td>
                                                        <a href="<?= base_url() ?>admin/sessions/create_poll/<?= $val->sessions_id ?>" class="btn btn-success btn-sm" style="margin-bottom: 5px;">Create Poll</a>
														<a href="<?= base_url() ?>admin/sessions/view_poll/<?= $val->sessions_id ?>" class="btn btn-info btn-sm" style="margin-bottom: 5px;">View Poll</a>
                                                        <a href="<?= base_url() ?>admin/sessions/view_question_answer/<?= $val->sessions_id ?>" class="btn btn-primary btn-sm" style="margin-bottom: 5px;">View Q&A</a>
                                                        <a href="<?= base_url() ?>admin/sessions/report/<?= $val->sessions_id ?>" class="btn btn-grey btn-sm" style="margin-bottom: 5px;">Report</a>
                                                        <a href="<?= base_url() ?>admin/groupchat/sessions_groupchat/<?= $val->sessions_id ?>" class="btn btn-blue btn-sm" style="margin-bottom: 5px;">Create Chat</a>
                                                        <a href="<?= base_url() ?>admin/sessions/resource/<?= $val->sessions_id ?>" class="btn btn-success btn-sm">Resources</a>
                                                        </td>
                                                        <td>
														 <a data-session-id="<?= $val->sessions_id ?>" class="btn btn-danger btn-sm delete_session"  style="font-size: 10px !important; margin-bottom: 5px;">Delete Session</a>
                                                            <a href="<?= base_url() ?>admin/sessions/send_json/<?= $val->sessions_id ?>" class="btn btn-purple btn-sm" style="margin-bottom: 5px;">Send to CCO</a>
                                                        <a href="<?= base_url() ?>admin/sessions/view_json/<?= $val->sessions_id ?>" class="btn btn-purple btn-sm" style="margin-bottom: 5px;">View JSON</a>
														 <a href="<?= base_url() ?>admin/sessions/reset_sessions/<?= $val->sessions_id ?>" style="margin-bottom: 5px;"  class="btn btn-purple btn-sm">Clear JSON</a>
														 <a href="<?= base_url() ?>admin/sessions/flash_report/<?= $val->sessions_id ?>" style="margin-bottom: 5px;" class="btn btn-info btn-sm">Flash Report</a>
                                                        <a href="<?= base_url() ?>admin/sessions/polling_report/<?= $val->sessions_id ?>" class="btn btn-azure btn-sm">Polling Report</a>
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
  $('.datepicker').datepicker();
   
        //====== session delete =======//
        $(".delete_session").on("click", function () {
            var sesionId = $(this).data("session-id");
            alertify.confirm("Are you sure you want to delete this session?", function (e) {
                if (e)
                {
                    $.post("<?= base_url() ?>admin/sessions/delete_sessions",{"sesionId":sesionId},function (response){
                        if(response=="success"){
                            alertify.success('Session Deleted!');
                            location.reload();
                        }
                    });
                }
            });
        });
        
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
    });
</script>