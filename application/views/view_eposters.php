<style>
    .angle_vertical_center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
    <div class="container container-fullscreen" style="padding: 0px;">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12" style="">
                    <!-- CONTENT -->
                    <section class="content" style="padding: 10px 0">
                        <div class="container" style=" background: rgba(250, 250, 250, 0.8);"> 
                            <div class="row p-b-40">
                                <div class="col-md-12" style="background-color: #B2B7BB; margin-bottom: 10px; ">
                                    <h3 style="margin-bottom: 5px; color: #fff; font-weight: 700; text-transform: uppercase;"><?= $eposters->eposters_title ?></h3>
                                </div>
                                <div class="col-md-12" style="padding-left: 0px; padding-right: 0px">
                                    <div class="col-md-1" style="text-align: center; padding-left: 0px; padding-right: 0px">
                                        <a href="<?= base_url() ?>eposters/previous/<?= isset($eposters) ? $eposters->eposters_id : "" ?>"><i class="fa fa-angle-left" style="font-size: 8pc; margin-top: 180px;"></i></a>
                                    </div>
                                    <div class="col-md-10" style="text-align: center; padding-left: 0px; padding-right: 0px">
                                        <img src="<?= base_url() ?>uploads/eposters/<?= isset($eposters) ? $eposters->eposters_area_photo : "" ?>" width="100%"/>
                                        <a href="<?= base_url() ?>eposters" class="button btn small" style="background-color: #c3c3c3; border-color: #c3c3c3; font-size: 20px; text-transform: unset;"><span>Return to ePoster Listing</span></a>
                                    </div>
                                    <div class="col-md-1" style="text-align: center; padding-left: 0px; padding-right: 0px">
                                        <a href="<?= base_url() ?>eposters/next/<?= isset($eposters) ? $eposters->eposters_id : "" ?>"><i class="fa fa-angle-right" style="font-size: 8pc; margin-top: 180px;"></i></a>
                                    </div>
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
