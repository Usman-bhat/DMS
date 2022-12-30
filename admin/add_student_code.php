
<?php
session_start();
include("config/dbcon.php");

if (isset($_POST["addstudent"])) {

    $addno = mysqli_real_escape_string($con,$_POST['addno']);
    $formno =mysqli_real_escape_string ($con,$_POST['formno']);
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $address =mysqli_real_escape_string ($con,$_POST['address']);
    $aadharno = mysqli_real_escape_string ($con,$_POST['aadharno']);
    $dob = mysqli_real_escape_string ($con,$_POST['dob']);
    $doa = mysqli_real_escape_string ($con,$_POST['doa']);
    $phno =mysqli_real_escape_string ($con, $_POST['phno']);
    $parantage =mysqli_real_escape_string ($con, $_POST['parantage']);
    $class = mysqli_real_escape_string ($con,$_POST['class']);
    $status = mysqli_real_escape_string ($con,$_POST['status']);
    $image = $_FILES['image']['name'];

    $allowed_extension = array('png', 'jpg', 'jpeg');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $file_extension;

    if (!in_array($file_extension, $allowed_extension)) {
        $_SESSION['status'] = "extenson not allowed";
        header("header: add_stuent.php");
        exit(0);
    } else {


        $student_query = "INSERT INTO students(t_admission_no,t_form_no,t_name,t_parentage,t_address,t_aadhar,t_admission_date,t_dob,t_phone_number,t_class,t_status,t_photo) 
                        VALUES ('$addno','$formno','$name','$parantage','$address','$aadharno','$doa','$dob','$phno','$class','$status','$filename')";

        $stuent_query_run = mysqli_query($con, $student_query);
        if ($stuent_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/student_images/' . $filename);
            $_SESSION["query_success"] = true;
            $_SESSION['status'] = "Student Added Successfull";
            header("LOCATION: add_student.php");
        } else {
            $_SESSION["query_success"] = false;
            $_SESSION['status'] = "Student regestration Faled";
            header("LOCATION: add_student.php");
        }
    }
}
