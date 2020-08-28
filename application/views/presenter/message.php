<style>
    .messages-item{
        padding: 2px 2px 2px 2px !important;
    }
</style>
<?php
if (isset($messages) && !empty($messages)) {
    if (count($messages) > 0) {
        foreach ($messages as $val) {
            if ($val->message_status == 'presenter') {
                $presenter_data = $this->common->get_presenter_data($val->user_id);
                ?>
                <li class="messages-item">

                    <?php
                    if (isset($presenter_data) && !empty($presenter_data)) {
                        if ($presenter_data->presenter_photo != "") {
                            ?>
                            <img class="messages-item-avatar bordered border-primary" style="float:right" alt="admin" src="<?= base_url() ?>uploads/presenter_photo/<?= $presenter_data->presenter_photo ?>">
                        <?php } else { ?>
                            <img class="messages-item-avatar bordered border-primary" style="float:right; height: 40px; width: 40px;" alt="admin" src="<?= base_url() ?>assets/images/Avatar.png">
                            <?php
                        }
                    } else {
                        ?>
                        <img class="messages-item-avatar bordered border-primary" style="float:left; height: 40px; width: 40px;" alt="" src="<?= base_url() ?>assets/images/Avatar.png">   
                    <?php } ?>
                        <div>
                    <span class="messages-item-from" style="text-transform: capitalize; text-align: right; padding-right: 50px;"><?= (isset($presenter_data) && !empty($presenter_data)) ? $presenter_data->presenter_name : 'Presenter' ?></span>
                    <div class="messages-item-time-left">
                        <span class="text" style="font-size: 10px;"><?= date('d-m-Y H:i:s', strtotime($val->message_date)) ?></span>
                    </div>
                    <span class="messages-item-subject" style="font-size: 12px; text-align: right; padding-right: 50px; word-break: break-word;"><?= $val->message ?></span>
                </li>
            <?php } else if ($val->message_status == 'admin') { ?>
                <li class="messages-item" style="">
                    <img class="messages-item-avatar bordered border-primary" style="float:left; height: 40px; width: 40px;" alt="Admin" src="<?= base_url() ?>assets/images/Avatar.png">
                    <span class="messages-item-from" style="text-transform: capitalize !important">Admin</span>
                    <div class="messages-item-time">
                        <span class="text" style="font-size: 10px;"><?= date('d-m-Y H:i:s', strtotime($val->message_date)) ?></span>
                    </div>
                    <span class="messages-item-subject" style="font-size: 12px; word-break: break-word;"><?= $val->message ?></span>
                </li>
                <?php
            } else {
                $customer_data = $this->common->get_user_details($val->user_id);
                ?>
                <li class="messages-item" style="">
                    <?php
                    if (isset($customer_data) && !empty($customer_data)) {
                        if ($customer_data->profile != "") {
                            ?>
                            <img class="messages-item-avatar bordered border-primary" style="float:left" alt="<?= $customer_data->first_name ?>" src="<?= base_url() ?>uploads/customer_profile/<?= $customer_data->profile ?>">
                        <?php } else { ?>
                            <img class="messages-item-avatar bordered border-primary" style="float:left; height: 40px; width: 40px;" alt="<?= $customer_data->first_name ?>" src="<?= base_url() ?>assets/images/Avatar.png">
                            <?php
                        }
                    } else {
                        ?>
                        <img class="messages-item-avatar bordered border-primary" style="float:left; height: 40px; width: 40px;" alt="" src="<?= base_url() ?>assets/images/Avatar.png">
                    <?php } ?>
                    <span class="messages-item-from" style="text-transform: capitalize !important"><?= (isset($customer_data) && !empty($customer_data)) ? $customer_data->first_name . ' ' . $customer_data->last_name : 'User' ?></span>
                    <div class="messages-item-time">
                        <span class="text" style="font-size: 10px;"><?= date('d-m-Y H:i:s', strtotime($val->message_date)) ?></span>
                    </div>
                    <span class="messages-item-subject" style="font-size: 12px; word-break: break-word;"><?= $val->message ?></span>
                </li>
                <?php
            }
        }
    } else {
        ?>
        <li class="messages-item text-center">
            <h4>No Message Conversation</h4>
        </li>
        <?php
    }
}
?>