
<?php
$user_role = $this->session->userdata('role');
?>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Other Settings</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary" id="panel5">
                        <div class="panel-heading">
                            <div class="card" style="color: black">
                                <div class="card-header" style="margin-bottom: 20px;">
                                    <div class="card-title">
                                        Presenter Portal Countdown Timer Timezone<br>
                                        (This is used to adjust time according to daylight or standard time)
                                    </div>
                                </div>
                                <div class="card-body">
                                    <label for="presenter_timezone" style="color: black">Presenter Portal Timezone (example: UTC-5)</label>
                                    <input type="text" name="presenter_timezone" class="form-control presenter_timezone" placeholder="UTC-5">
                                    <ul style="list-style-type:none; margin-top:20px; padding: 0">
                                        <li>
                                            EST = UTC-5
                                        </li>
                                        <li>
                                            EDT = UTC-4
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-footer text-right" style="margin-top:20px">
                                    <button class="btn btn-small btn-success btnSavePresenterTimezone">Save Presenter Time</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>
<script>
    $(function(){
        getPresenterTimezone();
        $('.btnSavePresenterTimezone').on('click', function(){

            $.post("<?=base_url()?>/admin/other_settings/updatePresenterTimezone",
                {
                    'presenterTimezone':$('.presenter_timezone').val()
                },
                function(response){
                if(response.status = 200){
                    Swal.fire(
                        'Success',
                        response.msg,
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Error',
                        response.msg,
                        'error'
                    )
                }
            },'json')
        })
    })

    function getPresenterTimezone(){
        $.post('<?=base_url()?>/admin/other_settings/getPresenterTimezone',function(timezone){
            if(timezone){
                $('.presenter_timezone').val(timezone);
            }
        }, 'json')
    }
</script>