<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Add ePosters</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Add New ePosters</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                            <div class="col-md-12">
                                <form name="add_eposters_frm" id="add_eposters_frm" action="<?= isset($eposters_edit) ? base_url() . "admin/eposters/updateEposters" : base_url() . "admin/eposters/createEposters" ?>" method="POST" enctype="multipart/form-data">
                                    <?php if (isset($eposters_edit)) { ?>
                                        <input type="hidden" name="eposters_id" value="<?= $eposters_edit->eposters_id ?>">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="text-large">ePosters Title:</label>
                                        <input type="text" name="eposters_title" id="eposters_title" value="<?= (isset($eposters_edit) && !empty($eposters_edit) ) ? $eposters_edit->eposters_title : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Presenter:</label>
                                        <select class="form-control" multiple id="select_presenter_id" name="select_presenter_id[]">
                                            <option selected="" value="">Select Presenter</option> 
                                            <?php
                                            if (isset($presenter) && !empty($presenter)) {
                                                foreach ($presenter as $val) {
                                                    ?>
                                                    <option value="<?= $val->presenter_id ?>" <?= (isset($eposters_edit) && !empty($eposters_edit) ) ? in_array($val->presenter_id, explode(",", $eposters_edit->presenter_id)) ? "selected" : "" : "" ?>><?= $val->presenter_name ?></option> 
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="row" >
                                        <label class="col-md-12 text-large">Select Sessions Tracks</label>
                                        <?php
                                        if (isset($session_tracks) && !empty($session_tracks)) {
                                            foreach ($session_tracks as $val) {
                                                if ($val->sessions_tracks != "") {
                                                    ?>
                                                    <div class="form-group col-md-6" style="color: #000;">
                                                        <input type="checkbox" class="col-md-1"  name="sessions_tracks[]" <?= (isset($eposters_edit) && !empty($eposters_edit)) ? in_array($val->sessions_tracks_id, explode(",", $eposters_edit->sessions_tracks_id)) ? 'checked' : '' : '' ?> id="sessions_tracks" value="<?= $val->sessions_tracks_id ?>"> <?= $val->sessions_tracks ?><br>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Eposters Photo</label>
                                        <input type="file" class="form-control" name="eposters_photo" id="eposters_photo">
                                        <?php
                                        if (isset($eposters_edit)) {
                                            if ($eposters_edit->eposters_photo != "") {
                                                ?>
                                                <img src="<?= base_url() ?>uploads/eposters/<?= $eposters_edit->eposters_photo ?>" style="height: 100px; width: 100px;">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Select JPEG</label>
                                        <input type="file" class="form-control" name="eposters_area_photo" id="eposters_area_photo">
                                        <?php
                                        if (isset($eposters_edit)) {
                                            if ($eposters_edit->eposters_area_photo != "") {
                                                ?>
                                                <img src="<?= base_url() ?>uploads/eposters/<?= $eposters_edit->eposters_area_photo ?>" style="height: 100px; width: 100px;">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Assigned ID :</label>
                                        <input type="text" name="assigned_id" id="assigned_id" value="<?= (isset($eposters_edit) && !empty($eposters_edit) ) ? $eposters_edit->assigned_id : "" ?>" class="form-control" placeholder="Assigned Id">
                                    </div>
                                    <div class="form-group">
                                        <h5 class="over-title margin-bottom-15" style="text-align: center;">
                                            <button type="submit" id="btn_eposters" name="btn_eposters" class="btn btn-green add-row">Submit</button>
                                        </h5>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#btn_eposters").on("click", function ()
        {
            if ($("#eposters_title").val() == "")
            {
                alertify.error("Enter ePosters Title");
                return false;
            } else if ($("#select_presenter_id").val() == "") {
                alertify.error("Select presenter");
                return false;
<?php if (!isset($session_tracks)) { ?>
                } else if ($("#eposters_photo").val() == "") {
                    alertify.error("Select Eposters Photo");
                    return false;
                } else if ($("#eposters_area_photo").val() == "") {
                    alertify.error("Select JPEG Photo");
                    return false;
<?php } ?>
            } else if ($("#assigned_id").val() == "") {
                alertify.error("Enter Assigned ID");
                return false;
            } else {
                return true;
            }
            return false;
        });

    });
</script>