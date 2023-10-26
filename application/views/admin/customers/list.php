<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/common/common_css"); ?>
</head>
<body>
    <?php $this->load->view("admin/common/common_theme_loader"); ?>

<!-- Start wrapper-->
 <div id="wrapper">
 
    <?php $this->load->view("admin/common/common_sidebar"); ?>
    <?php $this->load->view("admin/common/common_header"); ?>

<div class="clearfix"></div>
	<div class="content-wrapper">
        <div class="container-fluid">
            <div class="row pt-2 pb-2">
                <div class="col-sm-9">
                    <h4 class="page-title"><?php echo $page ." ". $action; ?></h4>
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><?php echo $page; ?></li>
               </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $page ." ". $action; ?></h4>
                            <span></span>
                        </div>
                        <div class="card-body">
                            <div class="card-block">

                                <?php
                                if (isset($error)) {
                                    echo $error;
                                }
                                echo $this->session->flashdata("message");
                                ?>
                                <div class="alert alert-success alert-dismissible" role="alert" id="myElem" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success !</strong> Customer activated successfully.
                                </div>
                                <div class="alert alert-danger alert-dismissible" role="alert" id="myElemNo"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <strong>Success !</strong> Customer deactivated successfully. 
                                </div>
                                <div class="table-responsive">
                                    <table id="example23" class="table table-striped table-hover table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Date of birth</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Created at</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (count($customers) > 0) {
                                                
                                                $i=1;foreach ($customers as $category) {

                                                    
                                                    $delete_url =ADMIN_URL. 'customer/customer_delete/' . $category->id;
                                                    $view_url = ADMIN_URL. 'customer/customer_view/' . $category->id;

                                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>

                                            <td>
                                                <?php echo $category->name; ?>
                                            </td>
                                            <td>
                                                <?php echo $category->email; ?>
                                            </td>
                                            <td>
                                                <?php echo $category->mobile; ?>
                                            </td>
                                            <td>
                                                <?php  echo date('d/m/Y',strtotime($category->dob)); ?>
                                            </td>
                                            <td>
                                                <?php  if($category->gender=='M')
                                            {echo "Male";} 
                                elseif($category->gender=='F'){echo "Female";} 
                                else {echo "Other";} ?>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="js-switch tgl_checkbox"  data-table="tbl_customers" data-status="status" data-idfield="id"  data-id="<?php echo $category->id; ?>" id='cb_<?php echo $category->id; ?>'  <?php echo ($category->status == '1') ? "checked" : ""; ?> />
                                            </td>


                                            <td>
                                                <?php
                                                        $date = date("d-m-Y", strtotime($category->created_at));
                                                        $time = date("h:i:s", strtotime($category->created_at));
                                                        echo $date . " " . $time;
                                                        ?>
                                            </td>

                                            <td>
                                                
                                                <a href="<?php echo $view_url; ?>" data-toggle="tooltip"
                                                    title="View" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-eye"></i></a>&nbsp;
                                                <a href="javascript:void(0);" onclick="confirm_delete('<?php echo $delete_url; ?>')"
                                                    data-toggle="tooltip" title="Delete" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                               $i++; }
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Row-->
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
        </div>
    </div>
    <!-- End container-fluid-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
     <?php $this->load->view("admin/common/common_js"); ?>

</div>
</body>
</html>
<script>
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
                    $("#myElemNo").show();
                    setTimeout(function () {
                        $("#myElemNo").hide();
                    }, 3000);
                }
            });
        });
    });
</script>
