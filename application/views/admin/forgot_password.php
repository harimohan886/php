<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $logopath=$this->config->item('logo_path'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title><?php echo PROJECT_NAME; ?> | Login </title>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="<?php echo base_url(); ?>assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body>

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
    <div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
         <div class="card-content p-2">
            <div class="text-center">
                <img src="<?php echo base_url(); ?>assets/images/sticker.png" alt="logo icon">
            </div>
          <div class="card-title text-uppercase text-center py-3">Sign In</div>

                        <?php if(isset($error)){ echo $error; }
                                  echo $this->session->flashdata("message"); ?>
                                    <?php 
                        if(isset($_SESSION['login_message']) && !empty($_SESSION['login_message'])) {
                            echo $this->session->flashdata("login_message"); 
                            unset($_SESSION['login_message']);
                        }
                        ?>

            <form class="md-float-material form-material" name="loginform" id="loginform" method="post"  enctype="multipart/form-data">
              <div class="form-group">
              <label for="exampleInputUsername" class="sr-only">Username</label>
               <div class="position-relative has-icon-right">
                  <input type="text" id="email" name="email" class="form-control input-shadow"  placeholder="Your Email Address">
                  <div class="form-control-position">
                      <i class="icon-user"></i>
                  </div>
               </div>
              </div>
             
            <div class="form-row">
             <div class="form-group col-6">
               <div class="icheck-material-primary">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
              </div>
             </div>
             <div class="form-group col-6 text-right">
              <a href="<?php echo base_url(); ?>/login">Login</a>
             </div>
            </div>
             <button type="button" class="btn btn-primary btn-block" id="btnContactUs">Forgot Password</button>
             </form>
           </div>
          </div>
          <div class="card-footer text-center py-3">
            <p class="text-dark mb-0">Do have an account? <a href="<?php echo base_url(); ?>"> Login</a></p>
          </div>
         </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
    
    
    
    </div><!--wrapper-->
    
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
  <!-- sidebar-menu js -->
  <script src="<?php echo base_url(); ?>assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/app-script.js"></script>
  
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
  // Wait for the DOM to be ready

$(function() {
  $("#loginform").validate({
    rules: {
      email: "required",
      password: "required",
     
    },
    messages: {
      email: "Please enter username",
      password: "Please enter password",
    },
    submitHandler: function(form) {
      form.submit();
    }
  });




   $('#btnContactUs').click(function() {
        if($('#loginform').valid()){
            $(this).attr('disabled', 'disabled');
            var html ="<div class='preloader3 loader-block'><div class='circ1 loader-theme loader-lg'></div><div class='circ2 loader-theme loader-lg'></div><div class='circ3 loader-theme loader-lg'></div><div class='circ4 loader-theme loader-lg'></div></div>";
            $(this).html('');
            $(this).html(html);
            $(this).parents('form').submit();
        }
    });
});

</script>   
