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
.field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
      }

      .container{
        padding-top:50px;
        margin: auto;
      }
      #confirm {display: none;}
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

                                         <?php 
                                    if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                                        echo $this->session->flashdata("message"); 
                                        sleep(0.2);
                                        unset($_SESSION['message']);
                                        unset($_SESSION['message']);
                                        unset($_SESSION['message']);
                                        
                                    }
                                    ?>


                                        <div class="page-body">


                                        <div class="card">
                            <div class="card-body">
                                
                                <h4 class="card-title">Admin Profile</h4>
                                <h6 class="card-subtitle"></h6>
                                 <?php if(isset($error)){ echo $error; }
                                   echo $this->session->flashdata("message"); ?>
                                <form class="form" name="form" id="form_edit" role="form" method="post" enctype="multipart/form-data">
                                 
                                    <div class="form-group m-t-40 row">
                                        <label for="example-password-input" class="col-sm-2 col-form-label">Old Password <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" name="oldpassword" value="" id="password-oldpass">
                                            <span toggle="#password-oldpass" class="fa fa-fw fa-eye field-icon toggle-oldpass"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">New Password <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" name="newpassword" value="" id="password-field">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <a href="#" class="link-password" id="confirm">Use Password</a>
                                            <a href="#" class="link-password" id="generate">Generate Password</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8" id="random">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="password" name="confirmpassword" value="" id="password-confirm">
                                            <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-confirm"></span>
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
        'oldpassword' : {
            required:true,
        },
        'newpassword': { minlength:5, required:true, password_check:false },
        'confirmpassword': { minlength:5, required:true, password_check: false, equalTo:'[id="password-field"]'},
    },
    messages: {
        'oldpassword':{
            required:"Please enter old password",
        },
        'newpassword': {minlength:"Please enter minimum 5 character" , required:"Please enter New password", },
        'confirmpassword': {minlength:"Please enter minimum 5 character" , required:"Please enter Confirm password", equalTo: "Password and confirm password must be same."},
    },

    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
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

    $(".toggle-password").click(function() {

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


    $('#save_button').click(function() {
        if($('#form_edit').valid()){
            $(this).attr('readonly', true);
            $(this).html('Updating...');
            $(this).parents('form').submit();
        }
    });

});


</script>
