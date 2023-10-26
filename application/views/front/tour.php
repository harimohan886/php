<?php $this->load->view('front/common/common_header'); ?>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section class="page-banner tour-result">
            <div class="container">
                <div class="page-title-wrapper">
                    <div class="page-title-content">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url(); ?>" class="link home">Home</a></li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>tour" class="link">Tour</a>
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                        <h2 class="captions">Tour</h2>
                    </div>
                </div>
            </div>
        </section>
        <div class="page-main">
            <div class="trip-info">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="label-route-widget">
                                <span class="departure">
                                    <span class="city">Singapore, </span>
                                    <span class="country">Singapore</span>
                                </span>
                                <i class="fa fa-long-arrow-right"></i>
                                <span class="arrival">
                                    <span class="city">Kuala Lumpur, </span>
                                    <span class="country">Malaysia</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="label-time-widget">From
                                <span class="departure">
                                    <span class="date">6 March </span>at
                                    <span class="hour">10:00</span>
                                </span> to
                                <span class="arrival">
                                    <span class="date">9 March </span>at
                                    <span class="hour">10:00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="tour-result-main padding-top padding-bottom">
                <div class="container">
                    <div class="list-continents">
                        <div class="list-continent-wrapper">
                            <a href="#" class="continent">
                                <i class="icons fa fa-map-marker"></i>
                                <span class="text">europe</span>
                            </a>
                        </div>
                        <div class="list-continent-wrapper">
                            <a href="#" class="continent">
                                <i class="icons fa fa-map-marker"></i>
                                <span class="text">america</span>
                            </a>
                        </div>
                        <div class="list-continent-wrapper">
                            <a href="#" class="continent">
                                <i class="icons fa fa-map-marker"></i>
                                <span class="text">asian</span>
                            </a>
                        </div>
                        <div class="list-continent-wrapper">
                            <a href="#" class="continent">
                                <i class="icons fa fa-map-marker"></i>
                                <span class="text">africa</span>
                            </a>
                        </div>
                        <div class="list-continent-wrapper">
                            <a href="#" class="continent">
                                <i class="icons fa fa-map-marker"></i>
                                <span class="text">middle east</span>
                            </a>
                        </div>
                    </div>
                    <div class="result-meta">
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
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="result-count-wrapper">Results Found:
                                    <span class="result-count"><?php echo count($tour); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="result-filter-wrapper">
                                    <form method="post" id="filter">
                                        <!-- <label class="result-filter-label">Sort by :</label> -->
                                        <div class="selection-bar">
                                            <input type="hidden" name="hiddenfield" value="" id="hiddenfield">
                                            <div class="select-wrapper">
                                                <select name="date" class="custom-select selectbox">
                                                    <option value="" disabled="disabled" selected="selected" hidden="hidden" class="d-none">Date By</option>
                                                    <option value="0" hidden="hidden">ASC</option>
                                                    <option value="1">DESC</option>
                                                </select>
                                            </div>
                                            <div class="select-wrapper">
                                                <select name="price" class="custom-select selectbox">
                                                    <option value="" disabled="disabled" selected="selected" hidden="hidden">Price</option>
                                                    <option value="0">Price high to low</option>
                                                    <option value="1">Price low to high</option>
                                                </select>
                                            </div>
                                            <!-- <div class="select-wrapper">
                                                <select name="Time" class="custom-select selectbox">
                                                    <option value="" disabled="disabled" selected="selected" hidden="hidden">review score</option>
                                                    <option value="5">5 stars</option>
                                                    <option value="4">4 stars</option>
                                                    <option value="3">3 stars</option>
                                                    <option value="2">2 stars</option>
                                                    <option value="1">1 stars</option>
                                                </select>
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="result-body">
                        <div class="row">
                            <div class="col-md-12 main-right">
                                <div class="tours-list">
                                    <div class="row">
