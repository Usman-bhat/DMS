
<?php
session_start();
include("config/dbcon.php");
include("../Audit_API_FOL/table_names.php");

if (isset($_POST["addstudent"])) {

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $name_ur = mysqli_real_escape_string($con,$_POST['name_ur']);

    $parantage =mysqli_real_escape_string ($con, $_POST['parantage']);
    $parantage_ur =mysqli_real_escape_string ($con, $_POST['parantage_ur']);


    $address =mysqli_real_escape_string ($con,$_POST['address']);
    $address_ur =mysqli_real_escape_string ($con,$_POST['address_ur']);

    $prev_study_place =mysqli_real_escape_string ($con,$_POST['prev_study_place']);
    $prev_study_place_ur =mysqli_real_escape_string ($con,$_POST['prev_study_place_ur']);
    $prev_class =mysqli_real_escape_string ($con,$_POST['prev_class']);

    $pincode =mysqli_real_escape_string ($con,$_POST['pincode']);

    $addno = mysqli_real_escape_string($con,$_POST['addno']);
    $formno =mysqli_real_escape_string ($con,$_POST['formno']);
    $aadharno = mysqli_real_escape_string ($con,$_POST['aadharno']);
    $dob = mysqli_real_escape_string ($con,$_POST['dob']);
    $doa = mysqli_real_escape_string ($con,$_POST['doa']);
    $phno =mysqli_real_escape_string ($con, $_POST['phno']);
    $class = mysqli_real_escape_string ($con,$_POST['class']);
    $status = mysqli_real_escape_string ($con,$_POST['status']);
    $image = $_FILES['image']['name'];

    $allowed_extension = array('png', 'jpg', 'jpeg','JPG','PNG','JPEG');
    if($image){
        $file_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $file_extension;
    }else{
        $file_extension = "jpg";
        $filename = "noimg.jpg";
    }
    

    if (!in_array($file_extension, $allowed_extension)) {
    echo "thiss11";
        $_SESSION['status'] = "extenson not allowed";
        header("LOCATION: add_student.php");
        exit(0);
    } else {
        $student_query = "INSERT INTO "._name("students")." (
            t_admission_no,t_form_no,t_name,t_name_ur,t_parentage,t_parentage_ur,
            t_address,t_address_ur, t_aadhar, t_admission_date,t_dob,
            t_phone_number,t_class,t_status,t_pincode,
            t_prev_study_place,t_prev_study_place_ur,prev_class,t_photo) 
        VALUES (
                '$addno','$formno','$name','$name_ur','$parantage','$parantage_ur',
                '$address','$address_ur','$aadharno','$doa','$dob',
                '$phno','$class','$status','$pincode',
                '$prev_study_place','$prev_study_place_ur','$prev_class','$filename'
                )";
        // echo"$student_query";

        $stuent_query_run = mysqli_query($con, $student_query);
        print_r($stuent_query_run);
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
