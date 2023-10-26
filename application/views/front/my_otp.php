<?php $this->load->view('front/common/common_header'); ?>
<style type="text/css">.center { display: block; margin-left: auto; margin-right: auto; width: 50%; }</style>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section class="page-login">
            <div class="container wrapper-login">
                <div class="content-login">
                    <div class="main-login">
                        <div class="login-title">Confirm Otp</div>
                        <form class="form" method="post" name="otp_frm" id="otp_frm" role="form"> 
                            <?php if (validation_errors()){   
                                echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <strong>Warning!</strong> ';
                                echo validation_errors();
                                echo '</div>';
                                }
                            ?>
                            <?php if($error != '')
                            { 
                                echo $error ;
                            } ?>
                            <div class="login-form">
                                <div class="row">
                                    <div class="content-form">
                                        <div class="col-md-12">
                                            <div class="form-login">
                                                <div class="input-login">
                                                    <label class="label-login">Enter OTP
                                                        <i class="form-icon fa fa-asterisk"></i>
                                                    </label>
                                                    <input type="text" name="otp" id="otp" maxlength="4" minlength="4" class="form-control label-input" placeholder="Enter OTP">
                                                </div>
                                            </div>
                                        </div>
                                		<div class="contact-submit">
                                            <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide">
                                                <span class="text">Enter OTP</span>
                                                <span class="icons fa fa-long-arrow-right"></span>
                                            </button>
                                            <input type="hidden" name="save_button" value="save" id="save_buttonss">
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
</div>
<?php $this->load->view('front/common/common_footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(function () {
        $("#otp_frm").validate({
            rules: {
                 otp:{required:true,number:true,maxlength:4,minlength:4},
                },
            messages: {
                otp:{required:"Please Enter Otp"},
            },
        });
    });
    
});
</script>