<?php $returnpath = $this->config->item('tour_gallery_uploaded_path');
foreach ($tour as $key => $value) {
    ?>
                                            <div class="col-md-4">
                                                <div class="tours-layout">
                                                    <div class="image-wrapper" style="height: 250px;">
                                                        <a href="<?php echo base_url(); ?>tour-details/<?php echo $value->slug; ?>" class="link">
                                                            <img src="<?php echo $returnpath . $value->image; ?>" alt="<?php echo $value->name; ?>" class="img-responsive"></a>
                                                        <div class="title-wrapper">
                                                            <a href="<?php echo base_url(); ?>tour-details/<?php echo $value->slug; ?>" class="title"><?php echo $value->name; ?></a><i class="icons flaticon-circle"></i>
                                                        </div>
                                                        <!--<div class="label-sale">
                                                                <p class="text">sale</p>
                                                                <p class="number">35%</p>
                                                        </div>-->
                                                    </div>
                                                    <div class="content-wrapper">
                                                        <ul class="list-info list-inline list-unstyle">
                                                            <li>
                                                                <a href="#" class="link">
                                                                    <i class="icons fa fa-eye"></i>
                                                                    <span class="text number">234</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="link">
                                                                    <i class="icons fa fa-heart"></i>
                                                                    <span class="text number">234</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="link">
                                                                    <i class="icons fa fa-comment"></i>
                                                                    <span class="text number">234</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="content">
                                                            <div class="title">
                                                                <div class="price">
                                                                    <sup>$</sup>
                                                                    <span class="number"><strike><?php echo number_format($value->regular_price, 2); ?></strike></span>
                                                                    <sup>$</sup>
                                                                    <span class="number"><?php echo number_format($value->sale_price, 2); ?></span>
                                                                </div>
                                                                <p class="for-price"><?php echo $value->duration; ?> days</p>
                                                            </div>
                                                            <p class="text"><?php echo $value->placedesc; ?></p>
                                                            <div class="group-btn-tours">
                                                                <a href="<?php echo base_url(); ?>tour-book/<?php echo $value->slug; ?>" class="left-btn">book now</a>
                                                                <!--<a href="javascript:void(0);" class="right-btn">add to list</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<?php } ?>
                                    </div>
                                </div>
                                <nav class="pagination-list margin-top70">
