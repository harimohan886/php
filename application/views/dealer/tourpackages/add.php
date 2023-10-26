<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("dealer/common/common_css"); ?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.filer-dragdropbox-theme.css">
    </head>
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
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>tour_dealer/tour_package_list">Tour List</a></li>
                                <li class="breadcrumb-item active">Add</li>
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
                                    <form class="form" name="form" id="form" role="form" method="post"
                                          enctype="multipart/form-data" autocomplete="off">
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Language</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="language_id" id="language_id">
                                                    <option value="">SELECT LANGUAGE</option>
                                                        <?php foreach ($language as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->language; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Tour Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Price</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="regular_price" name="regular_price" placeholder="Tour Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Discount
                                                Price</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="sale_price" name="sale_price" placeholder="Tour Discount Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Child     Price (Below  12 Years)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="child_price" name="child_price" placeholder="Tour Children Price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">AVAILABILITY</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="avability" name="avability"
                                                       placeholder="AVAILABILITY">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="description" name="description" placeholder="Description">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Location</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="address" name="address" placeholder="Location">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Country</label>
                                            <div class="col-sm-8">
                                                <select name="country" id="country" class="input-sm form-control select 2 label-input">
                                                    <option value="">Select Country</option>
                                                    <?php
                                                        foreach ($country as $row) {
                                                            echo '<option value="' . $row->id . '">' . $row->name . '</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">State</label>
                                            <div class="col-sm-8">
                                                <select name="state" id="state" class="input-sm form-control select 2 label-input">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">City</label>
                                            <div class="col-sm-8">
                                                <select name="city" id="city" class="input-sm form-control select 2 label-input">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Banner Image</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="file" id="banner" name="banner">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Include</label>
                                            <div class="col-sm-8">
                                                <?php if (!empty($tour_include) && count($tour_include) > 0) {
                                                    foreach ($tour_include as $include) {
                                                        ?>

                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="<?php echo trim($include->name); ?>" name="included[]" value="<?php echo $include->id; ?>">
                                                            <label class="custom-control-label" for="<?php echo trim($include->name); ?>"><?php echo $include->name; ?></label>
                                                        </div>
    <?php } ?>                                  <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Start Date</label>
                                            <div class="col-sm-8">
                                                <input  class="form-control" type="text"  id="startdate" name="startdate" placeholder="Tour start Date"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour End Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="endtdate" name="endtdate" placeholder="Tour End Date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Duration</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="duration" name="duration" placeholder="Duration">
                                            </div>
                                        </div>
                                        <div class="touroverview card" id="touroverview">
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Image Gallery</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control dropify" id="filer_input2" name="gallery[]" placeholder="Place Image" multiple accept="image/*">
                                            </div>
                                        </div>

                                        <div class="form-group py-2 row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="btn btn-info" id="save_buttons" name="save_button" value="Save">
                                                <button type="submit" class="btn btn-primary px-5" id="save_button" name="save_button" value="Save">Save</button>
                                                <a href="<?php echo site_url("tour_dealer/tour_package_list"); ?>" class="btn btn-warning px-5">Cancel</a>
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
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/jquery.filer.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('#error').delay(6000).fadeOut();
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
                            } else {
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
                                    success: function (data) {
                                        $('#city').html(data);
                                    }
                                });
                            } else {
                                $('#city').html('<option value="">Select City</option>');
                            }
                        });
                    });
                </script>
                <script>
                    $(function () {
                        jQuery.validator.addMethod("maskedPhone", function (value, element) {
                            return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
                        }, "Please enter valid number.");

                        $("#form").validate({
                            rules: {
                                language_id: {required: true, min: 1, },
                                regular_price: {required: true, number: true, },
                                sale_price: {required: true, number: true, },
                                child_price: {required: true, number: true, },
                                name: {required: true, },
                                banner: {required: true, },
                                description: {required: true, },
                                address: {required: true, },
                                country: {required: true, },
                                state: {required: true, },
                                city: {required: true, },
                                avability: {required: true, },
                                startdate: {required: true, },
                                endtdate: {required: true,},
                                "gallery[]" : {required: true, },
                                "placename[]": "required",
                                "placedesc[]": "required",
                                "placeimage[]": "required",
                            },
                            messages: {
                                language_id: {required: "Please select Language", min: "Please select Language", },
                                regular_price: {required: "Please Enter Price", number: "please Enter Number Only"},
                                sale_price: {required: "Please Enter Price", number: "please Enter Number Only"},
                                child_price: {required: "Please Enter Price", number: "please Enter Number Only"},
                                name: {required: "Please Enter Tour Name", },
                                banner: {required: "Please Select Banner Image", },
                                description: {required: "Please Enter Tour Description", },
                                address: {required: "Please Enter Location", },
                                country: {required: "Enter Your Country", },
                                state: {required: "Enter Your State", },
                                city: {required: "Enter Your City", },
                                avability: {required: "Please Enter AVAILABILITY", },
                                startdate: {required: "Please Enter Start Date", },
                                endtdate: {required: "Please Enter End Date",},
                                "gallery[]" : "Choose Image",
                                "placename[]": "Please Enter Place Name",
                                "placedesc[]": "Please Enter Place Description",
                                "placeimage[]": "Please Enter Place Image",
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    });
                    $(function () {
                        $("#startdate").datepicker({
                            dateFormat: 'yy/mm/dd',
                            changeMonth: true,
                            changeYear: true,
                            minDate: 'today',
                        });
                        $("#endtdate").datepicker({
                            dateFormat: 'yy/mm/dd',
                            changeMonth: true,
                            changeYear: true,
                            minDate: 'today',
                        });
                    });
                    $(document).on("change", "#startdate", function () {
                        // Reset the To date
                        $('#endtdate').datepicker('setDate', null);
                    });

                    var from, to;
                    $(document).on("change", "#endtdate", function () {
                        // Get the dates
                        from = document.getElementById('startdate').value;
                        to = document.getElementById('endtdate').value;
                        calculate(from, to);
                    });

                    function calculate(d1, d2) {
                        d1 = new Date(d1);
                        d2 = new Date(d2);
                        var oneDay = 24 * 60 * 60 * 1000;
                        var diff = 0;
                        if (d1 && d2) {
                            var diff = new Date(d2 - d1);
                            var days = diff / 1000 / 60 / 60 / 24;
                            if(days<0)
                            {
                                alert("Enter Valid End-Date");
                                $("#endtdate").val("");
                                $("#duration").val("");
                            }
                            else
                            {
                            $("#duration").val(days);
                            $('#duration').attr('readonly', true);
                            $('#duration').addClass('form-control-plaintext');
                            var a = parseInt(days);
                            $("#touroverview").html('');
                            var data = '';
                            for (var i = 1; i <= a; i++) {
                                data += '<div class="card-header text-center">Day ' + i + '</div>';
                                data += '<div class="card-body">';
                                data += '<div class="form-group row">';
                                data += '<label  class="col-sm-2 col-form-label">Place Name</label>';
                                data += '<div class="col-sm-8">';
                                data +=
                                        '<input class="form-control" type="text" id="placename" name="placename[]" placeholder="Place Name" required>';
                                data += '</div>';
                                data += '</div>';
                                data += '<div class="form-group row">';
                                data += '<label  class="col-sm-2 col-form-label">Place Description</label>';
                                data += '<div class="col-sm-8">';
                                data +=
                                        '<textarea class="form-control" id="placedesc" name="placedesc[]" placeholder="Place Description" required></textarea>';
                                data += '</div>';
                                data += '</div>';
                                data += '<div class="form-group row">';
                                data += '<label  class="col-sm-2 col-form-label">Place Image</label>';
                                data += '<div class="col-sm-8">';
                                data +=
                                        '<input type="file" class="form-control" id="placeimage" name="placeimage[]" placeholder="Place Image" required>';
                                data += '</div>';
                                data += '</div>';
                                data += '</div>';
                                data += '</div>';
                            }
                            }
                            $("#touroverview").html(data);
                        }
                    }
                    //$('.imagegallery').imageUploader();
                    $("#filer_input2").filer();
                    $('.btnNext').click(function () {
                        $('.nav-tabs > .active').next('li').find('a').trigger('click');
                    });
                    $('.btnPrevious').click(function () {
                        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                    });
                </script>