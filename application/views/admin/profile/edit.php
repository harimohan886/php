<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reswipe Admin |  Dashboard </title>

  <?php  $this->load->view("admin/common/common_css"); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

       

            <!-- sidebar menu -->
            <?php  $this->load->view("admin/common/common_sidebar"); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <?php //  $this->load->view("admin/common/menu_footer_button"); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>


         <?php  $this->load->view("admin/common/common_header"); ?>


<!-- page content -->
      <div class="right_col" role="main">
          <div class="">
          
            <div class="page-title">
              <div class="title_left">
                <h3>Admin<small></small></h3>
              </div>

             

            </div>

            <div class="clearfix"></div>


                    


            <!-- data load -->
                  <div class="row" style="min-height: 650px">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit profile <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
              
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                     <form role="form"  id="demo-form2" action="" method="post" data-parsley-validate class="form-horizontal form-label-left">
            <?php 
             if(!empty($error)){ 
          if (strpos($error, '<strong>Success!</strong> Profile Updated Successfully') !== false) { ?>
          <div class="alert alert-success alert-dismissible" id="error" role="alert">
            <?php } else { ?>
                 <div class="alert alert-warning alert-dismissible" role="alert" id="error">
             <?php } ?> 
 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<?php echo $error; ?> 
</div> 
            <?php  } ?>

                             

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name"  class="form-control col-md-7 col-xs-12" placeholder="Name" value="<?php echo $admindata->name; ?>" >
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email"  class="form-control col-md-7 col-xs-12" placeholder="Em@il ID" value="<?php echo $admindata->email; ?>" >
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Old Password <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="oldpassword" placeholder="Old password" name="oldpassword"  type="password" class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="newpassword" placeholder="New password" name="newpassword"  type="password" class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input id="cnewpassword" placeholder="Confirm password" name="confirmpassword" type="password" class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>

                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              
                          <button type="submit" class="btn btn-success">Update</button>
                           <a href="<?php echo site_url("admin/dashboard/"); ?>" class="btn btn-primary">Cancel</a>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>


        
             <!-- data load close -->



<br><br><br>
        <!-- /page content -->

        <!-- footer content -->
         <?php  $this->load->view("admin/common/common_footer"); ?>

        
        <!-- /footer content -->
      </div>
    </div>

      <?php  $this->load->view("admin/common/common_js"); ?>

  </body>
</html>
    <script type="text/javascript"> 
  $(document).ready( function() {
    $('#error').delay(3000).fadeOut();
  });
    </script>