<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of Sponsors</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->

        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Sponsors</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <h5 class="over-title margin-bottom-15">
                            <a href="<?= base_url() ?>admin/sponsors/add_sponsors" class="btn btn-green add-row">
                                Add Sponsors  &nbsp;<i class="fa fa-plus"></i>
                            </a>
                        </h5>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="sponsors_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Logo</th>
                                            <th>Company Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($sponsors) && !empty($sponsors)) {
                                            foreach ($sponsors as $val) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php if ($val->sponsors_logo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/sponsors/<?= $val->sponsors_logo ?>" style="height: 40px; width: 40px;">
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $val->company_name ?></td>
                                                    <td><?= $val->email ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>admin/sponsors/edit_sponsors/<?= $val->sponsors_id ?>" class="btn btn-green btn-sm">Edit</a>
                                                        <a href="<?= base_url() ?>admin/sponsors/delete_sponsors/<?= $val->sponsors_id ?>" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sponsors_table").dataTable({
            "ordering": false,
        });
    });
</script>