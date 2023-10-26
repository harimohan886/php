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
            <li class="breadcrumb-item active"><?php echo $cms_page->title; ?></li>
            <li class="breadcrumb-item active"><?php echo $action; ?></li>
       </div>
     </div>


    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <h4><?php echo $page ." ". $action; ?></h4>
                <span></span>
            </div>
            <div class="card-body">
                <div class="card-block">

                    <?php
                    if (isset($error)) {
                        echo $error;
                    }
                    echo $this->session->flashdata("message");
                    ?>

                <form class="form" name="form" id="form" role="form" method="post" enctype="multipart/form-data">
                    <h3 class="box-title"><?php echo ucfirst($cms_page->title); ?> Details</h3>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-12">
                        <textarea class="form-control" id="description" name="description"><?php echo $cms_page->desc; ?></textarea>
                        </div>
                    </div>
                    <hr>
                    
                    
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input type="submit" name="save_button" id="save_button" value="Update" class="btn btn-primary px-5">
                                        <a href="<?php echo site_url("admin/dashboard"); ?>" class="btn btn-inverse">Cancel</a>
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

<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

    <script>
    CKEDITOR.replace('description');
    </script>   

<script>
  $(function() {
  
  
    $("#form").validate({
        rules: {
            description:{
                required:true, 
            },
        },
        messages: {
            description:{
            required:"Please enter description"
            },
        },
        submitHandler: function(form) {
          form.submit();
        }
    });

    $('#save_button').click(function() {
        if($('#form').valid()){
            $(this).attr('readonly', true);
            $(this).html('Saving...');
            $(this).parents('form').submit();
        }
    });
});

</script>


