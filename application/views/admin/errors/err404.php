<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php $this->load->view("admin/common/common_css"); ?>
</head>

<body>

    <?php $this->load->view("admin/common/common_theme_loader"); ?>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php $this->load->view("admin/common/common_header"); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php $this->load->view("admin/common/common_sidebar"); ?>

                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">

                                        <div class="card">
                                            <div class="card-block">
                                                
                                                <div>
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/login"><i class="icofont icofont-home"></i> login</a></li>

                                                        <li class="breadcrumb-item active"><?php echo $action; ?></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="page-body">


                                        <div class="card">
                                            <div class="card-header">
                                                <h4>404</h4>
                                                <span></span>
                                                <!-- <div class="pull-right">
                                                    <a href="<?php echo site_url("driver/driver_add"); ?>" class="btn btn-info" style="color: rgb(255, 255, 255); padding: 5px 13px;"><i class="fa fa-plus"></i></a>
                                                </div> -->
                                            </div>
                                            <div class="card-block">

                                                <?php
                                                if (isset($error)) {
                                                    echo $error;
                                                }
                                                echo $this->session->flashdata("message");
                                                ?>

                                                <div class="dt-responsive table-responsive">
                                                    <div id="buttons"></div>
                                                    <img src="<?php echo base_url();?>uploads/404.jpg" width="1000px" height="250px">
                                                    <h2 style="text-align:center;">Page Not Found</h2>

                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("admin/common/common_js"); ?>

</body>
</html>

<script>
    $(document).ready(function () {
        $('#error').delay(3000).fadeOut();
    });

    $(function () {
    });

</script>
