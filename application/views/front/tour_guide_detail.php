<?php
    $this->load->view('front/common/common_header');
    $dealerpath = $this->config->item('dealer_profile_uploaded_path');
    $dealerImagepath = $this->config->item('dealer_images_path');
    $dealerImagepaths = $this->config->item('dealer_images_profile');
?>
<link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/css/tourguidedetail.css">
<!-- START SECTION AGENTS -->
    <section class="blog blog-section portfolio single-proper details mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-9 col-xs-9">
                                <div class="news-item news-item-sm">
                                    <a href="javascript:void(0);" class="news-img-link">
                                        <div class="news-item-img homes">
                                            <div class="homes-tag button alt featured">4 Listings</div>
                                            <?php 
                                                $profile_pic_with_path = $dealerpath . $tour_guide_detail->profile_pic; 
                                            if (file_exists($dealerImagepaths . $tour_guide_detail->profile_pic) && ($tour_guide_detail->profile_pic != '')) { ?>
                                                <img class="resp-img" src="<?php echo $profile_pic_with_path; ?>" alt="<?php echo $tour_guide_detail->name; ?>" />
                                            <?php } else { ?> 
                                               <img class="resp-img" src="<?php echo FRONT_CSS_PATH;?>assets/images/tourguide/a-1.png" alt="blog image" />
                                            <?php } ?>
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a href="javascript:void(0);"><h3><?php echo $tour_guide_detail->name; ?></h3></a>
                                        <div class="the-agents">
                                            <ul class="the-agents-details">
                                                <!--<li><a href="#">Office: (234) 0200 17813</a></li>
                                                <li><a href="#">Fax: 809 123 0951</a></li>-->
                                                <li><a href="tel:<?php echo $tour_guide_detail->mobile; ?>">Mobile: <?php echo $tour_guide_detail->mobile; ?></a></li>
                                                <li><a href="malto:<?php echo $tour_guide_detail->email; ?>">Email: <?php echo $tour_guide_detail->email; ?></a></li>
                                                <li>Address: <?php echo $tour_guide_detail->location; ?>, 
                                                <?php foreach ($cityname as $rowct) { ?>
                                                    <?php if ($tour_guide_detail->city_id == $rowct->id) { echo ucwords($rowct->name); } ?>
                                                <?php } ?>,
                                                <?php foreach ($statename as $rowst) { ?>
                                                    <?php if ($tour_guide_detail->state_id == $rowst->id) { echo ucwords($rowst->name); } ?>
                                                <?php } ?>,
                                                <?php foreach ($country as $row) { ?>
                                                    <?php if ($tour_guide_detail->country_id == $row->id) { echo ucwords($row->name); } ?>
                                                <?php } ?></li>
                                            </ul>
                                        </div>
                                        <div class="news-item-bottom">
                                            <a href="javascript:void(0);" class="news-link">Book Now</a>
                                            <div class="admin">
                                                <p><?php echo $tour_guide_detail->name; ?></p>
                                                <?php 
                                                  $profile_pic_with_path = $dealerpath . $tour_guide_detail->profile_pic; 
                                                  if (file_exists($dealerImagepaths . $tour_guide_detail->profile_pic) && ($tour_guide_detail->profile_pic != '')) { ?>
                                                      <img src="<?php echo $profile_pic_with_path; ?>" alt="<?php echo $tour_guide_detail->name; ?>" />
                                                  <?php } else { ?> 
                                                     <img src="<?php echo FRONT_CSS_PATH;?>assets/images/tourguide/a-1.png" alt="blog image">
                                                  <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    <?php if(isset($tour_guide_detail->about_us) && ($tour_guide_detail->about_us != '')) { ?> <p class="mb-3"><?php echo $tour_guide_detail->about_us; ?></p><?php } ?>
                                    <?php if(isset($tour_guide_detail->work_exp) && ($tour_guide_detail->work_exp != '')) { ?><p class="mb-3"><strong>Work Experience</strong> : <?php echo $tour_guide_detail->work_exp; ?></p><?php } ?>
                                    <?php if (isset($price) && !empty($price)) {
                                        foreach ($price as $v1) { ?>
                                            <p class="mb-3">Country : <?php foreach ($country as $row) { ?>
                                                <?php if ($v1->country_id == $row->id) { echo ucwords($row->name); } ?>
                                                <?php } ?> Price : <?php echo $v1->currency; ?><?php echo $v1->price; ?></p>
                                        <?php } ?>    
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="blog-pots py-0">
                            <!-- Star Reviews -->
                            <?php if (count($review) > 0) { ?>
                            <section class="reviews comments">
                                <h3 class="mb-5"><?php echo count($review); ?> Reviews</h3>
                                <?php
                                    $i = 0;
                                    foreach ($review as $value) { ?>
                                <div class="row">
                                    <ul class="col-12 commented pl-0">
                                        <li class="comm-inf">
                                            <div class="col-md-2">
                                              <?php if (isset($value->profile_pic) && !empty($value->profile_pic)) {
                                                  $path = $this->config->item("customer_uploaded_path");
                                                  ?>
                                                      <img src="<?php echo $path . $value->profile_pic; ?>" class="img-fluid" alt="">
                                                  <?php } ?>
                                            </div>
                                            <div class="col-md-10 comments-info">
                                                <div class="conra">
                                                    <h5 class="mb-2"><?php echo $value->customer_name; ?></h5>
                                                    <div class="rating-box">
                                                        <div class="detail-list-rating mr-0">
                                                            <i class="fa <?php if ($value->rating_star >= 1) { ?>fa-star<?php } else { ?>fa-star-o<?php } ?>"></i>
                                                            <i class="fa <?php if ($value->rating_star >= 2) { ?>fa-star<?php } else { ?>fa-star-o<?php } ?>"></i>
                                                            <i class="fa <?php if ($value->rating_star >= 3) { ?>fa-star<?php } else { ?>fa-star-o <?php } ?>"></i>
                                                            <i class="fa <?php if ($value->rating_star >= 4) { ?>fa-star<?php } else { ?>fa-star-o<?php } ?>"></i>
                                                            <i class="fa <?php if ($value->rating_star >= 5) { ?>fa-star<?php } else { ?>fa-star-o<?php } ?>"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mb-4"><?php echo date("F d Y", strtotime($value->created_at)); ?></p>
                                                <p><?php echo $value->comments; ?></p>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <?php $i++; } ?>
                            </section>
                            <?php } ?>
                            <!-- End Reviews -->

                            <?php if ($login_user == 1) { 
                                if (validation_errors()) {
                                    echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                                          <i class="fa fa-check"></i>
                                          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                          <strong>Warning!</strong> ';
                                    echo validation_errors();
                                    echo '</div>';
                                }
                           
                                if (isset($error)) {echo $error;}
                                echo $this->session->flashdata("message");
                            ?>
                            <!-- Star Add Review -->
                            <section class="single reviews leve-comments details">
                                <div id="add-review" class="add-review-box">
                                    <!-- Add Review -->
                                    <h3 class="listing-desc-headline margin-bottom-20 mb-4">Leave A Review For <?php echo $tour_guide_detail->name; ?></h3>
                                    <span class="leave-rating-title">Your rating for this listing</span>
                                    <!-- Rating / Upload Button -->
                                    <form class="form" name="review_form" id="review_form" role="form" method="post" enctype="multipart/form-data">
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <!-- Leave Rating -->
                                            <div class="clearfix"></div>
                                            <div class="leave-rating margin-bottom-30">
                                                <input type="radio" name="rating" id="rating-1" value="1" />
                                                <label for="rating-1" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-2" value="2" />
                                                <label for="rating-2" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-3" value="3" />
                                                <label for="rating-3" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-4" value="4" checked="true" />
                                                <label for="rating-4" class="fa fa-star"></label>
                                                <input type="radio" name="rating" id="rating-5" value="5" />
                                                <label for="rating-5" class="fa fa-star"></label>
                                            </div>
                                            <div class="clearfix"></div>
                                            <textarea name="comments" id="comments" class="tb-input" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-2">
                                            <button type="submit" name="save_button" value="save" id="save_button" class="btn btn-slide">Add Review</button>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </section><!-- End Add Review -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->
<?php $this->load->view('front/common/common_footer'); ?>
<script>
    $('.selectbox').on("change", function (e) {
        $("#hiddenfield").val("submit");
        $("#filter").submit();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#review_form").validate({
            rules: {
                rating: {required: true },
                comments: {required: true }
            },
            messages: {
                rating: {required: "Please Select Rating"},
                comments: {required: "Please Enter Comments"}
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>  
