<?php $this->load->view('front/common/common_header'); ?>
<style type="text/css">.center { display: block; margin-left: auto; margin-right: auto; width: 50%; }</style>
<div id="wrapper-content">
	<div class="main-content">
		<div class="page-main">
			<div class="car-rent-result-main padding-top padding-bottom">
				<div class="container">
                    <div class="result-body">
                        <div class="row">
                            <div class="col-md-12 main-right">
                                <div class="car-rent-list">
                                    <div class="row">
                                    	<?php foreach ($booking_order as $value) { 
                                    		//echo "<pre>"; print_r($value); 
                                    		?>
                                        <div class="col-sm-12">
                                            <div class="car-rent-layout">
                                                <?php 
                                        			$returnurl = $this->config->item('tour_banner_uploaded_path'); 
                                        			$returnpath = $this->config->item('tour_banner_images_path');
                                                ?>
                                                <div class="image-wrapper">
                                                    <?php 
                                                   		if(file_exists($returnpath.$value->tour_banner_image) && ($value->tour_banner_image!='')) { ?>
                                                    		<a href="<?php echo base_url();?>tour-details/<?php echo $value->slug; ?>" class="link"><img src="<?php echo $returnurl.$value->tour_banner_image; ?>" alt="My Orders" class="img-responsive"></a>
                                                	<?php } ?>
                                                </div>
                                                <div class="content-wrapper">
                                                    <a href="<?php echo base_url();?>tour-details/<?php echo $value->slug; ?>" class="title"><?php echo $value->name; ?></a>
                                                    <div class="price">
                                                        <span>Total Price</span>
                                                        <sup>$</sup>
                                                        <span class="number"><?php echo $value->total_price; ?></span>
                                                    </div>
                                                    <div class="sub-title"><span>No Of Adult</span> :<?php echo $value->no_of_adults; ?></div>

                                                    <div class="sub-title"><span>No Of Child</span> :<?php echo $value->no_of_children; ?></div>

                                                    <div class="sub-title"><span>Booking Status</span> :<?php if($value->book_status == 0) { echo "<span class='alert-danger'><strong> Pending </strong></span>"; } else if($value->book_status == 1) { echo "<span class='alert-success'><strong> Approved </strong></span>";} ?></div>

                                                    <p class="text"><?php echo $value->description; ?></p>
                                                    <a href="<?php echo base_url();?>tour-details/<?php echo $value->slug; ?>" class="btn btn-gray">View</a>
                                                </div>
                                            </div>
                                        </div>
                                    	<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
			</div>
		</div>
	</div>
</div> 	
<?php $this->load->view('front/common/common_footer'); ?>