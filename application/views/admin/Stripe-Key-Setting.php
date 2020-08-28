<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Stripe Key Setting</h1>
                </div>
            </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                 <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="panel panel-light-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Stripe Key Setting</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb !important;">
                            <form id="stripekeyForm" name="stripekeyForm" action="<?= site_url() ?>admin/stripe_key_setting/updateStripeKeySetting"  method="post" >
                                <div class="form-group">
                                    <label>Publish Key</label>
                                    <input  name="accountkey" id="accountkey" value="<?= isset($stripekey->account_key) ? $stripekey->account_key : '' ?>" type="text" class="form-control"  placeholder="Account Key" required="" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Secret Key</label>
                                    <input  name="secret_key" id="secret_key" value="<?= isset($stripekey->secret_key) ? $stripekey->secret_key : '' ?>" type="text" class="form-control"  placeholder="Secret Key" required="" autocomplete="off">
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
