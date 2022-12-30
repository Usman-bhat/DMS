<!-- jQuery -->
<script src=" ../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" ../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src=" ../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src=" ../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src=" ../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src=" ../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src=" ../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src=" ../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src=" ../assets/plugins/moment/moment.min.js"></script>
<script src=" ../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=" ../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src=" ../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src=" ../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src=" ../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src=" ../assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=" ../assets/dist/js/pages/dashboard.js"></script>

<!-- DataTables  & Plugins -->
<script src=" ../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src=" ../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src=" ../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src=" ../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src=" ../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src=" ../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src=" ../assets/plugins/jszip/jszip.min.js"></script>
<script src=" ../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src=" ../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src=" ../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src=" ../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src=" ../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src=" ../assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
$(document).ready(function(){
  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
 
    $("#resultTable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true,
      "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#resultTable_wrapper .col-md-6:eq(0)');
  $('#resultTable_filter').addClass('float-right');

    // addStudentToExam-------------------------------------------------------------------------------------------------------------->
  $('.addStudentToExam').click(function(){
    var sid = $(this).data('sid');
    console.log(sid);
    request = $.ajax({
            url:"code_exam69.php",
            type:"post",
            data:"sid="+sid+"&action=addStudentToExam"
        })
    request.done(function(data,status,header){
        console.log(data);
        if(data == 'success'){
            $('#row'+sid).removeClass('table-danger');
            $('#row'+sid).addClass('table-success');          
            $('#btnAdd'+sid).addClass('disabled');
            $('#btnDis'+sid).removeClass('disabled');
        }
    })
    request.fail(function(header,status,error){
      Toast.fire({
        icon: 'error',
        title: 'Some Error Occured Please Try Agin Later'
      })
    })
    request.always(function(){
        // console.log("always");
    });

  })

  //discardStudentFromExam   ---------------------------------------------------------------------------------------------->
  $('.discardStudentFromExam').click(function(){
    var sid = $(this).data('sid');
    console.log(sid);
    request = $.ajax({
            url:"code_exam69.php",
            type:"post",
            data:"sid="+sid+"&action=discardStudentFromExam"
        })
    request.done(function(data,status,header){
        console.log(data);
        if(data == 'success'){
          if(data == 'success'){
            $('#row'+sid).removeClass('table-success');
            $('#row'+sid).addClass('table-danger');          
            $('#btnAdd'+sid).removeClass('disabled');
            $('#btnDis'+sid).addClass('disabled');
        }
        }
    })
    request.fail(function(header,status,error){
        console.log(error);
    })
    request.always(function(){
        // console.log("always");
    });

  })


  //addStudentResult -------------------------------------------------------------------------------------------------------------->
  $('.addStudentResult').click(function(event){
    event.preventDefault();
    var Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 5000
    });    
    
    var rid = $(this).data('rid');
    
    var  val1 = $("#val1"+rid).val();
    var  val2 = $("#val2"+rid).val();
    var  val3 = $("#val3"+rid).val();
    var totalmarks = $("#totalmarks"+rid).val();
    // console.log(totalmarks);
    if((parseInt(val1)+parseInt(val2)+parseInt(val3))>totalmarks){
      Toast.fire({
              icon: 'error',
             title: 'Sum of marks is greater than total marks'
           })
    }else{

        request11 = $.ajax({
                url:"code_exam69.php",
                type:"post",
                data: "action=updateStudentsResultToDb&rid="+rid+"&val1="+val1+"&val2="+val2+"&val3="+val3
            })
        request11.done(function(data,status,header){
            // console.log(data);
            if(data == 'success'){
            console.log('success');
                $('#row'+rid).removeClass('table-danger');
                $('#row'+rid).addClass('table-success');
                Toast.fire({
                  icon: 'success',
                  title: 'Added Successfully'
                  })
            }else{
              $('#row'+rid).removeClass('table-success');
                $('#row'+rid).addClass('table-danger');
                Toast.fire({
                  icon: 'error',
                title: 'Some Error Occured Please Try Agin Later'
              })
                // $('#btnAdd'+sid).removeClass('disabled');
                // $('#btnDis'+sid).addClass('disabled');
            }
        })
        request11.fail(function(header,status,error){
          Toast.fire({
            icon: 'error',
            title: 'Some Error Occured Please Try Agin Later'
          })
            // console.log(error);
        })
        request11.always(function(){
            // console.log("always");
        });
      }

  });


  //endExam -------------------------------------------------------------------------------------------------------------->

  $('#endExam').click(function(event){
    event.preventDefault();
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });    
    
    var exid = $(this).data('exid');
    // console.log(exid);
    request12 = $.ajax({
            url:"code_exam69.php",
            type:"post",
            data: "action=endExam&exid="+exid
        })
    request12.done(function(data,status,header){
        console.log(data);
        if(data == 'success'){
            // $('#row'+rid).removeClass('table-danger');
            // $('#row'+rid).addClass('table-success');
            Toast.fire({
              icon: 'success',
              title: 'Exam Ended Successfully'
              })
              window.location.href = "index.php"
        }else{
            Toast.fire({
              icon: 'error',
             title: 'Some Error Occured Please Try Agin Later'
           })
           window.location.href = "index.php"
        }
    })
    request11.fail(function(header,status,error){
      Toast.fire({
        icon: 'error',
        title: 'Some Error Occured Please Try Agin Later'
      })
      window.location.href = "index.php"
        // console.log(error);
    })
    request11.always(function(){
        // console.log("always");
    });

  });



//createExamFinalbtn -------------------------------------------------------------------------------------------------------------->

  $('#createExamFinalbtn').click(function(event){
    event.preventDefault();
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });    
    request12 = $.ajax({
            url:"code_exam69.php",
            type:"post",
            data: "action=createExamFinalbtn"
        })
    request12.done(function(data,status,header){
        console.log(data);
        if(data == 'success'){
            Toast.fire({
              icon: 'success',
              title: 'Exam created Successfully'
              })
              window.location.href = "index.php"
        }else{
            Toast.fire({
              icon: 'error',
             title: 'Some Error Occured Please Try Agin Later'
           })
           window.location.href = "index.php"
        }
    })
    request11.fail(function(header,status,error){
      Toast.fire({
        icon: 'error',
        title: 'Some Error Occured Please Try Agin Later'
      })
      window.location.href = "index.php"
        // console.log(error);
    })
    request11.always(function(){
        // console.log("always");
    });

  });

});
//end ready

</script>
<style>
 
</style>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2005-2022 <a href="https://misbah-ul-uloom.com">Misbah-ul-uloom batagund</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
  </div>
  </body>

  </html>

