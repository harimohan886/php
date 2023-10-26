<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/common/common_css"); ?>
</head>
<body>
    <?php $this->load->view("admin/common/common_theme_loader"); ?>

<!-- Start wrapper-->
 <div id="wrapper">
 
    <?php $this->load->view("admin/common/common_sidebar"); ?>
    <?php $this->load->view("admin/common/common_header"); ?>

<div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title"><?php echo $page ." ". $action; ?></h4>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><?php echo $page; ?></li>
       </div>
     </div>


    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <h4><?php echo $page ." ". $action; ?></h4>
                <span></span>
                <!-- <div class="pull-right">
                    <a href="<?php echo site_url("language/language_add"); ?>" class="btn btn-info waves-effect waves-light m-1 pull-right" style="color: rgb(255, 255, 255); padding: 5px 13px;"><i class="fa fa-plus"></i></a>
                </div> -->
            </div>
            <div class="card-body">
                <div class="card-block">

                <?php
                if (isset($error)) {
                    echo $error;
                }
                echo $this->session->flashdata("message");
                ?>
                  <div class="table-responsive">
                    <table id="example23" class="table table-striped table-hover table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Work EXperience</th>
                            <th>Created Date</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (count($reject_records) > 0) {
                                $i = 1;
                                foreach ($reject_records as $category) {

                                    $approve = ADMIN_URL . 'education_dealer/education_dealer_approve/' . $category->id;
                                    $pending = ADMIN_URL . 'education_dealer/education_dealer_pending/' . $category->id;
                                    ?>  
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $category->name; ?></td>
                                        <td><?php echo $category->email; ?></td>
                                        <td><?php echo $category->mobile; ?></td>
                                        <td><?php echo $category->work_exp; ?></td>
                                        <td>
                                        <?php
                                        $date = date("d-m-Y", strtotime($category->created_at));
                                        $time = date("h:i:s", strtotime($category->created_at));
                                        echo $date . " " . $time;
                                        ?>
                                        </td>
                                    
                                        <td>
                                            <a href="<?php echo $approve; ?>" data-toggle="tooltip"  data-placement="left" title="Approve" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a href="<?php echo $pending; ?>" data-toggle="tooltip"  data-placement="left" title="Pending" class="btn btn-warning waves-effect waves-light m-1"><i class="fa fa-clock-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php $i = $i + 1;
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
      </div><!-- End Row-->
<!--start overlay-->
          <div class="overlay toggle-menu"></div>
        <!--end overlay-->



        </div>
    </div>
    <!-- End container-fluid-->


    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->


    <?php $this->load->view("admin/common/common_js"); ?>

</body>
</html>
<script>
    $(document).ready(function () {
        $('#error').delay(3000).fadeOut();
    });
</script>
