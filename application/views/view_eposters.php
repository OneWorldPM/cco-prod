<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12">
                    <!-- CONTENT -->
                    <section class="content">
                        <div class="container" style=" background: rgba(250, 250, 250, 0.8);"> 
                            <div class="row p-b-40">
                                <div class="col-md-12" style="background-color: #B2B7BB; margin-bottom: 10px;">
                                    <h3 style="margin-bottom: 5px; color: #fff; font-weight: 700; text-transform: uppercase;"><?= $eposters->eposters_title ?></h3>
                                </div>
                                <div class="col-md-12" style="text-align: center;">
                                    <img src="<?= base_url() ?>uploads/eposters/<?= isset($eposters) ? $eposters->eposters_area_photo : "" ?>" />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- END: SECTION --> 
                </div>
            </div> 
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
    });
</script>
