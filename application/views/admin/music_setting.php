<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Music Setting</h1>
                </div>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-light-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Music Setting</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb !important;">
                            <form id="stripekeyForm" name="stripekeyForm" action="<?= site_url() ?>admin/music_setting/update_music_setting"  method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Select Music File</label>
                                    <input type="file" class="form-control" name="music" id="music">
                                    <?php
                                    if (isset($music_setting)) {
                                        if ($music_setting->music_setting != "") {
                                            ?>
                                            <span style="color: #000;"><?= $music_setting->music_setting ?></span>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="form-group" style="text-align:center;">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end: FEATURED BOX LINKS -->
