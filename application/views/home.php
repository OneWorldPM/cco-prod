<!-- SECTION -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
<style>
    .icon-home {
        color: #f05d1f;
        font-size: 1.5em;
        font-weight: 700;
        vertical-align: middle;
    }

    .box-home {
        background-color: #444;
        border-radius: 30px;
        background: rgba(250, 250, 250, 0.8);
        max-width: 270px;
        min-width: 270px;
        min-height: 270px;
        max-height: 270px;
        padding: 15px;
    }
    .box-home_2 {
        background-color: #444;
        border-radius: 30px;
        background: rgba(250, 250, 250, 0.8);
        max-width: 185px;
        min-width: 120px;
        min-height: 160px;
        max-height: 185px;
        padding: 15px;
        padding: 0px !important;
    }

    .fa {
        font-weight: 900;
    }

    .col-sm-12 {
        margin-bottom: 10px;
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/bg_login.jpg); top: 0; padding-top: 20px;">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center m-t-0">
                        <h1 style="color: orange; font-family: 'Architects Daughter', cursive; margin-bottom: 0px; font-weight: 700; font-size: 40px;">Welcome, <?= $this->session->userdata('cname') ?></h1>
                    </div>
                </div>
                <div class="col-md-12 m-t-30" style="text-align: -webkit-center;">
                    <div class="col-md-3 col-sm-12">
                        <a class="icon-home" href="<?= base_url() ?>sessions"> 
                            <div class="col-lg box-home p-5 text-center">
                                <img src="<?= base_url() ?>front_assets/images/Session.png" alt="welcome" class="m-t-40" style="height: 150px; width: 160px;">
                                <br>
                                <br>
                                <span>SESSIONS</span>
                            </div>
                        </a>
                    </div> 
                     <div class="col-md-3 col-sm-12">
                        <a class="icon-home" href="<?= base_url() ?>eposters"> 
                            <div class="col-lg box-home p-5 text-center">
                                <img src="<?= base_url() ?>front_assets/images/eposters.png" alt="welcome" class="m-t-40" style="height: 150px; width: 160px;">
                                <br>
                                <br>
                                <span>ePOSTERS</span>
                            </div>
                        </a>
                    </div> 
                    <div class="col-md-3  col-sm-12">
                        <a class="icon-home" href="<?= base_url() ?>sponsor"> 
                            <div class="col-lg box-home ml-5 mr-5 p-5 text-center">
                                <img src="<?= base_url() ?>front_assets/images/sponsor.png" alt="welcome" class="m-t-40" style="height: 150px; width: 160px;">
                                <br>
                                <br>
                                <span>SPONSORS</span>
                            </div>
                        </a>
                    </div> 
                    <div class="col-md-3  col-sm-12">
                        <a class="icon-home" href="#"> 
                            <div class="col-lg box-home p-5 text-center">
                                <img src="<?= base_url() ?>front_assets/images/lounge.png" alt="welcome" class="m-t-20" style="height: 170px; width: 170px;">
                                <br>
                                <br>
                                <span>LOUNGE</span>
                            </div>
                        </a>
                    </div> 
                </div>
                <div class="col-md-12 m-t-50 m-b-80" style="text-align: -webkit-center;">
                    <div class="col-md-4 col-md-offset-2 col-sm-12 p-b-25">
                        <a class="icon-home" href="#"> 
                            <div class="col-lg box-home_2 p-0 text-center p-b-25">
                                <img src="<?= base_url() ?>front_assets/images/info.png" alt="welcome" class="m-t-10" style="height: 100px; width: 100px;">
                                <br>
                                <span style="font-size: 16px;">INFORMATION</span>
                            </div>
                        </a>
                    </div> 
                    <div class="col-md-4  col-sm-12">
                        <a class="icon-home" href="#"> 
                            <div class="col-lg box-home_2 p-0 p-b-25 text-center">
                                <img src="<?= base_url() ?>front_assets/images/settings-gears.png" alt="welcome" class="m-t-10" style="height: 110px; width: 110px;">
                                <br>
                                <span style="font-size: 16px;">TECHNICAL HELP</span>
                            </div>
                        </a>
                    </div> 
                </div>
            </div> 
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var user_id = <?= $this->session->userdata("cid") ?>;
        var page_name = "User Dashboard";
        $.ajax({
            url: "<?= base_url() ?>home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });
    });
</script>