<?php echo $links; ?>
                                </nav>
                            </div>
                            <!-- <div class="col-md-4 sidebar-widget">
                                <div class="col-2">
                                    <div class="find-widget find-flight-widget widget">
                                        <h4 class="title-widgets">find your tours</h4>
                                        <form class="content-widget" method="post" id="tour_search" name="tour_search">
                                            <div class="ffw-radio-selection">
                                                <span class="ffw-radio-btn-wrapper">
                                                    <input type="radio" name="flight type" value="one way" id="flight-type-1" checked="checked" class="ffw-radio-btn">
                                                    <label for="flight-type-1" class="ffw-radio-label">One Way</label>
                                                </span>
                                                <span class="ffw-radio-btn-wrapper">
                                                    <input type="radio" name="flight type" value="round trip" id="flight-type-2" class="ffw-radio-btn">
                                                    <label for="flight-type-2" class="ffw-radio-label">Round Trip</label>
                                                </span>
                                                <span class="ffw-radio-btn-wrapper">
                                                    <input type="radio" name="flight type" value="multiple cities" id="flight-type-3" class="ffw-radio-btn">
                                                    <label for="flight-type-3" class="ffw-radio-label">Multiple Cities</label>
                                                </span>
                                                <div class="stretch">&nbsp;</div>
                                            </div>
                                            <div class="text-input small-margin-top">
                                                <div class="text-box-wrapper">
                                                    <label class="tb-label">Where do you want to go?</label>
                                                    <div class="input-group">
                                                        <input type="text" placeholder="Write the place" class="tb-input">
                                                    </div>
                                                </div>
                                                <div class="input-daterange">
                                                    <div class="text-box-wrapper half left">
                                                        <label class="tb-label">Check in</label>
                                                        <div class="input-group">
                                                            <input type="text" placeholder="MM/DD/YY" class="tb-input">
                                                            <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="text-box-wrapper half right">
                                                        <label class="tb-label">Check out</label>
                                                        <div class="input-group">
                                                            <input type="text" placeholder="MM/DD/YY" class="tb-input">
                                                            <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-box-wrapper half left">
                                                    <label class="tb-label">Number of Adult</label>
                                                    <div class="input-group">
                                                        <button disabled="disabled" data-type="minus" data-field="quant[1]" class="input-group-btn btn-minus">
                                                            <span class="tb-icon fa fa-minus"></span>
                                                        </button>
                                                        <input type="number" name="quant[1]" min="1" max="9" value="1" class="tb-input count">
                                                        <button data-type="plus" data-field="quant[1]" class="input-group-btn btn-plus">
                                                            <span class="tb-icon fa fa-plus"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="text-box-wrapper half right">
                                                    <label class="tb-label">Number of Child</label>
                                                    <div class="input-group">
                                                        <button disabled="disabled" data-type="minus" data-field="quant[2]" class="input-group-btn btn-minus">
                                                            <span class="tb-icon fa fa-minus"></span>
                                                        </button>
                                                        <input type="number" name="quant[2]" min="0" max="9" value="0" class="tb-input count">
                                                        <button data-type="plus" data-field="quant[2]" class="input-group-btn btn-plus">
                                                            <span class="tb-icon fa fa-plus"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" data-hover="SEND NOW" class="btn btn-slide small-margin-top">
                                                <span class="text">search now</span>
                                                <span class="icons fa fa-long-arrow-right"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="col-1">
                                        <div class="price-widget widget">
                                            <div class="title-widget">
                                                <div class="title">price</div>
                                            </div>
                                            <div class="content-widget">
                                                <div class="price-wrapper">
                                                    <div data-range_min="<?php echo $min_price; ?>" data-range_max="<?php echo $max_price; ?>" data-cur_min="<?php echo $min_price; ?>" data-cur_max="<?php echo $max_price; ?>" class="nstSlider">
                                                        <div class="leftGrip indicator">
                                                            <div class="number"></div>
                                                        </div>
                                                        <div class="rightGrip indicator">
                                                            <div class="number"></div>
                                                        </div>
                                                    </div>
                                                    <div class="leftLabel">0</div>
                                                    <div class="rightLabel">3000</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="turkey-cities-widget widget">
                                            <div class="title-widget">
                                                <div class="title">rating</div>
                                            </div>
                                            <div class="content-widget">
                                                <form class="radio-selection">
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="rating" value="1stars" id="1stars" class="radio-btn">
                                                        <label for="1stars" class="radio-label stars stars5">1stars</label>
                                                        <span class="count">27</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="rating" value="2stars" id="2stars" class="radio-btn">
                                                        <label for="2stars" class="radio-label stars stars4">2stars</label>
                                                        <span class="count">75</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="rating" value="3stars" id="3stars" class="radio-btn">
                                                        <label for="3stars" class="radio-label stars stars3">3stars</label>
                                                        <span class="count">35</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="rating" value="4stars" id="4stars" class="radio-btn">
                                                        <label for="4stars" class="radio-label stars stars2">4stars</label>
                                                        <span class="count">34</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="rating" value="5stars" id="5stars" class="radio-btn">
                                                        <label for="5stars" class="radio-label stars stars1">5stars</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="turkey-cities-widget widget">
                                            <div class="title-widget">
                                                <div class="title">turkey cities</div>
                                            </div>
                                            <div class="content-widget">
                                                <form class="radio-selection">
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="ankara" id="ankara" class="radio-btn">
                                                        <label for="ankara" class="radio-label">ankara</label>
                                                        <span class="count">27</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="istanbul" id="istanbul" class="radio-btn">
                                                        <label for="istanbul" class="radio-label">istanbul</label>
                                                        <span class="count">75</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="anatolian" id="anatolian" class="radio-btn">
                                                        <label for="anatolian" class="radio-label">anatolian tiger</label>
                                                        <span class="count">35</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="eastern" id="eastern" class="radio-btn">
                                                        <label for="eastern" class="radio-label">eastern anatolia region</label>
                                                        <span class="count">34</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Selimiye" id="Selimiye" class="radio-btn">
                                                        <label for="Selimiye" class="radio-label">Selimiye Mosque</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Mediterranean" id="Mediterranean" class="radio-btn">
                                                        <label for="Mediterranean" class="radio-label">Mediterranean Region</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Osmaniye" id="Osmaniye" class="radio-btn">
                                                        <label for="Osmaniye" class="radio-label">Osmaniye</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Mustafakemalpa" id="Mustafakemalpa" class="radio-btn">
                                                        <label for="Mustafakemalpa" class="radio-label">Mustafakemalpa</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Orhangazi" id="Orhangazi" class="radio-btn">
                                                        <label for="Orhangazi" class="radio-label">Orhangazi</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="black-sea" id="black-sea" class="radio-btn">
                                                        <label for="black-sea" class="radio-label">Black Sea Region</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Southeastern" id="Southeastern" class="radio-btn">
                                                        <label for="Southeastern" class="radio-label">Southeastern</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Adapazarı" id="Adapazarı" class="radio-btn">
                                                        <label for="Adapazarı" class="radio-label">Adapazarı</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Turgutlu" id="Turgutlu" class="radio-btn">
                                                        <label for="Turgutlu" class="radio-label">Turgutlu</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                    <div class="radio-btn-wrapper">
                                                        <input type="radio" name="turkey" value="Kastamonu" id="Kastamonu" class="radio-btn">
                                                        <label for="Kastamonu" class="radio-label">Kastamonu</label>
                                                        <span class="count">65</span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="special-offer margin-top70">
                        <h3 class="title-style-2">special offer</h3>
                        <div class="special-offer-list">
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">alpha</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-2.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">otipus</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-3.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">sunrise</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-4.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">carisbean</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">alpha</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-2.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">otipus</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-3.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">sunrise</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="special-offer-layout">
                                <div class="image-wrapper">
                                    <a href="tour-view.html" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/footer/offer-4.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="tour-view.html" class="title">carisbean</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top">
        <a href="#top" class="link">
            <i class="fa fa-angle-double-up"></i>
        </a>
    </div>
</div>
<?php $this->load->view('front/common/common_footer'); ?>
<script>
    $('.selectbox').on("change", function (e) {
        $("#hiddenfield").val("submit");
        $("#filter").submit();
    });

</script>