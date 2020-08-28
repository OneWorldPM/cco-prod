<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Change Password</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-light-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Change Password</h4>
                        </div>

                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb !important;">
                            <form id="customerForm" role="form" method="post">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input  name="opassword" id="opassword" value="" type="password" class="form-control"  placeholder="Old Password" required=""></span><span id="erroropassword" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input  name="npassword" id="npassword" value="" type="password" class="form-control"  placeholder="New Password" required=""></span><span id="errornpassword" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input  name="cpassword" id="cpassword" value="" type="password" class="form-control"  placeholder="Confirm Password" required=""></span><span id="errorcpassword" style="color:red;"></span>
                                </div>
                                <div class="form-group" style="text-align:center">
                                    <input type="button" name="changepassword" id="changepassword" class="btn btn-primary" value="Save">
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
<?php
$msg = $this->input->get("msg");
switch ($msg) {
    case "S":
        $m = "Update Password Successfully...!!!";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
     case "NM":
        $m = "Old password not match!, Please try again!!!";
        $t = "error";
        break;    
    default:
        $m = 0;
        break;
}
?>
<script type="text/javascript">
        $(document).ready(function(){
            <?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
            $('#changepassword').on('click',function(){
                if($('#opassword').val() == '')
                {
                    $("#erroropassword").text("Enter old passowrd").fadeIn('slow').fadeOut(5000);  
                }
                else if($('#npassword').val() != '')
                {
                    if($('#cpassword').val() == $('#npassword').val())
                    {
                        $url="<?= site_url() ?>admin/changepassword/updatePassword";
                        $('#customerForm').attr('action',$url);
                        $('#customerForm').submit();
                    }
                    else
                    {
                        $("#errorcpassword").text("New password amd confirm password not match!").fadeIn('slow').fadeOut(5000); 
                    }
                }
                else
                {
                     $("#errornpassword").text("Enter new password").fadeIn('slow').fadeOut(5000);  
                }
            });
        });
</script>
