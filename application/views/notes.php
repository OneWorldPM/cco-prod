<style>
    .post-info {
        margin-bottom: 0px; 
        opacity: 1; 
    }
    .post-item {
        border-bottom: 2px solid #9b9b9b;
    }

    .hidden {
        visibility: hidden;
    }
    a:hover {
        color: #000 !important;
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
<!--<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/Sessions_BG_screened.jpg); top: 0; padding-top: 0px;">-->
    <div class="container container-fullscreen" >
        <div class="text-middle">
            <div class="row">
                <div class="col-md-12">
                    <!-- CONTENT -->
                    <section class="content" style="min-height: 700px;">
                        <div class="container" style=" background: rgba(250, 250, 250, 0.8); "> 
                            <!-- Blog post-->
                            <div class="post-content post-single"> 
                                <!-- Blog image post-->
                                <div class="col-md-12 table-responsive" style="margin-top: 30px;">
                                    <table class="table table-bordered table-striped text-center ">
                                        <thead class="th_center">
                                            <tr>
                                                <th>Session Title</th>
                                                <th>Notes </th>
                                                <th>Resource </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($briefcase_list) && !empty($briefcase_list)) {
                                                foreach ($briefcase_list as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $val->session_title ?></td>
                                                        <td><?= $val->note ?></td>
                                                        <td>
                                                            <?php
                                                            if ($val->session_resource_id != "") {
                                                                $resource_details = $this->common->get_session_resource($val->session_resource_id);
                                                                if (!empty($resource_details)) {
                                                                    ?>
                                                                    <a href="<?= $resource_details->resource_link ?>" target="_blank"><?= $resource_details->link_published_name ?></a><br>
                                                                    <a href="<?= base_url() ?>uploads/resource_sessions/<?= $resource_details->resource_file ?>" download> <?= $resource_details->upload_published_name ?> </a>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td> <a class="button black-light small" style="margin: 0px 0;" href="<?= base_url() ?>home/delete_note/<?= $val->sessions_cust_briefcase_id ?>"><span>Delete</span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END: Blog post--> 
                            </div>
                    </section>
                    <!-- END: SECTION --> 
                </div>
            </div> 
        </div>
    </div>
</section>