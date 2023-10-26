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
   
    <title><?php echo $title; ?> | Admin - <?php echo $page; ?></title>
      <?php  $this->load->view("admin/common/common_css"); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

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
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>social/social_media_list"><?php echo $page; ?></a></li>
                            <li class="breadcrumb-item active"><?php echo $action; ?></li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               
                                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="card-title">Social Media Form</h4>
                                <h6 class="card-subtitle"></h6>
                                 <?php if(isset($error)){ echo $error; }
                                   echo $this->session->flashdata("message"); ?>
                                <form class="form" name="form" id="form_edit" role="form" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input class="form-control" type="text" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Link<span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input class="form-control" type="url" name="link" id="link">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Icon Class<span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input class="form-control" type="text" name="icon_class" id="icon_class">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                           <input type="checkbox" class="js-switch tgl_checkbox" name="status"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                     
                                         <div class="col-lg-2 col-md-2 col-sm-2">
                                         </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <button type="submit" class="btn btn-info"  id="save_button" name="save_button" value="Update">Save</button>
                                        <a href="<?php echo site_url("social/social_media_list"); ?>" class="btn btn-inverse">Cancel</a>
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
   $(document).ready( function() {
    $('#error').delay(3000).fadeOut();
  });


</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>


<script>
    jQuery.validator.addMethod("password_check", function (value, element) {
        return this.optional(element) || /(?=.*\d)(?=.*[a-z])(?=.*[!@#\$%\^&\*\?\[({\]})"\';:_\-<>\., =\+\/\\])(?=.*[A-Z]).{8,}/.test(value);
    }, "Please provide a Strong Password. 'e.g:Password@123'");

  // Wait for the DOM to be ready

$('#image').bind('change', function() {
    var a=(this.files[0].size);
    if(a > 1024000) {
        alert('Not accept more than 1MB image');
        $("#image").val(null);
    };
});
$('#certificate').bind('change', function() {
    var a=(this.files[0].size);
    if(a > 1024000) {
        alert('Not accept more than 1MB');
        $("#certificate").val(null);
    };
});

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#email").bind('keyup', function (e) {
        if (e.which >= 97 && e.which <= 122) {
            var newKey = e.which - 32;
            // I have tried setting those
            e.keyCode = newKey;
            e.charCode = newKey;
        }

        $("#email").val(($("#email").val()).toLowerCase());
    });

  $("#form_edit").validate({
    // Specify validation rules
    rules: {
        'name': {required:true},
        'link': {required:true},
        'icon_class': {required:true},
    },
    messages: {
        'name':  { required: "Please enter Social Media"},
        'link':  { required: "Please enter Link"},
        'icon_class':  { required: "Please enter icon class"},
    },

    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
    $('#save_button').click(function() {
        if($('#form_edit').valid()){
            $(this).attr('readonly', true);
            $(this).html('Updating...');
            $(this).parents('form').submit();
        }
    });

});


</script>
