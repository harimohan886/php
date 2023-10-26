<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->

        <title><?php echo $title; ?> | Admin - <?php echo $page; ?> <?php echo $action; ?></title>
        <?php $this->load->view("admin/common/common_css"); ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body class="fix-header fix-sidebar card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <?php $this->load->view("admin/common/common_header"); ?>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <?php $this->load->view("admin/common/common_sidebar"); ?>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->

                    <div class="row page-titles">
                        <div class="col-md-6 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $page; ?></h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>languages/messages_list"><?php echo $page; ?></a></li>
                                <li class="breadcrumb-item active"><?php echo $action; ?></li>
                            </ol>
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <?php
                                    if (isset($error)) {
                                        echo $error;
                                    }
                                    echo $this->session->flashdata("message");
                                    ?>
                                    <div class="alert alert-success alert-dismissible " role="alert" id="myElem" style="display:none">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Success !</strong> Message language activated successfully. </div>
                                    <div class="alert alert-danger alert-dismissible " role="alert" id="myElemNo"  style="display:none">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <strong>Success !</strong> Message language deactivated successfully. </div>

                                    <h4 class="card-title">
                                        

                                        <div class="pull-right">
                                            <a href="<?php echo site_url("languages/messages_add"); ?>" class="btn btn-info" style="color: rgb(255, 255, 255); padding: 5px 13px;"><i class="fa fa-plus"></i></a>
                                        </div>

                                    </h4>
                                    <h6 class="card-subtitle"></h6>
                                    <div class="table-responsive">
                                        <div id="buttons"></div>
                                        <br>
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Language</th>
                                                    <th>Message key</th>
                                                    <th>Message value</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>

                                                <?php
                                                if (count($label_records) > 0) {
                                                    foreach ($label_records as $category) {
                                        $delete_url = ADMIN_URL . 'languages/messages_delete/' . $category->label_id;
                                        $edit_url = ADMIN_URL . 'languages/messages_edit/' . $category->label_id;

                                                        ?>  
                                                        <tr>
                                                            <td><?php echo $category->label_id; ?></td>
                                                            <td><?php echo $category->language; ?></td>
                                                            <td><?php echo $category->label_key; ?></td>
                                                            <td><?php echo $category->label_value; ?></td>
                                                            <td><input type="checkbox" class="js-switch tgl_checkbox" data-color="#55ce63" data-table="tbl_language_messages" data-status="label_status" data-idfield="label_id"  data-id="<?php echo $category->label_id; ?>" id='cb_<?php echo $category->label_id; ?>'  <?php echo ($category->label_status == '1') ? "checked" : ""; ?> /></td>   
                                                            <td>  
                                                                 <a href="<?php echo $edit_url; ?>" data-toggle="tooltip"  data-placement="left" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>&nbsp;<a href="javascript:void(0);" onclick="confirm_delete('<?php echo $delete_url; ?>')" data-toggle="tooltip"  data-placement="left" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a> 
                                                            </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                } 
                                                ?>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

                <?php $this->load->view("admin/common/common_footer"); ?>

                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
<?php $this->load->view("admin/common/common_js"); ?>
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

        var table = $('#example23').DataTable({
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "order": [[ 0, "DESC" ]]
        });

        var buttons = new $.fn.dataTable.Buttons(table, {
             buttons: [
               'csvHtml5',
               'pdfHtml5'
            ]
        }).container().appendTo($('#buttons'));
    });

</script>
