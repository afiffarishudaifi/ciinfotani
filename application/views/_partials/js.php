<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->

<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('plugins/morris/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('plugins/knob/jquery.knob.js'); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('dist/js/pages/dashboard.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('plugins/fastclick/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/app.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>
<!-- page script -->
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('plugins/chartjs/Chart.min.js');?>"></script>
<script>
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
  $(function() {
    $(document).on('click', '.hapus', function(e) {
      e.preventDefault();
      $("#exampleModal").modal('show');
      $.post(' controller/admin/hasil', {
          id: $(this).attr('data-id')
        },
        function(html) {
          $(".modal-body").html(html);
        }
      );
    });
  });
</script>

<!--fungsi untuk menampilkan hanya angka saja-->
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
</script>

<!--
    <script>
        function hanyaTulisan(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if ((charCode < 57 || charCode > 90) && (charCode < 97 || charCode > 122))

            return false;
          return true;
        }
    </script>
-->

<!--tanggal pada input tanggal-->
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/resources/demos/style.css">
<script src="<?php echo base_url('plugins/jQueryUI/jquery-ui.min.js'); ?> " type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tgl').datepicker({
      dateFormat: "yy-mm-dd",
      minDate: new Date(<?php $tglhariini ?>)
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tgl2').datepicker({
      dateFormat: "yy-mm-dd",
      minDate: new Date(<?php $tglhariini ?>)
    });
  });
</script>

<script src="<?php echo base_url('assets/js/jquery.mask.min.js'); ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {

    // Format mata uang.
    $('.uang').mask('000.000.000', {
      reverse: true
    });
  })
</script>

<!--disabled enabled password-->
<script type="text/javascript">
  $(document).ready(function() {
    enable_cb();
    $("#cek").click(enable_cb);
  });

  function enable_cb() {
    $("input.password").prop("disabled", !this.checked);
  }
</script>