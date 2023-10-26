<?php $this->load->view('front/common/common_header'); ?>
<style type="text/css">.center { display: block; margin-left: auto; margin-right: auto; width: 50%; }</style>
<div id="wrapper-content">
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section>
            <div class="tour-view-main padding-top padding-bottom">
                <div class="container">
                    <h2 class="title-style-2">Confirm Tour<span></span></h2>
                    <form class="form" method="post" name="booking_frm" id="booking_frm" role="form" enctype="multipart/form-data"> 
                        <div class="table-responsive schedule-block ">
                            <table class="table-bordered" width="100%" cellpadding="2" cellspacing="2" style="text-align:center;">
                                <thead>	
                                    <tr>
                                        <th class="element"><p class="schedule-title">Tour</p></th>
                                        <th class="element"><p class="schedule-title">Date</p></th>
                                        <th class="element"><p class="schedule-title">No of Adult</p></th>
                                        <th class="element"><p class="schedule-title">No of Children</p></th>
                                        <th class="element"><p class="schedule-title">Total Price</p></th>
                                    </tr>
                                </thead>
                                <tbody>	
                                    <tr>
                                <input type="hidden" name="sale_price" id="sale_price" value="<?php echo $tour->sale_price; ?>" />
                                <input type="hidden" name="child_price" id="child_price" value="<?php echo $tour->child_price; ?>" />
                                <?php $returnpath = $this->config->item('tour_gallery_uploaded_path'); ?>
                                <td><div class="title-wrapper"><a href="<?php echo base_url(); ?>tour-details/<?php echo $tour->slug; ?>" class="title"><?php echo $tour->name; ?></a></div>
                                    <div><a href="<?php echo base_url(); ?>tour-details/<?php echo $tour->slug; ?>" class="link"><img src="<?php echo $returnpath . $tour->image; ?>" alt="confirm order" class="img-responsive center"></a></div>
                                    <span class="schedule-content"><?php echo $tour->placedesc; ?></span></td>
                                <td><p>Start Date - <?php echo $tour->start_date; ?><br/>
                                        End Date - <?php echo $tour->end_date; ?></p></td>
                                <td><input type="text" name="no_of_adults" id="no_of_adults" value="<?php echo $bdata['booking']['booking_info']['no_of_adults']; ?>" maxlength="2" class="tb-input" /></td>
                                <td><input type="text" name="no_of_children" id="no_of_children" value="<?php echo $bdata['booking']['booking_info']['no_of_children']; ?>" maxlength="2" class="tb-input" /></td>
                                <td><sup>$</sup><input type="text" name="total_price" id="total_price" class="tb-input" value="<?php echo $bdata['booking']['booking_info']['total_price']; ?>" readonly /></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="wrapper-btn margin-top70">
                                <button type="submit" class="btn btn-primary px-5 btn btn-maincolor" id="book_now" name="book_now" value="Booking">Confirm Booking</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </section>
    </div>
</div> 	
<?php $this->load->view('front/common/common_footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script>
    // Wait for the DOM to be ready
    $(document).ready(function () {
        $('#no_of_adults').on('input', function () {
            var no_of_adults = $('#no_of_adults').val();
            var no_of_children = $('#no_of_children').val();
            var sale_price = $("#sale_price").val();
            var child_price = $("#child_price").val();

            if ((parseInt(no_of_adults) === 0) && (parseInt(no_of_children) === 0)) {
                alert("Minimum 1 person required");
                $('#no_of_adults').val(1);
                return false;
            }

            if (no_of_adults != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_booking_totalprice",
                    method: "POST",
                    data: {no_of_adults: no_of_adults, no_of_children: no_of_children, sale_price: sale_price, child_price: child_price},
                    success: function (data) {
                        $('#total_price').val(data);
                    }
                });
            }
        });

        $('#no_of_children').on('input', function () {
            var no_of_children = $('#no_of_children').val();
            var no_of_adults = $('#no_of_adults').val();
            var sale_price = $("#sale_price").val();
            var child_price = $("#child_price").val();

            if ((parseInt(no_of_adults) === 0) && (parseInt(no_of_children) === 0)) {
                alert("Minimum 1 person required");
                $('#no_of_adults').val(1);
                return false;
            }

            if (no_of_children != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>ajaxcontroller/fetch_booking_totalprice",
                    method: "POST",
                    data: {no_of_adults: no_of_adults, no_of_children: no_of_children, sale_price: sale_price, child_price: child_price},
                    success: function (data) {
                        $('#total_price').val(data);
                    }
                });
            }
        });
    });

    $(function () {
        $("#booking_frm").validate({
            rules: {
                no_of_adults: {required: true, digits: true},
                no_of_children: {required: true, digits: true},
            },
            messages: {
                no_of_adults: {required: "Please enter no of adults.", digits: "Please enter only numeric value."},
                no_of_children: {required: "Please enter no of children.", digits: "Please enter only numeric value."}
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>                      