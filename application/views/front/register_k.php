<?php $this->load->view('front/common/common_header', array("header" => ""));?>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section class="page-login">
            <div class="container wrapper-login">
                <div class="content-login">
                    <div class="main-login">
                        <div class="login-title" id="1">create your account and join with us!</div>
                        <form method="post" name="register_form" id="register_form">
                            <div class="login-form">
                                <div class="row">
                                    <div class="content-form">
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">First Name
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="text" name="firstname" id="firstname" class="form-control label-input" placeholder="Enter First Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">Last name
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="text" name="lastname"  id="lastname" class="form-control label-input" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6" >
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">email
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="email" name="email" class="form-control label-input" id="email" placeholder="Enter valid Email Id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">Mobile Number
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="text" name="m_number" class="form-control label-input" id="m_number" placeholder="Enter Mobile Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">password
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="password" name="password" 
                                                    id="password"class="form-control label-input" placeholder="Enter Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">confirm password
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="password" name="cpassword" class="form-control label-input" placeholder="Enter Confirm Password">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12" id="4">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">Login Type
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <select name="type" class="input-sm form-control label-input">
                                                        <option value="">Select Login Type</option>
                                                        <option value="1">Tour Dealer</option>
                                                        <option value="2">Car Dealer</option>
                                                        <option value="3">Tour Guide</option>
                                                        <option value="4">Medical Dealer</option>
                                                        <option value="5">Education Dealer</option>
                                                        <option value="6">Corporate Event Delar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="contact-submit">
                                        <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide">
                                            <span class="text">create account</span>
                                            <span class="icons fa fa-long-arrow-right"></span>
                                        </button>
                                        <input type="hidden" name="save_button" value="save" id="save_buttonss">
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
<?php $this->load->view('front/common/common_footer', array("header" => ""));?>
<script>
    $(document).ready(function () {
        $('#error').delay(6000).fadeOut();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script>

    
$(document).ready(function(){
    $(function () {
        $("#register_form").validate({
            rules: {
                firstname: { required: true, },
                lastname: { required: true, },
                m_number: { required: true, number: true},
                email: { required: true, email: true,
                    remote: {
                        url: "<?php echo site_url("check_vendor_email_exist_or_not"); ?>",
                        type: "POST",
                        data: {
                            email: function () {
                                return $("#email").val();
                            },
                        }
                    }
                },
                password: { required: true, },
                //type: { required: true, },
                cpassword: { required: true,equalTo:"#password" },
            },
            messages: {
                firstname: { required: "Enter Your First Name", },
                lastname: { required: "Enter Your Last Name", },
                m_number: { required: "Enter Mobile Number", number: "Enter Number Only", },
                email: { required: "Enter Your Email", email: "Please enter valid email", remote: "This email is already exist." },
                password: { required: "Enter Your Password", },
                cpassword: { required: "Enter Your Confirm Password",equalTo:"Confirm Password is Equal to password" },
            },
        });
    });
    
});
</script>
