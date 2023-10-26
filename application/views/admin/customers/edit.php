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

    <title><?php echo PROJECT_NAME; ?> - <?php echo $page; ?> <?php echo $action; ?></title>
    <?php  $this->load->view("admin/common/common_css"); ?>
 
</head>
<style>
  .userform label {
    width: 120px;
    color: #333;
    float: left;
}
input.error {
    border: 1px solid red;
}
label.error{
    width: 100%;
    color: red;
    font-style: normal !important;
    margin-left: 0px !important;
    margin-bottom: 5px;
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
                   <!-- ============================================================== -->
                   <!-- End Bread crumb and right sidebar toggle -->
                   <!-- ============================================================== -->
                   <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-outline-info">
                            <div class="card-body">
                               <h4 class="card-title">Edit <?php echo $page; ?></h4>
                               <h6 class="card-subtitle"></h6>
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
                           
                            <form class="form" name="form" id="form_edit" role="form" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <hr class="mt-0 mb-5">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-md-2 col-sm-2 col-form-label col-form-label">Name<span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?php echo $categories->name; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                               <div class="form-group  row">
                                                   <label class="col-lg-2 col-md-2 col-sm-2 col-form-label col-form-label">Email<span class="text-danger">*</span></label>
                                                   <div class="col-md-8">
                                                    <?php echo $categories->email; ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12">
                                               <div class="form-group  row">
                                                   <label class="col-lg-2 col-md-2 col-sm-2 col-form-label col-form-label">Mobile No<span class="text-danger">*</span></label>
                                                   <div class="col-md-8">
                                                    <?php echo $categories->country_code."&nbsp;".$categories->mobile; ?>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="col-lg-12 col-md-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status  <span class="text-danger"></span></label>
                                                <div class="col-md-8">
                                                    <input class='tgl tgl-ios tgl_checkbox js-switch' name="status" type='checkbox' <?php echo ($categories->status=='1')? "checked" : ""; ?>/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-info" id="save_button">Update</button>
                                                    <a href="<?php echo site_url("customers/customers_list"); ?>" class="btn btn-inverse">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.row -->

 </div>
 <!-- ============================================================== -->
 <!-- End Container fluid  -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- footer -->
 <!-- ============================================================== -->

 <?php  $this->load->view("admin/common/common_footer"); ?>

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
<?php  $this->load->view("admin/common/common_js"); ?>
</body>

</html>

<script>
$(function() {
    $("#form_edit").validate({
        // Specify validation rules
        rules: {
            name: {
                required:true
            },
            dob_date:{
                required:true,
            },
        },
        messages: {
            name: {
                required:"Please enter name"
            },
            dob_date:{
                required:"Please select DOB",
            },
        },
        submitHandler: function(form) {
          form.submit();
        }
    });
});
</script>

