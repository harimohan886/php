<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_not_check_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4>Error</h4></div>
            <div class="modal-body"><p>Please Select Atleast One Record.</p></div>
            <div class="modal-footer"><button type="button" class="btn btn-danger btn-ok" data-dismiss="modal"><?php echo 'Ok'; ?></button></div>
        </div>
    </div>
</div>


<?php /* ?>-------------------CONFIRM MODELS START------------------<?php */ ?>
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4>Delete Record ?</h4></div>
            <div class="modal-body"><p>Are you sure you want to delete this record ?</p></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><a class="btn btn-danger btn-ok" id="_confirm_del_link">Delete</a></div>
        </div>
    </div>
</div>

<div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_delall_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4>Delete Record(s) ?</h4></div>
            <div class="modal-body"><p>Are you sure to delete selected record(s)?</p></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a id="delall_modal_submit" class="btn btn-success btn-ok" >Yes</a></div>
        </div>
    </div>
</div>

<div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_actall_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4>Active Record(s) ?</h4></div>
            <div class="modal-body"><p>Are you sure to activate selected record(s)?</p></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a id="actall_modal_submit" class="btn btn-success btn-ok" >Yes</a></div>
        </div>
    </div>
</div>

<div data-backdrop="static" data-keyboard="false" class="modal fade" id="is_deactall_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><h4>Inactive Record(s) ?</h4></div>
            <div class="modal-body"><p>Are you sure to Inactivate selected record(s)?</p></div>
            <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Not Now</button><a id="deactall_modal_submit" class="btn btn-success btn-ok" >Yes</a></div>
        </div>
    </div>
</div>

<?php /* ?>-------------------CONFIRM MODELS END------------------<?php */ ?>