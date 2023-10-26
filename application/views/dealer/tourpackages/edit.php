<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("dealer/common/common_css");?>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.filer-dragdropbox-theme.css">
    </head>
    <body>
        <?php $this->load->view("dealer/common/common_theme_loader");?>
        <!-- Start wrapper-->
        <div id="wrapper">
            <?php $this->load->view("dealer/common/common_sidebar");?>
            <?php $this->load->view("dealer/common/common_header");?>
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row pt-2 pb-2">
                        <div class="col-sm-9">
                            <h4 class="page-title"><?php echo $action; ?></h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dealer/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>tour_dealer/tour_package_list">Tour List</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
                                                <select class="form-control" name="language_id">
                                                    <option value="">SELECT LANGUAGE</option>
                                                        <?php foreach ($language as $row) {?>
                                                        <option value="<?php echo $row->id; ?>" <?php if ($tour_package_single->language_id == $row->id) {echo "selected";}?>>
                                                        <?php echo $row->language; ?>
                                                        </option>
                                                        <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Tour Name" value="<?php echo $tour_package_single->name; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Price</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="regular_price" name="regular_price" placeholder="Tour Price" value="<?php echo $tour_package_single->regular_price; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Discount Price</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="sale_price" name="sale_price" placeholder="Tour Discount Price" value="<?php echo $tour_package_single->sale_price; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Child     Price (Below  12 Years)</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="child_price" name="child_price" placeholder="Tour Children Price" value="<?php echo $tour_package_single->child_price; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">AVAILABILITY</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="avability" name="avability" placeholder="AVAILABILITY" value="<?php echo $tour_package_single->avability; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="description" name="description" placeholder="Description" value="<?php echo $tour_package_single->description; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Location</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="address" name="address" placeholder="Location" value="<?php echo $tour_package_single->address; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Country</label>
                                            <div class="col-sm-8">
                                                <select name="country" id="country" class="input-sm form-control select 2 label-input">
                                                    <option value="">Select Country</option>
                                                    <?php
foreach ($country as $row) {
 $sel = "";
 if ($tour_package_single->country_id == $row->id) {
  $sel = "selected='selected'";
 }
 echo '<option value="' . $row->id . '" ' . $sel . '>' . $row->name . '</option>';
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
                                                    <?php
foreach ($state as $rowst) {
 $selst = "";
 if ($tour_package_single->state_id == $rowst->id) {
  $selst = "selected='selected'";
 }
 echo '<option value="' . $rowst->id . '" ' . $selst . '>' . $rowst->name . '</option>';
}
?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">City</label>
                                            <div class="col-sm-8">
                                                <select name="city" id="city" class="input-sm form-control select 2 label-input">
                                                    <option value="">Select City</option>
                                                    <?php
foreach ($city as $rowct) {
 $selct = "";
 if ($tour_package_single->city_id == $rowct->id) {
  $selct = "selected='selected'";
 }
 echo '<option value="' . $rowct->id . '" ' . $selct . '>' . $rowct->name . '</option>';
}
?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Banner</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" id="banner" name="banner" placeholder="Banner">
                                                <?php $returnpath = $this->config->item('tour_banner_uploaded_path');?>
                                                <img src="<?php echo $returnpath . $tour_package_single->tour_banner_image; ?>" class="img-thumbnail rounded" required height="100px" width="100px" />
                                            </div>
                                        </div>
                                        <?php
if (!empty($tour_package_single->included)) {
 $explode = explode(',', $tour_package_single->included);

 ?>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Include</label>
                                            <div class="col-sm-8">
                                                           <?php if (!empty($tour_include) && count($tour_include) > 0) {
  foreach ($tour_include as $include) {
   ?>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="<?php echo trim($include->name); ?>" name="included[]" value="<?php echo $include->id; ?>" <?php if (in_array($include->id,
    $explode)) {
    echo "checked";}?>>
                                                            <label class="custom-control-label" for="<?php echo trim($include->name); ?>"><?php echo $include->name; ?></label>
                                                        </div>
    <?php }?>
<?php }?>
                                            </div>
                                        </div>
                                    <?php }?>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour Start Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="startdate" name="startdate" placeholder="Tour Start Date" value="<?php echo $tour_package_single->start_date; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Tour End Date</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="endtdate" name="endtdate" placeholder="Tour End Date" value="<?php echo $tour_package_single->end_date; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Duration</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" id="duration" name="duration" placeholder="Duration" readonly value="<?php echo $tour_package_single->duration; ?>">
                                            </div>
                                        </div>
                                        <div class="touroverview card" id="touroverview" data-duration="<?php echo $tour_package_single->duration; ?>">
                                            <?php
if (!empty($tour_overview) && count($tour_overview) > 0) {
 $overimage = $this->config->item("tour_overview_uploaded_path");
 $i         = 1;
 foreach ($tour_overview as $tourover) {
  ?>
                                                    <div class="card-header text-center touroverviewdata">Day <?php echo $i; ?></div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Place Name</label>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" type="text" id="placename" name="placename[]" value="<?php echo $tourover->placename; ?>" placeholder="Place Name" required>
                                                                <input type="hidden" name="overviewid[]" value="<?php echo $tourover->id; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Place Description</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control" id="placedesc" name="placedesc[]" placeholder="Place Description" required><?php echo $tourover->placedesc; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Place Image</label>
                                                            <div class="col-sm-8">
                                                                <input type="file" class="form-control" id="placeimage" name="placeimage[]" placeholder="Place Image">
                                                                <img src="<?php echo $overimage . $tourover->image; ?>"
                                                                     class="img-thumbnail rounded" required height="100px" width="100px" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $i++;
 }
}
?>
                                        </div>
                                        <div class="form-group row">
                                            <label for="input-22" class="col-sm-2 col-form-label">Image Gallery</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control dropify" id="filer_input2" name="gallery[]" placeholder="Place Image" multiple accept="image/*">
                                                <div class="row">
                                                    <?php
if (!empty($tour_gallery) && count($tour_gallery) > 0) {
 $gallerypath = $this->config->item('tour_gallery_uploaded_path');
 foreach ($tour_gallery as $gallery) {
  ?>
                                                            <div class="col-md-3" id="<?php echo $gallery->id; ?>">
                                                                <p class="pull-right"><a href="javascript:void(0);" data-id="<?php echo $gallery->id; ?>" class="deleteimage" data-name="<?php echo $gallery->image; ?>"><i class="fa fa-trash"></i></a></p>
                                                                <hr />
                                                                <img src="<?php echo $gallerypath . $gallery->image; ?>" class="img-thumbnail"
                                                                     height="100px" width="100px" />
                                                            </div>
                                                            <?php }
}
?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group py-2 row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="btn btn-info" id="save_buttons" name="save_button" value="Save">
                                                <button type="submit" class="btn btn-primary px-5" id="save_button"
                                                        name="save_button" value="Save">Save</button>
                                                <a href="<?php echo site_url("tour_dealer/tour_package_list"); ?>"
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
                <?php $this->load->view("admin/common/common_js");?>
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
                                description: {required: true, },
                                address: {required: true, },
                                country: {required: true, },
                                state: {required: true, },
                                city: {required: true, },
                                avability: {required: true, },
                                startdate: {required: true, },
                                endtdate: {required: true, },
                                duration: {required: true, },

                                "placename[]": {required: true, },
                                "placedesc[]": {required: true, },
                            },

                            messages: {
                                language_id: {required: "Please select Language", min: "Please select Language", },
                                regular_price: {required: "Please Enter Price", number: "please Enter Number Only"},
                                sale_price: {required: "Please Enter Price", number: "please Enter Number Only"},
                                child_price: {required: "Please Enter Price", number: "please Enter Number Only"},
                                name: {required: "Please Enter Tour Name", },
                                description: {required: "Please Enter Description", },
                                address: {required: "Please Enter Location", },
                                country: {required: "Enter Your Country", },
                                state: {required: "Enter Your State", },
                                city: {required: "Enter Your City", },
                                avability: {required: "Please Enter AVAILABILITY", },
                                startdate: {required: "Please Enter Start Date", },
                                endtdate: {required: "Please Enter End Date", },
                                duration: {required: "Please Enter Duration", },

                                "placename[]": {required: "Please Enter Place Name", },
                                "placedesc[]": {required: "Please Enter Place Description", },
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });
                    });

                    $(function () {
                        $("#startdate").datepicker({
                            dateFormat: 'yy-mm-dd',
                            changeMonth: true,
                            changeYear: true,
                            minDate: 'today',
                        });
                        $("#endtdate").datepicker({
                            dateFormat: 'yy-mm-dd',
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
                        var olddate = $("#touroverview").attr("data-duration");
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
                            var difference = a - olddate;
                            console.log("difference : " + difference);

                            if (difference < 0) {
                                var positiveint = Math.abs(difference);
                                for (var j = 1; j <= positiveint; j++) {
                                    $("#touroverview .card-header").last().remove();
                                    $("#touroverview .card-body").last().remove();
                                }
                            } else {
                                var data = '';
                                for (var i = 1; i <= difference; i++) {
                                    var count = parseInt(olddate) + i;
                                    data += '<div class="card-header text-center">Day ' + count + '</div>';
                                    data += '<div class="card-body">';
                                    data += '<div class="form-group row">';
                                    data += '<label  class="col-sm-2 col-form-label">Place Name</label>';
                                    data += '<div class="col-sm-8">';
                                    data += '<input class="form-control" type="text" id="placename" name="placename[]" placeholder="Place Name" required><input type="hidden" name="overviewid[]">';
                                    data += '</div>';
                                    data += '</div>';
                                    data += '<div class="form-group row">';
                                    data += '<label  class="col-sm-2 col-form-label">Place Description</label>';
                                    data += '<div class="col-sm-8">';
                                    data += '<textarea class="form-control" id="placedesc" name="placedesc[]" placeholder="Place Description" required></textarea>';
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
                                $("#touroverview").append(data);
                            }
                            //$("#touroverview").html("");
                        }
                    }

                    //$('.imagegallery').imageUploader();
                    $("#filer_input2").filer();
                    $("body").on("click", ".deleteimage", function () {
                        var id = $(this).data("id");
                        var name = $(this).data("name");
                        console.log(id);
                        console.log(name);

                        $.ajax({
                            method: "POST",
                            url: "<?php echo site_url("tour_dealer/deleteimage"); ?>",
                            data: {id: id, name: name}
                        })
                        .done(function (msg) {
                            //alert(msg);
                            if (msg == '1') {
                                $("#" + id).remove();
                            }
                        });
                    });
                </script>