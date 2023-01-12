<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "dms";

//connection
$con = mysqli_connect("$host", "$username", "$password", "$database");

//chk conn
if (!$con) {
    header("LOCATION: ../errors/dberror.php");
    die();
    // die(mysqli_connect_error());
} else {
    // echo "connected succesfully";
}
