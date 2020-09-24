<style>
    fieldset {
        background: #ffffff;
        border-radius: 0px;
        border-radius: 5px;
        margin: 0px 0 0px 0; 
        padding: 10px;
        position: relative;
    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw" style="padding: 6px;">
            <div class="panel panel-primary" id="panel5">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="panel-title text-white"><?= $eposters->eposters_title ?></h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important; padding: 10px;">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <img src="<?= base_url() ?>uploads/eposters/<?= isset($eposters) ? $eposters->eposters_area_photo : "" ?>" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>