<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">LIST OF SESSIONS</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">

                        <h4 class="panel-title text-white">Sessions</h4>

                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="sessions_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Time slot</th>
                                            <th>Número de sesión</th>
                                            <th>Session title</th>
                                            <th>Presenter</th>
<!--                                            <th>Zoom Link</th>-->
<!--                                             <th>Password</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($sessions) && !empty($sessions)) {
                                            foreach ($sessions as $val) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php if ($val->sessions_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>
                                                    </td>
                                                    <td style="white-space: nowrap; text-align: right;"><?= date("m-d-Y h:i A", strtotime($val->time_slot)) .' - '. date("h:i A", strtotime($val->end_time)) ?></td>
                                                   <td><?= $val->sessions_id?></td>
                                                    <td><?= $val->session_title ?></td>
                                                    <td><?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->presenter_name." <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>presenter/onsite/view_session/<?= $val->sessions_id ?>" class="btn btn-light-azure btn-sm">View Sessions</a>
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
			  <?php if (isset($moderator_sessions) && !empty($moderator_sessions)) { ?>
			<div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Moderator Sessions</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="moderator_sessions_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Time Slot</th>
                                            <th>Session Number</th>
                                            <th>Title</th>
                                            <th>Zoom Link</th>
                                            <th>Password</th>
                                            <th>Presenter</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($moderator_sessions) && !empty($moderator_sessions)) {
                                            foreach ($moderator_sessions as $val) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php if ($val->sessions_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>
                                                    </td>
                                                    <td style="white-space: pre; text-align: right;"><?= date("m-d-Y", strtotime($val->sessions_date)) ?>  <?= date("h:i A", strtotime($val->time_slot)) . ' - ' . date("h:i A", strtotime($val->end_time)) ?></td>
                                                   <td><?=$val->sessions_id?> </td>
                                                    <td style="text-align: left;"><?= $val->session_title ?></td>
                                                     <td><a target="_blank" href="<?= $val->zoom_link ?>"><?= $val->zoom_link ?></a></td>
                                                    <td><?= $val->zoom_password ?></td>
                                                    <td style="text-align: left;">
                                                        <?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->presenter_name . " <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>presenter/onsite/view_session/<?= $val->sessions_id ?>" class="btn btn-light-azure btn-sm">View Sessions</a>
                                                       <!-- <a href="<?/*= base_url() */?>presenter/groupchat/sessions_groupchat/<?/*= $val->sessions_id */?>" class="btn btn-grey btn-sm" style="margin: 3px;">Create Chat</a>
                                                        <a href="<?/*= base_url() */?>presenter/sessions/view_question_answer/<?/*= $val->sessions_id */?>" class="btn btn-grey btn-sm" style="margin: 3px;">View Questions</a>-->
                                                        <!-- <a href="<?= base_url() ?>presenter/sessions/create_poll/<?= $val->sessions_id ?>" class="btn btn-grey btn-sm" style="margin: 3px;">Create Poll</a> -->
                                                       <!-- <a href="<?/*= base_url() */?>presenter/sessions/view_poll/<?/*= $val->sessions_id */?>" class="btn btn-grey btn-sm" style="margin: 3px;">View Results</a>-->
                                                      
                                                        <?php if ($val->sessions_type_status == "Private") { ?>
                                                            <a href="<?= base_url() ?>presenter/sessions/user_sign_up/<?= $val->sessions_id ?>" class="btn btn-grey btn-sm" style="margin: 3px;">Registrants</a>
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
 <?php } ?>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sessions_table").dataTable({
            "ordering": false,
            "language": {
                // url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });
        
         $("#moderator_sessions_table").dataTable({
            "ordering": false,
             "language": {
                 // url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
             }
        });
    });
</script>
