<?php
session_start();
include("admin/config/dbcon.php");
include("Audit_API_FOL/table_names.php");


//replace slashes
$email1 = stripcslashes($_POST['email']);
$password1 = stripcslashes($_POST['password']);

//escape spical chars
$email = mysqli_real_escape_string($con,$email1);
$password= mysqli_real_escape_string($con,$password1);

$key="allah";
$hash = hash_hmac('sha256',$password,$key);

$query = "SELECT * FROM "._name("users")." WHERE u_email = '$email' && u_password='$hash' LIMIT 1";
$query_run = mysqli_query($con, $query);
if (mysqli_num_rows($query_run) > 0) {
    $_SESSION["user"] = $email;
    $_SESSION["auth"] = 1;
    $_SESSION["query_success"] = true;
    $_SESSION['status'] = "Loged in successfully";
    header("LOCATION: admin/index.php");
    die();
} else {
    $_SESSION["query_success"] = false;
    $_SESSION['status'] = "Login failed Falied !!!    <b> Wrong Email or Password</b>";
    header("LOCATION: index.php");
    die();
}
