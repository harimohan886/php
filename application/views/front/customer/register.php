<?php $this->load->view('front/common/common_header');?>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section class="page-login">
            <div class="container wrapper-login">
                <div class="content-login">
                    <div class="main-login">

                        <div class="login-title">create your account and join with us!</div>
                        <form method="post" name="register_form" id="register_form">
                            <div class="login-form">
                                <div class="row">
                                    <div class="content-form">
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">name
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="text" name="name" class="form-control label-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">email
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="email" name="email" class="form-control label-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-login">
                                                        <div class="input-login">
                                                            <label class="label-login">phone code
                                                                <i class="form-icon fa fa-asterisk"></i>
                                                            </label>
                                                            <select name="ccode" class="input-sm form-control label-input">
                                                                <options value="">---</options>
                                                                <?php if (count($country) > 0) {
 foreach ($country as $row) {?>
                                                                <option value="<?php echo $row->phonecode; ?>">
                                                                    <?php echo $row->name; ?>(
                                                                    +<?php echo $row->phonecode; ?>)</option>
                                                                <?php }}?>
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
                                                                class="form-control label-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <label class="label-login">Gender
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                <div class="input-login">
                                                    <div class="col-md-12">
                                                        <div class="form-check form-check-inline"
                                                            style="display:inline-block; margin-right:5px;">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio1" value="M">
                                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline"
                                                            style="display:inline-block; margin-right:5px;">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio2" value="F">
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">Female</label>
                                                        </div>
                                                        <div class="form-check form-check-inline"
                                                            style="display:inline-block;">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="inlineRadio3" value="O">
                                                            <label class="form-check-label" for="inlineRadio3">Other</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">password
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="password" name="password" class="form-control label-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">confirm password
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="password" name="cpassword" class="form-control label-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">Location
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <textarea placeholder="Your Location" name="location" id="location" class="form-control form-input"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">Country
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <select name="country" id="country" class="input-sm form-control select 2 label-input">
                                                        <option value="">Select Country</option>
                                                        <?php
foreach ($country as $row) {
 echo '<option value="' . $row->id . '">' . $row->name . '</option>';
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
                                                    <select name="state" id="state" class="input-sm form-control select 2 label-input">
                                                        <option value="">Select State</option>
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
                                                    <select name="city" id="city" class="input-sm form-control select 2 label-input">
                                                        <option value="">Select City</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="contact-submit">
                                        <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide">
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
        </section>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top">
        <a href="#top" class="link">
            <i class="fa fa-angle-double-up"></i>
        </a>
    </div>
</div>
<?php $this->load->view('front/common/common_footer');?>
<script>
   $(document).ready( function() {
    $('#error').delay(6000).fadeOut();
     $('#country').change(function(){
      var country_id = $('#country').val();
      if(country_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>ajaxcontroller/fetch_state",
        method:"POST",
        data:{country_id:country_id},
        success:function(data)
        {
            //$('#state').html('');
            $('#state').html(data);
            $('#city').html('<option value="">Select City</option>');
        }
       });
      }
      else
      {
       $('#state').html('<option value="">Select State</option>');
       $('#city').html('<option value="">Select City</option>');
      }
     });

     $('#state').change(function(){
      var state_id = $('#state').val();
      if(state_id != '')
      {
       $.ajax({
        url:"<?php echo base_url(); ?>ajaxcontroller/fetch_city",
        method:"POST",
        data:{state_id:state_id},
        success:function(data)
        {
         $('#city').html(data);
        }
       });
      }
      else
      {
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
                required:true,
            },
            mobile:{
                required:true,
                number:true,
                maxlength:8,
                minlength:8,
            },
            email:{
                required:true,
                email:true,
                remote: {
                    url: "<?php echo site_url("check_customers_email_exist_or_not"); ?>",
                    type: "POST",
                    data: {
                        email: function(){ return $("#email").val(); },
                    }
                }
            },
            ccode:{
                required:true,
            },
            password:{
                required:true,
            },
            type:{
                required:true,
            },
            cpassword:{
                required:true,
            },
            gender:{
                required:true,
            },
            location:{
                required:true,
            },
            city:{
                required:true,
            },
            country:{
                required:true,
            },
            state:{
                required:true,
            },

        },
        messages: {
           name: {
                required:"Enter Your Name",
            },
            mobile:{
                required:"Enter Mobile Number",
                number:"Enter Number Only",
            },
            email:{
                required:"Enter Your Email",
                email:"Please enter valid email",
                remote: "This email is already exist."
            },
            ccode:{
                required:"Enter Your Phone Code",
            },
            password:{
                required:"Enter Your Password",
            },
            type:{
                required:"Enter Select Login Type",
            },
            cpassword:{
                required:"Enter Your Confirm Password",
            },
            gender:{
                required:"Select Your Gender",
            },
            location:{
                required:"Enter Your Location",
            },
            city:{
                required:"Enter Your City",
            },
            country:{
                required:"Enter Your Country",
            },
            state:{
                required:"Enter Your State",
            },

        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});

</script>
