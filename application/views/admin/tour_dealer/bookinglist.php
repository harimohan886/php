<!DOCTYPE html>
<html lang="en">
<head><?php $this->load->view("admin/common/common_css"); ?></head>
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
                                    <h4><?php echo $page; ?></h4>
                                    <span></span>
                                </div>
                                <div class="card-body">
                                    <div class="card-block">
                                        <?php
                                            if (isset($error)) { echo $error; }
                                            echo $this->session->flashdata("message");
                                        ?>
                                        <div class="table-responsive">
                                            <table id="example23" class="table table-striped table-hover table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Language</th>
                                                        <th>Tour Name</th>
                                                        <th>Customer Detail</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Total Boooking Price</th>
                                                        <th>No of Adult</th>
                                                        <th>No of Child</th>
                                                        <th>Comments</th>
                                                        <th>Status</th>
                                                        <th>Created Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if (count($tourdata) > 0) {
                                                            $i = 1;
                                                            foreach ($tourdata as $category) {
                                                                ?>  
                                                                <tr>
                                                                    <td><?php echo $i; ?></td>
                                                                    <td><?php echo $category->language; ?></td>
                                                                    <td><?php echo $category->name; ?></td>
                                                                    <td><?php echo $category->booker_name; 
                                                                    		echo "<br/>(". $category->email .")"; ?></td>
                                                                    <td><?php echo $category->start_date; ?></td>
                                                                    <td><?php echo $category->end_date; ?></td>
                                                                    <td><?php echo $category->total_price; ?></td>
                                                                    <td><?php echo $category->no_of_adults; ?></td>
                                                                    <td><?php echo $category->no_of_children; ?></td>
                                                                    <td><?php echo $category->comments; ?></td>
                                                                    <td><?php if($category->book_status == '1') { echo "<span class='alert-success'>Approved</span>"; } else {
                                                                        echo "<span class='alert-danger'>Pending</span>"; } ?></td>
                                                                    <td><?php
                                                                        $date = date("d-m-Y", strtotime($category->created_at));
                                                                        $time = date("h:i:s", strtotime($category->created_at));
                                                                        echo $date . " " . $time;
                                                                    ?></td>                            
                                                                </tr>
                                                            <?php $i++;
                                                            }
                                                        } ?>
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
   <?php $this->load->view("admin/common/common_js");?>
</body>
</html>