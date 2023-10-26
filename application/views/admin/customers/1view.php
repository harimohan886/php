<?php /* echo "<pre>";
print_r($customers); exit; */?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php $this->load->view("admin/common/common_css"); ?>
</head>
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

                                                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>customers"><?php echo $page; ?></a></li>

                                                        <li class="breadcrumb-item active"><?php echo $action; ?></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="page-body">


                                        <div class="card">
                                            
                                            <div class="card-block">
                                                <a href="<?php echo base_url();?>customers/customers_list" class="btn btn-grd-info pull-right" style="color: rgb(255, 255, 255); padding: 5px 13px;"><i class="fa fa-arrow-left"></i></a>
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
                                <div class="alert background-success alert-dismissible " role="alert" id="myElem" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success !</strong> Customer activated successfully. </div>
                                    <div class="alert background-danger alert-dismissible " role="alert" id="myElemNo"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success !</strong> Customer deactivated successfully. </div>
                                <div class="table-responsive">
                                        <h3 class="text-center">Customer Details</h3>

                                         <form role="form" name="form" id="demo-form2" action="" method="post" data-parsley-validate="" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                        <table class="table table-hover table-bordered detail-view">
                                            <tbody>
                                                <tr>
                                                    <td width="25%">Name</td>
                                                    <td width="75%"><?php echo $customers->name; ?></td>
                                                </tr>

                                                <tr>
                                                    <td width="25%">Email</td>
                                                    <td width="75%"><?php echo $customers->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Mobile</td>
                                                    <td width="75%"><?php echo $customers->mobile; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">DOB</td>
                                                    <td width="75%"><?php echo $customers->dob; ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Gender</td>
                                                    <td width="75%">
                                                        <?php  if($customers->gender=='M')
                                                                {echo "Male";} 
                                                    elseif($customers->gender=='F'){echo "Female";} 
                                                    else {echo "Other";} ?>
                                                        
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="25%">Status</td>
                                                    <td width="75%"><input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_customers" data-status="status" data-idfield="id"  data-id="<?php echo $customers->id; ?>" id='cb_<?php echo $customers->id; ?>'  <?php echo ($customers->status == '1') ? "checked" : ""; ?> /></td>
                                                </tr>
                                                <?php if(!empty($customers->profile_pic)){ 
                                                    $path=$this->config->item('users_uploaded_profile_path');
                                                    ?>
                                                <tr>
                                                    <td width="25%">Image</td>
                                                    <td width="75%"><img src="<?php echo $path.$customers->profile_pic; ?>" class="img-thumbnail" height="100" width="100" /></td>
                                                </tr><?php } ?>
                                                <tr>
                                                    <th scope="row">Registered Date</th>
                                                    <td>  <?php
                                                      $date = date("d-m-Y H:i:s", strtotime($customers->created_at));
                                                      echo $date; ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Updated Date</th>
                                                    <td>  <?php
                                                      $date = date("d-m-Y H:i:s", strtotime($customers->updated_at));
                                                      echo $date; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
    </div>

    <?php $this->load->view("admin/common/common_js"); ?>

</body>
</html>




    <script type="text/javascript">
    $(document).ready(function () {
        $('#error').delay(3000).fadeOut();
    });

    $(function () {
        $("body").on("change", ".tgl_checkbox", function () {
            var table = $(this).data("table");
            var status = $(this).data("status");
            var id = $(this).data("id");
            var id_field = $(this).data("idfield");
            var bin = 0;

            if ($(this).is(':checked')) {
                bin = 1;
            }
            $.ajax({
                method: "POST",
                url: "<?php echo site_url("admin/change_status"); ?>",
                data: {table: table, status: status, id: id, id_field: id_field, on_off: bin}
            })
            .done(function (msg) {
                //  alert(msg);
                if (msg == '1') {
                    $("#myElem").show();
                    setTimeout(function () {
                        $("#myElem").hide();
                    }, 3000);

                } else if (msg == '0') {
                    $(this).css("background-color","red");
                    $("#myElemNo").show();
                    setTimeout(function () {
                        $("#myElemNo").hide();
                    }, 3000);
                }
            });
        });
    });
</script>




