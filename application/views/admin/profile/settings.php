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
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active"><?php echo $page; ?></li>
         </ol>
       </div>
     </div>


    <div class="col-lg-12">
         
         <div class="card">

          <div class="card-body">
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
            <?php 
                if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                    echo $this->session->flashdata("message"); 
                    sleep(2);
                    unset($_SESSION['message']);
                    unset($_SESSION['message']);
                    unset($_SESSION['message']);
                    
                }
            ?>
            <?php if(isset($error)){ echo $error; }
                echo $this->session->flashdata("message"); ?>
          <form class="form" name="form" id="form" role="form" method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-4">
                <input class="form-control" type="text" name="username" value="<?php echo $admindata->username; ?>" id="example-text-input">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Email ID</label>
                <div class="col-sm-4">
                <input class="form-control" type="text" name="email" value="<?php echo $admindata->email; ?>" id="email">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-4">
                <input type="file" name="image" id="image"  class="dropify"  accept="image/*" />
                </div>
                <div class="col-sm-6">
                    <?php $returnpath = $this->config->item('admin_images_uploaded_path'); ?>
                <img src="<?php echo $returnpath.$admindata->image; ?>" style="height:50px; width: 50px;" >
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-4">
                <input class="form-control" type="password" name="oldpassword" placeholder="Old Password" id="password-oldpass">
                <span toggle="#password-oldpass" class="fa fa-fw fa-eye field-icon toggle-oldpass"></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-4">
                    <input class="form-control" type="password" name="newpassword" value="" id="password-field">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <a href="#" class="link-password" id="confirm">Use Password</a>
                    <a href="#" class="link-password" id="generate">Generate Password</a>
                </div>
                <div class="col-sm-4" id="random">
                </div>
            </div>

            <div class="form-group row">
                <label for="input-22" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-4">
                    <input class="form-control" type="password" name="confirmpassword" value="" id="password-confirm">
                    <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-confirm"></span>
                </div>
            </div>
            
            <div class="form-group py-2 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary px-5"  id="save_button" name="save_button" value="Update">Submit</button>
                  <a href="<?php echo site_url("admin/dashboard"); ?>" class="btn btn-warning px-5">Cancel</a>
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
    $("#confirm").hide();
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
        'confirmpassword': { minlength:5, password_check: false, equalTo:'[id="password-field"]'},
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

    $(".toggle-password").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });

    $(".toggle-confirm").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });

    $(".toggle-oldpass").click(function() {

          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });

    $('.link-password').click(function(e){
            linkId = $(this).attr('id');
            if (linkId == 'generate'){
                password = $.password(12,true);
                $('#random').html('');
                $('#random').hide().append(password).fadeIn('slow');
                $('#confirm').fadeIn('slow');
            } else {
                $('#password-field').val(password);
                $('#password-confirm').val(password);
                $('#random').html('');
                $(this).hide();
            }
            e.preventDefault();
        });

    $.extend({
          password: function (length, special) {
            var iteration = 0;
            var password = "";
            var randomNumber;
            if(special == undefined){
                var special = false;
            }
            while(iteration < length){
                randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
                if(!special){
                    if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
                    if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
                    if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
                    if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
                }
                iteration++;
                password += String.fromCharCode(randomNumber);
            }
            return password;
          }
    });

});


</script>
