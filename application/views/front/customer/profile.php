<?php 
$this->load->view('front/common/common_header',array("header"=>"")); ?>
<style>
.page-login {
    height: auto;
}
</style>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->

    <div class="main-content">
        <section class="page-login">
            <div class="container">
                <?php if(isset($message) && !empty($message)){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong>'.$message.'
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';
                } ?>
                <div class="row">
                    <div class="col-md-8 row_eq_height">
                        <div class="wrapper-login">
                            <div class="content-login">
                                <div class="main-login">
                                    <div class="logo-login">
                                        <a href="<?php echo base_url();?>" class="logo-black">
                                            <img src="<?php echo FRONT_CSS_PATH."assets/images/logo/sticker.png";?>"
                                                alt="" class="img img-reponsive">
                                        </a>
                                    </div>
                                    <div class="login-title"><?php echo $title;?></div>

                                    <form method="post" name="register_form" id="register_form"
                                        enctype="multipart/form-data">
                                        <div class="login-form">
                                            <div class="row">
                                                <div class="content-form">
                                                    <div class="col-md-6">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">name
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <input type="text" name="name"
                                                                    class="form-control label-input"
                                                                    value="<?php echo $customer_details->name; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">email
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <input type="email" name="email"
                                                                    class="form-control label-input"
                                                                    value="<?php echo $customer_details->email; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">phone code
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <select name="ccode"
                                                                    class="input-sm form-control label-input">
                                                                    <options value="">---</options>
                                                                    <?php if(count($country) > 0) { 
                                                                    foreach($country  as $row){?>
                                                                    <option value="<?php echo $row->phonecode;?>"
                                                                        <?php if($customer_details->country_code==$row->phonecode){echo "selected";} ?>>
                                                                        <?php echo $row->name; ?>(
                                                                        +<?php echo $row->phonecode;?>)</option>
                                                                    <?php } } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">phone Number
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <input type="text" name="mobile"
                                                                    class="form-control label-input"
                                                                    value="<?php echo $customer_details->mobile; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <label class="label-login">Gender
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <div class="input-login">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-check form-check-inline"
                                                                            style="display:inline-block; margin-right:5px;">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gender" id="inlineRadio1"
                                                                                value="M"
                                                                                <?php if($customer_details->gender=="M"){echo "checked";} ?>>
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio1">Male</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-check form-check-inline"
                                                                            style="display:inline-block; margin-right:5px;">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gender" id="inlineRadio2"
                                                                                value="F"
                                                                                <?php if($customer_details->gender=="F"){echo "checked";} ?>>
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio2">Female</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-check form-check-inline"
                                                                            style="display:inline-block;">
                                                                            <input class="form-check-input" type="radio"
                                                                                name="gender" id="inlineRadio3"
                                                                                value="O">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio3"
                                                                                <?php if($customer_details->gender=="O"){echo "checked";} ?>>Other</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">Location
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <textarea placeholder="Your Location" name="location"
                                                                    id="location"
                                                                    class="form-control form-input"><?php echo $customer_details->address; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">Country
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <select name="country" id="country"
                                                                    class="input-sm form-control select 2 label-input">
                                                                    <option value="">Select Country</option>
                                                                    <?php
                                                                        foreach($country as $row)
                                                                        {   $selected="";
                                                                            if($row->id==$customer_details->country){ $selected="selected"; }
                                                                            echo '<option value="'.$row->id.'" '.$selected.'>'.$row->name.'</option>';
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">State
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <select name="state" id="state"
                                                                    class="input-sm form-control select 2 label-input">
                                                                    <option value="">Select State</option>
                                                                    <option
                                                                        value="<?php echo $customer_details->state;?>"
                                                                        selected><?php echo $state_name; ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">City
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <select name="city" id="city"
                                                                    class="input-sm form-control select 2 label-input">
                                                                    <option value="">Select City</option>
                                                                    <option
                                                                        value="<?php echo $customer_details->city;?>"
                                                                        selected><?php echo $city_name; ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-login">
                                                                    <div class="input-login">
                                                                        <label class="label-login">Profile Picture
                                                                            <i class="form-icon fa fa-asterisk"></i>
                                                                        </label>
                                                                        <input type="file" name="profile" class="image"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php if(isset($customer_details->profile_pic) && !empty($customer_details->profile_pic)){
                                                        $path=$this->config->item("customer_uploaded_path");?>
                                                                <img src="<?php echo $path.$customer_details->profile_pic;?>"
                                                                    class="img-responsive" height="150px" width="150px">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="contact-submit">
                                                    <button type="submit" name="save_button" value="save"
                                                        id="save_button" data-hover="SEND NOW" class="btn btn-slide">
                                                        <span class="text">create account</span>
                                                        <span class="icons fa fa-long-arrow-right"></span>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 row_eq_height">
                        <div class="wrapper-login">
                            <div class="content-login">
                                <div class="main-login">

                                    <div class="login-title">Change Password</div>
                                    <form method="post" name="register_form" id="changepasswordform">
                                        <div class="login-form">
                                            <div class="row">
                                                <div class="content-form">
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">Old password
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <input type="password" name="oldpassword"
                                                                    class="form-control label-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">password
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <input type="password" name="password"
                                                                    class="form-control label-input" id="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-login">
                                                            <div class="input-login">
                                                                <label class="label-login">confirm password
                                                                    <i class="form-icon fa fa-asterisk"></i>
                                                                </label>
                                                                <input type="password" name="cpassword"
                                                                    class="form-control label-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="contact-submit">
                                                    <button type="submit" name="save_button" value="Changepassword"
                                                        id="save_button" data-hover="Change Password"
                                                        class="btn btn-slide">
                                                        <span class="text">change password</span>
                                                        <span class="icons fa fa-long-arrow-right"></span>
                                                    </button>

                                                </div>
                                            </div>
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
<?php $this->load->view('front/common/common_footer',array("header"=>"")); ?>
<script>
$(document).ready(function() {
    $('#error').delay(6000).fadeOut();
    $('#country').change(function() {
        var country_id = $('#country').val();
        if (country_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>ajaxcontroller/fetch_state",
                method: "POST",
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    //$('#state').html('');
                    $('#state').html(data);
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        } else {
            $('#state').html('<option value="">Select State</option>');
            $('#city').html('<option value="">Select City</option>');
        }
    });

    $('#state').change(function() {
        var state_id = $('#state').val();
        if (state_id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>ajaxcontroller/fetch_city",
                method: "POST",
                data: {
                    state_id: state_id
                },
                success: function(data) {
                    $('#city').html(data);
                }
            });
        } else {
            $('#city').html('<option value="">Select City</option>');
        }
    });

});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script>
// Wait for the DOM to be ready

