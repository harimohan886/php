<script>
    function changeStatus(url) {
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function (dataHtml) {
                $("#msg-display001").html('');
                if (dataHtml.num == 1) {
                    $("#msg-display001").append('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong><i class="fa fa-check-circle"></i> Success!&nbsp;&nbsp;</strong>' + dataHtml.msg + '</div>').show();
                } else {
                    $("#msg-display001").append('<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">×</button><strong>Error!&nbsp;&nbsp;</strong>' + dataHtml.msg + '</div>').show();
                }
            },
            error: function (dataHtml) {

            }
        });
    }


    function confirm_delete(urlLink) {
        $('#confirm-delete').modal('show');
        $('#_confirm_del_link').attr('href', urlLink);
    }

    $(function () {

        // Select/Deselect all checkboxes in tables
        $('thead input:checkbox').click(function () {
            var checkedStatus = $(this).prop('checked');
            var table = $(this).closest('table');

            $('tbody .record_check:checkbox', table).each(function () {
                $(this).prop('checked', checkedStatus);
            });
        });


        $("#activeall").click(function () {
            var checked = $("#list_form input:checkbox.record_check:checked").length;
            if (checked > 0) {
                if (checked == 1) {
                    if ($("#list_form input:checkbox.record_check:checked").attr("id") == 'check4-all') {
                        $('#is_not_check_modal').modal('show');
                        return false;
                    }
                }
                $('#is_actall_modal').modal('show');
                $("#actall_modal_submit").click(function () {
                    var action = $("#list_form").attr('action');
                    //var actionpass = action + "activeall";
                    if (action.indexOf("activeall") > -1) {
                    } else {
                        $("#list_form").attr('action', action + "activeall");
                    }
                    $("#list_form").submit();
                });
            } else {
                $('#is_not_check_modal').modal('show');
                return false;
            }
        });


        $("#deactiveall").click(function () {
            var checked = $("#list_form input:checkbox.record_check:checked").length;
            if (checked > 0) {
                if (checked == 1) {
                    if ($("#list_form input:checkbox.record_check:checked").attr("id") == 'check4-all') {
                        $('#is_not_check_modal').modal('show');
                        return false;
                    }
                }
                $('#is_deactall_modal').modal('show');
                $("#deactall_modal_submit").click(function () {
                    var action = $("#list_form").attr('action');
                    if (action.indexOf("deactiveall") > -1) {
                    } else {
                        $("#list_form").attr('action', action + "deactiveall");
                    }
                    $("#list_form").submit();
                });
            } else {
                $('#is_not_check_modal').modal('show');
                return false;
            }

        });

        $("#deleteall").click(function () {
            var checked = $("#list_form input:checkbox.record_check:checked").length;
            if (checked > 0) {
                if (checked == 1) {
                    if ($("#list_form input:checkbox.record_check:checked").attr("id") == 'check4-all') {
                        $('#is_not_check_modal').modal('show');
                        return false;
                    }
                }
                $('#is_delall_modal').modal('show');
                $("#delall_modal_submit").click(function () {
                    var action = $("#list_form").attr('action');
                    if (action.indexOf("deleteall") > -1) {
                    } else {
                        $("#list_form").attr('action', action + "deleteall");
                    }
                    $("#list_form").submit();
                });
            } else {
                $('#is_not_check_modal').modal('show');
                return false;
            }

        });


        $("#removeall").click(function () {

            var checked = $("#list_form input:checkbox.record_check:checked").length;
            if (checked > 0) {
                if (checked == 1) {
                    if ($("#list_form input:checkbox.record_check:checked").attr("id") == 'check4-all') {
                        $('#is_not_check_modal').modal('show');
                        return false;
                    }
                }
                $('#is_removeall_modal').modal('show');
                $("#removeall_modal_submit").click(function () {
                    var action = $("#remove_url_val").val();
                    $("#list_form").attr('action', action);
                    $("#list_form").submit();
                });
            } else {
                $('#is_not_check_modal').modal('show');
                return false;
            }
        });
    });
</script>