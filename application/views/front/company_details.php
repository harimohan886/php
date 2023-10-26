
<?php 
//echo $is_form_submit ; exit;
$this->load->view('front/common/common_header', array("header" => ""));?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prism.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>build/css/intlTelInput.css?1613236686837">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
	.help-block
	{
		color: red;
	}
</style>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section class="page-login">
            <div class="container wrapper-login">
                <div class="content-login">
                	<div class="main-login">
                        <div class="login-title" id="1">Add Company Details</div>
                        <?php if (validation_errors()){   
								echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
								<i class="fa fa-check"></i>
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<strong>Warning!</strong> ';
								echo validation_errors();
								echo '</div>';
								}
							?>
                        <div class="row">
		                    <div class="col-md-12 mx-0">
		                        <form id="msform" method="post" name="msform"  enctype="multipart/form-data">
		                            <!-- progressbar -->
		                            <ul id="progressbar">
		                                <li class="account" id="account"><strong>Company details</strong></li>
		                                <li id="personal"><strong>Services details </strong></li>
		                                <li id="confirm"><strong>Policy/Insurance details </strong></li>
		                                <li id="payment"><strong>Bank details</strong></li>
		                            </ul> <!-- fieldsets -->
		                            <fieldset id="company_information">
		                                <div class="form-card">
		                                    <div class="login-form">
                                				<div class="row">
                                					<div class="content-form">
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Commercial name
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="text" name="commercial_name" id="commercial_name" class="form-control label-input" placeholder="Enter Commercial name">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">VAT Number
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="text" name="vat" id="vat" class="form-control label-input" placeholder="Enter VAT Number" maxlength="15">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Proof of company registration
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="file" name="proof_image" id="proof_image" class="form-control">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Registration Date
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="date" name="reg_date" id="reg_date" class="form-control label-input" max="<?php echo date("Y-m-d"); ?>">
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Expiry date
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="date" name="exp_date" id="exp_date" class="form-control label-input" min="<?php echo date("Y-m-d"); ?>">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Number Of Employees
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label><br>
				                                                    <input type="radio" name="employes" value="1-10" checked>1-10&nbsp;&nbsp;<input type="radio" name="employes" value="11-50">11-50&nbsp;
				                                                    <input type="radio" name="employes" value="151+">51+
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Date of Establishment
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="date" name="est_date" id="est_date" class="form-control label-input" max="<?php echo date("Y-m-d"); ?>">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Logo Image
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="file" name="logo_image" id="logo_image" class="form-control">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-12">
				                                            <div class="form-login address-area">
				                                                <div class="input-login">
				                                                    <label class="label-login">Address
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    
				                                                   <textarea placeholder="Your Location" name="location" id="location" class="form-control form-input"></textarea> 
				                                                </div>
				                                            </div>
				                                        </div>
				                                       
				                                        <div class="col-md-6">
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
				                                                        }?>
				                                                    </select>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">State
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <select name="state" id="state" class="input-sm form-control">
				                                                        <option value="">Select State</option>
				                                                    </select>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
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
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Post Code/Zip Code / P.O Box <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Enter ZipCode">
				                                                </div>
				                                            </div>
				                                        </div>
				                                         <div class="col-md-12">
				                                            <div class="form-login address-area">
				                                                <div class="input-login">
				                                                    <label class="label-login">Google Map Link<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <textarea placeholder="Enter Google Map Link" name="map_link" id="map_link" class="form-control form-input"></textarea> 
				                                                    
				                                                 </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <label class="label-login">Company Telephone<i class="form-icon fa fa-asterisk"></i></label>
				                                                <input id="phone" name="phone" type="tel"  class="form-control pone_valid" placeholder="Phone Number">
				                                                <!-- <span id="valid-msg" class="hide">✓ Valid</span>
				                                                <span id="error-msg" class="hide"></span> -->
				                                                <input type="hidden" name="country_code" id="country_code">
				                                             </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Contact Person Name
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="text" name="Contact_person" id="Contact_person" class="form-control label-input" placeholder="Enter Contact Person Name">
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-12" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Job Title
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="text" name="job_title" id="job_title" class="form-control label-input" placeholder="Enter Job Title">
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-12" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Contact details
				                                                        <i class="form-icon fa fa-asterisk"></i>
				                                                    </label><br>
				                                                    <div class="col-md-6">
				                                                    <input type="text" name="telephone" id="telephone" class="form-control label-input" placeholder="Telephone Number" readonly value="<?= $company_details['mobile']?>">
				                                                    </div>
				                                                    <!-- <div class="col-md-4">
				                                                    <input type="text" name="social_media" id="social_media" class="form-control label-input" placeholder="Social account">
				                                                    </div> -->
				                                                    <div class="col-md-6">
				                                                    <input type="text" name="email" id="email" class="form-control label-input" placeholder="Email" readonly value="<?= $company_details['email']?>">
				                                                    </div>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
                                				</div>
                                			</div>
		                                </div>
		                                <input type="button" name="next" id="next1" class="next action-button" value="Next Step" />
		                            </fieldset>
		                            <fieldset id="services_information">
		                                <div class="form-card">
		                                    <div class="login-form">
                                				<div class="row">
                                					<div class="content-form">
				                                        <div class="col-md-12" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Bussiness Category<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <select multiple="multiple" class="multiselect" id="business_type" name ="business_type[]" style="width: 250px;">
				                                                        <option value="Inbound Tour Operator">Inbound Tour Operator</option>
				                                                        <option value="Outbound tour Operator">Outbound tour Operator</option>
				                                                        <option value="Domestic tour operator">Domestic tour operator</option>
				                                                        <option value="Ground operator">Ground operator</option>
				                                                    </select>
				                                                    <p id="title_error" class="ml-1 mt-1"> <?php echo form_error('multiselect1'); ?></p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-12" id="2"  >
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Service category<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <select name="services" id="services" class="form-control" onchange="Ground_operator()">
				                                                        <option value="">---Select Services---</option>
				                                                        <option value="Inbound Tour Operator">Inbound Tour Operator</option>
				                                                        <option value="Outbound tour Operator">Outbound tour Operator</option>
				                                                        <option value="Domestic tour operator">Domestic tour operator</option>
				                                                        <option value="Ground operator">Ground operator</option>
				                                                    </select>
				                                                    <p id="title_error" class="ml-1 mt-1"> <?php echo form_error('multiselect22'); ?></p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-12" id="OtheroperatorDiv" style="display:none">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Travel style
				                                                    </label><br>
				                                                    <?php 
				                                                        //echo "<pre>";
				                                                        //print_r($category);die;
				                                                         ?>
				                                                    <select class="select2" multiple name="travel_style[]" id="travel_style">
				                                                        <?php 
				                                                        
				                                                        if(count($category) > 0){
				                                                        foreach($category as $row){
				                                                            if(count($row['subcategory'])>0)
				                                                            { ?>
				                                                                <optgroup label="<?= $row['category_name']?>">
				                                                            <?php foreach($row['subcategory'] as $subrow){ 
				                                                                ?>

				                                                                <option value="<?= $subrow['id']?>"><?= $subrow['category_name']?></option>
				                                                            <?php }  ?> 
				                                                            </optgroup>
				                                                            <?php } else{ ?>
				                                                                <option value="<?php echo $row['id'];?>"><strong><?= $row['category_name']?></strong></option>
				                                                            <?php } ?>
				                                                            ?>
				                                                        
				                                                        
				                                                     
				                                                        <?php } }?>
				                                                        <!-- <optgroup label="Gujrat">
				                                                            <option value="Ahmedabad">Ahmedabad</option>
				                                                            <option value="Ghandhinagar">Ghandhinagar</option>
				                                                        </optgroup>
				                                                        <optgroup label="Rajstahn">
				                                                            <option value="Udaipur">Udaipur</option>
				                                                            <option value="Jaypur">Jaypur</option>
				                                                        </optgroup> -->
				                                                    </select>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-12" id="GroundoperatorDiv" style="display:none">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Ground operator</label><br>
				                                                    <select name="ground_operator" multiple="multiple" class="multiselect" id="ground_operator" style="width: 350px;">
				                                                        <option value="Land arrangement">Land arrangement</option>
				                                                        <option value="Transportation">Transportation </option>
				                                                        <option value="Ethnic tourism">Ethnic tourism</option>
				                                                        <option value="Guide services">Guide services</option>
				                                                        <option value="Vendor negotiation">Vendor negotiation</option>
				                                                        <option value="Arrival / Departure procedures">Arrival / Departure procedures</option>
				                                                        <option value="Organize package tour">Organize package tour</option>
				                                                        <option value="Escorting Services">Escorting Services</option>
				                                                        <option value="Market Research ">Market Research </option>
				                                                    </select>

				                                                    <p id="title_error" class="ml-1 mt-1"> <?php echo form_error('multiselect2'); ?></p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-12" id="2">
				                                            <div class="form-login address-area">
				                                                <div class="input-login">
				                                                    <label class="label-login">Company Short Bio<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <textarea name="company_bio" class="form-control" id="company_bio" rows="5" style="border:solid 1px black;"></textarea>
				                                                    <p id="title_error" class="ml-1 mt-1"> <?php echo form_error('company_biodata'); ?></p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-12" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Link Of<i class="form-icon fa fa-asterisk"></i>
				                                                    </label><br>
				                                                    <div class="col-md-6 pl-0">
				                                                        <input type="text" name="company_link" id="company_link" class="form-control label-input" placeholder="Your website">
				                                                    </div>
				                                                    <div class="col-md-6 pr-0">
				                                                        <input type="text" name="social_media_link" id="social_media_link" class="form-control label-input" placeholder="Your social media ">
				                                                    </div>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Images</label>
				                                                    <input type="file" class="form-control" id="company_images"
				                                                        name="company_images[]" multiple />
				                                                    
				                                                    <p id="title_error" class="ml-1 mt-1"> <?php echo form_error('company_biodata'); ?></p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6" id="2">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Current CRM Name</label>
				                                                    <input type="text" name="crm_name" class="form-control" id="crm_name" placeholder="Current CRM Name">
				                                                    <p id="title_error" class="ml-1 mt-1"> <?php echo form_error('company_biodata'); ?></p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        
				                                        
				                                        <div class="col-md-12">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Do You have ultimate parent/branch company? <i class="form-icon fa fa-asterisk"></i></label>
				                                                    <input type="radio" name="is_parent_company" value="1" checked >Yes
				                                                    <input type="radio" name="is_parent_company" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        
				                                    </div>
				                                    <div class="content-form" id="ParentBranchDiv">
				                                    	<div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Parent/branch Company <i class="form-icon fa fa-asterisk"></i>
				                                                    </label><br/>
				                                                    <input type="text" name="parent_company" placeholder="Parent Company/Branch Name">
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form" id="ParentBranchDiv1">
				                                    	<div class="col-md-12">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Total number of employees in Parent/branch Company <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="no_of_employee_parent" name="no_of_employee_parent" placeholder="Parent Company/Branch Employees">
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                
				                                    <div class="content-form">
				                                        <div class="col-md-12">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Has your business had any county court judgment made against it? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_judgment" value="1" checked>Yes
				                                                    <input type="radio" name="is_judgment" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
                                				</div>
                                			</div>
		                                </div>
		                                <input type="button" name="previous" id="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" id="next2" class="next action-button" value="Next Step" />
		                            </fieldset>
		                            <fieldset>
		                                <div class="form-card">
		                                   
		                                    <div class="login-form">
                                				<div class="row">
                                					<div class="content-form">
                                						<div class="col-md-12">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Company Policy<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="file" id="company_policy" name="company_policy">
				                                                </div>
				                                            </div>
				                                        </div>
                                					</div>
                                					<div class="content-form">
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Health & Safety? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_health_safety" value="1" checked>Yes
				                                                    <input type="radio" name="is_health_safety" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Environmental? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_environmental" value="1" checked>Yes
				                                                    <input type="radio" name="is_environmental" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Quality Management? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_quality" value="1" checked>Yes
				                                                    <input type="radio" name="is_quality" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Equal opportunity? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_equl_opportunity" value="1" checked>Yes
				                                                    <input type="radio" name="is_equl_opportunity" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Ethical Sourcing? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_ethical" value="1" checked>Yes
				                                                    <input type="radio" name="is_ethical" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="content-form">
				                                        <div class="col-md-12">
				                                            <h5><b>Insurance</b></h5>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Does the company have public liability insurance? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_public_liability_insurance" value="1" checked>Yes
				                                                    <input type="radio" name="is_public_liability_insurance" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Does the company have travelers’ liability insurance? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_travelers_liability_insurance" value="1" checked>Yes
				                                                    <input type="radio" name="is_travelers_liability_insurance" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">What overall coverage value per annum (USD)? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_annum" value="1" checked>Yes
				                                                    <input type="radio" name="is_annum" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Does the company have employee liability insurance? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_employee_liability_insurance" value="1" checked>Yes
				                                                    <input type="radio" name="is_employee_liability_insurance" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">What overall coverage value per annum (USD) liability insurance? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="radio" name="is_annnum_liability_insurance" value="1" checked>Yes
				                                                    <input type="radio" name="is_annnum_liability_insurance" value="0">No
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <!-- <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Please upload relevant Policy Documents? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="file" name="policy" id="policy" class="form-control">
				                                                </div>
				                                            </div>
				                                        </div> -->
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">How many insurances claim has your business made in the past 3 years? <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input type="text" name="insurances_claim" class="form-control" placeholder="Enter Number"></div>
				                                            </div>
				                                        </div>
				                                    </div>
                                				</div>
                                			</div>
		                                </div>
		                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="make_payment" class="next action-button" value="Next" id="next3"/>
		                            </fieldset>
		                            <fieldset>
		                                <div class="form-card">
		                                    <div class="login-form">
                                				<div class="row">
                                					<div class="content-form">
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Official Company name  <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="official_name" name="official_name" placeholder="Name" />
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Bank Name<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="bank_name" name="bank_name" placeholder="bank Name"/>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Account Number / IBAN<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="IBAN" name="IBAN" placeholder="Enter IBAN"/>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">BSB/ SWIFT code <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="BSB" name="BSB" placeholder="Enter BSB"/>
				                                                </div>
				                                            </div>
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Bank Address <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="bank_address" name="bank_address" placeholder="bank Address"/>
				                                                </div>
				                                            </div>   
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Bank City <i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="bank_city" name="bank_city" placeholder="Enter Bank City" />
				                                                </div>
				                                            </div>   
				                                        </div>
				                                        <div class="col-md-6">
				                                            <div class="form-login">
				                                                <div class="input-login">
				                                                    <label class="label-login">Bank Country<i class="form-icon fa fa-asterisk"></i>
				                                                    </label>
				                                                    <input class="form-control" type="text" id="bank_country" name="bank_country" placeholder="Enter Country Name"/>
				                                                </div>
				                                            </div>   
				                                        </div>
				                                        <!-- <div class="clearfix"></div>
				                                            <div class="contact-submit" id="9">
				                                                <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide">
				                                                    <span class="text">Register</span>
				                                                    <span class="icons fa fa-long-arrow-right"></span>
				                                                </button>
				                                                <input type="hidden" name="save_button" value="save" id="save_buttonss">
				                                            </div> -->
				                                            <div class="col-md-12">
						                                    <div class="terms-condition form-group">
						                                        <label class="radio-inline">
						                                            <input type="checkbox" name="accept" id="accept" value="1"> I acknowledge that I have read this registration form completely and the information I provided is accurate and correct.
						                                        </label>
						                                    </div>
						                                </div>
				                                            
				                                    </div>
                                				</div>
                                			</div>
		                                </div>
		                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <!-- <input type="submit" name="make_payment" class="next action-button" value="submit" id="submit"/> -->
		                                <button type="submit" name="save_button" value="save" id="save_button" data-hover="SEND NOW" class="btn btn-slide next">
                                            <span class="text">Register</span>
                                            <span class="icons fa fa-long-arrow-right"></span>
                                        </button>
                                        <input type="hidden" name="save_button" value="save" id="save_buttonss">
		                            </fieldset>
		                        </form>
		                    </div>
		                </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="Success-modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header header-color">
        <h5 class="modal-title" id="exampleModalLongTitle">Registration Succesfully!</h5>
      </div>
      <div class="modal-body">
        <p>Thank you for being member of Ooorm, please check your email for the approval of your request.</p>
      </div>
      <div class="modal-footer">
      	
        <button type="button" class="action-button-previous" onclick="RedirectHome()">Okay</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('front/common/common_footer', array("header" => ""));?>