$(function() {
    $("#register_form").validate({
        rules: {
            name: {
                required: true,
            },
            mobile: {
                required: true,
                number: true,
                maxlength: 10,
                minlength: 10,
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "<?php echo site_url("check_customers_email_exist_or_not"); ?>",
                    type: "POST",
                    data: {
                        email: function() {
                            return $("#email").val();
                        },
                    }
                }
            },
            ccode: {
                required: true,
            },
            password: {
                required: true,
            },
            type: {
                required: true,
            },
            cpassword: {
                required: true,
            },
            gender: {
                required: true,
            },
            location: {
                required: true,
            },
            city: {
                required: true,
            },
            country: {
                required: true,
            },
            state: {
                required: true,
            },

        },
        messages: {
            name: {
                required: "Enter Your Name",
            },
            mobile: {
                required: "Enter Mobile Number",
                number: "Enter Number Only",
            },
            email: {
                required: "Enter Your Email",
                email: "Please enter valid email",
                remote: "This email is already exist."
            },
            ccode: {
                required: "Enter Your Phone Code",
            },
            password: {
                required: "Enter Your Password",
            },
            type: {
                required: "Enter Select Login Type",
            },
            cpassword: {
                required: "Enter Your Confirm Password",
            },
            gender: {
                required: "Select Your Gender",
            },
            location: {
                required: "Enter Your Location",
            },
            city: {
                required: "Enter Your City",
            },
            country: {
                required: "Enter Your Country",
            },
            state: {
                required: "Enter Your State",
            },

        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("#changepasswordform").validate({
        rules: {
            oldpassword:{
                required:true,
            },
            password:{
                required:true,

            },
            cpassword:{
                required:true,
                equalTo: "#password"
            },
        },
        messages: {
            oldpassword:{
                required:"Enter Your Old Password",
            },
            password:{
                required:"Enter Your Password",
            },
            cpassword:{
                required:"Please enter confirm password",
                equalTo:"password and confirm password should not be same"
            },
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
</script>