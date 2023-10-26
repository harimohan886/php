<?php $this->load->view('front/common/common_header'); ?>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <?php $bannerpath = $this->config->item('tour_banner_uploaded_path'); ?>
        <section class="page-banner tour-view" style="background-image: url(<?php echo $bannerpath . $tour->tour_banner_image; ?>); ">
            <div class="container">
                <div class="page-title-wrapper">
                    <div class="page-title-content">
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.html" class="link home">Home</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() . "tour"; ?>" class="link">tour</a>
                            </li>
                            <li class="active">
                                <a href="#" class="link"><?php echo $tour->name; ?></a>
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                        <h2 class="captions"><?php echo $tour->name; ?></h2>
                        <div class="price">
                            <span class="text">from</span>
                            <span class="number"><strike><?php echo number_format($tour->regular_price, 2); ?></strike></span>
                            <span class="number"><?php echo number_format($tour->sale_price, 2); ?></span>
                            <sup class="unit">$</sup>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="tour-view-main padding-top padding-bottom">
                <div class="container">
                    <h2 class="title-style-2"><?php echo $tour->name; ?>
                        <span></span>
                    </h2>
                    <div class="schedule-block">
                        <div class="element">
                            <p class="schedule-title">Date</p>
                            <span class="schedule-content"><?php echo date("d M", strtotime($tour->start_date)) . "-" . date("d M", strtotime($tour->end_date)); ?></span>
                        </div>
                        <div class="element">
                            <p class="schedule-title">Duration</p>
                            <span class="schedule-content"><?php echo $tour->duration; ?> day</span>
                        </div>
                        <div class="element">
                            <p class="schedule-title">Reviews</p>
                            <span class="schedule-content">88</span>
                        </div>
                        <div class="element">
                            <p class="schedule-title">Guest Ratings</p>
                            <span class="schedule-content">4.5/5</span>
                        </div>
                        <div class="element">
                            <p class="schedule-title">Availability</p>
                            <span class="schedule-content"><?php echo $tour->avability; ?></span>
                        </div>
                    </div>
                    <div class="journey-block margin-top70">
                        <h3 class="title-style-3">Epic journeys</h3>
                        <div class="wrapper-journey">
                            <div class="item feature-item">
                                <i class="icon-journey flaticon-interface"></i>
                                <p class="text">Insurrance</p>
                            </div>
                            <div class="item feature-item">
                                <i class="icon-journey flaticon-cup"></i>
                                <p class="text">All drink inculded</p>
                            </div>
                            <div class="item feature-item">
                                <i class="icon-journey flaticon-food-2"></i>
                                <p class="text">Lunch in restaurant</p>
                            </div>
                            <div class="item feature-item">
                                <i class="icon-journey flaticon-money-1"></i>
                                <p class="text">All tickeds museum</p>
                            </div>
                            <div class="item feature-item">
                                <i class="icon-journey flaticon-man"></i>
                                <p class="text">Tour guide</p>
                            </div>
                            <div class="item feature-item">
                                <i class="icon-journey flaticon-boat"></i>
                                <p class="text">Travel Insurance</p>
                            </div>
                        </div>
                        <div class="overview-block clearfix">
                            <h3 class="title-style-3">Tour Overview</h3>
                            <div class="timeline-container">
                                <div class="timeline">
                                    <?php
                                    $returnpath = $this->config->item('tour_overview_uploaded_path');
                                    $i = 1;
                                    foreach ($tour_overview as $key => $value) {
                                        ?>
                                        <div class="timeline-block">
                                            <div class="timeline-title">
                                                <span>Day <?php echo $i; ?></span>
                                            </div>
                                            <div class="timeline-content medium-margin-top">
                                                <div class="row">
                                                    <div class="timeline-point">
                                                        <i class="fa fa-circle-o"></i>
                                                    </div>
                                                    <div class="timeline-custom-col content-col">
                                                        <div class="timeline-location-block">
                                                            <p class="location-name"><?php echo ucfirst($value->placename); ?>
                                                                <i class="fa fa-map-marker icon-marker"></i>
                                                            </p>
                                                            <p class="description"><?php echo $value->placedesc; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-custom-col image-col">
                                                        <div class="timeline-image-block">
                                                            <img src="<?php echo $returnpath . $value->image; ?>" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    <?php $i++;
} ?>
                                </div>
                            </div>
                        </div>
                    </div>

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
<?php
if (isset($error)) {
    echo $error;
}
echo $this->session->flashdata("message");
?>


                    <div class="timeline-book-block book-tour" >
                        <div class="find-widget find-hotel-widget widget new-style">
                            <h4 class="title-widgets">TOUR BOOK</h4>
                            <form class="content-widget" method="post" name="toor_booking_form" id="toor_booking_form" action="<?php echo base_url(); ?>book-tour/<?php echo $tour->slug; ?>" />
