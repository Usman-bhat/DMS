<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
if(isset($_GET['year'])){
    $year3 = mysqli_real_escape_string($con,$_GET['year']);
    if(is_numeric($year3)){
        if($year3 >2000 && $year3<2030){
            $_SESSION['students_year']= $year3;
        }
    }
}
if(isset($_GET['status'])){
    $statusArr= array("active","passout","left");
    $statusget = mysqli_real_escape_string($con,$_GET['status']);
    if(in_array($statusget,$statusArr)){
        $_SESSION['students_status']= $statusget;
    }
}
?>
<style>
    /* @font-face {
    font-family: jameelnoori;
    src: url('../fonts/Jameel Noori Nastaleeq Kasheeda.ttf');
    }
    .ur_text{
        font-family: 'jameelnoori';
        font-size: large;
        /* font-family: 'Courier New', Courier, monospace;
    } */

</style>
<div class="content-wrapper">
    <!-- Datatable -->
    <div class="conainer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- for alterts start -->
                    <?php include("alert.php"); ?>
                    <!-- for alterts end -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= __('All Students')?></h3>
                            <a href="add_student.php" class="btn btn-primary float-right"><?= __('Add New Student')?></a>
                        </div>

                        <div class="margin text-center">
                            <!-- year  -->
                        <div class="btn-group m-3 ">
                            <label class="mr-2"><?= __('Year')?></label>
                        <select id="student_year"  class="custom-select" >
                            <option value="0">year</option>
                            <option>2022</option>
                            <?php
                                    include("config/dbcon.php");
                                    $query =  "SELECT YEAR(`t_admission_date`) FROM `students` GROUP By YEAR(`t_admission_date`) ORDER BY YEAR(`t_admission_date`)";
                                    $query_run = mysqli_query($con, $query);
                                    if ($query_run->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $query_run->fetch_assoc()) {
                                            if($row["YEAR(`t_admission_date`)"] == date('Y')){
                                                echo '
                                                <option value="'. $row["YEAR(`t_admission_date`)"].'">'.$row["YEAR(`t_admission_date`)"].'</option>';
                                            }else{
                                ?>
                                
                <option value="<?php echo $row["YEAR(`t_admission_date`)"]; ?>"><?php echo $row["YEAR(`t_admission_date`)"]; ?></option>
                            <?php
                                            }
                                        }
                                    } else {
                                        echo '<a class="dropdown-item" href="#">'.__('No Data Found').'</a>';
                                    }
                                    ?>
                            </select>
                        </div>


                        <!-- type selection -->
                        <div class="btn-group m-3">
                        <label class="mr-2"><?= __('Status')?></label>
                            <select id="student_status"  class="custom-select" >
                                <option >status</option>
                                <option value="active">Acive</option>
                                <option value="passout">Passout</option>
                                <option value="left">Left</option>
                            </select>
                        </div>
                        </div>
                    </div> 
                        <!-- <div class="container"> -->
                        <div class="card-body">
                            <table id="student_table" class="table table-bordered table-striped dataTable dtr-inline">
                                <thead>
                                    <tr>
                                        <th>Adm no</th>
                                        <th>Name</th>
                                        <th>Parentage</th>
                                        <th>Phone No</th>
                                        <th>Adm Date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th class="ur_text">داخلہ نمبر</th>
                                        <th class="ur_text">نام</th>
                                        <th class="ur_text">ولدیت</th>
                                        <th class="ur_text">فون نمبر</th>
                                        <th class="ur_text">تاریخ داخلہ</th>
                                        <th class="ur_text">حرکت</th>
                                        <th class="ur_text">حرکت</th>
                                        <th class="ur_text">حرکت</th>
                                    </tr>
                                </thead>
                                <tbody id="student_data">


                     <?php
                     $year = (isset($_SESSION['students_year']))?$_SESSION['students_year']:'2023';
                     $status = (isset($_SESSION['students_status']))?$_SESSION['students_status']:'active';
                     $query =  "SELECT * FROM `students` WHERE YEAR(`t_admission_date`) IN ( ".$year. ") AND t_status = '".$status ."'" ;
                                // echo $query;
                     $query_run = mysqli_query($con, $query);
                                if(!$query_run){
                                    echo'<h3 class="text-center">Error Please try later</h3>';
                                }
                                else{
                                if ($query_run->num_rows > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                       echo ' <tr>
                                        <td>'.$row["t_admission_no"].'</td>
                                        <td class="ur_text">'.$row["t_name_ur"].'</td>
                                        <td class="ur_text">'.$row["t_parentage_ur"].'</td>
                                        <td>'.$row["t_phone_number"].'</td>
                                        <td>'.$row["t_status"].'</td>
                                        <td>
                                            <a href="show_student.php?sid='.$row["t_admission_no"] .'" class="btn btn-sm btn-primary" type="submit">
                                                <i class="fas fa-eye"></i> '.__('Show').'
                                            </a>
                                        </td>
                                        <td>
                            
                                            <a href="edit_student.php?sid='.$row["t_admission_no"] .'" class="btn btn-sm btn-success">
                                                <i class="fas fa-edit"></i> '.__('Edit').'
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" value="'.$row["t_admission_no"] .'" class="btn btn-sm btn-danger delete_btn">
                                                <i class="fas fa-trash"></i>'.__('Delete').'
                                            </button>
                                        </td>
                                    </tr>';
                            
                                    }
                                }else{
                                    
                                    echo '<tr ><td colspan="8"><h4 class="text-center">"'.__('No Data Found').$year.__('And').$status.'"</h4></td></tr>';
                                }
                            }


