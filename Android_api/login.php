<?php
// require 'predis/autoload.php';
require 'helpers/jwt_helper.php';
// Predis\Autoloader::register();

try {


    // $client = new Predis\Client();
    $jwt = new jwtHelper();
    $headers = getallheaders();

   
    if(isset($_POST['email']) && isset($_POST['password'])){
        
        include "dbcon.php";
        if(!$con){
            throw new Exception('file exception',500);
        }
        //replace slashes
        $email1 = stripcslashes($_POST['email']);
        $password1 = stripcslashes($_POST['password']);
        //escape spical chars
        $email = mysqli_real_escape_string($con,$email1);
        $password= mysqli_real_escape_string($con,$password1);

        
        // $value = $client->get($email);

            $hashKey11="allah";
            $hash = hash_hmac('sha256',$password,$hashKey11);
            $query = "SELECT * FROM users WHERE u_email = '$email' && u_password='$hash' LIMIT 1";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {

                // $refreshToken = 
                $tokens = array(  
                    "accessToken" => $jwt ->signAccessToken($email),
                    "refreshToken" => $jwt ->signRefreshToken($email),
                );
                if(!$tokens){
                throw new Exception("internal Server Error", 500);
                }
                // $client->set($email, $refreshToken);
                echo(json_encode($tokens));
            }else{
                // no data in db 
                throw new Exception("Unauthorized", 402);


            }
    
    }else if (isset($_POST['refresh']) && isset($headers['authorization'])){
        $jwtFull = $headers['authorization'];
        $userid = $jwt->verifyRefreshToken($jwtFull);
        // $value = $client->get($userid);
        // echo($userid);
        if(!$userid){
            throw new Exception("Bad Request11", 400);
        }else{

        
            $refreshToken11 = $jwt ->signRefreshToken($userid );
            $tokens = array(  
                "accessToken" => $jwt ->signAccessToken($userid),
                "refreshToken" => $refreshToken11,
            );
            // $client->set($userid, $refreshToken11);
            echo(json_encode($tokens));
        }


    }else{
        // no POST Data
        throw new Exception("Bad Request12", 400);
    }
    
} catch (\Throwable $e) {
    echo json_encode(array(
        "error"=>$e->getCode(),
        "message"=>$e->getMessage()
    ));
}

?>