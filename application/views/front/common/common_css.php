<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo PROJECT_NAME;?> | <?php if(isset($title)){echo $title; }?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONT CSS-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/font/font-icon/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/font/font-icon/font-flaticon/flaticon.css">
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/libs/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/libs/animate/animate.css">
    <link rel="icon" href="<?php echo FRONT_CSS_PATH;?>assets/images/logo/logo-black-color-1.png" type="image/png"/>
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/libs/slick-slider/slick.css">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/libs/slick-slider/slick-theme.css">
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/libs/selectbox/css/jquery.selectbox.css">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/libs/please-wait/please-wait.css">
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/libs/fancybox/css/jquery.fancybox8cbb.css?v=2.1.5">
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/libs/fancybox/css/jquery.fancybox-buttons3447.css?v=1.0.5">
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/libs/fancybox/css/jquery.fancybox-thumbsf2ad.css?v=1.0.7">
    <!-- STYLE CSS-->
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/css/layout.css">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/css/components.css">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/css/responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/css/color.css">
    <!--link(type="text/css", rel='stylesheet', href='assets/css/color-1/color-1.css', id="color-skins")-->
    <link type="text/css" rel="stylesheet" href="#" id="color-skins">
    <link type="text/css" rel="stylesheet" href="<?php echo FRONT_CSS_PATH;?>assets/css/style.css">
    <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/jquery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/js-cookie/js.cookie.js"></script>
    <script>
    // if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1')) {
    //     $('#color-skins').attr('href', '<?php echo FRONT_CSS_PATH;?>assets/css/' + Cookies.get('color-skin') + '/' +
    //         'color.css');
    // } else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1')) {
    //     $('#color-skins').attr('href', '<?php echo FRONT_CSS_PATH;?>assets/css/color-1/color.css');
    // }
    </script>
    <link type="text/css" rel="stylesheet"
        href="<?php echo FRONT_CSS_PATH;?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
</head>
<style type="text/css">
    <style>
    input.error {border-bottom: 1px solid red !important;}
    textarea.error {border-bottom: 1px solid red !important;}
    label.error{width: 100%;color: red !important;;font-style: normal !important;margin-left: 0px !important;margin-bottom: 5px !important;}
</style>
</style>