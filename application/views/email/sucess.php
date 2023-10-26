<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TheLocal | Change Password </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.5 -->
 <link href="<?php  echo base_url(); ?>build/css/login.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
 <?php // $this->load->view("admin/common/common_css"); ?>
  </head>


<body class="login">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        
          <h1 class="text-center"><img src="<?php echo base_url() ?>images/Logo1.png" alt="Logo" align="center" width="200px"></h1>
        

           <?php if(isset($error)){ echo $error; }
                                   echo $this->session->flashdata("message"); ?>
                       
             <div class="form-group">
               <span class="text-center">Please login with Your App.</span>
              </div>            
        </div>
       
   
    </div>
 </div>

     <?php $this->load->view("admin/common/common_js"); ?>
  </body>
</html>
