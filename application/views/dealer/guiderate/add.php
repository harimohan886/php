<!DOCTYPE html>
<html lang="en">
    <head><?php $this->load->view("dealer/common/common_css"); ?></head>
    <body>
        <?php $this->load->view("dealer/common/common_theme_loader"); ?>
        <!-- Start wrapper-->
        <div id="wrapper">
            <?php $this->load->view("dealer/common/common_sidebar"); ?>
            <?php $this->load->view("dealer/common/common_header"); ?>
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row pt-2 pb-2">
                        <div class="col-sm-9">
                            <h4 class="page-title"><?php echo $action; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dealer/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>guide_rate/guide_rate_list">Guide Rate List</a></li>
                                <li class="breadcrumb-item active"><?php echo $action; ?></li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title"><?php echo $action; ?></div>
                                <hr>
                                <div class="card-block">
                                    <?php
                                    if (validation_errors()) {
                                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Warning!</strong> ';
                                        echo validation_errors();
                                        echo '</div>';
                                    }
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    ?>
                                    <form class="form" name="form" id="form" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Language</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="language_id">
                                                    <option value="">SELECT LANGUAGE</option>
                                                    <?php foreach ($language as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->language; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Country</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="country_id">
                                                    <option value="">SELECT Country</option>
                                                    <?php foreach ($country as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Currency</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="currency" name="currency" placeholder="Currency">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Rate</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="rate" name="rate" placeholder="Rate">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" id="indeterminate-checkbox" name="status" class="js-switch" />
                                            </div>
                                        </div>
                                        <div class="form-group py-2 row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="btn btn-info" id="save_buttons"
                                                       name="save_button" value="Save">
                                                <button type="submit" class="btn btn-primary px-5" id="save_button"
                                                        name="save_button" value="Save">Save</button>
                                                <a href="<?php echo site_url("guide_rate/guide_rate_list"); ?>"
                                                   class="btn btn-warning px-5">Cancel</a>
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
                    $(document).ready(function () {
                        $('#error').delay(3000).fadeOut();
                    });
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
                <script>
                    $(function () {

                        jQuery.validator.addMethod("maskedPhone", function (value, element) {
                            return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
                        }, "Please enter valid number.");

                        $("#form").validate({
                            rules: {
                                language_id: { required: true,  min: 1, },
                                country_id: { required: true, min: 1, },
                                currency: { required: true, },
                                rate: { required: true, },
                            },
                            messages: {
                                language_id: { required: "Select Language", min: "Select Language", },
                                country_id: { required: "Select Country", min: "Select Country", },
                                currency: { required: "Please Enter Currency", },
                                rate: { required: "Please Enter Your Rate", },
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    });
                </script>