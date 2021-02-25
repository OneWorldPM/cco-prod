<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List of Notes</h1>
                </div>
            </div>
        </section>
        <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white"> Notes </h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <!-- <?php if ($user_role == 'super_admin') { ?>
                        <h5 class="over-title margin-bottom-15">
                            <a href="<?= base_url() ?>admin/sessions/add_sessions" class="btn btn-green add-row">
                                Add Sessions  &nbsp;<i class="fa fa-plus"></i>
                            </a>
                        </h5>
                        <?php } ?> -->
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="note_table">
                                    <thead class="th_center">

                                    <div>
                                        <a href="<?= base_url()?>admin/sessions/add_notes" class="btn btn-primary">Add Note</a>
                                        
                                    </div>
                                    <br>
                              
                                        <tr>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Options</th>
                                         
                                        </tr>
                                       
                                    </thead>
                                    <tbody>
                                        <?php if (isset($notes) && !empty($notes)) {
                                            foreach ($notes as $note){
                                                // $note_cont=$note['note_content'];

                                             ?>
                                               <tr>
                                                    <td>
                                                    <?= $note['date_created']?>
                                                    </td>
                                              
                                                
                                                    <td>
                                                    <?= ($note['note_title'])?>
                                                    </td>
                                              
                                                
                                                    <td>
                                                    <?= ($note['note_content'])?>

                                                    </td>
                                                    
                                                    <td>
                                                        <a href="" class="btn btn-primary">Edit</a>
                                                        
                                                        <a href="" class="btn btn-danger">Delete</a>
                                                    </td>
                                            </tr>
                                             <?php
                                            }
                                        }  ?>
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
