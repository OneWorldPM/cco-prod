<?php
if (isset($messages) && !empty($messages)) {
    if (count($messages) > 0) {
        foreach ($messages as $val) {
            if ($val->message_status == 'presenter') {
                $presenter_data = $this->common->get_presenter_data($val->user_id);
                ?>
                <div class="col-md-12">
                    <div class="col-md-12" style="padding-bottom: 5px; margin-bottom: 5px; border-style: outset;">
                        <div class="col-md-3" style="padding-left: 0px; padding-right: 5px; text-align: center;">
                            <?php
                            if (isset($presenter_data) && !empty($presenter_data)) {
                                if ($presenter_data->presenter_photo != "") {
                                    ?>
                                    <img class="img-circle" width="100%" alt="admin" src="<?= base_url() ?>uploads/presenter_photo/<?= $presenter_data->presenter_photo ?>">
                                <?php } else { ?>
                                    <img class="img-circle" width="100%" alt="admin" src="<?= base_url() ?>assets/images/Avatar.png">
                                    <?php
                                }
                            } else {
                                ?>
                                <img class="img-circle" width="100%" alt="admin" src="<?= base_url() ?>assets/images/Avatar.png">
                            <?php } ?>       
                            <small><b><?= (isset($presenter_data) && !empty($presenter_data)) ? $presenter_data->first_name : 'Presenter'; ?></b></small>
                        </div>
                        <div class="col-md-9" style="text-align: left; padding-left: 0px; padding-right: 0px; ">
                            <p><?= $val->message ?></p>
                        </div>
                    </div>
                </div>
            <?php } else if ($val->message_status == 'admin') { ?>
                <div class="col-md-12">
                    <div class="col-md-12" style="padding-bottom: 5px; margin-bottom: 5px; border-style: outset;">
                        <div class="col-md-3" style="padding-left: 0px; padding-right: 5px; text-align: center;">
                            <img class="img-circle" width="80%" alt="admin" src="<?= base_url() ?>assets/images/Avatar.png">
                            <small><b>Admin</b></small>
                        </div>
                        <div class="col-md-9" style="text-align: left; padding-left: 0px; padding-right: 0px; ">
                            <p><?= $val->message ?></p>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                $customer_data = $this->common->get_user_details($val->user_id);
                ?>
                <?php if ($val->user_id == $this->session->userdata('cid')) { ?>
                    <div class="col-md-12">
                        <div class="col-md-12" style="padding-bottom: 5px; margin-bottom: 5px; border-style: outset;">
                            <div class="col-md-9" style="padding-left: 0px; padding-right: 0px;">
                                <p style="text-align: right;"><?= $val->message ?></p>
                            </div>
                            <div class="col-md-3" style="padding-left: 5px; padding-right: 0px; text-align: center;">
                                <?php
                                if (isset($customer_data) && !empty($customer_data)) {
                                    if ($customer_data->profile != "") {
                                        ?>
                                        <img class="img-circle" width="100%" alt="<?= $customer_data->first_name ?>" src="<?= base_url() ?>uploads/customer_profile/<?= $customer_data->profile ?>">
                                    <?php } else { ?>
                                        <img class="img-circle" width="100%" alt="<?= $customer_data->first_name ?>" src="<?= base_url() ?>assets/images/Avatar.png">
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <img class="img-circle" width="100%" alt="" src="<?= base_url() ?>assets/images/Avatar.png">  
                                <?php } ?>        
                                <small><b><?= (isset($customer_data) && !empty($customer_data)) ? $customer_data->first_name : 'User' ?></b></small>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <div class="col-md-12" style="padding-bottom: 5px; margin-bottom: 5px; border-style: outset;">
                            <div class="col-md-3" style="padding-left: 0px; padding-right: 5px; text-align: center;">
                                <?php
                                if (isset($customer_data) && !empty($customer_data)) {
                                    if ($customer_data->profile != "") {
                                        ?>
                                        <img class="img-circle" width="100%" alt="<?= $customer_data->first_name ?>" src="<?= base_url() ?>uploads/customer_profile/<?= $customer_data->profile ?>">
                                    <?php } else { ?>
                                        <img class="img-circle" width="100%" alt="<?= $customer_data->first_name ?>" src="<?= base_url() ?>assets/images/Avatar.png">
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <img class="img-circle" width="100%" alt="" src="<?= base_url() ?>assets/images/Avatar.png">   
                                <?php } ?>        
                                <small><b><?= (isset($customer_data) && !empty($customer_data)) ? $customer_data->first_name : 'User' ?></b></small>
                            </div>
                            <div class="col-md-9" style="padding-left: 0px; padding-right: 0px;">
                                <p style="text-align: left;"><?= $val->message ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    } else {
        ?>
        <div class="col-md-12">
            <h4>No Message Conversation</h4>
        </div>
        <?php
    }
}
?>