<?php
session_start();
include("admin/config/dbcon.php");

// $email = $_POST['email'];
$email = mysqli_real_escape_string($con,$_POST['email']);
$password= mysqli_real_escape_string($con,$_POST['password']);

$key="allah";
$hash = hash_hmac('sha256',$password,$key);

$query = "SELECT * FROM editors WHERE e_email = '$email' && e_password='$hash' LIMIT 1";
$query_run = mysqli_query($con, $query);


if (mysqli_num_rows($query_run) > 0) {
    $_SESSION["editor"] = $email;
    $_SESSION["editor_auth"] = 1;
    $_SESSION["query_success"] = true;
    $_SESSION['status'] = "Loged in successfully";
    header("LOCATION: editor/index.php");
    die();
} else {
    $_SESSION["query_success"] = false;
    $_SESSION['status'] = "Login failed Falied !!!    <b> Wrong Email or Password</b>";
    header("LOCATION: index.php");
    die();
}
