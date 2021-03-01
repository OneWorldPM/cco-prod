<?php
$user_role = $this->session->userdata('role');
?>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->

        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Notes</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <form
                                        name="add_notes_frm"
                                        id="add_sessions_frm"
                                        method="POST"
                                        action="<?= base_url().'admin/sessions/create_notes/'.$sessions_id?>">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary" id="panel5">
                                                <!-- <div class="panel-heading"> -->
                                                <!-- <h4 class="panel-title text-bold">Note Details</h4> -->
                                                <!-- <div class="panel-body bg-white" style="border: 1px solid
                                                #b2b7bb!important;"> -->
                                                <div class="col-md-12">
                                                    <!-- <input type="text" name="sessions_id" value="<?= $sessions_id?>"> -->
                                                    <div class="form-group">
                                                        <label for="note_title" class="text-large text-bold">Note Title</label>
                                                        <input type="text" name="note_title" id="note_title" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="note_content" class="text-large text-bold">Note Content</label><br>
                                                        <textarea
                                                            name="note_content"
                                                            rows="10"
                                                            cols="50"
                                                            class="form-control text text-black"
                                                            id="note_content"
                                                            style="color:black" required></textarea><br>
                                                        <input type="submit" class="btn btn-success">
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <?php 
                    if (isset($notes_details) && !empty($notes_details)){
                            ?>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table
                                class="table table-bordered table-striped text-center "
                                id="sessions_table">
                                <thead class="th_center">
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Option</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($notes_details as $note_detail) {  
                                ?>
                                    <tr>
                                        <td>
                                            <?= $note_detail->date_created?>
                                        </td>
                                        <td>
                                            <?= $note_detail->note_title?>
                                        </td>
                                        <td>
                                            <?= $note_detail->note_content?>
                                        </td>
                                        <td>
                                            <!-- <a href="" class="btn btn-success btn-sm">Edit
                                            </a> -->
                                            <a href="<?= base_url().'admin/sessions/delete_notes/',$note_detail->note_id?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                            }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                    