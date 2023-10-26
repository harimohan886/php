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

        <title><?php echo $title; ?> | Admin - <?php echo $page; ?> <?php echo $action; ?></title>
        <?php $this->load->view("admin/common/common_css"); ?>
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

input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
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




</div>        <!-- ============================================================== -->
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
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>languages/messages_list"><?php echo $page; ?></a></li>
                            <li class="breadcrumb-item active"><?php echo $action; ?></li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               
                                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <!-- Validation wizard -->
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <?php
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    echo $this->session->flashdata("message");
                                    ?>
                                    <div class="alert alert-success alert-dismissible " role="alert" id="myElem" style="display:none">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Success !</strong> Designer activated successfully. </div>
                                    <div class="alert alert-danger alert-dismissible " role="alert" id="myElemNo"  style="display:none">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Success !</strong> Designer deactivated successfully. </div>

                                 <h4 class="card-title">Edit <?php echo $page; ?></h4>
                                <h6 class="card-subtitle"></h6>
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
                                 <form class="form" name="form" id="form_edit" role="form" method="post" enctype="multipart/form-data">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label"> Language  <span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                           <select name="languages" id="languages" class="form-control">
                                               <option name="" value="">--- Language ---</option>
                                               <option name="1" value="1"  <?php if($label_records->language_id == "1") { echo "selected"; } ?> >English</option>
                                               <option name="2" value="2"  <?php if($label_records->language_id == "2") { echo "selected"; } ?> >Arabic </option>
                                           </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label"> Message Key<span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input class="form-control" type="text" id="label_key" name="label_key" placeholder="Message key" value="<?php echo $label_records->label_key; ?>">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Message Value<span class="text-danger">*</span></label>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <input class="form-control" type="text" id="label_value" name="label_value" placeholder="Enter Message Value" value="<?php echo $label_records->label_value; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status  <span class="text-danger"></span></label>
                                        <div class="col-md-8">
                                            <input class='tgl tgl-ios tgl_checkbox js-switch' name="label_status" type='checkbox' <?php echo ($label_records->label_status=='1')? "checked" : ""; ?>/>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="hidden" class="btn btn-info" id="save_button" name="save_button" value="Update">
                                                       <button type="submit" class="btn btn-info" id="save_button" name="save_button" value="Update">Update</button>
                                                       <a href="<?php echo site_url("languages/messages_list"); ?>" class="btn btn-inverse">Cancel</a>
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
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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

   <?php $this->load->view("admin/common/common_js"); ?>
</body>
</html>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&libraries=places"></script>
<script>        
$(document).ready( function() {
$('#error').delay(3000).fadeOut();
});
$(function () {

        $("body").on("change", ".tgl_checkbox", function () {
            var table = $(this).data("table");
            var status = $(this).data("status");
            var id = $(this).data("id");
            var id_field = $(this).data("idfield");
            var bin = 0;

            if ($(this).is(':checked')) {
                bin = 1;
            }
            $.ajax({
                method: "POST",
                url: "<?php echo site_url("admin/change_status"); ?>",
                data: {table: table, status: status, id: id, id_field: id_field, on_off: bin}
            })
            .done(function (msg) {
                //  alert(msg);
                if (msg == '1') {
                    $("#myElem").show();
                    setTimeout(function () {
                        $("#myElem").hide();
                    }, 3000);

                } else if (msg == '0') {
                    $("#myElemNo").show();
                    setTimeout(function () {
                        $("#myElemNo").hide();
                    }, 3000);
                }
            });
        });
        var table = $('#example25').DataTable({
            aLengthMenu: [
                [5, 10, 25, 50, 100, -1],
                [5, 10, 25, 50, 100, "All"]
            ],
            "order": [[ 0, "DESC" ]]
        });
        var buttons = new $.fn.dataTable.Buttons(table, {
             buttons: [
               'csvHtml5',
               'pdfHtml5'
            ]
        }).container().appendTo($('#buttons'));
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

<script>
    $(function() {

        jQuery.validator.addMethod("maskedPhone", function (value, element) {
          return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
        }, "Please enter valid number.");

        $("#form_edit").validate({
        rules: {
            languages: {
                required:true
            },
            label_key:{
                required:true,
            },
            label_value:{
                required:true,
            },
        },
        messages: {
            languages: {
                required:"Please enter languages",
            },
            label_key:{
                required:"Please enter Message key",
            },
            label_value:{
                required:"Please enter Message Value",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });

    $('#save_button').click(function() {
        if($('#form_edit').valid()){
            $(this).attr('disabled', 'disabled');
            $(this).html('Updating...');
            $(this).parents('form').submit();
        }
    });
});
</script>

