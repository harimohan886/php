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
                                <li class="breadcrumb-item active"><?php echo $action; ?></li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">Project <?php echo $action; ?></div>
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
                                    ?>
                                    <form class="form" name="form" id="form" role="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php echo $dealerdata->name; ?>" /></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Email ID <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4"><b><?php echo $dealerdata->email; ?></b></div>
                                        </div>
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Business Contact No<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="text" name="contact" placeholder="Business Contact No" value="<?php echo $dealerdata->mobile; ?>" id="example-text-input"> 
                                            </div>
                                        </div>
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Profile Pic <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input class="form-control" type="file" id="profile" name="profile_pic" placeholder="Profile Picture">
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <?php
                                                if (!empty($dealerdata->profile_pic)) {
                                                    $dealerpath = $this->config->item('dealer_profile_uploaded_path');
                                                    ?>
                                                    <img src="<?php echo $dealerpath . $dealerdata->profile_pic; ?>" height="100px" width="100px" class="img-circle" />
                                        <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                        echo "<pre>";
                                        // print_r($dealerdata);
                                        // print_r($statename);
                                        // print_r($country);
                                        echo "</pre>";
                                        ?>
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Address <span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <textarea name="location" class="form-control" cols="3" placeholder="Address"><?php echo $dealerdata->location; ?></textarea>
                                            </div>
                                        </div> 
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">Country<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <select name="country" id="country" class="form-control select2" >
                                                    <option value="">---Select Country---</option>
<?php foreach ($country as $key => $value) { ?>
                                                        <option name="<?php echo $value->name; ?>" value="<?php echo $value->id; ?>" <?php if ($dealerdata->country_id == $value->id) { ?>  
                                                                    selected="selected" <?php } ?> valueid="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">State<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <select name="state" id="state" class="form-control select2">
                                                    <option value="">Select State</option>
<?php foreach ($statename as $row) { ?>
                                                        <option name="<?php echo $row->name; ?>" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>" valueid="<?php echo $value->id; ?>" <?php if ($dealerdata->state_id == $row->id) {
        echo "selected";
    } ?>  ><?php echo ucwords($row->name); ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">City<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <select name="city" id="city" class="form-control select2">
                                                    <option value="">Select City</option>
<?php foreach ($cityname as $row) { ?>
                                                        <option name="<?php echo $row->name; ?>" id="<?php echo $row->id; ?>" value="<?php echo $row->id; ?>"  <?php if ($dealerdata->city_id == $row->id) {
        echo "selected";
    } ?>  ><?php echo ucwords($row->name); ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group m-t-40 row">
                                            <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">My Location<span class="text-danger">*</span></label>
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <div class="map" id="map" style="width: 650px; height: 250px;"></div>
                                                <input type="hidden" name="vCurrentLatitude" id="lat" value="<?php echo $dealerdata->c_latitude; ?>">
                                                <input type="hidden" name="vCurrentLongitude" id="lng" value="<?php echo $dealerdata->c_longitude; ?>">
                                            </div>
                                        </div>
<?php if ($dealerdata->type_category == '3') { ?>
                                            <div class="form-group m-t-40 row">
                                                <label for="example-text-input" class="col-lg-3 col-md-3 col-sm-3 col-form-label">About Me <span class="text-danger">*</span></label>
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <textarea name="about_us" id="about_us" class="form-control" cols="3" placeholder="Address"><?php echo $dealerdata->about_us; ?></textarea>
                                                </div>
                                            </div>
<?php } ?>
                                        <div class="form-group py-2 row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <input type="hidden" class="btn btn-info" id="save_buttons" name="save_button" value="Update">
                                                <button type="submit" class="btn btn-primary px-5" id="save_button" name="save_button" value="Update">Update</button>
                                                <a href="<?php echo site_url("dealer/dashboard"); ?>" class="btn btn-warning px-5">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--start overlay-->
                        <div class="overlay toggle-menu"></div>
                        <!--end overlay-->
                    </div>
                </div><!-- End container-fluid-->
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
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC711vkhHG424lDbLWy3ZH0CIgPVDHb8Dc&libraries=places"></script>
                <script type="text/javascript">
                    var lat = document.getElementById('lat').value;
                    var lng = document.getElementById('lng').value;

                    function initialize() {
                        var latlng = new google.maps.LatLng(lat, lng);
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: latlng,
                            zoom: 13
                        });
                        var marker = new google.maps.Marker({
                            map: map,
                            position: latlng,
                            draggable: false,
                            anchorPoint: new google.maps.Point(0, -29)
                        });
                        var infowindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker, 'click', function () {
                            var iwContent = '<div id="iw_container">' +
                                    '<div class="iw_title"><h5><?php echo $dealerdata->name; ?></h5><?php echo $dealerdata->location; ?>,<br><?php echo $dealerdata->city; ?>,<br><?php echo $dealerdata->state; ?>,<br><?php echo $dealerdata->country; ?>, </div></div>';
                            // including content to the infowindow
                            infowindow.setContent(iwContent);
                            // opening the infowindow in the current map and at the current marker location
                            infowindow.open(map, marker);
                        });
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
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
                                name: {required: true, },
                                email: {required: true, },
                                mobile: {required: true, },
                                about_us: {
                                    required: {
                                        depends: function (element) {
                                            return $('#about_us').length !== 0;
                                        }
                                    }
                                }
                            },
                            messages: {
                                name: {required: "Please Enter Name", },
                                mobile: {required: "Please Enter Mobile", },
                                email: {required: "Please Enter Email", },
                                about_us: {required: "Please Enter About Me", },
                            },
                            submitHandler: function (form) {
                                form.submit();
                            }
                        });

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