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
                                                    <li class="breadcrumb-item"><a
                                                            href="<?php echo base_url(); ?>admin/dashboard"><i
                                                                class="icofont icofont-home"></i> Dashboard</a></li>

                                                    <li class="breadcrumb-item active"><?php echo $page; ?></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="page-body">


                                        <div class="card">
                                            <div class="card-header">
                                                <h4><?php echo $page; ?></h4>
                                            </div>
                                            <div class="card-block">

                                                <?php
                                                if (isset($error)) {
                                                    echo $error;
                                                }
                                                echo $this->session->flashdata("message");
                                                ?>
                                                <div class="alert background-success alert-dismissible " role="alert"
                                                    id="myElem" style="display:none">
                                                    <button type="button" class="close" data-dismiss="alert"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <strong>Success !</strong> Customer activated successfully. </div>
                                                <div class="alert background-danger alert-dismissible " role="alert"
                                                    id="myElemNo" style="display:none">
                                                    <button type="button" class="close" data-dismiss="alert"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                    <strong>Success !</strong> Customer deactivated successfully. </div>





                                                <div class="table-responsive">
                                                    <table id="footer-select" class="table table-striped table-hover table-bordered nowrap">
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

                                                                        
                                                                        $delete_url =base_url() . 'customers/customers_delete/' . $category->id;
                                                                        $view_url = base_url() . 'customers/customers_view/' . $category->id;

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
                                                                <td><input type="checkbox"
                                                                        class="js-switch tgl_checkbox"
                                                                        data-table="tbl_customers" data-status="status"
                                                                        data-idfield="id"
                                                                        data-id="<?php echo $category->id; ?>"
                                                                        id='cb_<?php echo $category->id; ?>'
                                                                        <?php echo ($category->status == '1') ? "checked" : ""; ?> />
                                                                </td>


                                                                <td>
                                                                    <?php
                                                                            $date = date("d-m-Y", strtotime($category->created_at));
                                                                            $time = date("h:i:s", strtotime($category->created_at));
                                                                            echo $date . " " . $time;
                                                                            ?>
                                                                </td>

                                                                <td>
                                                                    <!-- <a href="<?php echo $view_url; ?>"
                                                                        data-toggle="tooltip"
                                                                        title="View" class="btn btn-grd-success"><i
                                                                            class="fa fa-eye"></i></a>&nbsp;<a
                                                                        href="javascript:void(0);"
                                                                        onclick="confirm_delete('<?php echo $delete_url; ?>')"
                                                                        data-toggle="tooltip" 
                                                                        title="Delete" class="btn btn-grd-danger"><i
                                                                            class="fa fa-times"></i></a>
 -->
                                                                </td>
                                                            </tr>
                                                            <?php
                                                                   $i++; }
                                                                } 
                                                                ?>
                                                        </tbody>
                                                        <!-- <tfoot>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Customer Name</th>
                                                                <th>Email</th>
                                                                <th>Mobile</th>
                                                                <th>Date of birth</th>
                                                                <th>Gender</th>
                                                                <th id="fstatus">Status</th>
                                                                <th>Created at</th>
                                                                <th width="15%" class="d-none">Action</th>
                                                            </tr>
                                                        </tfoot> -->
                                                    </table>
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

<script>
    $(document).ready(function() {
        $('#error').delay(3000).fadeOut();
    });

    // $(function () {

    //     $("body").on("change", ".tgl_checkbox", function () {
    //         var table = $(this).data("table");
    //         var status = $(this).data("status");
    //         var id = $(this).data("id");
    //         var id_field = $(this).data("idfield");
    //         var bin = 0;

    //         if ($(this).is(':checked')) {
    //             bin = 1;
    //         }
    //         $.ajax({
    //             method: "POST",
    //             url: "<?php echo site_url("admin/change_status"); ?>",
    //             data: {table: table, status: status, id: id, id_field: id_field, on_off: bin}
    //         })
    //         .done(function (msg) {
    //             //  alert(msg);
    //             if (msg == '1') {
    //                 $("#myElem").show();
    //                 setTimeout(function () {
    //                     $("#myElem").hide();
    //                 }, 3000);

    //             } else if (msg == '0') {
    //                 $(this).css("background-color","red");
    //                 $("#myElemNo").show();
    //                 setTimeout(function () {
    //                     $("#myElemNo").hide();
    //                 }, 3000);
    //             }
    //         });
    //     });

    //     /*var table = $('#example23').DataTable({
    //         aLengthMenu: [
    //             [15, 25, 50, 100, -1],
    //             [15, 25, 50, 100, "All"]
    //         ],
    //         "scrollY": 500,
    //         "scrollX": false,
    //         "colReorder": false,
    //          "fixedHeader": false,
    //          "pageLength":15 
    //     });*/

        
    // });
</script>

<!-- <script type="text/javascript">
$('#footer-select').DataTable({
    initComplete: function() {
        this.api().columns().every(function() {
            var column = this;
            var select = $(
                    '<select class="form-control form-control-sm"><option value=""></option></select>'
                    )
                .appendTo($(column.footer()).empty())
                .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            column.data().unique().sort().each(function(d, j) {
                //var appenddata="<option value='"+d+"'>"+d+"</option>";;
                select.append('<option value="' + d + '">' + d + '</option>')
            });
        });
    }
});
var valuetable='fstatus select';
    disabled_selectbox(valuetable);
    function disabled_selectbox(data){
        //console.log(data);
        $('#'+data).css("display","none");
    }
</script> -->
