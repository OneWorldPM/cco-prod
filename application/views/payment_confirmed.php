<section class="parallax">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12 background-white" style="border-radius: 10px; padding: 0px 60px 20px 60px;">
                    <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Payment Confirmed</h5>
                </div>
                <input type="hidden" id="cust_id" value="<?= $cust_id ?>">
                <div class="col-md-12" style="text-align: center;">
                    <p><?php
                        if (!empty($cms_details)) {
                            echo $cms_details->description;
                        }
                        ?></p>
                    <img src="<?= base_url() ?>front_assets/images/svg-loaders/spin.svg" alt="Polo Logo" width="5%">
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            var cust_id = $("#cust_id").val();
            window.location.href = '<?= base_url() ?>login/register_login/'+cust_id;
        }, 3000);
    });
</script>
