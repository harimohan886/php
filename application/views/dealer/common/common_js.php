	
<!--start color switcher-->
<div class="right-sidebar">
    <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">


        <p class="mb-0">Header Colors</p>
        <hr>

        <div class="mb-3">
            <button type="button" id="default-header" class="btn btn-outline-primary">Default Header</button>
        </div>

        <ul class="switcher">
            <li id="header1"></li>
            <li id="header2"></li>
            <li id="header3"></li>
            <li id="header4"></li>
            <li id="header5"></li>
            <li id="header6"></li>
        </ul>

        <p class="mb-0">Sidebar Colors</p>
        <hr>

        <div class="mb-3">
            <button type="button" id="default-sidebar" class="btn btn-outline-primary">Default Header</button>
        </div>

        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>

    </div>
</div>
<!--end color switcher-->

</div><!--End wrapper-->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- simplebar js -->
<script src="<?php echo base_url(); ?>assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="<?php echo base_url(); ?>assets/js/sidebar-menu.js"></script>
<!-- loader scripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery.loading-indicator.js"></script>
<!-- Custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/app-script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/switch.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/apexcharts/apexcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dashboard-digital-marketing.js"></script>



<!--Data Tables js-->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>


<script>
    $(document).ready(function () {
        //Default data table
        $('#default-datatable').DataTable();
        $('#example23').DataTable();

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {secondaryColor: '#FF5E5E', jackSecondaryColor: '#fff'});
        });


        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

    });

</script>



<?php $this->load->view('general/model'); ?>
<?php $this->load->view('general/functions'); ?>




<?php /*

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/jquery/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/jquery-ui/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/popper.js/js/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/modernizr/js/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/modernizr/js/css-scrollbars.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/chart.js/js/Chart.js"></script>


  <script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>bower_components/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/data-table/js/jszip.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/data-table/js/pdfmake.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/data-table/js/vfs_fonts.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>bower_components/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>bower_components/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>bower_components/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/modernizr/js/css-scrollbars.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/switchery/js/switchery.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>


  <script src="<?php echo base_url(); ?>assets/js/markerclusterer.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/google-maps/gmaps.js"></script>

  <script src="<?php echo base_url(); ?>assets/pages/widget/gauge/gauge.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/widget/amchart/amcharts.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/widget/amchart/serial.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/widget/amchart/gauge.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/widget/amchart/pie.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/pages/widget/amchart/light.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>assets/js/pcoded.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/vartical-layout.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/pages/dashboard/crm-dashboard.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/rocket-loader.min.js" data-cf-settings="" defer=""></script>

  <script>

  $(document).ready( function() {
  $('#error').delay(3000).fadeOut();
  });

  var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
  elems.forEach(function(html) {
  var switchery = new Switchery(html,{secondaryColor: '#FF5E5E', jackSecondaryColor: '#fff'});
  });

  </script> */ ?>
