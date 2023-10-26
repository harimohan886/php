<?php $this->load->view('front/common/common_header'); ?>

<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <!-- Banner contant-->
        <section class="page-banner homepage-default">
            <div class="container">
                <div class="tab-search tab-search-long tab-search-default">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <ul role="tablist" class="nav nav-tabs">
                                    <li role="presentation" class="tab-btn-wrapper active">
                                        <a href="#flight" aria-controls="flight" role="tab" data-toggle="tab"
                                           class="tab-btn">
                                            <i class="flaticon-transport-1"></i>
                                            <span class="text">FLIGHT</span>
                                            <span class="xs">FIND YOUR FLIGHT</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="tab-btn-wrapper">
                                        <a href="#transfer" aria-controls="transfer" role="tab" data-toggle="tab"
                                           class="tab-btn">
                                            <i class="flaticon-transport-3"></i>
                                            <span class="text">TRANSFER</span>
                                            <span class="xs">FIND TRANSFER</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="tab-btn-wrapper">
                                        <a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab" class="tab-btn">
                                            <i class="flaticon-three"></i>
                                            <span class="text">HOTEL</span>
                                            <span class="xs">FIND HOTEL</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="tab-btn-wrapper">
                                        <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab" class="tab-btn">
                                            <i class="flaticon-people"></i>
                                            <span class="text">TOURS</span>
                                            <span class="xs">FIND TOURS</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="tab-btn-wrapper">
                                        <a href="#car-rent" aria-controls="car-rent" role="tab" data-toggle="tab"
                                           class="tab-btn">
                                            <i class="flaticon-transport-7"></i>
                                            <span class="text">CAR RENT</span>
                                            <span class="xs">FIND CAR RENT</span>
                                        </a>
                                    </li>
                                    <li role="presentation" class="tab-btn-wrapper">
                                        <a href="#cruises" aria-controls="cruises" role="tab" data-toggle="tab"
                                           class="tab-btn">
                                            <i class="flaticon-transport-4"></i>
                                            <span class="text">CRUISES</span>
                                            <span class="xs">FIND CRUISES</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="tab-content">
                                        <div role="tabpanel" id="flight" class="tab-pane fade in active">
                                            <div class="find-widget find-flight-widget widget">
                                                <h4 class="title-widgets">FIND YOUR FLIGHT</h4>
                                                <form class="content-widget">
                                                    <div class="ffw-radio-selection">
                                                        <span class="ffw-radio-btn-wrapper">
                                                            <input type="radio" name="flight type" value="one way"
                                                                   id="flight-type-1" checked="checked" class="ffw-radio-btn">
                                                            <label for="flight-type-1" class="ffw-radio-label">One
                                                                Way</label>
                                                        </span>
                                                        <span class="ffw-radio-btn-wrapper">
                                                            <input type="radio" name="flight type" value="round trip"
                                                                   id="flight-type-2" class="ffw-radio-btn">
                                                            <label for="flight-type-2" class="ffw-radio-label">Round
                                                                Trip</label>
                                                        </span>
                                                        <span class="ffw-radio-btn-wrapper">
                                                            <input type="radio" name="flight type" value="multiple cities"
                                                                   id="flight-type-3" class="ffw-radio-btn">
                                                            <label for="flight-type-3" class="ffw-radio-label">Multiple
                                                                Cities</label>
                                                        </span>
                                                        <div class="stretch">&nbsp;</div>
                                                    </div>
                                                    <div class="text-input small-margin-top">
                                                        <div class="place text-box-wrapper">
                                                            <label class="tb-label">Where do you want to go?</label>
                                                            <div class="input-group">
                                                                <input type="text" placeholder="Write the place"
                                                                       class="tb-input">
                                                            </div>
                                                        </div>
                                                        <div class="input-daterange">
                                                            <div class="text-box-wrapper half">
                                                                <label class="tb-label">Check in</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="MM/DD/YY"
                                                                           class="tb-input">
                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                                </div>
                                                            </div>
                                                            <div class="text-box-wrapper half">
                                                                <label class="tb-label">Check out</label>
                                                                <div class="input-group">
                                                                    <input type="text" placeholder="MM/DD/YY"
                                                                           class="tb-input">
                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="count adult-count text-box-wrapper">
                                                            <label class="tb-label">Adult</label>
                                                            <div class="select-wrapper">
                                                                <!--i.fa.fa-chevron-down-->
                                                                <select class="form-control custom-select selectbox">
                                                                    <option selected="selected">1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="count child-count text-box-wrapper">
                                                            <label class="tb-label">Child</label>
                                                            <div class="select-wrapper">
                                                                <!--i.fa.fa-chevron-down-->
                                                                <select class="form-control custom-select selectbox">
                                                                    <option selected="selected">0</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">
                                                            <span class="text">SEARCH NOW</span>
                                                            <span class="icons fa fa-long-arrow-right"></span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div role="tabpanel" id="transfer" class="tab-pane fade">
                                            <div class="find-widget find-transfer-widget widget">
                                                <h4 class="title-widgets">FIND TRANSFER</h4>
                                                <form class="content-widget">
                                                    <div class="ffw-radio-selection">
                                                        <span class="ffw-radio-btn-wrapper">
                                                            <input type="radio" name="flight type" value="one way"
                                                                   id="transfer-type-1" checked="checked"
                                                                   class="ffw-radio-btn">
                                                            <label for="transfer-type-1" class="ffw-radio-label">One

                                                                Way</label>

                                                        </span>

                                                        <span class="ffw-radio-btn-wrapper">

                                                            <input type="radio" name="flight type" value="round trip"

                                                                   id="transfer-type-2" class="ffw-radio-btn">

                                                            <label for="transfer-type-2" class="ffw-radio-label">Round

                                                                Trip</label>

                                                        </span>

                                                        <span class="ffw-radio-btn-wrapper">

                                                            <input type="radio" name="flight type" value="multiple cities"

                                                                   id="transfer-type-3" class="ffw-radio-btn">

                                                            <label for="transfer-type-3" class="ffw-radio-label">Multiple

                                                                Places</label>

                                                        </span>

                                                        <div class="stretch">&nbsp;</div>

                                                    </div>

                                                    <div class="text-input small-margin-top">

                                                        <div class="place text-box-wrapper">

                                                            <label class="tb-label">Where do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="Write the place"

                                                                       class="tb-input">

                                                            </div>

                                                        </div>

                                                        <div class="date text-box-wrapper">

                                                            <label class="tb-label">When do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="MM/DD/YY" class="tb-input">

                                                                <i class="tb-icon fa fa-calendar input-group-addon"></i>

                                                            </div>

                                                        </div>

                                                        <div class="count adult-count text-box-wrapper">

                                                            <label class="tb-label">Adult</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="count child-count text-box-wrapper">

                                                            <label class="tb-label">Child</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">

                                                            <span class="text">SEARCH NOW</span>

                                                            <span class="icons fa fa-long-arrow-right"></span>

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <div role="tabpanel" id="hotel" class="tab-pane fade">

                                            <div class="find-widget find-hotel-widget widget">

                                                <h4 class="title-widgets">FIND HOTEL</h4>

                                                <form class="content-widget">

                                                    <div class="text-input small-margin-top">

                                                        <div class="place text-box-wrapper">

                                                            <label class="tb-label">Where do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="Write the place"

                                                                       class="tb-input">

                                                            </div>

                                                        </div>

                                                        <div class="input-daterange">

                                                            <div class="text-box-wrapper half">

                                                                <label class="tb-label">Check in</label>

                                                                <div class="input-group">

                                                                    <input type="text" placeholder="MM/DD/YY"

                                                                           class="tb-input">

                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>

                                                                </div>

                                                            </div>

                                                            <div class="text-box-wrapper half">

                                                                <label class="tb-label">Check out</label>

                                                                <div class="input-group">

                                                                    <input type="text" placeholder="MM/DD/YY"

                                                                           class="tb-input">

                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="count adult-count text-box-wrapper">

                                                            <label class="tb-label">Adult</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="count child-count text-box-wrapper">

                                                            <label class="tb-label">Child</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">

                                                            <span class="text">SEARCH NOW</span>

                                                            <span class="icons fa fa-long-arrow-right"></span>

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <div role="tabpanel" id="tours" class="tab-pane fade">

                                            <div class="find-widget find-tours-widget widget">

                                                <h4 class="title-widgets">FIND TOURS</h4>

                                                <form class="content-widget">

                                                    <div class="text-input small-margin-top">

                                                        <div class="place text-box-wrapper">

                                                            <label class="tb-label">Where do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="Write the place"

                                                                       class="tb-input">

                                                            </div>

                                                        </div>

                                                        <div class="date text-box-wrapper">

                                                            <label class="tb-label">When do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="MM/DD/YY" class="tb-input">

                                                                <i class="tb-icon fa fa-calendar input-group-addon"></i>

                                                            </div>

                                                        </div>

                                                        <div class="count adult-count text-box-wrapper">

                                                            <label class="tb-label">Adult</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="count child-count text-box-wrapper">

                                                            <label class="tb-label">Child</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">

                                                            <span class="text">SEARCH NOW</span>

                                                            <span class="icons fa fa-long-arrow-right"></span>

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <div role="tabpanel" id="car-rent" class="tab-pane fade">

                                            <div class="find-widget find-car-widget widget">

                                                <h4 class="title-widgets">FIND CAR</h4>

                                                <form class="content-widget">

                                                    <div class="text-input small-margin-top">

                                                        <div class="place text-box-wrapper">

                                                            <label class="tb-label">Where do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="Write the place"

                                                                       class="tb-input">

                                                            </div>

                                                        </div>

                                                        <div class="input-daterange">

                                                            <div class="text-box-wrapper half">

                                                                <label class="tb-label">Start date</label>

                                                                <div class="input-group">

                                                                    <input type="text" placeholder="MM/DD/YY"

                                                                           class="tb-input">

                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>

                                                                </div>

                                                            </div>

                                                            <div class="text-box-wrapper half">

                                                                <label class="tb-label">Return date</label>

                                                                <div class="input-group">

                                                                    <input type="text" placeholder="MM/DD/YY"

                                                                           class="tb-input">

                                                                    <i class="tb-icon fa fa-calendar input-group-addon"></i>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="count car-count text-box-wrapper">

                                                            <label class="tb-label">No. of Car</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">

                                                            <span class="text">SEARCH NOW</span>

                                                            <span class="icons fa fa-long-arrow-right"></span>

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                        <div role="tabpanel" id="cruises" class="tab-pane fade">

                                            <div class="find-widget find-cruises-widget widget">

                                                <h4 class="title-widgets">FIND CRUISES</h4>

                                                <form class="content-widget">

                                                    <div class="ffw-radio-selection">

                                                        <span class="ffw-radio-btn-wrapper">

                                                            <input type="radio" name="flight type" value="one way"

                                                                   id="cruises-type-1" checked="checked" class="ffw-radio-btn">

                                                            <label for="cruises-type-1" class="ffw-radio-label">One

                                                                Way</label>

                                                        </span>

                                                        <span class="ffw-radio-btn-wrapper">

                                                            <input type="radio" name="flight type" value="round trip"

                                                                   id="cruises-type-2" class="ffw-radio-btn">

                                                            <label for="cruises-type-2" class="ffw-radio-label">Round

                                                                Trip</label>

                                                        </span>

                                                        <span class="ffw-radio-btn-wrapper">

                                                            <input type="radio" name="flight type" value="multiple cities"

                                                                   id="cruises-type-3" class="ffw-radio-btn">

                                                            <label for="cruises-type-3" class="ffw-radio-label">Multiple

                                                                Places</label>

                                                        </span>

                                                        <div class="stretch">&nbsp;</div>

                                                    </div>

                                                    <div class="text-input small-margin-top">

                                                        <div class="place text-box-wrapper">

                                                            <label class="tb-label">Where do you want to go?</label>

                                                            <div class="input-group">

                                                                <input type="text" placeholder="Write the place"

                                                                       class="tb-input">

                                                            </div>

                                                        </div>

                                                        <div class="count time-count text-box-wrapper">

                                                            <label class="tb-label">Time</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">08:00</option>

                                                                    <option>10:00</option>

                                                                    <option>12:00</option>

                                                                    <option>14:00</option>

                                                                    <option>16:00</option>

                                                                    <option>18:00</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="count adult-count text-box-wrapper">

                                                            <label class="tb-label">Adult</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="count child-count text-box-wrapper">

                                                            <label class="tb-label">Child</label>

                                                            <div class="select-wrapper">

                                                                <!--i.fa.fa-chevron-down-->

                                                                <select class="form-control custom-select selectbox">

                                                                    <option selected="selected">0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                    <option>5</option>

                                                                    <option>6</option>

                                                                    <option>7</option>

                                                                    <option>8</option>

                                                                    <option>9</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <button type="submit" data-hover="SEARCH NOW" class="btn btn-slide">

                                                            <span class="text">SEARCH NOW</span>

                                                            <span class="icons fa fa-long-arrow-right"></span>

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!--End Banner contant-->

        <!-- About-->
        <section class="about-us layout-1 padding-top padding-bottom">
            <div class="container">
                <div class="group-title">
                    <div class="sub-title">
                        <p class="text">Ideas For</p>
                        <i class="icons flaticon-people"></i>
                    </div>
                    <h2 class="main-title">your next trip</h2>
                </div>
                <div class="row small-gutters categories_grid">
                    <div class="col-sm-12 col-md-6">
                        <a href="all_tours_list.html">
                            <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/011.jpg" alt="" class="img-fluid">
                            <div class="wrapper">
                                <h2>Travel is a forever kind of love</h2>
                                <p>1150 Locations</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="row small-gutters mt-md-0">
                            <div class="col-sm-6">
                                <a href="all_tours_list.html">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/022.jpg" alt="" class="img-fluid">
                                    <div class="wrapper">
                                        <h2>Plan ahead and save</h2>
                                        <p>800 Locations</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="all_hotels_list.html">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/033.jpg" alt="" class="img-fluid">
                                    <div class="wrapper">
                                        <h2>Stays with flexibility</h2>
                                        <p>650 Locations</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-12 mt-sm-2">
                                <a href="all_restaurants_list.html">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/044.jpg" alt="" class="img-fluid">
                                    <div class="wrapper">
                                        <h2>our Best Packages</h2>
                                        <p>1132 Tour Package</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About-->

        <!-- video layout-->
        <section class="videos layout-1">

            <div class="container">

                <div class="row">

                    <div class="col-md-5">

                        <div class="video-wrapper padding-top padding-bottom">

                            <h5 class="sub-title">it’s a

                                <strong>big world</strong> out there

                            </h5>

                            <h2 class="title">go explore</h2>

                            <div class="text">There are many variations of passages of. Lorem Ipsum available, but the

                                majority have suffered alteration in some form, by injected humour, or randomised words

                                which don't look.</div>

                            <a href="javascript:void(0);" class="btn btn-maincolor">read more</a>

                        </div>

                    </div>

                    <div class="col-md-7">

                        <div class="video-thumbnail">

                            <div class="video-bg">

                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/video-bg.jpg" alt="" class="img-responsive">

                            </div>

                            <div class="video-button-play">

                                <i class="icons fa fa-play"></i>

                            </div>

                            <div class="video-button-close"></div>

                            <iframe src="https://www.youtube.com/embed/moOosWuoDyA?rel=0"

                                    allowfullscreen="allowfullscreen" class="video-embed"></iframe>

                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- End video layout-->

        <!--Corona effect-->
        <section class="padding-top padding-bottom">
            <div class="container">
                <div class="group-title">
                    <div class="sub-title">
                        <p class="text">Tour Guide</p>
                        <i class="icons flaticon-people"></i>
                    </div>
                    <h2 class="main-title">Our Best Guides</h2>
                </div>
                <div class="wrapper-team-detail">
                    <div class="wrapper-expert team-profile">
                        <div class="content-expert">
                            <a class="img-expert">
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/about-6.jpg" alt="" class="img-responsive img">
                            </a>
                            <div class="caption-expert">
                                <div class="item-expert">

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="title">Book Now</a>

                                </div>
                                <ul class="social list-inline">
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-expert">
                            <a class="img-expert">
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/about-9.jpg" alt="" class="img-responsive img">
                            </a>
                            <div class="caption-expert">
                                <div class="item-expert">

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="title">Book Now</a>

                                </div>
                                <ul class="social list-inline">
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-expert">
                            <a class="img-expert">
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/about-7.jpg" alt="" class="img-responsive img">
                            </a>
                            <div class="caption-expert">
                                <div class="item-expert">

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="title">Book Now</a>

                                </div>
                                <ul class="social list-inline">
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-expert">
                            <a class="img-expert">
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/about-8.jpg" alt="" class="img-responsive img">
                            </a>
                            <div class="caption-expert">
                                <div class="item-expert">

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="title">Book Now</a>

                                </div>
                                <ul class="social list-inline">
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-expert">
                            <a class="img-expert">
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/about-5.jpg" alt="" class="img-responsive img">
                            </a>
                            <div class="caption-expert">
                                <div class="item-expert">
                                    <h3>Kunj Shah</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <a href="#" class="title">Book Now</a>
                                </div>
                                <ul class="social list-inline">
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-expert">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Corona effect-->

        <!-- Tour -->
        <section class="tours padding-top padding-bottom">

            <div class="container">

                <div class="tours-wrapper">

                    <div class="group-title">

                        <div class="sub-title">

                            <p class="text">PACK AND GO</p>

                            <i class="icons flaticon-people"></i>

                        </div>

                        <h2 class="main-title">awesome tours</h2>

                    </div>

                    <div class="tours-content margin-top70">

                        <div class="tours-list">

                            <div class="tours-layout">

                                <div class="image-wrapper">

                                    <a href="javascript:void(0);" class="link">

                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/tours/tour-1.jpg" alt="" class="img-responsive">

                                    </a>

                                    <div class="title-wrapper">

                                        <a href="javascript:void(0);" class="title">Newyork city</a>

                                        <i class="icons flaticon-circle"></i>

                                    </div>

                                    <div class="label-sale">

                                        <p class="text">sale</p>

                                        <p class="number">35%</p>

                                    </div>

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

                                                <span class="number">350</span>

                                            </div>

                                            <p class="for-price">3 days 2 nights</p>

                                        </div>

                                        <p class="text">Lorem ipsum dolor sit amet, consectetur elit. Nulla rhoncus

                                            ultrices purus, volutpat.</p>

                                        <div class="group-btn-tours">

                                            <a href="javascript:void(0);" class="left-btn">book now</a>

                                            <a href="javascript:void(0);" class="right-btn">add to list</a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="tours-layout">

                                <div class="image-wrapper">

                                    <a href="javascript:void(0);" class="link">

                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/tours/tour-2.jpg" alt="" class="img-responsive">

                                    </a>

                                    <div class="title-wrapper">

                                        <a href="javascript:void(0);" class="title">paris city</a>

                                        <i class="icons flaticon-circle"></i>

                                    </div>

                                </div>

                                <div class="content-wrapper">

                                    <ul class="list-info list-inline list-unstyled">

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
                                                <span class="number">250</span>
                                            </div>
                                            <p class="for-price">3 days 2 nights</p>
                                        </div>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur elit. Nulla rhoncus
                                            ultrices purus, volutpat.</p>
                                        <div class="group-btn-tours">
                                            <a href="javascript:void(0);" class="left-btn">book now</a>
                                            <a href="javascript:void(0);" class="right-btn">add to list</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tours-layout">
                                <div class="image-wrapper">
                                    <a href="javascript:void(0);" class="link">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/tours/tour-3.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="title-wrapper">
                                        <a href="javascript:void(0);" class="title">tokyo city</a>
                                        <i class="icons flaticon-circle"></i>
                                    </div>
                                </div>
                                <div class="content-wrapper">
                                    <ul class="list-info list-inline list-unstyled">
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
                                                <span class="number">375</span>
                                            </div>
                                            <p class="for-price">3 days 2 nights</p>
                                        </div>
                                        <p class="text">Lorem ipsum dolor sit amet, consectetur elit. Nulla rhoncus
                                            ultrices purus, volutpat.</p>
                                        <div class="group-btn-tours">
                                            <a href="javascript:void(0);" class="left-btn">book now</a>
                                            <a href="javascript:void(0);" class="right-btn">add to list</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="btn btn-transparent margin-top70">more tours</a>
                    </div>
                </div>
            </div>
        </section>
        <!--End Tour-->

        <!--travels-->
        <section class="travelers">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="traveler-wrapper padding-top padding-bottom">
                            <div class="group-title white">
                                <div class="sub-title">
                                    <p class="text">RELAX AND ENJOY</p>
                                    <i class="icons flaticon-people"></i>
                                </div>
                                <h2 class="main-title">happy traveler</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="traveler-list">
                            <div class="traveler">
                                <div class="cover-image">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/cover-image-1.jpg" alt="">
                                </div>
                                <div class="wrapper-content">
                                    <div class="avatar">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/avatar-1.jpg" alt="" class="img-responsive">
                                    </div>
                                    <p class="name">Sandara park</p>
                                    <p class="address">roma, italy</p>
                                    <p class="description">" There are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in some form."</p>
                                </div>
                            </div>
                            <div class="traveler">
                                <div class="cover-image">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/cover-image-2.jpg" alt="">
                                </div>
                                <div class="wrapper-content">
                                    <div class="avatar">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/avatar-2.jpg" alt="" class="img-responsive">
                                    </div>
                                    <p class="name">Kown Jiyong</p>
                                    <p class="address">london, England</p>
                                    <p class="description">" There are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in some form."</p>
                                </div>
                            </div>
                            <div class="traveler">
                                <div class="cover-image">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/cover-image-3.jpg" alt="">
                                </div>
                                <div class="wrapper-content">
                                    <div class="avatar">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/avatar-3.jpg" alt="" class="img-responsive">
                                    </div>
                                    <p class="name">taylor rose</p>
                                    <p class="address">pari, France</p>
                                    <p class="description">" There are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in some form."</p>
                                </div>
                            </div>
                            <div class="traveler">
                                <div class="cover-image">
                                    <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/cover-image-4.jpg" alt="">
                                </div>
                                <div class="wrapper-content">
                                    <div class="avatar">
                                        <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/avatar-4.jpg" alt="" class="img-responsive">
                                    </div>
                                    <p class="name">john smith</p>
                                    <p class="address">new york, USA</p>
                                    <p class="description">" There are many variations of passages of Lorem Ipsum
                                        available, but the majority have suffered alteration in some form."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end travels-->
        <section class="a-fact padding-top padding-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="group-title">
                            <div class="sub-title">
                                <p class="text">PROUD NUMBERS</p>
                                <i class="icons flaticon-people"></i>
                            </div>
                            <h2 class="main-title">a fact of explooer</h2>
                        </div>
                        <div class="a-fact-wrapper">
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, by injected
                                humour. </p>
                            <div class="a-fact-list">
                                <ul class="list-unstyled">
                                    <li>
                                        <p class="text">1456 flight in the world.</p>
                                    </li>
                                    <li>
                                        <p class="text">2385 happy customer enjoy jouneys with Explooer.</p>
                                    </li>
                                    <li>
                                        <p class="text">356 best destinational we explore.</p>
                                    </li>
                                    <li>
                                        <p class="text">2345 package tours every year.</p>
                                    </li>
                                    <li>
                                        <p class="text">top 10 best tourism services.</p>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" class="btn btn-maincolor">read more</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="a-fact-image-wrapper">
                            <div class="a-fact-image">
                                <a href="#" class="icons icons-1">
                                    <i class="fa fa-plane"></i>
                                </a>
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/area-1.png" alt="" class="img-responsive">
                            </div>
                            <div class="a-fact-image">
                                <a href="#" class="icons icons-2">
                                    <i class="fa fa-map-marker"></i>
                                </a>
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/area-2.png" alt="" class="img-responsive">
                            </div>
                            <div class="a-fact-image">
                                <a href="#" class="icons icons-3">
                                    <i class="fa fa-users"></i>
                                </a>
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/area-3.png" alt="" class="img-responsive">
                            </div>
                            <div class="a-fact-image">
                                <a href="#" class="icons icons-4">
                                    <i class="fa fa-suitcase"></i>
                                </a>
                                <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/area-4.png" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact style-1">
            <div class="container">
                <div class="row">
                    <div class="wrapper-contact-style">
                        <div data-wow-delay="0.5s" class="contact-wrapper-images wow fadeInLeft">
                            <img src="<?php echo FRONT_CSS_PATH; ?>assets/images/homepage/contact-people.png" alt="" class="img-responsive">
                        </div>
                        <div class="col-lg-6 col-sm-7 col-lg-offset-4 col-sm-offset-5">
                            <div data-wow-delay="0.4s" class="contact-wrapper padding-top padding-bottom wow fadeInRight">
                                <div class="contact-box">
                                    <h5 class="title">contact us</h5>
                                    <p class="text">Just pack and go! Let leave your travel plan to travel experts!</p>
                                    <form class="contact-form" name="form" id="form">
                                        <input type="text" placeholder="Your Name" class="form-control form-input">
                                        <input type="email" placeholder="Your Email" class="form-control form-input">
                                        <textarea placeholder="Your Message" class="form-control form-input"></textarea>
                                        <div class="contact-submit">
                                            <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide">
                                                <span class="text">send message</span>
                                                <span class="icons fa fa-long-arrow-right"></span>
                                            </button>
                                            <input type="hidden" name="save_button" value="save" id="save_buttonss">
                                        </div>
                                    </form>
                                </div>
                            </div>
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
<script src="<?php echo FRONT_CSS_PATH; ?>assets/js/pages/home-page.js"></script>