?>
                                    



                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Adm no</th>
                                        <th>Name</th>
                                        <th>Parantage</th>
                                        <th>Phnoe</th>
                                        <th>Admission</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- </div> -->
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>




<!-- Model for delete student -->
<div class="modal fade" id="del_student_model">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title"><?= __('Delete Student')?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="delete_student.php">
                <div class="modal-body">
                    <p><?= __('Do you Really Want to delete this Student')?>&hellip;</p>
                </div>
                <input type="hidden" name="delete_id" class="del_student_id">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    <button type="submit" name="delete_student_btn" class="btn btn-outline-light">
                        <i class="fas fa-trash"></i> <?= __('Delete')?>
                    </button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<?php include("includes/script.php"); ?>
<script>
    $(document).ready(function() {
    // var year = '2018,2019,2020,2022,'+new Date().getFullYear();
    // // console.log(year);
    // var status ="active";
    
    // request = $.ajax({
    //         url:"../Audit_API_FOL/get_student_list_api.php",
    //         type:"post",
    //         data:"year="+year+"&status="+status
    //     })
    // request.done(function(data,status,jqq){
    //     // console.log(data);
    //     $('#student_data').html(data);
    //     $(".delete_btn").click(function(e) {
    //         e.preventDefault();
    //         var stuent_id = $(this).val();
    //         // console.log(stuent_id);
    //         $(".del_student_id").val(stuent_id);
    //         $("#del_student_model").modal("show");
    //     });
    //     // console.log(jqq);
    // })
    // request.fail(function(header,status,error){
    //     console.log(error);
    // })
    // request.always(function(){
    //     // console.log("always");
    // });

    $('#student_year').on('change',function(){
      year = $(this).find(":selected").val();
      window.location.href = "Students.php?year="+year;

    });
    $('#student_status').on('change',function(){
      status = $(this).find(":selected").val();
      window.location.href = "Students.php?status="+status;

    });
    //after year changes change
    // $('#student_year').on('change',function(){
    //   year = $(this).find(":selected").val();
    //   request1= $.ajax({
    //         url:"../Audit_API_FOL/get_student_list_api.php",
    //         type:"post",
    //         data:"year="+year+"&status="+status
    //     })
    // request1.done(function(data,status,jqq){
    //     $('#student_data').html(data);
    //     $(".delete_btn").click(function(e) {
    //         e.preventDefault();
    //         var stuent_id = $(this).val();
    //         // console.log(stuent_id);
    //         $(".del_student_id").val(stuent_id);
    //         $("#del_student_model").modal("show");
    //     });
    //     // console.log(jqq);
    // })
    // request1.fail(function(header,status,error){
    //     // console.log(error);
    // })
    // request1.always(function(){
    //     // console.log("always");
    // })
    // });

    // //after status changes change
    // $('#student_status').on('change',function(){
    //   status = $(this).find(":selected").val();
    //   request2= $.ajax({
    //         url:"../Audit_API_FOL/get_student_list_api.php",
    //         type:"post",
    //         data:"year="+year+"&status="+status
    //     })
    // request2.done(function(data,status,jqq){
    //     $('#student_data').html(data);

    //     $(".delete_btn").click(function(e) {
    //         e.preventDefault();
    //         var stuent_id = $(this).val();
    //         // console.log(stuent_id);
    //         $(".del_student_id").val(stuent_id);
    //         $("#del_student_model").modal("show");
    //     });
    //     // console.log(jqq);
    // })
    // request2.fail(function(header,status,error){
    //     // console.log(error);
    // })
    // request2.always(function(){
    //     // console.log("always");
    // });
    // })

        
    });
    // request = $.ajax({url:"students.php",
    // type:"get"})
    // request.done(function(data,status,jqq){
    //     console.log(status);
    //     console.log(jqq);
    // })
    // require.fail(function(header,status,error){
    //     console.log(error);
    // })
    // request.always(function(){
    //     console.log("always");
    // })
</script>
<?php include("includes/footer.php"); ?>