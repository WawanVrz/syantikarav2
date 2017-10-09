
<!-------Footer ----->

<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright © 2016. RPCB Syantikara's Management Information Systems</strong>.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
    </div>
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
      $('#event').on('change', function()
      {
        var isi = $(this).val();
        if(isi == "")
        {
            $('#field-check').attr('disabled', true);
        }else {
          $('#field-check').attr('disabled', false);
        }
      });
    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
     $('.cek-additional').hide();

    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
      $('#event-additional').on('change', function()
      {
        var isi = $(this).val();
        if(isi == "ya")
        {
          $('.cek-additional').show();
        }else {
          $('.cek-additional').hide();
        }
      });
    });
</script>

<script type="text/javascript">
  $('#exampleModal').on('hidden.bs.modal', function () {
          $('.modal-body').find('lable,input,textarea').val('');

  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
     $('.field-detil').hide();

    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
     $('.field-checkcari').hide();

    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
     $('.field-checkkamar').hide();

    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
     $('.field-check-form1').attr('disabled', false);

    });
</script>


<script type="text/javascript">
  jQuery(document).ready(function($)
  {
      $('#event3').on('change', function()
      {
        var isi = $(this).val();
        if(isi == "")
        {
            $('.field-check').attr('disabled', true);
        }else {
          $('.field-check').attr('disabled', false);
        }
      });
    });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
      $('#provinsi').on('change', function()
      {
        $('.field-check-kota').attr('disabled', false);
      });
    });
</script>
<!-- DataTables -->
<script src="assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
  //  $("#example1").DataTable();
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });

  $(function () {
  $('#exampleupdate').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": false,
    "info": true,
    "autoWidth": false
  });
});

  $(function () {
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#januari').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#februari').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#maret').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#april').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#mei').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#juni').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#juli').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#agustus').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#september').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#oktober').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#november').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });

  $(function () {
    $('#desember').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>
<script>
$(function () {
$('[data-toggle="popover"]').popover()
})
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="assets/dashboard/plugins/select2/select2.full.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="assets/dashboard/dist/js/moment.min.js"></script>
<script src="assets/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="assets/dashboard/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dashboard/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dashboard/dist/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="assets/dashboard/dist/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#mytextarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor pagebreak",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});

tinymce.init({
    selector: "#mytextarea1",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor pagebreak",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<script>
//Date range picker
$('#reservation').daterangepicker();
$('#reservationlt2').daterangepicker();
$('#datepicker1').datepicker({
  autoclose: true,
  format : "yyyy-mm-dd"
});
$('#datepicker2').datepicker({
  autoclose: true,
  format : "yyyy-mm-dd"
});
$('#datepicker1a').datepicker({
  autoclose: true,
  format : "yyyy-mm-dd"
});
$('#datepicker2a').datepicker({
  autoclose: true,
  format : "yyyy-mm-dd"
});
</script>
<script>
$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
</script>
</body>
</html>
