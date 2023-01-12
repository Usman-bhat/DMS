<?php
require("auth.php");

include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");

if (isset($_POST['delete_student_btn'])) {
    $sid = mysqli_real_escape_string($con, $_POST['delete_id']);
    $del_query = "DELETE FROM "._name('students')." WHERE t_admission_no = '$sid'";
    $stuent_query_run = mysqli_query($con, $del_query);
    if ($stuent_query_run) {
        $_SESSION["query_success"] = true;
        $_SESSION['status'] = "Student deleted Successfully";
        header("LOCATION: Students.php");
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Student deletion Falied";
        header("LOCATION: Students.php");
    }
}
