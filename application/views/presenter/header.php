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