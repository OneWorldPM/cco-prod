<?php
$this->load->helper('string');
?>
<!-- end: CLIP-TWO JAVASCRIPTS --> 
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="box-register" style="margin: 0px 0 65px 0;">
                        <form class="form-register" id="frm_register" name="frm_register" method="post" action="<?= isset($edit_user) ? base_url() . "admin/groupchat/updateNewGroupChat" : base_url() . "admin/groupchat/addNewGroupChat" ?>">
                            <fieldset style="margin: 0px 0 20px 0">
                                <h3 class="box-title">Create Group Chat</h3>
                                <input type="hidden" name="group_chat_number" id="group_chat_number" value="<?= random_string('alnum', 8); ?>">
                                <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions_id; ?>">
                                <input type="hidden" name="sessions_group_chat_id" id="sessions_group_chat_id" value="<?= isset($edit_user) ? $edit_user->sessions_group_chat_id : ''; ?>">
                                <div class="form-group">
                                    <label class="control-label">Chat Title :</label>
                                    <input type="text" class="form-control" name="chat_title" id="chat_title" placeholder="Chat Title"  value="<?= isset($edit_user) ? $edit_user->group_chat_title : ''; ?>">
                                    <span id="errorchat_title" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Multiple Presenter : </label>
                                    <select name="presenters[]" id="presenters" class="form-control" multiple>
                                        <?php
                                        if (isset($edit_user)) {
                                            if (isset($presenter->presenter) && !empty($presenter->presenter)) {
                                                foreach ($presenter->presenter as $val) {
                                                    $explode_array = explode(",", $edit_user->presenter_id);
                                                    if (in_array($val->presenter_id, $explode_array)) {
                                                        ?>
                                                        <option selected value="<?= $val->presenter_id ?>"><?= $val->presenter_name ?></option>
                                                    <?php } else { ?> 
                                                        <option value="<?= $val->presenter_id ?>"><?= $val->presenter_name ?></option>
                                                        <?php
                                                    }
                                                }
                                            }
                                        } else {
                                            if (isset($presenter->presenter) && !empty($presenter->presenter)) {
                                                foreach ($presenter->presenter as $val) {
                                                    ?>
                                                    <option value="<?= $val->presenter_id ?>"><?= $val->presenter_name ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span id="errorpresenter" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Select Multiple Moderator : </label>
                                    <select name="moderator[]" id="moderator" class="form-control" multiple>
                                        <?php
                                        if (isset($edit_user)) {
                                            if (isset($moderator->moderator) && !empty($moderator->moderator)) {
                                                foreach ($moderator->moderator as $val) {
                                                    $explode_array = explode(",", $edit_user->moderator_id);
                                                    if (in_array($val->presenter_id, $explode_array)) {
                                                        ?>
                                                        <option selected value="<?= $val->presenter_id ?>"><?= $val->presenter_name ?></option>
                                                    <?php } else { ?> 
                                                        <option value="<?= $val->presenter_id ?>"><?= $val->presenter_name ?></option>
                                                        <?php
                                                    }
                                                }
                                            }
                                        } else {
                                            if (isset($moderator->moderator) && !empty($moderator->moderator)) {
                                                foreach ($moderator->moderator as $val) {
                                                    ?>
                                                    <option value="<?= $val->presenter_id ?>"><?= $val->presenter_name ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span id="errormoderator" style="color:red;"></span>
                                </div>
                                <!--                                <div class="form-group">
                                                                    <label class="control-label">Select Multiple Users : </label>
                                                                    <select name="users[]" id="users" class="form-control" multiple>
                                <?php
                                if (isset($edit_user)) {
                                    if (isset($users) && !empty($users)) {
                                        foreach ($users as $val) {
                                            $explode_array = explode(",", $edit_user->users_id);
                                            if (in_array($val->cust_id, $explode_array)) {
                                                ?>
                                                                                                                                        <option selected value="<?= $val->cust_id ?>"><?= $val->first_name . ' ' . $val->last_name ?></option>
                                            <?php } else { ?> 
                                                                                                                                        <option value="<?= $val->cust_id ?>"><?= $val->first_name . ' ' . $val->last_name ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                } else {
                                    if (isset($users) && !empty($users)) {
                                        foreach ($users as $val) {
                                            ?>
                                                                                                                        <option value="<?= $val->cust_id ?>"><?= $val->first_name . ' ' . $val->last_name ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                                                    </select>
                                                                    <span id="errorusers" style="color:red;"></span>
                                                                </div>-->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary btn-primary-big form-control" id="btn_register">
                                        Submit <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#btn_register").on("click", function () {
            if ($("#chat_title").val().trim() == "")
            {
                $("#errorchat_title").text("Please Enter Chat Title").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#presenters").val() == null) {
                $("#errorpresenter").text("Please Select Presenter").fadeIn('slow').fadeOut(5000);
                return false;
             } else if ($("#moderator").val() == null) {
                $("#errormoderator").text("Please Select Moderator").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });
</script>
<!-- end: JavaScript Event Handlers for this page -->
