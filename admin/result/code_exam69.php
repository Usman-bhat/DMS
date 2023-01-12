<?php
// add exam code
session_start();
include "../config/dbcon.php";
if(isset($_GET['action']) && $_GET['action']=='addExam'){

    $examtype = mysqli_real_escape_string($con,$_POST['examType']);
    $examner = mysqli_real_escape_string($con,$_POST['examner']);
    $examdate = mysqli_real_escape_string($con,$_POST['examDate']);
    $totalMarks = mysqli_real_escape_string($con,$_POST['totalMarks']);
    $examRemarks = mysqli_real_escape_string($con,$_POST['examRemarks']);

    $sql="INSERT INTO exam (`ex_type`, `ex_date`, `ex_by`,`ex_total_marks`,`ex_remarks`) VALUE ('". $examtype ."','" . $examdate. "','". $examner ."','". $totalMarks ."','". $examRemarks ."')";
    $result = mysqli_query($con,$sql);
    if(!$result){
        echo "error". mysqli_error($con);
    }else{
        $sql1='SELECT * FROM exam where ex_date="'. $examdate.'" AND ex_by="'.$examner.'" AND ex_type = "'.$examtype.'" LIMIT 1';
        $result1 = mysqli_query($con,$sql1);
        if (!$result1){
        echo "error". mysqli_error($con);
        }else{
        $row=mysqli_fetch_row($result1);
        $_SESSION['examId']=$row[0];
        $_SESSION['examDate']=$examdate;
        header("LOCATION: add_exam.php");
        }

    }
}

//addStudentToExam
if(isset($_POST['action']) && isset($_SESSION['examId']) && $_POST['action']=='addStudentToExam'){
    $examId1=$_SESSION['examId'];
    $sid1 = mysqli_real_escape_string($con,$_POST['sid']);
    $sql2="INSERT INTO `result`(`r_sid`, `r_exid`,`r_date`) VALUES ('".$sid1."','".$examId1."','".$_SESSION['examDate']."')";    
    $result2 = mysqli_query($con,$sql2);
        if (!$result2){
        echo "error";
        }else{
            $sql3="UPDATE `students` SET t_in_exam = 1 where t_admission_no = '".$sid1."'";    
            $result3 = mysqli_query($con,$sql3);
            if($result3){
            echo "success";
            }else{
                echo "error";
            }
        }
    
}
//discardStudentFromExam
if(isset($_POST['action']) &&  $_POST['action']=='discardStudentFromExam'){
    $sid1 = mysqli_real_escape_string($con,$_POST['sid']);
    $sql2="UPDATE `students` SET t_in_exam = 2 where t_admission_no = '".$sid1."'";    
    $sql3="DELETE FROM `result` WHERE r_exid= '".$_SESSION['examId']."' AND r_sid ='".$sid1."'";    
    $result2 = mysqli_query($con,$sql2);
        if (!$result2){
        echo "error". mysqli_error($con);
        }else{
            echo "success";
        }
    
}
//updateStudentsResultToDb
if(isset($_POST['action']) && isset($_POST['rid']) &&  $_POST['action']=='updateStudentsResultToDb'){
    $rid = mysqli_real_escape_string($con,$_POST['rid']);
    //data
    $val1 = mysqli_real_escape_string($con,$_POST['val1']);
    $val2 = mysqli_real_escape_string($con,$_POST['val2']);
    $val3 = mysqli_real_escape_string($con,$_POST['val3']);

    $sql11="UPDATE `result` SET `r_adaygi`='".$val1."',`r_lahja`='".$val2."',`r_tajweed`='".$val3."' WHERE `r_id`='".$rid."'";    
    $result11 = mysqli_query($con,$sql11);
        if (!$result11){
        echo "error". mysqli_error($con);
        }else{
            // $sql3="UPDATE `students` SET t_in_exam = 1 where t_admission_no = '".$sid1."'";    
            // $result3 = mysqli_query($con,$sql3);
            // if($result3){
            // echo "success";
            // }else{
            //     echo "error";
            // }
            echo "success";
        }
    
}

//endExam
if(isset($_POST['action']) && isset($_POST['exid']) &&  $_POST['action']=='endExam'){
    $exid = mysqli_real_escape_string($con,$_POST['exid']);

    $sql12="UPDATE `exam` SET `ex_is_closed` = '0' WHERE `ex_id` = ". $exid;    
    $result12 = mysqli_query($con,$sql12);
        if (!$result12){
        echo "error". mysqli_error($con);
        }else{
            $sql3="UPDATE `students` SET t_in_exam = 0";    
            $result3 = mysqli_query($con,$sql3);
            if($result3){
                echo "success";
            }else{
                echo "error";
            }
            // echo "success";
        }
    }


    //createExamFinalbtn
if(isset($_POST['action']) &&  $_POST['action']=='createExamFinalbtn'){
    $exid = mysqli_real_escape_string($con,$_SESSION['examId']);
    $sql13="SELECT COUNT(*) FROM `students` WHERE t_in_exam=1";    
    $result13 = mysqli_query($con,$sql13);
        if (!$result13){
        echo "error1";
        }else{
            $row = mysqli_fetch_assoc($result13);
            $sql3="UPDATE `exam` SET ex_total_students = '".$row['COUNT(*)']."' WHERE ex_id='".$exid."'";    
            $result3 = mysqli_query($con,$sql3);
            if($result3){
                unset($_SESSION["examId"]);
                unset($_SESSION["examDate"]);
                echo "success";
            }else{
                echo "error";
            }
        }
    }

?>