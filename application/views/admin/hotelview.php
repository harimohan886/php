<?php /* echo "<pre>";
print_r($customers); exit; */?>
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
                                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icofont icofont-home"></i> Dashboard</a></li>

                                                        <li class="breadcrumb-item active"><?php echo $action; ?></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <?php 
                                    if(isset($_SESSION['login_message']) && !empty($_SESSION['login_message'])) {
                                        echo $this->session->flashdata("login_message"); 
                                        sleep(2);
                                        unset($_SESSION['login_message']);
                                        unset($_SESSION['login_message']);
                                        unset($_SESSION['login_message']);
                                        
                                    }
                                    ?>


                                        <div class="page-body">


                                        <div class="card">
                                            <!-- <div class="card-header">
                                                <span></span>
                                                <div class="pull-right">
                                                    <a href="<?php echo site_url("patients/patients_add"); ?>" class="btn btn-info" style="color: rgb(255, 255, 255); padding: 5px 13px;"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div> -->
                                            <div class="card-block">
                                                  <?php if (validation_errors())
                                {   
                                echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                                                                        <i class="fa fa-check"></i>
                                                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                      <strong>Warning!</strong> ';

                                echo validation_errors();
                                echo '</div>';
 
                                }
                                ?>
                                <div class="table-responsive m-t-40">
                                        <h3>Restaurant Details</h3>
                                         <form role="form" name="form" id="demo-form2" action="" method="post" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <table class="table table-hover table-bordered detail-view">
                                            <tbody>
                                                <tr>
                                                    <td width="25%">Restaurant Name</td>
                                                    <td width="75%"><?php echo $admindata->restaurant_name; ?></td>
                                                </tr>

                                                <tr>
                                                    <td width="25%">Description</td>
                                                    <td width="75%"><?php echo $admindata->description; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Address</td>
                                                    <td width="75%"><?php echo $admindata->address; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Start Time</td>
                                                    <td width="75%"><?php echo $admindata->start_time; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">End Time</td>
                                                    <td width="75%"><?php echo $admindata->end_time; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Image</th>
                                                    <td> 
                                                        <img src="<?php echo base_url().$admindata->image; ?>" style="height:150px; width: 150px;" >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </form>
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&libraries=places"></script>


    <script type="text/javascript">
    $(document).ready(function () {
        $('#error').delay(3000).fadeOut();
    });

    $(function () {
        $("body").on("change", ".tgl_checkbox", function () {
            var bin = 0;
            if ($(this).is(':checked')) {
                bin = 1;
            }
              
            if (bin == '1' || bin == 1) {
                $("#save_button").html('');
                $("#save_button").html('Partner Approve');
                $("#myElem").show();
                setTimeout(function () {
                    $("#myElem").hide();
                }, 5000);

            } else if (bin == '0' || bin == 0) {
                $("#save_button").html('');
                $("#save_button").html('Partner Reject');
       

                $("#myElemNo").show();
                setTimeout(function () {
                    $("#myElemNo").hide();
                }, 5000);
            }
        });
    });
</script>




