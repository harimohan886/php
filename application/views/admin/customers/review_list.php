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

        <title><?php echo $title; ?> | Admin - <?php echo $page; ?> <?php echo $action; ?></title>
        <?php $this->load->view("admin/common/common_css"); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>
<style>
.checked {
    color: orange;
    font-size: 24px;
}
span.fa-star-o {
color: orange;
    font-size: 24px;
}
.bar-5 {height: 10px; background-color: #4CAF50;}
.bar-4 {height: 10px; background-color: #2196F3;}
.bar-3 {height: 10px; background-color: #00bcd4;}
.bar-2 {height: 10px; background-color: #ff9800;}
.bar-1 {height: 10px; background-color: #f44336;}
.bar-0 {height: 10px; background-color: #f44336;}
.middle {background-color:#eee;}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:15px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

</style>
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
                            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $page; ?></h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>customers/customers_list"><?php echo $page; ?></a></li>
                                <li class="breadcrumb-item active"><?php echo $action; ?></li>
                            </ol>
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                     <h4 class="card-title">
                                       <div class="row text-center">
                                             <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                                <p>Average Ratting</p>
                                            <?php 
                                           
                                           $average_rating = floatval($avg_reviews->average_rating);

                                            if($average_rating <= 0.00 && $average_rating <= 0.49) {
                                                $average_rating = 0.00;
                                            } else if($average_rating <= 0.51 && $average_rating <=0.99) {
                                                $average_rating = 0.50;
                                            } else if($average_rating <= 1.00 && $average_rating <=1.49) {
                                                $average_rating = 1.00; 
                                            } else if($average_rating <= 1.51 && $average_rating <=1.99) {
                                                $average_rating = 1.50; 
                                            } else if($average_rating <= 2.00 && $average_rating <=2.49) {
                                                $average_rating = 2.00; 
                                            } else if($average_rating <= 2.51 && $average_rating <=2.99) {
                                                $average_rating = 2.50; 
                                            } else if($average_rating <= 3.00 && $average_rating <=3.49) {
                                                $average_rating = 3.00; 
                                            } else if($average_rating <= 3.51 && $average_rating <=3.99) {
                                                $average_rating = 3.50;
                                            } else if($average_rating <= 4.00 && $average_rating <=4.49) {
                                                $average_rating = 4.00; 
                                            } else if($average_rating <= 4.51 && $average_rating <=4.99) {
                                                $average_rating = 4.50; 
                                            } else if($average_rating >= 5.00) {
                                                $average_rating = 5.00; 
                                            }
                                            $average_rating = floatval($average_rating);
                                            $average_rating = number_format(floatval($average_rating),1);
                                           
                                            echo $average_rating;
                                            echo " / 5.0 ";
                                           
                                            // $average_rating = $average_rating;
                                            $exp_number = explode('.',$average_rating);
                                            $remaning_star = floatval(5.00 - $average_rating);
                                            for($x=1;$x<=$exp_number[0];$x++) {
                                                echo '<span class="fa fa-star checked"></span> ';
                                            }
                                            if ($exp_number[1] == "5" || $exp_number[1] == 5) {
                                                echo '<span class="fa fa-star-half-o checked"></span> ';
                                            } 
                                            $remaning_star  = $remaning_star;
                                            if($remaning_star > 0) {
                                                for($y=1;$y<=$remaning_star;$y++) {
                                                    echo '<span class="fa fa-star-o"></span> ';
                                                }
                                            }
                                            ?>

                                            </div>
                                         <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                                    <p>Ratting Detail</p>
                                                    <span>
                                                    <?php 
                                                    foreach($total_reivews as $kk=>$vv){ ?>
                                                      <div class="side">
                                                        <div><?php echo $vv->ratting; ?> star</div>
                                                      </div>
                                                      <div class="middle">
                                                        <div class="bar-container"  style="width: <?php echo $vv->percentage; ?>">
                                                          <div class="bar-<?php echo $vv->ratting; ?>"></div>
                                                        </div>
                                                      </div>
                                                      <div class="side right">
                                                        <div><?php echo $vv->total_reviews; ?></div>
                                                      </div>
                                                     <?php } ?>
                                                 </span>

                                            </div>
                                       </div>
                                            
                                                                                
                                            
                                         
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    echo $this->session->flashdata("message");
                                    ?>
                                    
                                    <h4 class="card-title">

                                    </h4>
                                    <h6 class="card-subtitle"></h6>
                                    <div class="table-responsive m-t-40">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Ratting</th>
                                                    <th>Review</th>
                                                    <th>Review Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>

                                                <?php
                                                if (count($reviews) > 0) {
                                                    foreach ($reviews as $category) {
                                                        $delete_url = ADMIN_URL . 'customers/review_delete/' . $category->review_id;
                                                        ?>  
                                                        <tr>
                                                            <td><?php if(!empty($category->name)) { echo $category->name; } else { echo "-"; }?></td>
                                                            <td><?php 
                                                                $average_rating = $category->ratting;
                                                                $average_rating = floatval($average_rating);
                                                                $average_rating = number_format(floatval($average_rating),1);
                                                                // $average_rating = $average_rating;
                                                                $exp_number = explode('.',$average_rating);
                                                                $remaning_star = floatval(5.00 - $average_rating);
                                                                for($x=1;$x<=$exp_number[0];$x++) {
                                                                    echo '<span class="fa fa-star checked"></span> ';
                                                                }
                                                                if ($exp_number[1] == "5" || $exp_number[1] == 5) {
                                                                    echo '<span class="fa fa-star-half-o checked"></span> ';
                                                                } 
                                                                $remaning_star  = $remaning_star;
                                                                if($remaning_star > 0) {
                                                                    for($y=1;$y<=$remaning_star;$y++) {
                                                                        echo '<span class="fa fa-star-o"></span> ';
                                                                    }
                                                                }

                                                             ?></td>
                                                            <td><?php echo $category->review; ?></td>
                                                              
                                                            <td>
                                                                 <?php
                                                        $date = date("d-m-Y", strtotime($category->created_at));
                                                        $time = date("h:i:s", strtotime($category->created_at));
                                                        echo $date . " " . $time;
                                                        ?>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" onclick="confirm_delete('<?php echo $delete_url; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a> </td>
                                                        
                                                        
                                                           
                                                        </tr>
                                                    <?php
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

                </div>

<?php $this->load->view("admin/common/common_footer"); ?>

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

</html>


<script>
    $(document).ready(function () {
        $('#error').delay(3000).fadeOut();
    });

    $(function () {
        $('#example23').DataTable({
            //   dom: 'Bfrtip',
            //   buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]
        });
    });

</script>
