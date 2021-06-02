<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Stream Details</h1>
                </div>
            </div>
        </section>
        <div>
            <a id="show-add-stream" class="btn btn-green"><span class="fa fa-plus"></span>Add Stream</a>
            <span style="float:right"><button class="btn btn-orange" onclick="history.go(-1);">Done</button></span>
            <br><br><br>
            <table id="stream_names" class="display">
                <thead>
                <tr>
                    <th>Stream Name</th>
                    <th>Stream Link(Code)</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($millicast_stream_names) && !empty($millicast_stream_names)){
                    foreach ($millicast_stream_names as $strm_name){
                        ?>
                        <tr>
                            <td><?=$strm_name->name?></td>
                            <td><?=$strm_name->link?></td>
                            <td><a href="<?=base_url().'admin/sessions/deleteStreamName/'.$strm_name->id?>" class="btn btn-danger"> <span class="fa fa-trash-o"></span> Delete </a> </td>
                        </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>


    </div>
</div>

<!-- Modal for Adding Stream Name-->
<div class="modal fade" id="addStream" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-center">Add Millicast Stream</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Body-->
                <form id="form_stream" action="<?=base_url().'admin/sessions/saveStreamName'?>" method="POST">

                    <div class="form-group">
                        <label for="stream_name"> Stream Name </label>
                        <input type="text"  class="form-control" id="stream_name" name="stream_name" placeholder="Stream name">
                    </div>

                    <div class="form-group">
                        <label for="stream_link"> Stream Link (Embed_html_code) </label>
                        <input type="text" class="form-control" id="stream_link" name="stream_link" placeholder="Stream link">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-success" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
    </div>
</div>
</div>


<script>
    $(document).ready( function () {
        $('#stream_names').DataTable();
    } );

    $(document).ready(function(){
        $('#show-add-stream').on('click',function(){
            $('#addStream').modal('show');
        })

    })

    $(document).ready(function(){
        var msg = "<?= $this->session->flashdata('msg');?>";
        console.log(msg);
        if(msg == "success"){
            alertify.success('Stream Name Saved!');
        }
        if(msg == "error"){
            alertify.error('Error!');
        }
        if(msg == "deleted"){
            alertify.success('Stream Name Deleted!');
        }

    });

</script>
