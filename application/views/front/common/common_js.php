<script>
           if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1'))
            {
                $('.logo .header-logo img ,.logo-footer img, .group-logo .img-logo').attr('src', '<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>');
                $('.logo-black img').attr('src', '<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>');
            }
            else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1'))
            {
                $('.logo .header-logo img , .logo-footer img, .group-logo .img-logo').attr('src', '<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>');
                $('.logo-black img').attr('src', '<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>');
            }
        </script>
        <!-- LIBRARY JS-->
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/detect-browser/browser.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/wow-js/wow.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/slick-slider/slick.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/please-wait/please-wait.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/fancybox/js/jquery.fancybox-thumbs.js"></script>
        <!--script(src="<?php echo FRONT_CSS_PATH;?>assets/libs/parallax/jquery.data-parallax.min.js")-->
        <!-- MAIN JS-->
        <script src="<?php echo FRONT_CSS_PATH;?>assets/js/main.js"></script>
        <!-- LOADING JS FOR PAGE-->
        <script src="<?php echo FRONT_CSS_PATH;?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/plus-minus-input/plus-minus-input.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/js/pages/sidebar.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/js/pages/result.js"></script>

        <!-- view -->
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/js/pages/tour-view.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/js/pages/team.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/isotope/isotope.min.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/fancybox/js/jquery.mousewheel-3.0.6.pack.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/fancybox/js/jquery.fancybox.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/fancybox/js/jquery.fancybox-thumbs.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/mouse-direction-aware/jquery.directional-hover.js"></script>
        <script src="<?php echo FRONT_CSS_PATH; ?>assets/libs/mouse-direction-aware/jquery.directional-hover.js"></script>
        <script>
            var logo_str = '<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>';
            if (Cookies.set('color-skin'))
            {
                logo_str = '<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>';
            }
            window.loading_screen = window.pleaseWait(
            {
                logo: logo_str,
                backgroundColor: '#fff',
                loadingHtml: "<div class='spinner sk-spinner-wave'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>",
            });
        </script>