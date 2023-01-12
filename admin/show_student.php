<?php
require("auth.php");

include("includes/header.php");
include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");
?>


<?php

$student_id = mysqli_real_escape_string($con, $_GET['sid']);
$arr = array("/","'",";","SELECT","UNION",")");
if(0< count(array_intersect(explode(' ',strtolower($_GET['sid'])),$arr))){?>
    <a class="btn btn-success m-5" href="index.php">Home </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
    <?php
    echo ("<h1> Wrong Id</h1>");
    echo ("<p>No data found</>");
    echo "</div>";
}else{
$query = "SELECT * FROM "._name('students')." WHERE t_admission_no='$student_id' LIMIT 1";
$query_run = mysqli_query($con, $query);
if ($query_run->num_rows > 0) {
    // output data of each row
    while ($row = $query_run->fetch_assoc()) {

?>
        <!-- Profile Image -->
        <div class="container">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="images/student_images/<?php echo $row["t_photo"]; ?>" alt="Student Profile Picture">
                    </div>

                    <h3 class="profile-username text-center"><?php echo $row["t_name"]; ?></h3>

                    <p class="text-muted text-center">Student Details</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Admission Numbers</b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_admission_no"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b>Form Number</b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_form_no"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b>Admission date </b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_admission_date"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b>Parantage </b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_parentage"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b>Address </b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_address"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b> Aadhar Number</b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_aadhar"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b>Phone Number </b>
                            <b class="float-right pr-5 text-success "><?php echo $row["t_phone_number"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b> Date of birth</b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_dob"]; ?></b>
                        </li>
                        <li class="list-group-item">
                            <b> Class</b>
                            <b class="float-right pr-5 text-success"><?php echo $row["t_class"]; ?></b>
                        </li>



                    </ul>
                    <button onclick="print_student()" rel="noopener" target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Print </button>
                    <a href="generateIdCard.php?sid=<?php echo $row["t_admission_no"]; ?>"   class="btn btn-primary btn-block"><i class="fas fa-print"></i> Generate IdCard </a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
    <?php
    }
} else { ?>
    <a class="btn btn-success m-5" href="index.php">Home </a>
    <div class="alert alert-info alert-dismissible m-3">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
    <?php
    echo ("<h1> No Data Found</h1>");
    echo ("<p> no data found with this id please ty another one !!!</>");
    echo "</div>";
}} ?>

    <script>
        function print_student() {
            window.addEventListener("load", window.print());
        }
    </script>
    <?php
    include("includes/script.php");
    include("includes/footer.php");
    ?>