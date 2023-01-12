<?php
// require("auth.php");
require("includes/sidebar.php");

include("includes/header.php");
include("includes/topbar.php");
?>

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
                            <h3 class="card-title">All Students</h3>
                            <a href="add_student.php" class="btn btn-primary float-right">Add New Student</a>
                        </div>

                        <div class="margin text-center">
                            <!-- year  -->
                        <div class="btn-group m-3 ">
                            <label class="mr-2">Year</label>
                        <select id="student_year"  class="custom-select" >
                            <?php
                                    include("config/dbcon.php");
                                    $query =  "SELECT YEAR(`t_admission_date`) FROM `students` GROUP By YEAR(`t_admission_date`) ORDER BY YEAR(`t_admission_date`)";
                                    $query_run = mysqli_query($con, $query);
                                    if ($query_run->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $query_run->fetch_assoc()) {
                                            if($row["YEAR(`t_admission_date`)"] == date('Y')){
                                                echo '
                                                <option selected value="'. $row["YEAR(`t_admission_date`)"].'">'.$row["YEAR(`t_admission_date`)"].'</option>';
                                            }else{
                                ?>
                                
                <option value="<?php echo $row["YEAR(`t_admission_date`)"]; ?>"><?php echo $row["YEAR(`t_admission_date`)"]; ?></option>
                            <?php
                                            }
                                        }
                                    } else {
                                        echo '<a class="dropdown-item" href="#">No Data</a>';
                                    }
                                    ?>
                            </select>
                        </div>


                        <!-- type selection -->
                        <div class="btn-group m-3">
                        <label class="mr-2">Status</label>
                            <select id="student_status"  class="custom-select" >
                                <option value="active">Acive</option>
                                <option value="passout">Passout</option>
                                <option value="left">Left</option>
                            </select>
                        </div>
                        </div>
                    </div> 
                        <div class="card-body">
                            <table id="student_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Admission no</th>
                                        <th>Name</th>
                                        <th>Parantage</th>
                                        <th>Phnoe</th>
                                        <th>Admission date</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="student_data">

                                    



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Admission no</th>
                                        <th>Name</th>
                                        <th>Parantage</th>
                                        <th>Phnoe</th>
                                        <th>Admission</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
                <h4 class="modal-title">Delete Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="POST" action="delete_student.php">
                <div class="modal-body">
                    <p>Do you Really Want to delete this student&hellip;</p>
                </div>
                <input type="hidden" name="delete_id" class="del_student_id">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    <button type="submit" name="delete_student_btn" class="btn btn-outline-light">
                        <i class="fas fa-trash"></i> Delete
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
    var year = '2018,2014,2018,2022,'+new Date().getFullYear();
    // console.log(year);
    var status ="active";
    
    request = $.ajax({
            url:"../Audit_API_FOL/get_student_list_api.php",
            type:"post",
            data:"year="+year+"&status="+status
        })
    request.done(function(data,status,jqq){
        // console.log(data);
        $('#student_data').html(data);
        $(".delete_btn").click(function(e) {
            e.preventDefault();
            var stuent_id = $(this).val();
            // console.log(stuent_id);
            $(".del_student_id").val(stuent_id);
            $("#del_student_model").modal("show");
        });
        // console.log(jqq);
    })
    request.fail(function(header,status,error){
        console.log(error);
    })
    request.always(function(){
        // console.log("always");
    });

    
    //after year changes change
    $('#student_year').on('change',function(){
      year = $(this).find(":selected").val();
      request1= $.ajax({
            url:"../Audit_API_FOL/get_student_list_api.php",
            type:"post",
            data:"year="+year+"&status="+status
        })
    request1.done(function(data,status,jqq){
        $('#student_data').html(data);
        $(".delete_btn").click(function(e) {
            e.preventDefault();
            var stuent_id = $(this).val();
            // console.log(stuent_id);
            $(".del_student_id").val(stuent_id);
            $("#del_student_model").modal("show");
        });
        // console.log(jqq);
    })
    request1.fail(function(header,status,error){
        // console.log(error);
    })
    request1.always(function(){
        // console.log("always");
    })
    });

    //after status changes change
    $('#student_status').on('change',function(){
      status = $(this).find(":selected").val();
      request2= $.ajax({
            url:"../Audit_API_FOL/get_student_list_api.php",
            type:"post",
            data:"year="+year+"&status="+status
        })
    request2.done(function(data,status,jqq){
        $('#student_data').html(data);

        $(".delete_btn").click(function(e) {
            e.preventDefault();
            var stuent_id = $(this).val();
            // console.log(stuent_id);
            $(".del_student_id").val(stuent_id);
            $("#del_student_model").modal("show");
        });
        // console.log(jqq);
    })
    request2.fail(function(header,status,error){
        // console.log(error);
    })
    request2.always(function(){
        // console.log("always");
    });
    })

        
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