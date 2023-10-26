<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->

        <title><?php echo $title; ?> Admin - <?php echo $page; ?></title>
        <?php $this->load->view("admin/common/common_css"); ?>
        <style>
            .canvasjs-chart-credit {
                display: none;
            }
        </style>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </head>

   <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <?php $this->load->view("admin/common/common_header"); ?>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <?php $this->load->view("admin/common/common_sidebar"); ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->

                    <div class="row page-titles">
                        <div class="col-md-6 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $this->lang->line('dashboard'); ?></h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo $this->lang->line('dashboard'); ?></li>
                            </ol>
                        </div>
                      
                    </div>

                     <?php if(isset($error)){ echo $error; }
                                   echo $this->session->flashdata("error"); ?>
                        <?php
                         $random_array = array("bg-info","bg-success","bg-danger","bg-warning","bg-primary","bg-dark","bg-megna","bg-themess","bg-pink","bg-teal","bg-inverse","bg-color1","bg-color4","bg-color5","bg-color6");
                        shuffle($random_array);
                        ?>

                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-success">
                                <div class="box <?php echo $random_array[0]; ?>  text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Partner Request</a></h2>
                                     <h2 class="text-white">
                                        &nbsp;
                                       <?php echo count($become_partners); ?>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[5]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Patients</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo count($partners_patient); ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[1]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Hospital/Clinic</a></h2>
                                    <h2 class="text-white">
                                        <?php echo count($partners_hospital); ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[2]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Doctors</a></h2>
                                    <h2 class="text-white">
                                         <?php echo count($partners_hospital_doctors); ?>
                                         <br>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[3]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Pharmacy</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo count($partners_pharmacy); ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[4]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Pathology</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo count($partners_pathology); ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[7]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Corporate</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo count($partners_corporate); ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[8]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">OPD</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo $opd_list; ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[6]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Settings</a></h2>
                                   <h2 class="text-white">
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[5]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">Today’s Patient Count</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo '0'; ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="col-md-6 col-lg-3 col-xl-3">
                            <div class="card card-inverse card-info">
                                <div class="box <?php echo $random_array[2]; ?> text-center">
                                   <h2 class="font-light text-white"><a href="javascript:void(0)" style="color:#fff;">OPD Total</a></h2>
                                   <h2 class="text-white">
                                        &nbsp;
                                       <?php echo '0'; ?>
                                        <br>
                                    </h2>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--============================================================== -->
                <!--End Container fluid -->
                <!--============================================================== -->
                <!--============================================================== -->
                <!--footer -->
                <!--============================================================== -->

                <?php $this->load->view("admin/common/common_footer");
                ?>

                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <?php $this->load->view("admin/common/common_js"); ?>
    </body>
	
    <script> $.reel.def.indicator = 5;</script>

</html>
