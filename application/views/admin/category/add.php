<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php $this->load->view("admin/common/common_css"); ?>
</head>

<style>
  .userform label {
    width: 120px;
    color: #333;
    float: left;
}
input.error {
    border: 1px solid red;
}
label.error{
    width: 100%;
    color: red;
    font-style: normal !important;
    margin-left: 0px !important;
    margin-bottom: 5px;
}

input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
#confirm {display: none;} 


</style>

<body>

    <?php $this->load->view("admin/common/common_theme_loader"); ?>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php $this->load->view("admin/common/common_header"); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?php $this->load->view("admin/common/common_sidebar"); ?>

                        <div class="pcoded-content">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">

                                        <div class="card">
                                            <div class="card-block">
                                                
                                                <div>
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard"><i class="icofont icofont-home"></i> Dashboard</a></li>

                                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>category/category_list"><?php echo $page; ?></a></li>

                                                        <li class="breadcrumb-item active"><?php echo $action; ?></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="page-body">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4><?php echo $page; ?> Add</h4>
                                                    <span></span>
                                                </div>
                                                <div class="card-block">
                                                    <?php if (validation_errors())
                                                        {   
                                                        echo '<div class="alert alert-warning alert-dismissible" id="error" role="alert">
                                                        <i class="fa fa-check"></i>
                                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <strong>Warning!</strong> ';

                                                        echo validation_errors();
                                                        echo '</div>';

                                                        }
                                                    ?>
                                                    <form class="form" name="form" id="form" role="form" method="post" enctype="multipart/form-data">

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-lg-2 col-sm-4 col-form-label"> Name <span class="text-danger">*</span></label>
                                                            <div class="col-lg-10 col-sm-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id="basic-addon4"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
                                                                    <input class="form-control" type="text" id="name" name="name" placeholder="Name">
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-lg-2 col-sm-4 col-form-label">Description <span class="text-danger">*</span></label>
                                                                <div class="col-lg-10 col-sm-8">
                                                                    <!-- <div class="input-group"> -->
                                                                        <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                                                    <!-- </div> -->
                                                                </div>
                                                        </div>

                                                        <div class="form-group m-t-40 row">
                                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Image<span class="text-danger">*</span></label>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <input type="file" name="image" id="image" class="dropify"  accept="image/*" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group m-t-40 row">
                                                            <label for="example-text-input" class="col-lg-2 col-md-2 col-sm-2 col-form-label">Status  <span class="text-danger"></span></label>
                                                            <div class="col-md-8">
                                                                <input class='tgl tgl-ios tgl_checkbox js-switch' name="status" type='checkbox' />
                                                            </div>
                                                        </div>

                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <input type="submit" name="save_button" id="save_button" value="Insert" class="btn btn-info">
                                                                           <a href="<?php echo site_url("category/category_list"); ?>" class="btn btn-inverse">Cancel</a>
                                                                        </div>
                                                                    </div>
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
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("admin/common/common_js"); ?>

</body>
</html>



<script>

$(document).ready( function() {
    $('#error').delay(3000).fadeOut();
});

 $(function () {
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

<script>
    $(function() {

        jQuery.validator.addMethod("maskedPhone", function (value, element) {
          return this.optional(element) || /[+]{1}[1]{1} [(0-9)]{5}-[0-9]{3}-[0-9]{4}/.test(value);
        }, "Please enter valid number.");


        $("#form").validate({
        rules: {
            name: {
                required:true,
            },
            description: {
                required: true,
            },
            image:{
                required:true,
            },
        },
        messages: {
            name: {
                required:"Please enter name",
            },
            description: {
                required:"Please enter some description",
            },
            image: {
                required:"Please select image",
            },
        },
        submitHandler: function(form) {
           form.submit();
        }
    });
});
</script>



