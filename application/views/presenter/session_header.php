<?php
$this->load->view('presenter/header_include');
?>
<nav class="navbar presenterNavbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a data-toggle="modal" data-target="#zoomModal">ZOOM</a></li>

            <li><a href="<?= base_url() ?>presenter/sessions/view_poll/<?= $sessions->sessions_id ?>" target="_blank">POLLS</a></li>
            <li><a href="#">Page 3</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= $this->session->userdata('pname') ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url() ?>presenter/login/logout">
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade presenterModal" id="zoomModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ZOOM</h4>
            </div>
            <div class="modal-body">
                <?php
                $zoom_link=isset($sessions->zoom_link)?$sessions->zoom_link:"";
                $zoom_pass=isset($sessions->zoom_password)?$sessions->zoom_password:"";

                if($zoom_link){
                    ?>
                    <p>Zoom Meeting Link : <a href="<?=$zoom_link?>" target="_blank"><?=$zoom_link?></a></p>
                    <p>Password : <?=$zoom_pass?></p>
                <?php
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>