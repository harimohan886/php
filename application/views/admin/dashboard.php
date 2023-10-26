<!DOCTYPE html>
<html lang="en">
<head><?php $this->load->view("admin/common/common_css"); ?></head>
<body>
    <?php $this->load->view("admin/common/common_theme_loader"); ?>
    <div id="wrapper">
        <?php $this->load->view("admin/common/common_sidebar"); ?>
        <?php $this->load->view("admin/common/common_header"); ?>
        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">




                
                <div class="row mt-3">
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-deepblue">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>tour_dealer/tour_dealer_pending_list" style="color: #fff;">
                                <h5 class="text-white mb-0"><?php echo $tour_pending_count->count; ?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:10%"></div>
                                </div>
                                <p class="mb-0 text-white small-font"><h5 style="color: #fff;">Tour Dealer Pending list</h5><span class="float-right"><i class="zmdi zmdi-long-arrow-up"></i></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-orange">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>car_dealer/car_dealer_pending_list" style="color: #fff;">
                                <h5 class="text-white mb-0"><?php echo $car_pending_count->count; ?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:10%"></div>
                                </div>
                                <p class="mb-0 text-white small-font"><h5 style="color: #fff;">Car Dealer Pending list</h5><span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-ohhappiness">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>tour_guide/tour_guide_pending_list" style="color: #fff;">
                                <h5 class="text-white mb-0"><?php echo $guide_pending_count->count; ?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:10%"></div>
                                </div>
                                <p class="mb-0 text-white small-font"><h5 style="color: #fff;">Tour Guide Pending list</h5> <span class="float-right"><i class="zmdi zmdi-long-arrow-up"></i></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="card gradient-ibiza">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>medical_dealer/medical_dealer_pending_list" style="color: #fff;"><h5 class="text-white mb-0"><?php echo $medical_pending_count->count; ?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:10%"></div>
                                </div>
                                <p class="mb-0 text-white small-font"><h5 style="color: #fff;">Medical Dealer Pending list</h5> <span class="float-right"> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div style="background-image: linear-gradient(green, yellow); ">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>education_dealer/education_dealer_pending_list" style="color: #fff;"><h5 class="text-white mb-0"><?php echo $education_pending_count->count; ?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:10%"></div>
                                </div>
                                <p class="mb-0 text-white small-font"><h5 style="color: #fff;">Education Dealer Pending list </h5><span class="float-right"> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div style="background-image: linear-gradient(red, yellow); ">
                            <div class="card-body">
                                <a href="<?php echo base_url();?>corporate_event_dealer/corporate_event_dealer_pending_list" style="color: #fff;"><h5 class="text-white mb-0"><?php echo $corporate_pending_count->count; ?> <span class="float-right"><i class="fa fa-user"></i></span></h5>
                                <div class="progress my-3" style="height:3px;">
                                    <div class="progress-bar" style="width:10%"></div>
                                </div>
                                <p class="mb-0 text-white small-font"><h5 style="color: #fff;">Corporate Event Pending list</h5> <span class="float-right"> <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
                <!-- Chart Code Start Here-->
                <div class="row mt-3">
                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="card-deck flex-column flex-xl-row">
                            <div class="card">
                                <div class="card-body">
                                    <div class=""><i class="zmdi zmdi-accounts-alt text-white text-warning" style="font-size: 33px;"></i></div>
                                    <h3 class="mb-0 mt-2 text-dark">928</h3>
                                    <p class="mb-0">Employee NPS</p>
                                </div>
                                <div id="emp-nps"></div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class=""><i class="zmdi zmdi-money text-white text-info" style="font-size: 33px;"></i></div>
                                    <h3 class="mb-0 mt-2 text-dark">$20.2K</h3>
                                    <p class="mb-0 mt-1">Training Expenses</p>
                                </div>
                                <div id="training-expenses"></div>
                            </div>
                        </div>

                        <div class="card-deck flex-column flex-xl-row">
                            <div class="card">
                                <div class="card-body">
                                    <div class=""><i class="zmdi zmdi-camera text-white text-danger" style="font-size: 33px;"></i></div>
                                    <h3 class="mb-0 mt-2 text-dark">32</h3>
                                    <p class="mb-0 mt-1">CSR Activities</p>
                                </div>
                                <div id="csr-activities"></div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class=""><i class="zmdi zmdi-face text-white text-success" style="font-size: 33px;"></i></div>
                                    <h3 class="mb-0 mt-2 text-dark">14</h3>
                                    <p class="mb-1">Starter This Month</p>
                                </div>
                                <div id="starter-this-month"></div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h3 class="mb-0 text-dark">78.49%</h3>
                                        <p class="mb-0">Bounce Rate</p>
                                    </div>
                                    <div class="">              
                                        <div id="bounce-rate"></div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>

                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="submitted-application"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div id="users-status"></div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->

                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-header text-uppercase">Recruitment Costs</div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <div id="recruitment-cost"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-header text-uppercase">Applications By Source</div>
                            <div class="card-body">
                                <div class="chart-container d-flex align-items-center justify-content-center">
                                    <div id="application-by-source"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->

                <div class="row">
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h3 class="mt-3 mb-0">54</h3>
                                        <p class="mb-0">Screening Calls</p>
                                    </div>
                                    <div class="card-content dash-array-chart-box">
                                        <div id="screening-calls"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h3 class="mt-3 mb-0">82</h3>
                                        <p class="mb-0">Assignments</p>
                                    </div>
                                    <div class="card-content dash-array-chart-box">
                                        <div id="assignments"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h3 class="mt-3 mb-0">92</h3>
                                        <p class="mb-0">Interviews</p>
                                    </div>
                                    <div class="card-content dash-array-chart-box">
                                        <div id="interviews"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-header text-uppercase text-center">vacancies Status</div>
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="chart-container-9 d-flex align-items-center justify-content-center">
                                        <div id="vacancy-status"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center text-center">
                                    <div class="col border-right border-light">
                                        <h4 class="mb-0 text-dark">302</h4>
                                        <small class="extra-small-font">Filled Vacancies</small>
                                    </div>
                                    <div class="col">
                                        <h4 class="mb-0 text-dark">500</h4>
                                        <small class="extra-small-font">Total Vacancies</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xl-4">
                        <div class="card">
                            <div class="card-header text-uppercase text-center">Top Referrers</div>
                            <div class="card-body p-0">
                                <div class="">
                                    <div id="top-refefrers"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
               

                
            </div>
        </div>
        <!-- End container-fluid-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->
        <?php $this->load->view("admin/common/common_js");?>
        <!-- simplebar js -->
        <script src="<?php echo base_url(); ?>assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- sidebar-menu js -->
        <script src="<?php echo base_url(); ?>assets/js/sidebar-menu.js"></script>
        <!-- Apex Chart JS -->
        <script src="<?php echo base_url(); ?>assets/plugins/apexcharts/apexcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dashboard-human-resources.js"></script>
</body>
</html>