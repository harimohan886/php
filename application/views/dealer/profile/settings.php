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

        <title><?php echo $title; ?> | Admin - <?php echo $page; ?></title>
        <?php $this->load->view("partners/common/common_css"); ?>
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
            <?php $this->load->view("partners/common/common_header"); ?>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <?php $this->load->view("partners/common/common_sidebar"); ?>
            <!-- ============================================================== -->
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
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>partners/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active"><?php echo $page; ?></li>
                            </ol>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Admin Profile</h4>
                                    <h6 class="card-subtitle"></h6>
                                    <?php if (isset($error)) {
                                        echo $error;
                                    }
                                    echo $this->session->flashdata("message");
                                    ?>
                                    <form class="form" name="form" id="form_edit" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">name <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="text" name="username" value="<?php echo $admindata->name; ?>" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Email ID <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="text" name="email" value="<?php echo $admindata->email; ?>" id="email" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <textarea class="form-control" name="location" value="" id="location"><?php echo $admindata->location; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Country<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <select name="country" id="country" class="form-control select2">
                                                    <option value="">Select Country</option>
                                                    <?php
                                                        foreach ($countryname as $row) {
                                                            //echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                                            ?>
                                                            <option name="<?php echo $row->id; ?>" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>"  <?php if ($admindata->country_id == $row->id) {
                                                            echo "selected";
                                                        } ?>  ><?php echo ucwords($row->name); ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">State<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <select name="state" id="state" class="form-control select2">
                                                    <option value="">Select State</option>
                                                    <?php
                                                        foreach ($statename as $row) {
                                                            //echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                                            ?>
                                                            <option name="<?php echo $row->id; ?>" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>"  <?php if ($admindata->state_id == $row->id) {
                                                            echo "selected";
                                                        } ?>  ><?php echo ucwords($row->name); ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">City<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <select name="city" id="city" class="form-control select2">
                                                    <option value="">Select City</option>
                                                    <?php
                                                        foreach ($cityname as $row) {
                                                            //echo '<option value="'.$row->id.'">'.$row->name.'</option>';
                                                            ?>
                                                            <option name="<?php echo $row->id; ?>" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>"  <?php if ($admindata->city_id == $row->id) {
                                                            echo "selected";
                                                        } ?>  ><?php echo ucwords($row->name); ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image <span class="text-danger"></span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="file" name="image" id="image"  class="dropify"  accept="image/*" />
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <img src="<?php echo base_url() . $admindata->profile_pic; ?>" style="height:50px; width: 50px;" >
                                            </div>
                                        </div>
                                        -->                                   
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Old Password <span class="text-danger"></span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="password" name="oldpassword" value="" id="example-password-input">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">New Password <span class="text-danger"></span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="password" name="newpassword" value="" id="newpassword">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Confirm Password <span class="text-danger"></span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="password" name="confirmpassword" value="" id="confirmpassword">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <button type="submit" class="btn btn-info"  id="save_button" name="save_button" value="Update">Submit</button>
                                                <a href="<?php echo site_url("partners/dashboard"); ?>" class="btn btn-inverse">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <?php $this->load->view("partners/common/common_footer"); ?>
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
        <?php $this->load->view("partners/common/common_js"); ?>
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#error').delay(3000).fadeOut();
        $('#country').change(function () {
            var country_id = $('#country').val();
            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_state",
                    method: "POST",
                    data: {country_id: country_id},
                    success: function (data) {
                        //$('#state').html('');
                        $('#state').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            } 
            else {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#state').change(function () {
            var state_id = $('#state').val();
            if (state_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_city",
                    method: "POST",
                    data: {state_id: state_id},
                    success: function (data)
                    {
                        $('#city').html(data);
                    }
                });
            } 
            else {
                $('#city').html('<option value="">Select City</option>');
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script>
    jQuery.validator.addMethod("password_check", function (value, element) {
        return this.optional(element) || /(?=.*\d)(?=.*[a-z])(?=.*[!@#\$%\^&\*\?\[({\]})"\';:_\-<>\., =\+\/\\])(?=.*[A-Z]).{8,}/.test(value);
    }, "Please provide a Strong Password. 'e.g:Password@123'");
     // Wait for the DOM to be ready

     $('#image').bind('change', function () {
        var a = (this.files[0].size);
        if (a > 1024000) {
            alert('Not accept more than 1MB image');
            $("#image").val(null);
        };
    });

    $(function () {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("#form_edit").validate({
            // Specify validation rules
            rules: {
                'username': {required: true},
                'location': {required: true},
                'city': {required: true},
                'country': {required: true},
                'email': {required: true, email: true},
                'image': { accept: "image/*" },
                'newpassword': {minlength: 5, password_check: false},
                'confirmpassword': {minlength: 5, password_check: false, equalTo: '[id="newpassword"]'},
            },
            messages: {
                'username': {required: "Please enter username"},
                'location': {required: "Please enter Location"},
                'city': {required: "Please enter City"},
                'country': {required: "Please enter Country"},
                'email': {required: "Please enter email id", email: "Please enter valid email"},
                'image': { accept: 'Please provide valid Image File' },
                'newpassword': {minlength: "Please enter minimum 5 character"},
                'confirmpassword': {minlength: "Please enter minimum 5 character", equalTo: "Password and confirm password must be same."},
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
        $('#save_button').click(function () {
            if ($('#form_edit').valid()) {
                $(this).attr('readonly', true);
                $(this).html('Updating...');
                $(this).parents('form').submit();
            }
        });
    });
</script>