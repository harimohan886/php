<?php 
$sdata = $this->session->userdata;
$customsession=array();
$vendorsession=array();
if(isset($sdata['is_customer']) && !empty($sdata['is_customer'])){
    $customsession=$sdata;
}
if(isset($sdata['is_dealer']) && !empty($sdata['is_dealer']) && $sdata['is_dealer']==1){
    $vendorsession=$sdata;
}
?>
<?php $this->load->view('front/common/common_css'); 
if(!isset($header)){
    $header="";
} 
$uri_part2 = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
?>
<body<?php if(isset($uri_part2) && ($uri_part2 == 'tour-guide-detail')) { ?> class="inner-pages agents homepage-4 det" <?php } ?>>
    <div class="body-wrapper">
        <!-- MENU MOBILE-->
        <div class="wrapper-mobile-nav">
            <div class="header-topbar">
                <div class="topbar-search search-mobile">
                    <form class="search-form">
                        <div class="input-icon">
                            <i class="btn-search fa fa-search"></i>
                            <input type="text" placeholder="Search here..." class="form-control" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="header-main">
                <div class="menu-mobile">
                    <ul class="nav-links nav navbar-nav">
                        <li class="dropdown">
                            <a href="<?php echo base_url();?>" class="main-menu">
                                <span class="text">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="main-menu">
                                <span class="text">about</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url();?>tour" class="main-menu">
                                <span class="text">Tour</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="main-menu">
                                <span class="text">contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- WRAPPER CONTENT-->
        <div class="wrapper-content">
            <!-- HEADER-->
            <header style="<?php echo $header; ?>">
                <div class="bg-transparent header-01">
                    <div class="header-topbar">
                        <div class="container">
                            <ul class="topbar-left list-unstyled list-inline pull-left">
                                <li>
                                    <a href="javascript:void(0)" class="country dropdown-text">
                                        <span>Country</span>
                                        <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-topbar list-unstyled hide">
                                        <li>
                                            <a href="#" class="link">Vietnam</a>
                                        </li>
                                        <li>
                                            <a href="#" class="link">Japan</a>
                                        </li>
                                        <li>
                                            <a href="#" class="link">Korea</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="language dropdown-text">
                                        <span>English</span>
                                        <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-topbar list-unstyled hide">
                                        <li>
                                            <a href="#" class="link">Vietnam</a>
                                        </li>
                                        <li>
                                            <a href="#" class="link">Japan</a>
                                        </li>
                                        <li>
                                            <a href="#" class="link">Korea</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="monney dropdown-text">
                                        <span>USD</span>
                                        <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-topbar list-unstyled hide">
                                        <li>
                                            <a href="#" class="link">VND</a>
                                        </li>
                                        <li>
                                            <a href="#" class="link">Euro</a>
                                        </li>
                                        <li>
                                            <a href="#" class="link">JPY</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="topbar-right pull-right list-unstyled list-inline login-widget">
                                <li>
                                    <a href="javascript:void(0)" class="country dropdown-text">
                                        <span> <?php if(count($customsession)> 0){ ?>

                                        Welcome to, <?php echo $customsession['username']; ?>

                                         <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                        <?php } else { ?> 

                                             <?php if(count($vendorsession)> 0 || count($customsession)> 0  ){ } else { ?>
                                                Customer <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                              <?php } } ?>
                                        </span>
                                        
                                    </a>
                                    <ul class="dropdown-topbar list-unstyled hide">
                                        <?php if(count($customsession)> 0){ ?>
                                        <li>
                                            <a href="<?php echo base_url();?>customer-profile" class="link">My Profile</a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo base_url();?>my-order" class="link">My
                                                Orders</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>customer-register" class="link">Logout</a>
                                        </li>
                                        <?php } else { ?>
                                        <li>
                                            <a href="<?php echo base_url();?>customer-login" class="link">Login</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>customer-register"
                                                class="link">Register</a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="language dropdown-text">
                                        <span> <?php if(count($vendorsession)> 0){ ?>

                                            Welcome to, <?php echo $vendorsession['username']; ?> <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                        <?php } else { ?> 

                                             <?php if(count($vendorsession)> 0 || count($customsession)> 0  ){ } else { ?>

                                            Dealers <i class="topbar-icon icons-dropdown fa fa-angle-down"></i>
                                        <?php  } }  ?>
                                        </span>
                                        
                                    </a>
                                    <ul class="dropdown-topbar list-unstyled hide">
                                    <?php if(count($vendorsession)> 0){ ?>
                                        <li>
                                            <a href="<?php echo base_url();?>dealer/dashboard" class="link">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>logout" class="link">Logout</a>
                                        </li>
                                    <?php }  else { ?>
                                        <li>
                                            <a href="<?php echo base_url();?>dealers-login" class="link">Login</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url();?>dealers-register" class="link">Register</a>
                                        </li>
                                    <?php } ?>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="header-main">
                        <div class="container">
                            <div class="header-main-wrapper">
                                <div class="hamburger-menu">
                                    <div class="hamburger-menu-wrapper">
                                        <div class="icons"></div>
                                    </div>
                                </div>
                                <div class="navbar-header">
                                    <div class="logo">
                                        <a href="<?php echo base_url();?>" class="header-logo">
                                            <img src="<?php echo FRONT_CSS_PATH;?>assets/images/logo/sticker.png"
                                                alt="" />
                                        </a>
                                    </div>
                                </div>
                                <nav class="navigation">
                                    <ul class="nav-links nav navbar-nav">
                                        <li class="dropdown active">
                                            <a href="<?php echo base_url();?>" class="main-menu">
                                                <span class="text">Home</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="main-menu">
                                                <span class="text">about</span>
                                            </a>
                                        </li>
                                        

                                        <li class="dropdown">
                                            <a href="tour-result.html" class="main-menu">
                                                <span class="text">Booking</span>
                                            </a>
                                            <span class="icons-dropdown">
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                            <ul class="dropdown-menu dropdown-menu-1">
                                                <li>
                                                    <a href="<?php echo base_url();?>tour" class="link-page">Tour</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url();?>tour-guide" class="link-page">Our Guide</a>
                                                </li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0);" class="main-menu">
                                                <span class="text">contact</span>
                                            </a>
                                        </li>
                                        <li class="button-search">
                                            <p class="main-menu">
                                                <i class="fa fa-search"></i>
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="nav-search hide">
                                        <form>
                                            <input type="text" placeholder="Search" class="searchbox" />
                                            <button type="submit" class="searchbutton fa fa-search"></button>
                                        </form>
                                    </div>
                                </nav>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>