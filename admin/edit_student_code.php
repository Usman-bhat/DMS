<?php
session_start();
include("config/dbcon.php");
if (isset($_POST['update_student'])) {
    $addno =mysqli_real_escape_string($con, $_POST['addno']);
    $formno =mysqli_real_escape_string($con,  $_POST['formno']);
    $name =mysqli_real_escape_string($con,  $_POST['name']);
    $address =mysqli_real_escape_string($con,  $_POST['address']);
    $aadharno = mysqli_real_escape_string($con, $_POST['aadharno']);
    $dob =mysqli_real_escape_string($con,  $_POST['dob']);
    $phno =mysqli_real_escape_string($con,  $_POST['phno']);
    $parantage = mysqli_real_escape_string($con, $_POST['parantage']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $old_image =mysqli_real_escape_string($con,  $_POST['old_image']);
    $image = $_FILES['image']['name'];

    if ($image != '') {
        $update_filename = $_FILES['image']['name'];
        $allowed_extension = array('png', 'jpg', 'jpeg');
        $file_extension = pathinfo($update_filename, PATHINFO_EXTENSION);
        $filename = time() . '.' . $file_extension;

        if (!in_array($file_extension, $allowed_extension)) {
            $_SESSION['status'] = "extenson not allowed";
            header("header: add_stuent.php");
            exit(0);
        }
    } else {
        $filename = $old_image;
    }


    $update_query = "UPDATE students SET t_form_no='$formno',t_name=' $name',t_parentage='$parantage',t_address='$address',
    t_aadhar='$aadharno',t_dob='$dob',t_phone_number='$phno',t_status='$status',
    t_class='$class',t_photo='$filename' WHERE t_admission_no='$addno'";

    $update_query_run = mysqli_query($con, $update_query);
    if ($update_query_run) {
        if ($image != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/student_images/' . $filename);
        }
        $_SESSION["query_success"] = true;
        $_SESSION['status'] = "Student Updated Successfull";
        header('LOCATION: edit_student.php?sid=' . $addno);
        exit(0);
    } else {
        $_SESSION["query_success"] = false;
        $_SESSION['status'] = "Student updation Faled";
        header('LOCATION: edit_student.php?sid=' . $addno);
    }
}
