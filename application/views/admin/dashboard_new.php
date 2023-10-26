<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title><?php echo $title; ?> Admin - <?php echo $page; ?></title>
    <?php $this->load->view("admin/common/common_css"); ?>
</head>

<body>

    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

                <div class="ring">
                    <div class="frame"></div>
                </div>

            </div>
        </div>
    </div>

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
                                    <div class="page-body">
                                        <div class="row">

                                                <?php if(isset($error)){ echo $error; }
                                                           echo $this->session->flashdata("error"); ?>
                                                <?php
                                                 $random_array = array("bg-info","bg-success","bg-danger","bg-warning","bg-primary","bg-dark","bg-megna","bg-themess","bg-pink","bg-teal","bg-inverse","bg-color1","bg-color4","bg-color5","bg-color6");
                                                shuffle($random_array);
                                                ?>


                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-yellow text-white">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <p class="m-b-5">New Customer</p>
                                                                <h4 class="m-b-0">852</h4>
                                                            </div>
                                                            <div class="col col-auto text-right">
                                                                <i class="feather icon-user f-50 text-c-yellow"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-green text-white">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <p class="m-b-5">Income</p>
                                                                <h4 class="m-b-0">$5,852</h4>
                                                            </div>
                                                            <div class="col col-auto text-right">
                                                             <i class="feather icon-credit-card f-50 text-c-green"></i>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                            </div>

                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-pink text-white">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <p class="m-b-5">Ticket</p>
                                                                <h4 class="m-b-0">42</h4>
                                                            </div>
                                                            <div class="col col-auto text-right">
                                                                <i class="feather icon-book f-50 text-c-pink"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-3 col-md-6">
                                                <div class="card bg-c-blue text-white">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <p class="m-b-5">Orders</p>
                                                                <h4 class="m-b-0">$5,242</h4>
                                                            </div>
                                                            <div class="col col-auto text-right">
                                                                <i class="feather icon-shopping-cart f-50 text-c-blue"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-8 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-header-left ">
                                                            <h5>Monthly View</h5>
                                                            <span class="text-muted">For more details about usage, please refer <a href="https://www.amcharts.com/online-store/" target="_blank">amCharts</a> licences.</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-block-big">
                                                        <div id="monthly-graph" style="height:250px"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-md-12">
                                                <div class="card feed-card">
                                                    <div class="card-header">
                                                        <h5>Feeds</h5>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row m-b-30">
                                                            <div class="col-auto p-r-0">
                                                                <i class="feather icon-bell bg-simple-c-blue feed-icon"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted f-right f-13">Just Now</span></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-30">
                                                            <div class="col-auto p-r-0">
                                                                <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="m-b-5">New order received <span class="text-muted f-right f-13">Just Now</span></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-30">
                                                            <div class="col-auto p-r-0">
                                                                <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted f-right f-13">Just Now</span></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-30">
                                                            <div class="col-auto p-r-0">
                                                                <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="m-b-5">New order received <span class="text-muted f-right f-13">Just Now</span></h6>
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-30">
                                                            <div class="col-auto p-r-0">
                                                                <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted f-right f-13">Just Now</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="styleSelector">
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