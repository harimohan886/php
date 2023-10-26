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
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>banner/banner_list"><?php echo $page; ?></a></li>
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
                    <option name="<?php echo $cd->id; ?>" id="<?php echo $cd->id; ?>" value="<?php echo $cd->id; ?>"  <?php if($banner_records->language_id == $cd->id) { echo "selected"; } ?>  ><?php echo ucwords($cd->language); ?></option>
                 <?php }
                 } ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Tag</label>
                <div class="col-sm-8">
                <input type="text" name="tag" id="tag" class="form-control" placeholder="Plz Enter Tag" value="<?php echo $banner_records->tag; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                <input type="text" name="title" id="title" class="form-control" placeholder="Please Enter Title" value="<?php echo $banner_records->title; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-8">
                <input type="text" name="url" id="url" class="form-control" placeholder="Please Enter Url" value="<?php echo $banner_records->url; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-8">
                <textarea name="description" id="description" class="form-control" placeholder="Please Enter Description"><?php echo $banner_records->description; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
              <label for="input-23" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-4">
              <input class='form-control' name="image" type='file' id="image">
              </div>
              <div class="col-sm-4">
                  <?php  $returnpath = $this->config->item('banner_images_uploaded_path'); ?>
                  <img src="<?php echo $returnpath.$banner_records->image; ?>" class="round" alt="image" height="50px" width="50px">
              </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-8">
                 <input class='tgl tgl-ios tgl_checkbox js-switch' name="status" type='checkbox' <?php echo ($banner_records->status=='1')? "checked" : ""; ?> />
                </div>
            </div>
            
            <div class="form-group py-2 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" name="save_button" id="save_button" value="Update" class="btn btn-primary px-5">
                  <a href="<?php echo site_url("banner/banner_list"); ?>" class="btn btn-warning px-5">Cancel</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script>
    $(function() {

        jQuery.validator.addMethod("maskedPhone", function (value, element) {
          return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
        }, "Please enter valid number.");

        $("#form").validate({
        rules: {
            tag: {
                required:true,
            },
            title: {
                required:true,
            },
            url: {
                required:true,
                url:true,
            },
            description: {
                required:true,
            },
            language: {
                required:true,
            },
        },
        messages: {
            tag: {
                required:"Please Enter Tag",
            },
            title: {
                required:"Please Enter Title",
            },
            url: {
                required:"Please Enter Url",
                url:"Please Enter Valid Url",
            },
            description: {
                required:"Please Enter Description",
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