<?php
$vprice = number_format($tour->regular_price, 2);
$vprice2 = str_replace(",", "", $vprice);
?>
                            <input type="hidden" name="tour_ori_price" id="tour_ori_price" value="<?php echo $vprice2; ?>" />
                            <input type="hidden" name="adult_price" id="adult_price" value="<?php echo $tour->sale_price; ?>" />
                            <input type="hidden" name="child_price" id="child_price" value="<?php echo $tour->child_price; ?>" />
                            <div class="text-input small-margin-top">
                                <!--<div class="input-daterange">-->
                                <div class="input">    
                                    <div class="text-box-wrapper half">
                                        <label class="tb-label">Check in</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="MM/DD/YY" class="datepicker tb-input" name="booking_start_date" id="booking_start_date" autocomplete="off" />
                                            <!--<i class="tb-icon fa fa-calendar input-group-addon"></i>-->
                                        </div>
                                    </div>
                                    <div class="text-box-wrapper half">
                                        <label class="tb-label">Check out</label>
                                        <div class="input-group">
                                            <input type="text" placeholder="MM/DD/YY" class="datepicker tb-input" name="booking_end_date" id="booking_end_date" autocomplete="off" />
                                            <!--<i class="tb-icon fa fa-calendar input-group-addon"></i>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="count adult-count text-box-wrapper">
                                    <label class="tb-label">Adult</label>
                                    <div class="select-wrapper">
                                        <!--i.fa.fa-chevron-down-->
                                        <select class="form-control custom-select selectbox" name="adult" id="adult">
