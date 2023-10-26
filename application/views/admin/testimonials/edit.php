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
            <h4 class="page-title"><?php echo $page . " " .$action; ?></h4>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>testimonials/testimonials_list"><?php echo $page; ?></a></li>
            <li class="breadcrumb-item active"><?php echo $action; ?></li>
         </ol>
       </div>
     </div>


    <div class="col-lg-12">
         
         <div class="card">

          <div class="card-body">
          <div class="card-title"><?php echo $page . " " .$action; ?></div>
          <hr>
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
          <form class="form" name="form" id="form" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="input-21" class="col-sm-2 col-form-label">Language</label>
              <div class="col-sm-8">
              <select name="language" id="language" class="form-control select2">
                  <option name="" id="" value="">-- Select Language ---</option>
                  <?php if(count($language)>0) {
                   foreach($language as $k=>$cd) {
                    ?>
                    <option name="<?php echo $cd->id; ?>" id="<?php echo $cd->id; ?>" value="<?php echo $cd->id; ?>"  <?php if($testimonials_records->language_id == $cd->id) { echo "selected"; } ?>  ><?php echo ucwords($cd->language); ?></option>
                 <?php }
                 } ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Testimonial Name</label>
                <div class="col-sm-8">
                <input type="text" name="name" id="name" class="form-control" placeholder="Plz Enter Testimonial Name" value="<?php echo $testimonials_records->name; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Testimonial Position</label>
                <div class="col-sm-8">
                <input type="text" name="position" id="position" class="form-control" placeholder="Please Enter Testimonial Position" value="<?php echo $testimonials_records->position; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Testimonial Details</label>
                <div class="col-sm-8">
                <textarea class="form-control" id="details" name="details" placeholder="Please Enter Testimonial Details"><?php echo $testimonials_records->details; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-8">
                 <input class='tgl tgl-ios tgl_checkbox js-switch' name="status" type='checkbox' <?php echo ($testimonials_records->status=='1')? "checked" : ""; ?> />
                </div>
            </div>

            <div class="form-group row">
              <label for="input-23" class="col-sm-2 col-form-label">Testimonial Image</label>
              <div class="col-sm-4">
              <input class='form-control' name="image" type='file' id="image">
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                  <?php  $returnpath = $this->config->item('testimonials_images_uploaded_path'); ?>
                  <img src="<?php echo $returnpath.$testimonials_records->image; ?>" class="round" alt="image" height="50px" width="50px">
              </div>
            </div>
            
            <div class="form-group py-2 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" name="save_button" id="save_button" value="Update" class="btn btn-primary px-5">
                  <a href="<?php echo site_url("testimonials/testimonials_list"); ?>" class="btn btn-warning px-5">Cancel</a>
                </div>
            </div>
          </form>
        </div>
         </div>
       </div>
<!--start overlay-->
          <div class="overlay toggle-menu"></div>
        <!--end overlay-->



        </div>
    </div>
    <!-- End container-fluid-->


    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

</body>
</html>
<?php $this->load->view("admin/common/common_js"); ?>


<script>

$(document).ready( function() {
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

        jQuery.validator.addMethod("maskedPhone", function (value, element) {
          return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
        }, "Please enter valid number.");

        $("#form").validate({
        rules: {
            name: {
                required:true,
            },
            position: {
                required:true,
            },
            details: {
                required:true,
            },
            language: {
                required:true,
            },
        },
        messages: {
            name: {
                required:"Please Enter Testimonial Name",
            },
            position: {
                required:"Please Enter Testimonial Position",
            },
            details: {
                required:"Please Enter Testimonial Details",
            },
            language: {
                required:"Please Select Language",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>



