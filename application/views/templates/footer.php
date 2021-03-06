<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('plugins/morris/morris.js')?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('plugins/sparkline/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('plugins/knob/jquery.knob.js')?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.js')?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('plugins/datatables/rowReorder.dataTables.js')?>"></script>
<script src="<?php echo base_url('plugins/datatables/responsive.dataTables.js')?>"></script>
<!-- toastr.js -->
<script src="<?php echo base_url('plugins/toastr/toastr.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('plugins/fastclick/fastclick.js')?>"></script>
<script src="<?php echo base_url('plugins/alertifyjs/alertify.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/app.min.js')?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js')?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js')?>"></script>
<script src="<?php echo base_url('plugins/select2/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('dist/js/lang.js')?>"></script>
<?php if (isset($script)): ?>
<script src="<?php echo base_url('dist/js/'.$script.'.js')?>"></script>
<?php endif ?>
<!-- page script -->
</body>

</html>