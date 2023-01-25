<!-- jQuery -->
<script src=" assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src=" assets/plugins/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src=" assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src=" assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src=" assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src=" assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src=" assets/plugins/moment/moment.min.js"></script>
<script src=" assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src=" assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src=" assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src=" assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=" assets/dist/js/pages/dashboard.js"></script>

<!-- DataTables  & Plugins -->
<script src=" ./assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src=" ./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src=" ./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src=" ./assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src=" ./assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src=" ./assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src=" ./assets/plugins/jszip/jszip.min.js"></script>
<script src=" ./assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src=" ./assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src=" ./assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src=" ./assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src=" ./assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src=" ./assets/plugins/sweetalert2/sweetalert2.min.js"></script>




<!-- Page specific script -->
<script>

$(document).ready(function () {

  // $('ul.nav-link > li').click(function(e){
  //   $('ul.nav-link > li').removeClass('active');
  //   $(this).addClass('active');

  // });

// <!-- logout model show  -->

$("#logout_btn").click(function (e) {
  console.log("sfdjfjgf");
  e.preventDefault();
  $("#logout_model").modal("show");
});

//toast
$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
// $('.swalDefaultSuccess').click(function() {
  //     Toast.fire({
  //       icon: 'success',
  //       title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
  //     })
  });
});
//end ready


  //csv pdf excel etc
  $(function () {
    $("#student_table").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#student_table_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });

</script>



