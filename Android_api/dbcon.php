<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "dms";
try {
    //connection
    $con = mysqli_connect("$host", "$username", "$password", "$database");
    //chk conn
    if (mysqli_connect_error()) {
    throw new Exception("Internal server error");
    
    } else {
        // echo "connected succesfully";
    }
} catch (\Throwable $th) {
    // http_response_code(500);
    // echo json_encode(array(
    //     "error"=>500,
    //     "message"=>"Internal Server Error"
    // ));
}


