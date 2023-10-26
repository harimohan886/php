<?php $this->load->view('front/common/common_header', array("header" => "display:none !important;")); ?>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section class="page-login">
            <div class="container wrapper-login">
                <div class="content-login">
                    <div class="main-login">
                        <div class="logo-login">
                            <a href="index.html" class="logo-black">
                                <img src="assets/images/logo/logo-black-color-1.png" alt="" class="img img-reponsive">
                            </a>
                        </div>
                        <div class="login-title">login to your account!</div>
                        <form method="post" name="login_form" id="login_form">
                            <div class="login-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-login">
                                            <div class="input-login">
                                                <label class="label-login">email
                                                    <i class="form-icon fa fa-asterisk"></i>
                                                </label>
                                                <input type="email" name="email" class="form-control label-input">
                                            </div>
                                            <div class="input-login">
                                                <label class="label-login">password
                                                    <i class="form-icon fa fa-asterisk"></i>
                                                </label>
                                                <input type="password" name="password" class="form-control label-input">
                                            </div>
                                            <div class="contact-submit">
                                                <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide">
                                                    <span class="text">sign in</span>
                                                    <span class="icons fa fa-long-arrow-right"></span>
                                                </button>
                                                <input type="hidden" name="save_button" value="save" id="save_buttonss">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<?php $this->load->view('front/common/common_footer', array("header" => "display:none !important;")); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script>
    // Wait for the DOM to be ready
    $(function () {
        $("#login_form").validate({
            rules: {
                email: { required: true, email: true, },
                password: { required: true, },
            },
            messages: {
                email: { required: "Enter Your Email", },
                password: { required: "Enter Your Password", },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>   