<script type="text/javascript">
    var site_url = '<?php echo base_url(); ?>';
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$('.select2').select2();
</script>
<script src="<?php echo base_url(); ?>build/js/intlTelInput.js?1613236686837"></script>
<script src="<?php echo base_url(); ?>assets/js/isValidNumber.js?1613236686837"></script>
<script>
   $(document).ready( function() {
   	if(<?= $is_form_submit ?> == '1')
	{
		$('#Success-modal').modal('show');	
	} 
    var input = document.querySelector("#phone"),
    errorMsg = document.querySelector("#error-msg"),
    validMsg = document.querySelector("#valid-msg");


    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    // initialise plugin
    var iti = window.intlTelInput(input, {
      utilsScript: "<?php echo base_url(); ?>build/js/utils.js?1613236686837"
    });
    var reset = function() {
      input.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };

    // on blur: validate
    input.addEventListener('blur', function() {
      reset();
      if (input.value.trim()) {
        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
        } else {
          input.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
        }
      }
    });
    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);
    
    $(".iti__country").on("click", function() {
        if($('.iti__country').hasClass('iti__active')) {
            var country_code = $(this).attr('data-dial-code');
            //alert(country_code)
            $("#country_code").val(country_code);
        }
    });
});
</script>
<script>
$("#vat").bind('keyup', function(e) {
	if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        e.keyCode = newKey;
        e.charCode = newKey;
    }
    $('#vat').val(function() {
    	return this.value.toUpperCase();
    })
});
  
