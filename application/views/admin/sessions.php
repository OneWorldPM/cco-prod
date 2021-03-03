<?php
$user_role = $this->session->userdata('role');
?>

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
                                        <input type="submit" name="btn_today" class="btn btn-primary" style="margin-top: 22px;" id="filter_btn" value="Today">
                                        <input type="submit" name="btn_tomorrow" class="btn btn-primary" style="margin-top: 22px;" id="filter_btn" value="Tomorrow">
                           
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
                        <?php if ($user_role == 'super_admin') { ?>
                        <h5 class="over-title margin-bottom-15">
                            <a href="<?= base_url() ?>admin/sessions/add_sessions" class="btn btn-green add-row">
                                Add Sessions  &nbsp;<i class="fa fa-plus"></i>
                            </a>
                        </h5>
                        <?php } ?>
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
                                            <th>Presenters</th>
                                            <th>Moderators</th>
                                            <th>Stream Name</th>
                                            <th>Time Slot</th>
                                            <th>Session Notes</th>
                                            <th>Other Info</th>
                                            <th style="border-right: 0px solid #ddd;">Action</th>
                                            <th style="border-left: 0px solid #ddd; border-right: 0px solid #ddd;"></th>
                                            <th style="border-left: 0px solid #ddd;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($sessions) && !empty($sessions)) {
                                            foreach ($sessions as $val) {
                                                $toolboxItems = explode(',', $val->right_bar);
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
                                                        //print_r($val->presenter);
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                $pres_count=count($val->presenter);
                                                                echo $value->presenter_name . " <br><br>";
                                                            } 
                                                        }else{
                                                            $pres_count=0;
                                                        }
                                                        if (isset($val->groupchatPresenter) && !empty($val->groupchatPresenter)) {
                                                       
                                                            foreach ($val->groupchatPresenter as $name) {
                                                              
                                                             $groupPresCount=count($val->groupchatPresenter);
                                                           
                                                            }
                                                        }else{
                                                            $groupPresCount=0;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (isset($val->moderators) && !empty($val->moderators)) {
                                                            foreach ($val->moderators as $name) {
                                                                $mod_count=count($val->moderators);
                                                                echo $name . " <br><br>";
                                                            }      
                                                        }else{
                                                            $mod_count=0;
                                                        }
                                                        if (isset($val->groupchat) && !empty($val->groupchat)) {
                                                            foreach ($val->groupchat as $name) {
                                                              
                                                             $groupModCount=count($val->groupchat); 
                                                            } 
                                                        }else{
                                                            $groupModCount=0;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                    <small><?=(isset($val->embed_html_code))?$val->embed_html_code: '' ?></small>
                                                    </td>
                                                    <td><?= date("h:i A", strtotime($val->time_slot)) . ' - ' . date("h:i A", strtotime($val->end_time)) ?></td>
                                                    <td>  <?php if (isset($val->getNotesAll) && !empty($val->getNotesAll)){
                                                           foreach ($val->getNotesAll as $note){
                                                              $note_content= $note->note_content;
                                                            echo "".$note_content ."<br>";
                                                           }
                                                       }?></td>
                                                    <td>
                                                    
                                                             <?php $total=$mod_count+$pres_count ;  ?>
                                                        <?php $GroupChatTotal=$groupModCount+$groupPresCount ;  ?>
                                                       
                                                 
                                                        Claim Link: <i class="fa fa-circle" aria-hidden="true" style="color: <?=($val->attendee_view_links_status == 1)?'#0ab50a':'#ff2525'?>;"></i>
                                                        Toolbox: <i class="fa fa-circle" aria-hidden="true" style="color: <?=($val->tool_box_status == 1)?'#0ab50a':'#ff2525'?>;"></i><br>
                                                        <hr/>
                                                        <small>Resources: <i class="fa fa-circle" aria-hidden="true" style="color: <?=(in_array("resources", $toolboxItems))?'#0ab50a':'#ff2525'?>;"></i></small><br>
                                                        <small>Chat: <i class="fa fa-circle" aria-hidden="true" style="color: <?=(in_array("chat", $toolboxItems))?'#0ab50a':'#ff2525'?>;"></i></small><br>
                                                        <small>Notes: <i class="fa fa-circle" aria-hidden="true" style="color: <?=(in_array("notes", $toolboxItems))?'#0ab50a':'#ff2525'?>;"></i></small><br>
                                                        <small>Questions: <i class="fa fa-circle" aria-hidden="true" style="color: <?=(in_array("questions", $toolboxItems))?'#0ab50a':'#ff2525'?>;"></i></small><br>
                                                        <small><span style="float: left;">Presenters + Moderators </span> <?= (isset($total) && !empty($total) ) ?'<span style="float:right">'. $total : "".'</span>' ?></small>
                                                        <small><span style="float: left;">Chat Participants </span> <?= (isset($GroupChatTotal) && !empty($GroupChatTotal) ) ?'<span style="float:right">'. $GroupChatTotal : "".'</span>' ?></small>
                                                        <br><br><br>  <br><hr/>
                                                         <?php if(isset($val->getChatAll) && !empty($val->getChatAll)){
                                                         foreach ($val->getChatAll as $value ){
                                                            $chatModCount=explode(',',($value->moderator_id));
                                                            $chatPresCount=explode(',',($value->presenter_id));
                                                            $sessionChatCount = count  ($chatModCount)+count  ($chatPresCount);
                                                            ?>
                                                           <small><?= (isset($value) && !empty($value)) ?'<span style="float: left;">'.$value->group_chat_title.', '.$sessionChatCount.'/'.$total:""  ?><i class="fa fa-circle" aria-hidden="true" style="color: <?=($value->status==1)?'#0ab50a':(($value->status==0)?'#ff8205':'#ff2525')?>;"></i></small><br>          
                                                        <?php
                                                         } 
                                                        }
                                                         ?>
                                                    </td>
                                                    <td>
													  <a href="<?= base_url() ?>admin/sessions/view_session/<?= $val->sessions_id ?>" class="btn btn-info btn-sm" style="margin-bottom: 5px;">View</a>
                                                        <a href="<?= base_url() ?>admin/sessions/edit_sessions/<?= $val->sessions_id ?>" class="btn btn-green btn-sm">Edit</a>
                                                        <?php if ($user_role == 'super_admin') { ?>
                                                        <button class="reload-attendee btn btn-danger" app-name="<?=getAppName($val->sessions_id) ?>">Reload Attendee</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/sessions/create_poll/<?= $val->sessions_id ?>" class="btn btn-success btn-sm" style="margin-bottom: 5px;">Create Poll</a>
														<a href="<?= base_url() ?>admin/sessions/view_poll/<?= $val->sessions_id ?>" class="btn btn-info btn-sm" style="margin-bottom: 5px;">View Poll</a>
                                                        <?php if ($user_role == 'super_admin') { ?>
                                                        <a href="<?= base_url() ?>admin/sessions/view_question_answer/<?= $val->sessions_id ?>" class="btn btn-primary btn-sm" style="margin-bottom: 5px;">View Q&A</a>
                                                        <a href="<?= base_url() ?>admin/sessions/report/<?= $val->sessions_id ?>" class="btn btn-grey btn-sm" style="margin-bottom: 5px;">Report</a>
                                                        <?php } ?>
                                                        <a href="<?= base_url() ?>admin/groupchat/sessions_groupchat/<?= $val->sessions_id ?>" class="btn btn-blue btn-sm" style="margin-bottom: 5px;">Create Chat</a>
                                                        <a href="<?= base_url() ?>admin/sessions/resource/<?= $val->sessions_id ?>" style="margin-bottom: 5px;" class="btn btn-success btn-sm" >Resources</a>
                                                        <a href="<?= base_url() ?>admin/sessions/add_notes/<?= $val->sessions_id ?>" class="btn btn-light-green btn-sm"> Notes</a>
                                                    </td>
                                                    <td>
                                                         <?php if ($user_role == 'super_admin') { ?>
														 <a data-session-id="<?= $val->sessions_id ?>" class="btn btn-danger btn-sm delete_session"  style="font-size: 10px !important; margin-bottom: 5px;">Delete Session</a>
                                                         <?php } ?>
                                                         <?php if(isset($val->check_send_json_exist) && !empty($val->check_send_json_exist)){
                                                                foreach ($val->check_send_json_exist as $status) {
                                                                    if ($status->send_json_status==1) {
                                                                        ?>
                                                                         <a data-session-id="<?= $val->sessions_id?>" class="btn btn-purple btn-sm send-json" style="margin-bottom: 5px;">JSON Sent</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>  <a href="<?= base_url() ?>admin/sessions/send_json/<?= $val->sessions_id ?>" class="btn btn-success btn-sm" style="margin-bottom: 5px;">Send JSON</a><?php
                                                                    }
                                                                }
                                                         }?>
                                                         <a href="<?= base_url() ?>admin/sessions/view_json/<?= $val->sessions_id ?>" class="btn btn-purple btn-sm" style="margin-bottom: 5px;">View JSON</a>
                                                        <?php if ($user_role == 'super_admin') { ?>
                                                            <button href-url="<?= base_url() ?>admin/sessions/reset_sessions/<?= $val->sessions_id ?>" session-name="<?= $val->session_title ?>" style="margin-bottom: 5px;"  class="clear-json-btn btn btn-danger btn-sm">Clear JSON</button>
                                                        <?php } ?>
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>

<?php
$msg = $this->input->get('msg');
$m;
$t;
switch ($msg) {
    case "S":
        $m = "Successfully Cleared";
        $t = "success";
        break;
    case "A":
        $m = "Successfully Added";
        $t = "success";
        break;
    case "D":
        $m = "Successfully Deleted";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    case "JS":
        $m = "Json Sent";
        $t = "success";
        break;
    case "JE":
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
            "columnDefs": [
                { "width": "10%", "targets": 7 },
                { "width": "8%", "targets": 8 },
                { "width": "10%", "targets": 9 }
            ]
        });
  $('.datepicker').datepicker();
   
        //====== session delete =======//
        $('#sessions_table').on("click", ".delete_session", function () {
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
        
<?php if (isset($msg) && isset($t) && isset($m)): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

    $('.reload-attendee').on('click', function () {
        socket.emit('reload-attendee', $(this).attr('app-name'));
    });

    $('#sessions_table').on('click', '.clear-json-btn', function () {

        let session_name = $(this).attr('session-name');
        let href = $(this).attr('href-url');

        Swal.fire({
            title: 'Are you sure?',
            text: "This will delete all data collected from users on this session("+session_name+"), you won't be able to revert this action!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.open(href, "_self");
            }
        })
    });

    // This will confirm to send JSON if already sent
$('#sessions_table').on('click','.send-json', function () {

let sesionId = <?=$val->sessions_id?>;
let href = $(this).attr('href-url');

Swal.fire({
    title: 'Are you sure?',
    text: "This will resend the Json in this session!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Resend it!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "<?=base_url()?>admin/sessions/send_json/"+sesionId;
    }
})
});
// 
    });
</script>
