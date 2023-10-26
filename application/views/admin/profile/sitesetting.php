<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php $this->load->view("admin/common/common_css"); ?>
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

                                                        <li class="breadcrumb-item active"><?php echo $page; ?></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="page-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4><?php echo $page; ?></h4>
                                                    <span></span>
                                                </div>
                                                <div class="card-block">
                                                    <?php if(isset($error)){ echo $error; }
                                                       echo $this->session->flashdata("message"); ?>
                                                    <?php $logopath=$this->config->item('logo_path'); ?>
                                                    <form class="form" name="form" id="form_edit" role="form" method="post" enctype="multipart/form-data">

                                                        <!-- <div class="form-group row">
                                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Header Logo <span class="text-danger"></span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <input type="file" name="header_logo" id="header_logo"  class="dropify"  accept="image/*" />
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                                <img src="<?php echo $logopath.$site_setting->header_logo; ?>" style="height:150px; width: 150px;" >
                                                            </div>
                                                        </div> -->

                                                        <!-- <div class="form-group row">
                                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Footer Logo <span class="text-danger"></span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <input type="file" name="footer_logo" id="footer_logo"  class="dropify"  accept="image/*" />
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6" >
                                                                <img src="<?php echo $logopath.$site_setting->footer_logo; ?>" style="height:150px; width: 150px;background:silver;" >
                                                            </div>
                                                        </div> -->

                                                        <div class="form-group row">
                                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Background Image Logo <span class="text-danger"></span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <input type="file" name="background_logo" id="background_logo"  class="dropify"  accept="image/*" />
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6" >
                                                                <img src="<?php echo $logopath.$site_setting->background_logo; ?>" style="height:150px; width: 150px;background:silver;" >
                                                            </div>
                                                        </div>

                                                        <!-- <div class="form-group row">
                                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Footer Description <span class="text-danger"></span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <textarea name="site_description" class="form-control"><?php echo $site_setting->site_description;?></textarea>
                                                            </div>
                                                        </div> -->


                                                        <div class="form-group row">
                                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Last Modified At <span class="text-danger"></span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                               <p class="lead"><?php echo $site_setting->modified_at;?></p>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <button type="submit" class="btn btn-info"  id="save_button" name="save_button" value="Update">Update</button>
                                                            <a href="<?php echo site_url("admin/dashboard"); ?>" class="btn btn-inverse">Cancel</a>
                                                            </div>
                                                        </div>
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

    <?php $this->load->view("admin/common/common_js"); ?>

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

$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#form_edit").validate({
    // Specify validation rules
    rules: {
        'username': {required:true},
        'email':{required:true,email:true},
        'image': {
            accept: "image/*"
        },
        'newpassword': { minlength:5, password_check:false },
        'confirmpassword': { minlength:5, password_check: false, equalTo:'[id="newpassword"]'},
    },
    messages: {
    'username':  { required: "Please enter username"},
    'email':{required:"Please enter email id",email:"Please enter valid email"},
    'image': {
        accept: 'Please provide valid Image File'
      },
    'newpassword': {minlength:"Please enter minimum 5 character" },
    'confirmpassword': {minlength:"Please enter minimum 5 character" , equalTo: "Password and confirm password must be same."},
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
