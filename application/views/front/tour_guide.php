<?php
$this->load->view('front/common/common_header');
$dealerpath = $this->config->item('dealer_profile_uploaded_path');
$dealerImagepath = $this->config->item('dealer_images_path');
$dealerImagepaths = $this->config->item('dealer_images_profile');
?>
<?php if (count($tour) > 0) { ?>
    <!-- START SECTION AGENTS -->
    <section class="inner-pages"> 
        <div class="blog blog-section portfolio padding-top padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <div class="row"> 
                            <?php foreach ($tour as $t => $v) { ?>
                                <div class="col-md-6 col-xs-6">
                                    <?php $profile_pic_with_path = $dealerpath . $v->profile_pic; ?>
                                    <div class="news-item news-item-sm">
                                        <a href="<?php echo base_url(); ?>tour-guide-detail/<?php echo $v->id; ?>" class="news-img-link">
                                            <div class="news-item-img homes">
                                                <div class="homes-tag button alt featured">3 Listings</div>
                                                <?php if (file_exists($dealerImagepaths . $v->profile_pic) && ($v->profile_pic!='')) { ?>
                                                    <img class="resp-img" src="<?php echo $profile_pic_with_path; ?>" alt="image">
                                                <?php } else { ?> 
                                                    <img class="resp-img" src="<?php echo $dealerpath . "dummy.png"; ?>" alt="image">
                                                <?php } ?>
                                            </div>
                                        </a>
                                        <div class="news-item-text">
                                            <a href="<?php echo base_url(); ?>tour-guide-detail/<?php echo $v->id; ?>"><h3><?php echo $v->name; ?></h3></a>
                                            <div class="the-agents">
                                                <p><?php echo $v->email; ?></p>
                                                <p>+<?php echo $v->country_code; ?>-<?php echo $v->mobile; ?></p>
                                                <p><?php echo $v->location; ?>,<?php echo $v->city; ?>,<?php echo $v->state; ?>,<?php echo $v->country; ?></p>
                                                <ul>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                </ul>
                                            </div>
                                            <div class="news-item-bottom">
                                                <a href="<?php echo base_url(); ?>tour-guide-detail/<?php echo $v->id; ?>" class="news-link">View My Listings</a>
                                                <div class="admin">
                                                    <p><?php echo $v->name; ?></p>                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <nav aria-label="..." class="pt-0">
                    <?php echo $links; ?>
                </nav>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS -->
<?php } ?>
<?php $this->load->view('front/common/common_footer'); ?>
<script>
    $('.selectbox').on("change", function (e) {
        $("#hiddenfield").val("submit");
        $("#filter").submit();
    });
</script>