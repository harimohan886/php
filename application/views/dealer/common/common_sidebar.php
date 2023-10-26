<?php

$userdata   = $this->session->userdata();
$active     = $this->uri->segment(1);
$sub        = $this->uri->segment(2);
$sub2       = $this->uri->segment(3);
$dealerpath = $this->config->item('dealer_profile_uploaded_path');
$dealerrole = $this->session->userdata('dealer_role');
?>

<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="<?php echo base_url(); ?>admin/dashboard">
            <img src="<?php echo base_url(); ?>assets/images/sticker.png" class="logo-icon" alt="logo icon">
        </a>
    </div>
    <div class="user-details">
        <div class="media align-items-center user-pointer collapsed" data-toggle="collapse"
            data-target="#user-dropdown">
            <div class="avatar"><img class="mr-3 side-user-img" src="<?php echo $dealerpath . $userdata['profile_pic']; ?>"
                    alt="user avatar"></div>
            <div class="media-body">
                <h6 class="side-user-name"><?php echo $userdata['user_name']; ?></h6>
            </div>
        </div>
        <div id="user-dropdown" class="collapse">
            <?php if ($dealerrole == '1' || $dealerrole == '2' || $dealerrole == '3' || $dealerrole == '4' || $dealerrole == '5' || $dealerrole == '6') {?>
                <ul class="user-setting-menu">
                    <li><a href="<?php echo base_url(); ?>dealer/profile"><i class="icon-user"></i> My Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>dealer/changepassword"><i class="icon-lock"></i> Change Password</a></li>
                    <li><a href="<?php echo base_url(); ?>dealerlogin/signout"><i class="icon-power"></i> Logout</a></li>
                </ul>
            <?php }?>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-header">MAIN NAVIGATION</li>
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span><i
                    class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url(); ?>dealer/dashboard"><i class="zmdi zmdi-dot-circle-alt"></i>
                        Dashboard</a></li>
            </ul>
        </li>
        <?php if ($dealerrole == '1' || $dealerrole == 1) {?>
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-card-travel"></i> <span>Tour Packages</span><i
                    class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url(); ?>tour_dealer/tour_package_list"><i class="zmdi zmdi-dot-circle-alt"></i>
                        Tour List</a></li>
                <li><a href="<?php echo base_url(); ?>tour_dealer/tour_include_list"><i class="zmdi zmdi-dot-circle-alt"></i>
                        Tour Include List</a></li>
                <li><a href="<?php echo base_url(); ?>tour_dealer/tour_booked_list"><i class="zmdi zmdi-dot-circle-alt"></i> Tour Booking List</a></li>
            </ul>
        </li>
        <?php }?>
        <?php if ($dealerrole == '6' || $dealerrole == 6) {?>
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-card-travel"></i> <span>Tour Packages</span><i
                    class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url(); ?>tour_dealer/tour_package_list"><i class="zmdi zmdi-dot-circle-alt"></i> Tour List</a></li>
                <li><a href="<?php echo base_url(); ?>tour_dealer/tour_include_list"><i class="zmdi zmdi-dot-circle-alt"></i> Tour Include List</a></li>

            </ul>
        </li>
        <?php }?>
        <?php if ($dealerrole == '3' || $dealerrole == 3) {?>
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-card-travel"></i> <span>Tour Guide Rate</span><i
                    class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="<?php echo base_url(); ?>guide_rate/guide_rate_list"><i class="zmdi zmdi-dot-circle-alt"></i> Tour Guide Rate List</a></li>

            </ul>
        </li>
        <li>
            <a href="javaScript:void();" class="waves-effect">
                <i class="zmdi zmdi-card-travel"></i> <span>My Booking</span><i
                    class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="sidebar-submenu">
                <li><a href="#"><i class="zmdi zmdi-dot-circle-alt"></i>Fature Booking List</a></li>
                <li><a href="#"><i class="zmdi zmdi-dot-circle-alt"></i>Past Booking List</a></li>
            </ul>
        </li>

        <li><!-- <i class="fas fa-comments"></i>-->
            <a href="javaScript:void(0);" class="waves-effect">
                <i class="zmdi zmdi-card-travel"></i> <span>Review</span><i
                    class="fa fa-angle-left pull-right"></i></a>
            <ul class="sidebar-submenu">
                <li><a href="#"><i class="zmdi zmdi-dot-circle-alt"></i> Review List</a></li>
                <!--    <li><a href="<?php echo base_url(); ?>dealer/review"><i class="zmdi zmdi-dot-circle-alt"></i> Review List</a></li>-->
            </ul>
        </li>
        <?php }?>
    </ul>
</div>
<!--End sidebar-wrapper-->
