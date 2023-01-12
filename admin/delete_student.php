<?php
require("auth.php");

include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");

if (isset($_POST['delete_student_btn'])) {
    $sid = mysqli_real_escape_string($con, $_POST['delete_id']);
    try {
        $query  ="SELECT `t_photo` FROM `students` WHERE t_admission_no = ".$sid;
        $query_run = mysqli_query($con, $query);
        $data= mysqli_fetch_row($query_run);
        if ($query_run) {
            $filename="images/student_images/".$data[0];
            if($data[0] != "noimg.jpg"){
                if (file_exists($filename)) {
                    unlink($filename);
                  }
            }
            $del_query = "DELETE FROM "._name('students')." WHERE t_admission_no = '$sid'";
            $stuent_query_run = mysqli_query($con, $del_query);
            if ($stuent_query_run) {
                $_SESSION["query_success"] = true;
                $_SESSION['status'] = "Student deleted Successfully";
                header("LOCATION: Students.php");
            }
        } else {
            throw new Exception("no data found");
        }                   
                            
        
       
    } catch (\Throwable $th) {
        //throw $th;
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Student deletion Falied"+$th;
        header("LOCATION: Students.php");
    }
}