</script>
<!-- <script type="text/javascript">
	$(document).ready(function(){

	if(<?= $is_form_submit ?> == '1')
	{
		alert(<?= $is_form_submit ?>);
		$('#Success-modal').modal('show');	
	} 
});
</script> -->
<script>


$(document).ready(function(){
var current_fs, next_fs, previous_fs;
var opacity;
$('#error').delay(6000).fadeOut();

$(".next").click(function(){
	var form = $("#msform");
	
	$.validator.addMethod('minupload', function(value, element, param) {
   		var length = ( element.files.length );
    	return this.optional( element ) || length > param;
	});
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
                commercial_name:{required:true},
                proof_image:{required:true,extension: "jpg|jpeg|png"},
                reg_date:{required:true},
                exp_date:{required:true},
                employes:{required:true},
                est_date:{required:true},
                logo_image:{required:true,extension: "jpg|jpeg|png"},
                phone:{required:true,number:true},
                Contact_person:{required:true},
                job_title:{required:true},
                location:{required:true},
                country:{required:true},
                state:{required:true,},
                city:{required:true},
                zipcode:{required:true,number:true},
                business_type:{required:true},
                services:{required:true},
                company_bio:{required:true},
                company_link:{required:true},
                social_media_link:{required:true},
                official_name:{required:true},
                bank_name:{required:true},
                IBAN:{required:true},
                BSB:{required:true},
                bank_address:{required:true},
                bank_city:{required:true},
                bank_country:{required:true},
                vat:{required:true},
                accept:{required:true},
                'company_images[]':{required:true,minupload:4,extension: "jpg|jpeg|png"},
                no_of_employee_parent:{required: function() {
                        return ($('input[name="is_parent_company"]:checked').val()== '1' );
                    },
                    number:true
                 },
                 parent_company:{required: function() {
                        return ($('input[name="is_parent_company"]:checked').val()== '1' );
                    },
                },
                 
                company_policy: {required: true,extension: "jpg|jpeg|png"},
                map_link:{required:true},
                //social_media:{required:true,url:true},

                ground_operator: {
                    required: function() {
                        return ($('#services').val() == 'Ground Operator');
                    },
                },
                travel_style: {
                    required: function() {
                        return ($('#services').val() != 'Ground Operator');
                    },
                },
            },
            messages: {
                commercial_name:{required:"Commercial Name is required"},
                proof_image:{required:"Image is required",extension: "You must upload png/jpg/Jpeg format file"},
                reg_date:{required:"Registration date is required"},
                exp_date:{required:"Expiry date is required"},
                employes:{required:"no of employee is required"},
                est_date:{required:"Establishment date is required"},
                logo_image:{required:"Logo is required",extension: "You must upload png/jpg/Jpeg format file"},
                phone:{required:"Number is required",minlength:"Minimum 9 digits",maxlength:"Maximum 10 digits",number:"Only digits"},
                Contact_person:{required:"Contact person is required"},
                job_title:{required:"Job title is required"},
                location:{required:"Address is required"},
                country:{required:"Country is required"},
                state:{required:"State is required"},
                city:{required:"City is required"},
                zipcode:{required:"Zipcode is required",},
                business_type:{required:"Business Type is required"},
                services:{required:"Service is required"},
                company_bio:{required:"Company Short Details is required"},
                company_link:{required:"Company Website link is required"},
                social_media_link:{required:"Social Media Account Link is required"},
                official_name:{required:"Offical name  Of Company is required"},
                bank_name:{required:"Bank Name is required"},
                IBAN:{required:"IBAN Number is required"},
                BSB:{required:"BSB Number is required"},
                bank_address:{required:"Bank Address is required"},
                bank_city:{required:"Bank City Name is required"},
                bank_country:{required:"Bank Country Name is required"},
                no_of_employee_parent:{required:"No of employee is required"},
                parent_company:{required:"Parent Branch/Company name is required"},
                company_policy: {required: "Company Policy is required"},
                ground_operator: {required: "Ground Services is required"},
                travel_style: {required: "Travel Style is required"},
                map_link: {required: "Map link is required"},
                 vat: {required: "VAT Number is required"},
                accept:{required: "Please accept"},
                'company_images[]':{required:"Image is required",extension: "You must upload png/jpg/Jpeg format file",minupload:"Must be a minimum upload  5 images"},
            },
            
	});
	if(form.valid() === true)
	{
		current_fs = $(this).parent();
	    next_fs = $(this).parent().next();
	    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style

		current_fs.animate({opacity: 0}, {
		step: function(now) {
		opacity = 1 - now;

		current_fs.css({
			'display': 'none',
			'position': 'relative'
		});
		next_fs.css({'opacity': opacity});
		},
		duration: 600
		});
	}
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$("#submit").click(function(){
	
	return false;
})

});
</script>
<script>
function Ground_operator()
{
    if($('#services').val() == 'Ground Operator')  
    {
        $('#GroundoperatorDiv').show();
        $('#OtheroperatorDiv').hide();

    } else{
        $('#GroundoperatorDiv').hide();
        $('#OtheroperatorDiv').show();

    }   
}
$(document).ready(function(){

    $('#error').delay(6000).fadeOut();
    $('.multiselect').select2({
        minimumResultsForSearch: Infinity
    });

    $('#country').change(function () {
            var country_id = $('#country').val();
            if (country_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_state",
                    method: "POST",
                    data: {country_id: country_id},
                    success: function (data) {
                        //$('#state').html('');
                        $('#state').html(data);
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            }
            else {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');
            }
        });

        $('#state').change(function () {
            var state_id = $('#state').val();
            if (state_id != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_city",
                    method: "POST",
                    data: {state_id: state_id},
                    success: function (data) {
                        $('#city').html(data);
                    }
                });
            }
            else {
                $('#city').html('<option value="">Select City</option>');
            }
        });
        $('input[type=radio][name=is_parent_company]').change(function() {
        	if (this.value == '1') {
		    	$('#ParentBranchDiv').show();
		    }
		    else if (this.value == '0') {
		        $('#ParentBranchDiv').hide();
		        
		    }
		});
        
});
function RedirectHome()
{
	window.location.replace("<?= base_url() ?>");	
}
</script>