<?php for ($j = 1; $j < 11; $j++) { ?>
                                                <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
<?php } ?>                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="count child-count text-box-wrapper">
                                    <label class="tb-label">Child</label>
                                    <div class="select-wrapper">
                                        <!--i.fa.fa-chevron-down-->
                                        <select class="form-control custom-select selectbox" id="children" name="children">
                                <?php for ($k = 0; $k < 10; $k++) { ?>
                                                <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                //echo "<pre>"; print_r($user_data); exit;
                                if (isset($user_data['username']) && ($user_data['username'] != '')) {
                                    $first_name = $user_data['username'];
                                } else {
                                    $first_name = '';
                                }
                                ?>
                                <div class="first-name text-box-wrapper">
                                    <label class="tb-label">Your First Name</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Write your first name" class="tb-input" id="first_name" name="first_name" value="<?php echo $first_name; ?>" />
                                    </div>
                                </div>
                                <div class="last-name text-box-wrapper">
                                    <label class="tb-label">Your Last Name</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Write your last name" class="tb-input" id="last_name" name="last_name" value="<?php echo $first_name; ?>" />
                                    </div>
                                </div>
                                <div class="email text-box-wrapper">
                                    <label class="tb-label">Your Email</label>
                                    <div class="input-group">
                                        <input type="email" placeholder="Write your email address" class="tb-input" id="email_address" name="email_address" value="<?php if (isset($user_data['useremail']) && ($user_data['useremail'] != '')) {
                                    echo $user_data['useremail'];
                                } ?>" />
                                    </div>
                                </div>
                                <div class="phone text-box-wrapper">
                                    <label class="tb-label">Your Number Phone</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Write your number phone" class="tb-input" id="contact_number" name="contact_number" value="<?php if (isset($user_data['mobile']) && ($user_data['mobile'] != '')) {
                                    echo $user_data['mobile'];
                                } ?>" />
                                    </div>
                                </div>
                                <div class="place text-box-wrapper">
                                    <label class="tb-label">Where are your address?</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Write your address" class="tb-input" id="address" name="address" value="<?php if (isset($user_data['address']) && ($user_data['address'] != '')) {
                                    echo $user_data['address'];
                                } ?>">
                                    </div>
                                </div>
                                <div class="email text-box-wrapper">
                                    <label class="tb-label">Country:</label>
                                    <div class="input-group">
                                        <select name="country" id="country" class="input-sm form-control select 2 label-input">
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($country as $row) {
                                                $sel_cnt = '';
                                                if (isset($user_data['country']) && ($user_data['country'] != '')) {
                                                    if ($user_data['country'] == $row->id) {
                                                        $sel_cnt = "selected='selected'";
                                                    }
                                                } else {
                                                    $sel_cnt = '';
                                                }

                                                echo '<option value="' . $row->id . '" ' . $sel_cnt . '>' . $row->name . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="email text-box-wrapper">
                                    <label class="tb-label">State:</label>
                                    <div class="input-group">
                                        <select name="state" id="state" class="input-sm form-control select 2 label-input">
                                            <option value="">Select State</option>
                                            <?php
                                            if (isset($state) && !empty($state)) {
                                                foreach ($state as $rowsv) {
                                                    $sel_st = '';
                                                    if (isset($user_data['state']) && ($user_data['state'] != '')) {
                                                        if ($user_data['state'] == $rowsv->id) {
                                                            $sel_st = "selected='selected'";
                                                        } else {
                                                            $sel_st = '';
                                                        }
                                                    } else {
                                                        $sel_st = '';
                                                    }
                                                    echo '<option value="' . $rowsv->id . '" ' . $sel_st . '>' . $rowsv->name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="email text-box-wrapper">
                                    <label class="tb-label">City:</label>
                                    <div class="input-group">
                                        <select name="city" id="city" class="input-sm form-control select 2 label-input">
                                            <option value="">Select City</option>
                                            <?php
                                            if (isset($city) && !empty($city)) {
                                                foreach ($city as $rowst) {
                                                    $sel_ct = '';
                                                    if (isset($user_data['city']) && ($user_data['city'] != '')) {
                                                        if ($user_data['city'] == $rowst->id) {
                                                            $sel_ct = "selected='selected'";
                                                        } else {
                                                            $sel_ct = '';
                                                        }
                                                    } else {
                                                        $sel_st = '';
                                                    }
                                                    echo '<option value="' . $rowst->id . '" ' . $sel_ct . '>' . $rowst->name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="email text-box-wrapper">
                                    <label class="tb-label">Zipcode:</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Zipcode" class="tb-input" id="zipcode" name="zipcode" value="<?php if (isset($user_data['zipcode']) && ($user_data['zipcode'] != '')) {
                                                echo $user_data['zipcode'];
                                            } ?>" />
                                    </div>
                                </div> 

                                <div class="note text-box-wrapper">
                                    <label class="tb-label">Note:</label>
                                    <div class="input-group">
                                        <textarea placeholder="Write your note" rows="3" class="tb-input" id="comments" name="comments"><?php if (isset($user_data->comments) && ($user_data->comments != '')) {
                                                echo $user_data->comments;
                                            } ?></textarea>
                                    </div>
                                </div>

                                <button type="submit" data-hover="SEND REQUEST" class="btn btn-slide" name="book_now" value="booking">
                                    <span class="text">BOOK Now</span>
                                    <span class="icons fa fa-long-arrow-right"></span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="gallery-block margin-top70">
                    <div class="container">
                        <h3 class="title-style-2">Gallery</h3>
                        <div class="grid">
                            <div class="grid-sizer"></div>
                            <div class="gutter-sizer"></div>
<?php $gallerypath = $this->config->item('tour_gallery_uploaded_path');
foreach ($tour_gallery as $key => $value) {
    ?>
                                <div class="grid-item grid-item--medium">
                                    <div class="gallery-image">
                                        <a href="<?php echo $gallerypath . $value->image; ?>" data-fancybox-group="gallery" class="title-hover dh-overlay fancybox" alt="<?php echo $value->image; ?>">
                                            <i class="icons fa fa-eye"></i>
                                        </a>
                                        <div class="bg"></div>
                                    </div>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div> 
                <div class="container">
                    <div class="expert-block padding-top">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <h3 class="title-style-2">TALK TO OUR explore EXPERT</h3>
                                <p>We're here to chat about your next big idea.</p>
                                <ul class="nav list-time">
                                    <li>
                                        <span class="time">
                                            <i class="fa fa-long-arrow-right"></i>7 am - 4 pm Monday through Thursday.</span>
                                    </li>
                                    <li>
                                        <span class="time">
                                            <i class="fa fa-long-arrow-right"></i>7 am to 1 pm Fridays (US central) toll free or by skype.</span>
                                    </li>
                                </ul>
                                <p>Otherwise, email us anytime. On average we provide quotes within 6 hours during business hours and the next day during off business hours.</p>
                                <p>Privately guided trips allow you to be in control of all the details of your trip - departure times, accommodations, extra nights, extra activities, extra experiences - what you want and how you want it.</p>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="about-us-wrapper">
                                    <div class="avatar">
                                        <div class="image-wrapper">
<?php $dealerpath = $this->config->item('dealer_profile_uploaded_path'); ?>
                                            <img src="<?php echo $dealerpath . $vendor->profile_pic; ?>" alt="" class="img img-responsive">
                                        </div>
                                        <div class="content-wrapper">
                                            <p class="name"><?php echo $vendor->name ?></p>
                                            <p class="position"><?php if ($vendor->type_category == '1') {
    echo "Tour Dealer";
} else if ($vendor->type_category == '6') {
    echo "Corporate Event Delar";
}
?></p>
                                        </div>
                                    </div>
                                    <div class="row group-list contact-list">
                                        <!-- <div class="col-sm-4 col-xs-4 col-contact">
                                            <div class="media contact-list-media">
                                                <div class="media-left">
                                                    <a href="#" class="icons">
                                                        <i class="fa fa-desktop"></i>
                                                    </a>
                                                </div>
                                                <div class="media-right">
                                                    <a href="#" class="title">Contact Skype</a>
                                                    <p class="text">peter.wilson</p>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-4 col-xs-4 col-contact">
                                            <div class="media contact-list-media">
                                                <div class="media-left">
                                                    <a href="#" class="icons">
                                                        <i class="fa fa-phone"></i>
                                                    </a>
                                                </div>
                                                <div class="media-right">
                                                    <a href="#" class="title">Phone</a>
                                                    <p class="text"><?php echo "+" . $vendor->country_code . " " . $vendor->mobile; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-4 col-contact">
                                            <div class="media contact-list-media">
                                                <div class="media-left">
                                                    <a href="#" class="icons">
                                                        <i class="fa fa-envelope-o"></i>
                                                    </a>
                                                </div>
                                                <div class="media-right">
                                                    <a href="mailto: <?php echo $vendor->email; ?> " class="title">Email</a>
                                                    <p class="text"><?php echo $vendor->email; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="special-offer new-style margin-top70">
                        <h3 class="title-style-2">You Will Also Like</h3>
                        <div class="special-offer-list">
<?php foreach ($tour_vendor as $key => $value) { ?>
                                <div class="special-offer-layout">
                                    <div class="image-wrapper">
                                        <a href="<?php echo base_url(); ?>tour-details/<?php echo $value->slug; ?>" class="link">
                                            <img src="<?php echo $gallerypath . $value->image; ?>" alt="" class="img-responsive">
                                        </a>
                                        <div class="title-wrapper">
                                            <a href="<?php echo base_url(); ?>tour-details/<?php echo $value->slug; ?>" class="title"><?php echo $value->name; ?></a>
                                            <i class="icons flaticon-circle"></i>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                        </div>
                    </div>
                    <div class="special-offer new-style margin-top70">
                        <h3 class="title-style-2">Similar Tour</h3>
                        <div class="special-offer-list">
<?php foreach ($tour_list as $key => $value) { ?>
                                <div class="special-offer-layout">
                                    <div class="image-wrapper">
                                        <a href="<?php echo base_url(); ?>tour-details/<?php echo $value->slug; ?>" class="link">
                                            <img src="<?php echo $gallerypath . $value->image; ?>" alt="" class="img-responsive" width="200" height="200">
                                        </a>
                                        <div class="title-wrapper">
                                            <a href="<?php echo base_url(); ?>tour-details/<?php echo $value->slug; ?>" class="title"><?php echo $value->name; ?></a>
                                            <i class="icons flaticon-circle"></i>
                                        </div>
                                    </div>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top">
        <a href="#top" class="link">
            <i class="fa fa-angle-double-up"></i>
        </a>
    </div>
</div>
<?php $this->load->view('front/common/common_footer'); ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
      type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $("#booking_start_date").datepicker({minDate: 0});
        $("#booking_end_date").datepicker({minDate: 0});

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
    // Wait for the DOM to be ready
    $(function () {
        $("#toor_booking_form").validate({
            rules: {
                booking_start_date: {required: true},
                booking_end_date: {required: true},
                first_name: {required: true},
                last_name: {required: true},
                email_address: {required: true, email: true},
                address: {required: true},
                city: {required: true},
                state: {required: true},
                zipcode: {required: true},
                country: {required: true},
                comments: {required: true},
            },
            messages: {
                booking_start_date: "Please select check in date.",
                booking_end_date: "Please select check out date.",
                first_name: "Please enter first name.",
                last_name: "Please enter last name.",
                email_address: {required: "Enter your email address.", email: "Please enter valid email address."},
                address: {required: "Enter your address."},
                city: {required: "Enter your city."},
                state: {required: "Enter your state."},
                zipcode: {required: "Enter your zipcode."},
                country: {required: "Enter your country."},
                comments: {required: "Enter notes."},
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>